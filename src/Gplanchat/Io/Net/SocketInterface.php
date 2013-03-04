<?php

namespace Gplanchat\Io\Net;

use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;

interface SocketInterface
{
    /**
     * @return resource
     */
    public function getResource();

    /**
     * @return string
     */
    public function __toString();

    /**
     * @param ClientInterface $client
     * @param $callback
     * @return SocketInterface
     */
    public function connect(ClientInterface $client, callable $callback);

    /**
     * @param ServerInterface $server
     * @return SocketInterface
     */
    public function bind(ServerInterface $server);
}
