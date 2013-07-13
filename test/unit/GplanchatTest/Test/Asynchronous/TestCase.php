<?php

namespace GplanchatTest\Test\Asynchronous;

use Gplanchat\Io\Adapter\Libuv\DefaultServiceManager;
use Gplanchat\Io\Loop\LoopAwareInterface;
use Gplanchat\Io\Loop\LoopAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use GplanchatTest\Test\AbstractTestCase;

abstract class TestCase
    extends AbstractTestCase
    implements ServiceManagerAwareInterface, LoopAwareInterface
{
    use ServiceManagerAwareTrait;
    use LoopAwareTrait;

    public function runTest()
    {
        $this->initServiceManager();
        $this->initLoop();

        $this->getLoop()->init();

        parent::runTest();

        $this->getLoop()->runOnce();
    }

    /**
     * @param string $serviceName
     * @return $this
     */
    public function initLoop($serviceName = 'Loop')
    {
        if ($this->getLoop() === null) {
            $this->setLoop($this->getServiceManager()->get($serviceName));
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function initServiceManager()
    {
        if ($this->getServiceManager() === null) {
            $this->setServiceManager(new DefaultServiceManager());
        }

        return $this;
    }
}
