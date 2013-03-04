<?php

namespace Gplanchat\Io\Net;

use Gplanchat\Io\Loop\LoopInterface;
use Gplanchat\EventManager\EventEmitterInterface;

interface ClientInterface
    extends EventEmitterInterface
{
    /**
     * @param LoopInterface $loop
     * @param SocketInterface $socket
     * @param null $callback
     */
    public function __construct(LoopInterface $loop, SocketInterface $socket = null, callable $callback = null);

    /**
     * @param ServerInterface $server
     * @return ClientInterface
     */
    public function accept(ServerInterface $server);

    /**
     * @param SocketInterface $socket
     * @param callable $callback
     * @return ClientInterface
     */
    public function connect(SocketInterface $socket, callable $callback);

    /**
     * @param $buffer
     * @param callable|null $callback
     * @return mixed
     */
    public function write($buffer, callable $callback = null);

    /**
     * @param callable|null $callback
     * @return mixed
     */
    public function close(callable $callback = null);

    /**
     * @return resource
     */
    public function getResource();

    /***
     * @param LoopInterface $loop
     * @return ClientInterface
     */
    public function setLoop(LoopInterface $loop);

    /**
     * @return LoopInterface
     */
    public function getLoop();

    /**
     * @return ServerInterface|null
     */
    public function getServer();
}
