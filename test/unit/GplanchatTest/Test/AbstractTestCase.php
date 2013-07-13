<?php

namespace GplanchatTest\Test;

use Gplanchat\Io\Loop\LoopInterface;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use PHPUnit_Framework_TestCase;

abstract class AbstractTestCase
    extends PHPUnit_Framework_TestCase
{
    /**
     * @var LoopInterface
     */
    private $loop = null;

    /**
     * @var ServiceManagerInterface
     */
    private $serviceManager = null;

    public function __construct($name = NULL, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->setUpLoop();
    }

    abstract public function setUpLoop();

    /**
     * @param LoopInterface $loop
     * @return $this
     */
    public function setLoop(LoopInterface $loop)
    {
        $this->loop = $loop;

        return $this;
    }

    /**
     * @return LoopInterface
     */
    public function getLoop()
    {
        return $this->loop;
    }

    /**
     * @param ServiceManagerInterface $serviceManager
     * @return $this
     */
    public function setServiceManager(ServiceManagerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;

        return $this;
    }

    /**
     * @return ServiceManagerInterface
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }
}
