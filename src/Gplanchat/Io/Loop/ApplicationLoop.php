<?php

namespace Gplanchat\Io\Loop;

use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;

class ApplicationLoop
    extends Loop
    implements ServiceManagerAwareInterface
{
    use ServiceManagerAwareTrait;

    public function __construct(ServiceManagerInterface $serviceManager = null)
    {
        if ($serviceManager !== null) {
            $this->setServiceManager($serviceManager);
        }
    }
}
