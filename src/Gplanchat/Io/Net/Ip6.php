<?php

namespace Gplanchat\Io\Net;

use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;

class Ip6
    implements SocketInterface
{
    protected $socket = null;
    protected $port = 0;

    /**
     * @return resource
     */
    public function __construct($address, $port)
    {
        $this->socket = \uv_ip6_addr($address, $port);
        $this->port = $port;
    }
    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->socket;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s:%d', \uv_ip6_name($this->socket), $this->port);
    }

    /**
     * @param ClientInterface $client
     * @param callable $callback
     * @return SocketInterface
     */
    public function connect(ClientInterface $client, callable $callback)
    {
        $internalCallback = function($resource) use($callback, $client) {
            $client->on(['data'], $callback);
        };

        \uv_tcp_connect6($client->getResource(), $internalCallback);

        return $this;
    }

    /**
     * @param ServerInterface $server
     * @return SocketInterface
     */
    public function bind(ServerInterface $server)
    {
        \uv_tcp_bind6($server->getResource(), $this->socket);

        return $this;
    }
}
