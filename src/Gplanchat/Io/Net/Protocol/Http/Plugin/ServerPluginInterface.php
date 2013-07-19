<?php

namespace Gplanchat\Io\Net\Protocol\Http\Plugin;

use Gplanchat\PluginManager\PluginInterface;
use Gplanchat\Io\Net\Protocol\Http\Server as HttpServer;

interface ServerPluginInterface
    extends PluginInterface
{
    /**
     * @param HttpServer $server
     * @return ServerPluginInterface
     */
    public function setServer(HttpServer $server);

    /**
     * @return HttpServer
     */
    public function getServer();
}
