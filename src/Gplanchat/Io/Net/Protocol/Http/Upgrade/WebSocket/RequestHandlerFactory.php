<?php

namespace Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket;

use Gplanchat\EventManager\EventEmitterTrait;
use Gplanchat\Io\Net\Protocol\Http\Exception;
use Gplanchat\Log\LoggerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;

class RequestHandlerFactory
    implements ServiceManagerAwareInterface
{
    use ServiceManagerAwareTrait;

    /**
     * @var callable
     */
    private $callback = null;

    public function __construct(ServiceManagerInterface $serviceManager, callable $callback = null)
    {
        $this->setServiceManager($serviceManager);
        $this->setCallback($callback);
    }

    public function __invoke(ServiceManagerInterface $serviceManager, array $moreParams = [])
    {
        $requestHandler = $this->getServiceManager()->get('RequestHandler', [$this->getServiceManager()]);

        if (($callback = $this->getCallback()) !== null) {
            $requestHandler->on(['data'], $this->getCallback());
        }

        return $requestHandler;
    }

    /**
     * @param callable $callback
     * @return RequestHandlerFactory
     */
    public function setCallback(callable $callback)
    {
        $this->callback = $callback;

        return $this;
    }

    /**
     * @return callable
     */
    public function getCallback()
    {
        return $this->callback;
    }

}
