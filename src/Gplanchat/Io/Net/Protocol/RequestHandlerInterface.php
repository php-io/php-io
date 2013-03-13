<?php

namespace Gplanchat\Io\Net\Protocol;

use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\EventManager\Event;

interface RequestHandlerInterface
{
    /**
     * @param ClientInterface $client
     * @param string $buffer
     * @param int $length
     * @param bool $isError
     * @throws \Exception
     * @return RequestHandlerInterface
     */
    public function __invoke(Event $event, ClientInterface $client, $buffer, $length, $isError);
}
