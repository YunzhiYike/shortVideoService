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
namespace App\Controller;

use App\Service\Douyin\DyService;
use App\Service\KuaiShou\KsService;
use Hyperf\Contract\OnCloseInterface;
use Hyperf\Contract\OnMessageInterface;
use Hyperf\Contract\OnOpenInterface;
use Hyperf\Redis\Redis;
use Hyperf\Utils\Codec\Json;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;

class DyWsController implements OnMessageInterface, OnOpenInterface, OnCloseInterface
{
    /**
     * @var DyService
     */
    protected $dyService;

    /**
     * @var KsService
     */
    protected $ksService;

    /**
     * @var Redis
     */
    protected $redis;

    /**
     * @var int
     */
    protected $ttl = 60 * 5;

    public function __construct(DyService $dyService, Redis $redis, KsService $ksService)
    {
        $this->dyService = $dyService;
        $this->redis = $redis;
        $this->ksService = $ksService;
    }

    public function onOpen($server, Request $request): void
    {
        $flag = $this->ksService->getPageId();
        $cofd = 'co:' . $request->fd;
        $list = $server->getClientList() ?: [];
        if (! in_array($request->fd, $list)) {
            return;
        }

        if ($this->redis->get($cofd)) {
            $data = [
                'code' => 500,
                'msg' => '连接异常请稍后重试～～',
                'data' => null,
            ];
            $server->push($request->fd, Json::encode($data));
            $server->close($request->fd);
            return;
        }
        $this->redis->pipeline()
            ->set($flag, $request->fd, $this->ttl)
            ->set($cofd, $flag, $this->ttl)
            ->exec();
    }

    public function onMessage($server, Frame $frame): void
    {
        // 刷新
        if (strtolower($frame->data) == 'ping') {
            $this->ping($frame->fd);
            return;
        }

        co(function () use ($frame, $server) {
            $cofd = 'co:' . $frame->fd;
            try {
                $flag = $this->redis->get($cofd);
                if (! $flag) {
                    throw new \Exception('会话过期请重新连接～');
                }

                if (! $this->redis->set($cofd . ':' . $flag, 1, ['nx', 'ex' => $this->ttl])) {
                    throw new \Exception('请不要在同一个连接发送请求，如需请新建一个websocket连接～～');
                }

                $url = $frame->data;
                if (empty($url) || ! strstr($url, 'https://live.douyin.com/')) {
                    throw new \Exception('直播地址无效（格式：https://live.douyin.com/xxxxx）');
                }
                $this->dyService->wssClientStart($url, $frame->fd, $server, $flag);
            } catch (\Throwable $exception) {
                $data = [
                    'code' => 500,
                    'msg' => $exception->getMessage(),
                    'data' => null,
                ];
                $list = $server->getClientList() ?: [];
                if (in_array($frame->fd, $list)) {
                    $server->push($frame->fd, Json::encode($data));
                }
                // 异常直接断开
                $server->close($frame->fd);
            }
        });
    }

    public function onClose($server, int $fd, int $reactorId): void
    {
        $cofd = 'co:' . $fd;
        $res = $this->redis->get($cofd);
        var_dump($res, $cofd);
        if (! $res) {
            $this->redis->del($cofd);
            return;
        }
        $this->redis->pipeline()->del($cofd, $res, $cofd . ':' . $res)->exec();
    }

    public function ping(int $fd)
    {
        // 刷新fd对应的协程任务ID生命周期 5分钟
        $cofd = 'co_' . $fd;
        $res = $this->redis->get($cofd);
        if (! $res) {
            return;
        }
        $res->pipeline()->expire($cofd, $this->ttl)->expire($res, $this->ttl)->expire($cofd . ':' . $res, $this->ttl)->exec();
    }
}
