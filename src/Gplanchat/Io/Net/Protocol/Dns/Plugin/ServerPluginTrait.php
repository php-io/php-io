<?php

namespace Gplanchat\Io\Net\Protocol\Http\Plugin;

use Gplanchat\Io\Net\Protocol\Http\Server;
use Gplanchat\PluginManager\PluginAwareInterface;

trait ServerPluginTrait
{
    private $server = null;

    /**
     * @param Server $server
     * @return ServerPluginInterface
     */
    public function setServer(Server $server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * @return Server
     */
    public function getServer()
    {
        return $this->server;
    }
}
