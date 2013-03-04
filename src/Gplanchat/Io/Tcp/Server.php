<?php

namespace Gplanchat\Io\Tcp;

use Gplanchat\Io\Loop\LoopInterface;
use Gplanchat\Io\Net\SocketInterface;
use Gplanchat\Io\Net\ServerInterface;
use Gplanchat\EventManager\Event;
use Gplanchat\EventManager\EventEmitterTrait;

class Server
    implements ServerInterface
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
        $socket->bind($this);

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

    /**
     * @param LoopInterface $loop
     * @return ServerInterface|Server
     */
    public function setLoop(LoopInterface $loop)
    {
        $this->loop = $loop;

        return $this;
    }

    /**
     * @return LoopInterface
     */
    public function getLoop()
    {
        return $this->loop;
    }
}
