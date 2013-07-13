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

use Gplanchat\EventManager\CallbackHandlerInterface;
use Gplanchat\Io\Net\Tcp\ClientInterface;
use Gplanchat\Io\Net\Protocol\Http\Upgrade\ProtocolUpgradeAwareInterface;
use Gplanchat\Io\Net\Protocol\RequestHandlerInterface;
use Gplanchat\ServiceManager\Configurator;
use Gplanchat\ServiceManager\Exception as ServiceManagerException;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\ServiceManager\ServiceManagerTrait;

interface ProtocolUpgraderInterface
    extends ServiceManagerInterface, ServiceManagerAwareInterface
{
    /**
     * @param ServiceManagerInterface $serverServiceManager
     * @param array $config
     * @param Configurator $configurator
     * @throws ServiceManagerException
     */
    public function __construct(ServiceManagerInterface $serverServiceManager, array $config = null, Configurator $configurator = null);

    /**
     * @param string $name
     * @param CallbackHandlerInterface $callbackHanlder
     * @param ClientInterface $client
     * @param Request $request
     * @param Response $response
     * @return RequestHandlerInterface
     */
    public function upgrade($name, CallbackHandlerInterface $callbackHanlder, ClientInterface $client, Request $request, Response $response);
}
