<?php

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\ServiceManager\ServiceManagerInterface;

class ResponseFactory
{
    public function __invoke(ServiceManagerInterface $serviceManager, array $moreParams = [])
    {
        return (new Response())
            ->setHeader('Connection', 'close')
        ;
    }
}
