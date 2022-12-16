<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Service\KuaiShou;

use App\Utils\WebSocketClient\ClientFactory;
use GuzzleHttp\Client;
use Hyperf\Redis\Redis;
use Hyperf\Utils\Codec\Json;
use KuaishouPubf\CSWebEnterRoom as Croom;
use KuaishouPubf\CSWebEnterRoom\Payload;
use KuaishouPubf\CSWebHeartbeat;
use KuaishouPubf\PayloadType;
use KuaishouPubf\SCWebFeedPush;
use KuaishouPubf\SocketMessage;
use KuaishouPubf\WebCommentFeed;
use KuaishouPubf\WebGiftFeed;
use KuaishouPubf\WebLikeFeed;
use Swoole\Coroutine;
use Swoole\WebSocket\Server;

class KsService
{
    /**
     * @var string
     */
    protected $flag;

    /**
     * @var string
     */
    protected $cookie;

    /**
     * @var array
     */
    protected $liveRoomInfo;

    /**
     * @var Server
     */
    protected $server;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var ClientFactory
     */
    protected $clientFactory;

    /**
     * @var Redis
     */
    protected $redis;

    public function __construct(Client $client, ClientFactory $clientFactory, Redis $redis)
    {
        $this->client = $client;
        $this->clientFactory = $clientFactory;
        $this->redis = $redis;
    }

    public function wssClientStart(string $url, int $fd, Server $server, string $flag): void
    {
        $this->cookie = 'clientid=3; did=web_dc649f7b9ac4d7128797616fdaee2e97; client_key=65890b29; kpn=GAME_ZONE; ksliveShowClipTip=true; needLoginToWatchHD=1';
        $this->flag = $flag;
        $this->server = $server;
        $options = [
            'headers' => [
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
                'Cookie' => $this->cookie,
            ],
        ];
        $res = $this->client->get($url, $options);
        $cookies = $res->getHeaders();
        $this->cookie = $this->getCookie($cookies['Set-Cookie'] ?? []);
        $res = $res->getBody()->getContents();
        preg_match('/_STATE__=(.*?);\(function\(\)\{var s;\(s=document\.currentScript\|\|/', $res, $res);
        if (! isset($res[1])) {
            throw new \Exception('访问频繁：获取房间信息失败请等待3分钟后重试～～ 如需专业版请联系技术QQ：1647762341】');
        }
        preg_match('/"liveStreamId":"(.*?)"/', $res[1], $data);
        if (! isset($data[1])) {
            throw new \Exception('访问频繁：获取房间信息失败请等待3分钟后重试～～ 如需专业版请联系技术QQ：1647762341】');
        }
        $liveStreamId = $data[1];
        $wssInfo = $this->getWssInfo2($liveStreamId);
//        var_dump($wssInfo);
        $token = $wssInfo['token'] ?? '';
        $wssUrl = $wssInfo['webSocketUrls'][0] ?? '';
        $this->recv($liveStreamId, $token, $wssUrl, $fd);
    }

    public function getPageId(): string
    {
        $randStr = null;
        $strPol = '-_zyxwvutsrqponmlkjihgfedcba9876543210ZYXWVUTSRQPONMLKJIHGFEDCBA';
        $max = strlen($strPol) - 1;
        for ($i = 0; $i < 16; ++$i) {
            $randStr .= $strPol[rand(0, $max)];
        }
        return $randStr . (time() * 1000);
    }

    protected function getCookie(array $list): string
    {
        $str = '';
        foreach ($list as $data) {
            $data = explode(' ', $data);
            $str .= $data[0] ?? '';
        }
        return $str;
    }

    protected function recv(string $liveStreamId, string $token, string $wssUrl, int $fd)
    {
        if (empty($token) || empty($wssUrl)) {
            throw new \Exception('访问频繁：token或连接地址缺失！请等待3分钟后重试～ 【如需专业版请联系技术QQ：1647762341】');
        }
        $client = $this->clientFactory->create($wssUrl, [], false);
        $paylod = new Payload();
        $paylod->setToken($token)->setLiveStreamId($liveStreamId)->setPageId($this->getPageId());
        $croom = new Croom();
        $croom->setPayload($paylod)->setPayloadType(200);
        // 向 WebSocket 服务端发送消息
        $str = $croom->serializeToString();
        $client->push($str, WEBSOCKET_OPCODE_BINARY);
        // 定时发送ack
        co(function () use ($client) {
            $this->keepHeartBeat($client);
        });

        $skMsg = new SocketMessage();

        defer(function () use ($client, $skMsg, $fd) {
            while ($this->redis->get($this->flag)) {
                Coroutine::sleep(0.1);
                $msg = $client->recv();
                if (! isset($msg->data)) {
                    return;
                }

                $skMsg->mergeFromString($msg->data);

                switch ($skMsg->getPayloadType()) {
                    case PayloadType::SC_FEED_PUSH:
                        $this->parseFeedPushPack($skMsg->getPayload(), $fd);
                        break;
                }
            }
            var_dump('defer end');
        });
    }

