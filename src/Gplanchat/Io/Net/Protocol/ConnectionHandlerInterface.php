<?php

namespace Gplanchat\Io\Net\Protocol;

use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;
use Gplanchat\EventManager\Event;

interface ConnectionHandlerInterface
{
    /**
     * @param ClientInterface $client
     * @param ServerInterface $server
     * @return callable
     */
    public function __invoke(Event $event, ClientInterface $client, ServerInterface $server);
}
