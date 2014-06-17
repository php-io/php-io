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

/**
 * @namespace
 */
namespace Gplanchat\Io\Adapter\Libuv\Net\Tcp;

use Gplanchat\Io\Loop\LoopAwareTrait;
use Gplanchat\Io\Adapter\Libuv\Loop\LoopInterface as LibuvLoopInterface;
use Gplanchat\Io\Net\Tcp\SocketInterface;
use Gplanchat\Io\Net\Tcp\ServerInterface;
use Gplanchat\EventManager\Event;
use Gplanchat\Io\Adapter\Libuv\EventManager\EventEmitterTrait;
use Gplanchat\PluginManager\PluginInterface;
use Gplanchat\PluginManager\PluginManagerInterface;
use Gplanchat\PluginManager\PluginManagerTrait;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;

/**
 * TCP server class.
 *
 * @package    Gplanchat\Io
 * @subpackage Libuv
 * @category   Net\Tcp
 * @author     Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence    GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */
class Server
    implements ServerInterface, ServiceManagerAwareInterface, PluginManagerInterface
{
    use EventEmitterTrait;
    use ServiceManagerAwareTrait;
    use PluginManagerTrait;
    use LoopAwareTrait;

    /**
     * @var null|resource
     */
    private $connection = null;

    /**
     * @var bool
     */
    protected $registeredListener = false;

    /**
     * @param ServiceManagerInterface $serviceManager
     * @param LibuvLoopInterface $loop
     * @param SocketInterface $socket
     */
    public function __construct(ServiceManagerInterface $serviceManager, LibuvLoopInterface $loop, SocketInterface $socket = null)
    {
        $this->setLoop($loop);
        $this->connection = \uv_tcp_init($this->getLoop()->getBackend());

        if ($socket !== null) {
            $this->registerSocket($socket);
        }

        $this->setServiceManager($serviceManager);
    }

    /**
     * @param SocketInterface $socket
     * @return $this|ServerInterface
     */
    public function registerSocket(SocketInterface $socket)
    {
        $socket->bind($this);

        return $this;
    }

    /**
     * @param int $timeout
     * @param callable $callback
     * @return $this|ServerInterface
     */
    public function listen($timeout, callable $callback)
    {
        $this->on(['connection'], $callback);

        if ($this->registeredListener !== true) {
            $server = $this;

            \uv_listen($this->connection, $timeout, function() use($server) {
                $client = new Client($this->getServiceManager(), $this->getLoop());
                $client->accept($server);

                $server->emit(new Event('connection'), [$client, $server]);

                $client->poll();
            });
        }

        return $this;
    }

    /**
     * @return ServerInterface
     */
    public function stop()
    {
        if ($this->registeredListener === true) {
            $server = $this;
            \uv_close($this->getBackend(), function() use($server){
                $server->registeredListener = false;
            });
        }

        return $this;
    }

    /**
     * @return resource
     */
    public function getBackend()
    {
        return $this->connection;
    }
    /**
     * @param PluginInterface $plugin
     * @param string $namespace
     * @param int|null $priority
     * @return PluginManagerInterface
     */
    public function registerPlugin(PluginInterface $plugin, $namespace, $priority = null)
    {

    }
}
