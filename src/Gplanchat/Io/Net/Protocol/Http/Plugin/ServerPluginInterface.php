<?php

namespace Gplanchat\Io\Net\Protocol\Http\Plugin;

use Gplanchat\PluginManager\PluginInterface;
use Gplanchat\Io\Net\Protocol\Http\Server;

interface ServerPluginInterface
    extends PluginInterface
{
    /**
     * @param Server $server
     * @return ServerPluginInterface
     */
    public function setServer(Server $server);

    /**
     * @return Server
     */
    public function getServer();
}
