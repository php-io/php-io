<?php

namespace Gplanchat\Io\Net;

use Gplanchat\Io\Loop\LoopInterface;
use Gplanchat\EventManager\EventEmitterInterface;

interface ServerInterface
    extends EventEmitterInterface
{
    /**
     * @param LoopInterface $loop
     * @param SocketInterface $socket
     */
    public function __construct(LoopInterface $loop, SocketInterface $socket = null);

    /**
     * @param SocketInterface $socket
     * @return ServerInterface
     */
    public function registerSocket(SocketInterface $socket);

    /**
     * @param int $timeout
     * @param callable $callback
     * @return ServerInterface
     */
    public function listen($timeout, callable $callback);

    /**
     * @return resource
     */
    public function getResource();

    /**
     * @param LoopInterface $loop
     * @return ServerInterface
     */
    public function setLoop(LoopInterface $loop);

    /**
     * @return LoopInterface
     */
    public function getLoop();
}
