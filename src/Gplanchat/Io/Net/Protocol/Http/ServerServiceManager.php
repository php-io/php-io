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

use Gplanchat\Io\Net\Tcp\ClientInterface;
use Gplanchat\Io\Net\Tcp\ServerInterface;
use Gplanchat\ServiceManager\ServiceManager;
use Gplanchat\ServiceManager\Configurator;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Class ServerServiceManager
 * @package Gplanchat\Io\Net\Protocol\Http
 * @method \Gplanchat\Io\Net\Protocol\Http\Server getHttpServer(\Gplanchat\ServiceManager\ServiceManagerInterface $serviceManager, \Gplanchat\Io\Net\Tcp\ServerInterface $server)
 * @method \Gplanchat\Io\Net\Protocol\Http\Client getHttpClient(\Gplanchat\ServiceManager\ServiceManagerInterface $serviceManager, \Gplanchat\Io\Net\Tcp\ClientInterface $client, callable $callback = null)
 * @method DefaultRequestHandler getRequestHandler(\Gplanchat\ServiceManager\ServiceManagerInterface $serviceManager)
 * @method \Gplanchat\Io\Net\Protocol\Http\Server getHttpServerBuilder(\Gplanchat\ServiceManager\ServiceManagerInterface $serviceManager, \Gplanchat\Io\Net\SocketInterface $socket)
 * @method \Gplanchat\Io\Net\Protocol\Http\ProtocolUpgraderInterface getDefaultProtocolUpgrader(\Gplanchat\ServiceManager\ServiceManagerInterface $serverServiceManager, array $config = null, \Gplanchat\ServiceManager\Configurator $configurator = null)
 */
class ServerServiceManager
    extends ServiceManager
{
    /**
     * @param array $config
     * @param Configurator $configurator
     * @param LoggerInterface $logger
     */
    public function __construct(array $config = null, Configurator $configurator = null, LoggerInterface $logger = null)
    {
        if ($config === null) {
            $config = [
                'invokables' => [
                    'HttpServer'        => __NAMESPACE__ . '\\Server',
                    'HttpClient'        => __NAMESPACE__ . '\\Client',
                    'RequestHandler'    => __NAMESPACE__ . '\\DefaultRequestHandler',
                ],
                'singletons' => [
                    'ServerConnectionHandler' => __NAMESPACE__ . '\\ServerConnectionHandler',
                    'DefaultProtocolUpgrader' => 'ProtocolUpgrader'
                    ],
                'aliases' => [],
                'factories' => [
                    'Request'          => new RequestFactory(),
                    'Response'         => new ResponseFactory(),
                    'ProtocolUpgrader' => new ProtocolUpgraderFactory()
                    ]
                ];
        }

        if ($configurator === null) {
            $configurator = new Configurator();
        }

        $configurator($this, $config);

        if (!$this->has('Logger')) {
            if ($logger === null) {
                $logger = new NullLogger();
            }

            $this->registerSingleton('Logger', $logger);
        }
    }
}
