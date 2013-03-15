<?php
/**
 * This file is part of Gplanchat\Io.
 *
 * Gplanchat\Io is free software: you can redistribute it and/or modify it under the
 * terms of the GNU LEsser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Gplanchat\Io is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Gplanchat\Io.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Grégory PLANCHAT <g.planchat@gmail.com>
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @copyright Copyright (c) 2013 Grégory PLANCHAT (http://planchat.fr/)
 */

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\Io\Net\Protocol\ConnectionHandlerInterface;
use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\ServerInterface;
use Gplanchat\Io\Net\Protocol\RequestHandlerInterface;
use Gplanchat\EventManager\Event;
use Psr\Log\LoggerInterface;
use Gplanchat\Log\LoggerAwareInterface;
use Gplanchat\Log\LoggerAwareTrait;
use Gplanchat\Log\Writer\Stream;

class ServerConnectionHandler
    implements ServiceManagerAwareInterface, ConnectionHandlerInterface, LoggerAwareInterface
{
    use ServiceManagerAwareTrait;
    use LoggerAwareTrait;

    private $callback = null;

    /**
     * @param callable $callback
     * @param ServiceManagerInterface $serviceManager
     * @throws Exception\RuntimeException
     */
    public function __construct(ServiceManagerInterface $serviceManager, callable $callback)
    {
        $this->setServiceManager($serviceManager);
        $this->setLogger($this->getServiceManager()->get('Logger'));

        $this->callback = $callback;
    }

    /**
     * @param Event $event
     * @param ClientInterface $client
     * @param ServerInterface $server
     * @return callable
     */
    public function __invoke(Event $event, ClientInterface $client, ServerInterface $server)
    {
        /** @var RequestHandlerInterface $requestHandler */
        $requestHandler = $this->getServiceManager()
            ->get('RequestHandler', [$this->getServiceManager()])
        ;
        $callbackHandler = $client->on(['data'], $requestHandler);

        $requestHandler->setCallbackHandler($callbackHandler);
        $requestHandler->on(['request'], $this->callback);

        return $requestHandler;
    }
}
