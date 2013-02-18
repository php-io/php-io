<?php

namespace Gplanchat\Uv\Tcp;

use Gplanchat\Uv\Loop\LoopInterface;
use Gplanchat\Uv\Net\SocketInterface;
use Gplanchat\Uv\Net\Ip4;
use Gplanchat\Uv\Net\Ip6;
use Gplanchat\EventManager\Event;
use Gplanchat\EventManager\EventEmitterInterface;
use Gplanchat\EventManager\EventEmitterTrait;

class Server
    implements EventEmitterInterface
{
    use EventEmitterTrait;

    private $loop = null;
    private $connection = null;

    public function __construct(LoopInterface $loop, SocketInterface $socket = null)
    {
        $this->loop = $loop;
        $this->connection = \uv_tcp_init($this->loop->getResource());

        if ($socket !== null) {
            $this->registerSocket($socket);
        }
    }

    public function registerSocket(SocketInterface $socket)
    {
        if ($socket instanceof Ip4) {
            \uv_tcp_bind($this->connection, $socket->getResource());
        } else if ($socket instanceof Ip6) {
            \uv_tcp_bind6($this->connection, $socket->getResource());
        }

        return $this;
    }

    public function listen($timeout, callable $callback)
    {
        $this->on(['connection'], $callback);

        $server = $this;

        \uv_listen($this->connection, $timeout, function() use($server) {
            $client = new Client($this->loop);
            $client->accept($server);

            $server->emit(new Event('connection'), [$client, $server]);

            \uv_read_start($client->getResource(), function($resource, $length, $buffer) use($client, $server) {
                $client->emit(new Event('data'), [$client, $buffer, $length, false]);
            });
        });

        return $this;
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->connection;
    }
}
