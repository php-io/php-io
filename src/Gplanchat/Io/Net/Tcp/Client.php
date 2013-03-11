<?php

namespace Gplanchat\Io\Net\Tcp;

use Gplanchat\Io\Loop\LoopInterface;
use Gplanchat\Io\Net\SocketInterface;
use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;
use Gplanchat\EventManager\Event;
use Gplanchat\EventManager\EventEmitterTrait;

class Client
    implements ClientInterface
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
    public function accept(ServerInterface $server)
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
        $socket->connect($socket, $callback);

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

    /***
     * @param LoopInterface $loop
     * @return Client
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

    /**
     * @return Server|null
     */
    public function getServer()
    {
        return $this->server;
    }
}
