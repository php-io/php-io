<?php

namespace Gplanchat\Uv\Tcp;

use Gplanchat\Uv\Loop\LoopInterface;
use Gplanchat\Uv\Net\SocketInterface;
use Gplanchat\Uv\Net\Ip4;
use Gplanchat\Uv\Net\Ip6;
use Gplanchat\EventManager\Event;
use Gplanchat\EventManager\EventEmitterInterface;
use Gplanchat\EventManager\EventEmitterTrait;

class Client
    implements EventEmitterInterface
{
    use EventEmitterTrait;

    private $loop = null;
    private $server = null;
    private $connection = null;

    /**
     * @param LoopInterface $loop
     * @param SocketInterface $socket
     * @param null $callback
     */
    public function __construct(LoopInterface $loop, SocketInterface $socket = null, callable $callback = null)
    {
        $this->loop = $loop;
        $this->connection = \uv_tcp_init($this->loop->getResource());

        if ($socket !== null) {
            $this->connect($socket, $callback);
        }
    }

    /**
     * @param Server $server
     * @return Client
     */
    public function accept(Server $server)
    {
        $this->server = $server;
        \uv_accept($server->getResource(), $this->connection);

        return $this;
    }

    /**
     * @param SocketInterface $socket
     * @param callable $callback
     * @return Client
     */
    public function connect(SocketInterface $socket, callable $callback)
    {
        $client = $this;
        $internalCallback = function($resource) use($callback, $client) {
            $client->on(['data'], $callback);
        };

        if ($socket instanceof Ip4) {
            \uv_tcp_connect($this->connection, $internalCallback);
        } else if ($socket instanceof Ip6) {
            \uv_tcp_connect6($this->connection, $internalCallback);
        }

        return $this;
    }

    public function write($buffer, callable $callback = null)
    {
        $client = $this;

        \uv_write($this->connection, $buffer, function($resource, $error) use($client, $buffer, $callback){
            if ($error) {
                $client->emit(new Event('error', ['data' => $buffer]));
                return;
            }

            if ($callback !== null) {
                call_user_func_array($callback, [$client]);
            }
        });

        return $this;
    }

    public function close(callable $callback = null)
    {
        $client = $this;

        \uv_close($this->connection, function($resource) use($client, $callback){
            $client->emit(new Event('close'));

            if ($callback !== null) {
                call_user_func_array($callback, [$client]);
            }
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
