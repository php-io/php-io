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

use Gplanchat\Io\Loop\LoopInterface;
use Gplanchat\Io\Net\Tcp\SocketInterface;
use Gplanchat\Io\Net\Tcp;
use Gplanchat\PluginManager\PluginAwareInterface;
use Gplanchat\PluginManager\PluginAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;

/**
 * Class Server
 * @package Gplanchat\Io\Net\Protocol\Http
 *
 * @method \Gplanchat\Io\Net\Protocol\Http\ServerServiceManager getServiceManager()
 */
class Client
    implements Tcp\ClientDecoratorInterface, ServiceManagerAwareInterface, PluginAwareInterface
{
    use Tcp\ClientDecoratorTrait;
    use ServiceManagerAwareTrait;
    use PluginAwareTrait;

    public function __construct(ServiceManagerInterface $serviceManager, Tcp\ClientInterface $client)
    {
        $this->setDecoratedClient($client);
        $this->setServiceManager($serviceManager);
    }

    /**
     * @param Tcp\ServerInterface $server
     * @return Tcp\ClientInterface
     */
    public function accept(Tcp\ServerInterface $server)
    {
        $this->getDecoratedClient()->accept($server);

        return $this;
    }

    /**
     * @param SocketInterface $socket
     * @param callable $callback
     * @return Tcp\ClientInterface
     */
    public function connect(SocketInterface $socket, callable $callback)
    {
        $this->getDecoratedClient()->connect($socket, $callback);

        return $this;
    }

    /**
     * @param $buffer
     * @param callable|null $callback
     * @return Tcp\ClientInterface
     */
    public function write($buffer, callable $callback = null)
    {
        $this->getDecoratedClient()->write($buffer, $callback);

        return $this;
    }

    /**
     * @param callable|null $callback
     * @return Tcp\ClientInterface
     */
    public function close(callable $callback = null)
    {
        $this->getDecoratedClient()->close($callback);

        return $this;
    }

    /**
     * @return Tcp\ClientInterface
     */
    public function poll()
    {
        $this->getDecoratedClient()->poll();

        return $this;
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->getDecoratedClient()->getResource();
    }

    /**
     * @param LoopInterface $loop
     * @return Tcp\ServerInterface
     */
    public function setLoop(LoopInterface $loop)
    {
        $this->getDecoratedClient()->setLoop($loop);

        return $this;
    }

    /**
     * @return LoopInterface
     */
    public function getLoop()
    {
        return $this->getDecoratedClient()->getLoop();
    }

    /**
     * @return Tcp\ServerInterface|null
     */
    public function getServer()
    {
        return $this->getDecoratedClient()->getServer();
    }

    /**
     * @param Request $request
     * @param callable $callback
     * @return Client
     */
    public function sendRequest(Request $request, callable $callback)
    {
        $this->write($request->toString(), $callback);

        return $this;
    }

    /**
     * @param $uri
     * @param array $params
     * @param callable $callback
     * @return Client
     */
    public function get($uri, array $params, callable $callback)
    {
        $request = new Request('GET', $uri);
        $request->setQueryParams(new \ArrayObject($params));

        return $this->sendRequest($request, $callback);
    }

    /**
     * @param $uri
     * @param array $queryParams
     * @param array $postParams
     * @param callable $callback
     * @return Client
     */
    public function post($uri, array $queryParams, array $postParams, callable $callback)
    {
        $request = new Request('GET', $uri);
        $request->setQueryParams(new \ArrayObject($queryParams));
        $request->setPostParams(new \ArrayObject($postParams));

        return $this->sendRequest($request, $callback);
    }
}
