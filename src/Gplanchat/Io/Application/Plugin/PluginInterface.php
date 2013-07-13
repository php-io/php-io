<?php

namespace Gplanchat\Io\Application\Plugin;

use Gplanchat\Io\Application\Application;
use Gplanchat\PluginManager\PluginInterface as BasePluginInterface;
use Gplanchat\Io\Net\Protocol\Http\Server;

interface PluginInterface
    extends BasePluginInterface
{
    /**
     * @param Application $application
     * @return $this
     */
    public function setApplication(Application $application);

    /**
     * @return Application
     */
    public function getApplication();
}