    protected function parseFeedPushPack($data, $fd)
    {
        $s = new SCWebFeedPush();
        $s->mergeFromString($data);
        $res = [
            'SCWebFeedPush' => Json::decode($s->serializeToJsonString()),
        ];

        if (! $this->redis->get($this->flag)) {
            return;
        }
        $this->server->push($fd, Json::encode($this->success($res), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    protected function success(array $data): array
    {
        return [
            'code' => 200,
            'msg' => 'ok',
            'data' => $data,
        ];
    }

    protected function gifts($list): array
    {
        $res = [];
        foreach ($list as $item) {
            /* @var $item WebGiftFeed */
            $data = [
                'nickName' => $item->getUser()->getUserName(),
                'userId' => $item->getUser()->getPrincipalId(),
                'headUrl' => $item->getUser()->getHeadUrl(),
                'giftId' => $item->getGiftId(),
                'id' => $item->getId(),
                'starLevel' => $item->getStarLevel(),
                'time' => $item->getTime(),
                'comboCount' => $item->getComboCount(),
            ];
            $res[] = $data;
        }
        return $res;
    }

    protected function comments($list): array
    {
        $res = [];
        foreach ($list as $item) {
            /* @var $item WebCommentFeed */
            $data = [
                'nickName' => $item->getUser()->getUserName(),
                'userId' => $item->getUser()->getPrincipalId(),
                'headUrl' => $item->getUser()->getHeadUrl(),
                'content' => $item->getContent(),
            ];
            $res[] = $data;
        }
        return $res;
    }

    protected function keepHeartBeat(\App\Utils\WebSocketClient\Client $client)
    {
        $obj = new CSWebHeartbeat();
        $obj->setPayloadType(1);
        $paylod = new CSWebHeartbeat\Payload();
        // 这里可以使用协程上下文做标记
        while ($this->redis->get($this->flag)) {
            $paylod->setTimestamp(time() * 1000);
            $obj->setPayload($paylod);
            $str = $obj->serializeToString();
            $client->push($str, WEBSOCKET_OPCODE_BINARY);
            Coroutine::sleep(10);
        }
        var_dump('keepHeartBeat end');
    }

    protected function getWssInfo(string $liveStreamId, array $options): array
    {
        $url = 'https://live.kuaishou.com/live_api/liveroom/websocketinfo?liveStreamId=' . $liveStreamId;
        $res = $this->client->get($url, $options)->getBody()->getContents();
        $res = Json::decode($res);
        if (isset($res['data']['result']) && $res['data']['result'] === 1) {
            return $res['data'];
        }
        throw new \Exception('获取wss连接信息失败！');
    }

    protected function likes($list): array
    {
        $res = [];
        foreach ($list as $item) {
            /* @var $item WebLikeFeed */
            $data = [
                'nickName' => $item->getUser()->getUserName(),
                'userId' => $item->getUser()->getPrincipalId(),
                'headUrl' => $item->getUser()->getHeadUrl(),
            ];
            $res[] = $data;
        }
        return $res;
    }

    protected function getWssInfo2(string $liveStreamId): array
    {
        $st = <<<'EOF'
query WebSocketInfoQuery($liveStreamId: String) {
  webSocketInfo(liveStreamId: $liveStreamId) {
    token
    webSocketUrls
   __typename
  }
}

EOF;
        $data = [
            'operationName' => 'WebSocketInfoQuery',
            'variables' => ['liveStreamId' => $liveStreamId],
            'query' => $st,
        ];
        return $this->liveGraphql($data)['data']['webSocketInfo'] ?? [];
    }

    protected function liveGraphql($data): array
    {
        $url = 'https://live.kuaishou.com/live_graphql';
        $options = [
            'json' => $data,
            'headers' => [
                'cookie' => $this->cookie,
                'content-type' => 'application/json',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
            ],
        ];
        $res = $this->client->post($url, $options)->getBody()->getContents();
        return Json::decode($res);
    }
}
