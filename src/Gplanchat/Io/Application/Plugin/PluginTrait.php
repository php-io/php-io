<?php

namespace Gplanchat\Io\Application\Plugin;

use Gplanchat\Io\Application\Application;

trait PluginTrait
{
    /**
     * @var Application
     */
    private $application = null;

    /**
     * @param Application $application
     * @return $this
     */
    public function setApplication(Application $application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * @return Application
     */
    public function getApplication()
    {
        return $this->application;
    }
}
