<?php

namespace Gplanchat\Io\Net;

use Gplanchat\Io\Tcp\Client;
use Gplanchat\Io\Tcp\Server;

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
     * @param Client $client
     * @param $callback
     * @return mixed
     */
    public function connect(Client $client, callable $callback);

    /**
     * @param Server $server
     * @return mixed
     */
    public function bind(Server $server);
}
