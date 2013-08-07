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
namespace Gplanchat\Io\Adapter\Libuv\Net\Udp;

use Gplanchat\Io\Loop\LoopAwareTrait;
use Gplanchat\Io\Adapter\Libuv\Loop\LoopInterface as LibuvLoopInterface;
use Gplanchat\Io\Net\Udp\SocketInterface;
use Gplanchat\Io\Net\Udp\ServerInterface;
use Gplanchat\EventManager\Event;
use Gplanchat\Io\Adapter\Libuv\EventManager\EventEmitterTrait;
use Gplanchat\PluginManager\PluginManagerInterface;
use Gplanchat\PluginManager\PluginManagerTrait;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;

/**
 * UDP server class.
 *
 * @package    Gplanchat\Io
 * @subpackage Libuv
 * @category   Net\Udp
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

    private $connection = null;
    protected $registeredListener = true;

    public function __construct(ServiceManagerInterface $serviceManager, LibuvLoopInterface $loop, SocketInterface $socket = null)
    {
        $this->setLoop($loop);
        $this->connection = \uv_tcp_init($this->loop->getResource());

        if ($socket !== null) {
            $this->registerSocket($socket);
        }

        $this->setServiceManager($serviceManager);
    }

    public function __destruct()
    {
        $this->stop();
    }

    public function registerSocket(SocketInterface $socket)
    {
        $socket->bind($this);

        return $this;
    }

    /**
     * @param callable $callback
     * @return ServerInterface
     */
    public function recv(callable $callback)
    {
        $this->on(['data'], $callback);

        if ($this->registeredListener !== true) {
            $server = $this;

            \uv_udp_recv_start($this->getResource(), function($stream, $nread, $buffer) use($server) {
                $server->emit(new Event('data'), [$server]);
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
            \uv_udp_recv_stop($this->getResource());
            $this->registeredListener = false;
        }

        return $this;
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->connection;
    }
}
