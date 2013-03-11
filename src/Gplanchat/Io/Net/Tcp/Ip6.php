<?php

namespace Gplanchat\Io\Net\Tcp;

use Gplanchat\Io\Net\AbstractIp4;
use Gplanchat\Io\Net\SocketInterface;
use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;

class Ip6
    extends AbstractIp6
{
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
