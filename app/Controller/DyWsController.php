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

    public function __construct(DyService $dyService, Redis $redis, KsService $ksService)
    {
        $this->dyService = $dyService;
        $this->redis = $redis;
        $this->ksService = $ksService;
    }

    public function onOpen($server, Request $request): void
    {
    }

    public function onMessage($server, Frame $frame): void
    {
        // 刷新
        if (strtolower($frame->data) == 'ping') {
            $this->ping($frame->fd);
            return;
        }

        co(function () use ($frame, $server) {
            $flag = $this->ksService->getPageId();
            $cofd = 'co_' . $frame->fd;
            try {
                if ($this->redis->get($cofd)) {
                    throw new \Exception('请不要在同一个连接发送请求，如需请新建一个websocket连接～～');
                }
                $this->redis->set($cofd, $flag, 60 * 5);
                $this->redis->set($flag, $frame->fd, 60 * 5);
                $url = $frame->data;
                if (empty($url) || strstr($url, 'https://live.douyin.com/') == false) {
                    throw new \Exception('cookie不能为空或直播地址无效（格式：https://live.douyin.com/xxxxx）');
                }
                $this->dyService->wssClientStart($url, $frame->fd, $server, $flag);
            } catch (\Throwable $exception) {
                $res = $this->redis->get($cofd);
                if ($res) {
                    $this->redis->del($res);
                }
                $this->redis->del($cofd);
                $data = [
                    'code' => 500,
                    'msg' => $exception->getMessage(),
                    'data' => null,
                ];
                $server->push($frame->fd, Json::encode($data));
                // 异常直接断开
                $server->close($frame->fd);
            }
        });
    }

    public function onClose($server, int $fd, int $reactorId): void
    {
        $res = $this->redis->get('co_' . $fd);
        if ($res) {
            $this->redis->del($res);
        }
        $this->redis->del('co_' . $fd);
    }

    public function ping(int $fd)
    {
        // 刷新fd对应的协程任务ID生命周期 5分钟
        $cofd = 'co_' . $fd;
        $res = $this->redis->get($cofd);
        if (! $res) {
            return;
        }
        $res->pipeline()->expire($cofd, 60 * 5)->expire($res, 60 * 5)->exec();
    }
}
