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

use Gplanchat\Io\Net\Protocol\Http;
use Gplanchat\Io\Net\Tcp\ClientInterface;
use Gplanchat\Io\Net\Tcp\ServerInterface;
use Gplanchat\Io\Net\Tcp\SocketInterface;
use Gplanchat\ServiceManager\AbstractServiceManager;
use Gplanchat\ServiceManager\Configurator;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Psr\Log\NullLogger;

/**
 * Class ServerServiceManager
 * @package Gplanchat\Io\Net\Protocol\Http
 * @method Http\Server getHttpServer(ServiceManagerInterface $serviceManager, ServerInterface $server)
 * @method Client getHttpClient(ServiceManagerInterface $serviceManager, ClientInterface $client, callable $callback = null)
 * @method DefaultRequestHandler getRequestHandler(ServiceManagerInterface $serviceManager)
 * @method Http\Server getHttpServerBuilder(ServiceManagerInterface $serviceManager, SocketInterface $socket)
 * @method ProtocolUpgraderInterface getDefaultProtocolUpgrader(ServiceManagerInterface $serverServiceManager, array $config = null, Configurator $configurator = null)
 */
class ServerServiceManager
    extends AbstractServiceManager
{
    /**
     * @var array
     */
    protected $invokables = [
        'HttpServer'     => Server::class,
        'HttpClient'     => Client::class,
        'RequestHandler' => DefaultRequestHandler::class,
        'RequestParser'  => RequestParser::class,
    ];

    /**
     * @var array
     */
    protected $singletons = [
        'ServerConnectionHandler' => ServerConnectionHandler::class,
        'StandardRequestFactory'  => RequestFactory\Standard::class,
        'StandardResponseFactory' => ResponseFactory\Standard::class,
        'ProtocolUpgraderFactory' => ProtocolUpgraderFactory::class,
        'DefaultProtocolUpgrader' => 'ProtocolUpgrader'
    ];

    /**
     * @var array
     */
    protected $factories = [
        'Logger' => NullLogger::class,

        'Request'          => 'StandardRequestFactory',
        'Response'         => 'StandardResponseFactory',
        'ProtocolUpgrader' => 'ProtocolUpgraderFactory'
    ];
}
