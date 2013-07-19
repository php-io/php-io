<?php

namespace Gplanchat\Io\Net\Protocol\Http\Plugin;

use Gplanchat\Io\Net\Protocol\Http\Server as HttpServer;

trait ServerPluginTrait
{
    private $server = null;

    /**
     * @param HttpServer $server
     * @return ServerPluginInterface
     */
    public function setServer(HttpServer $server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * @return HttpServer
     */
    public function getServer()
    {
        return $this->server;
    }
}
