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
use Gplanchat\Io\Adapter\Libuv\Loop\LoopInterface;
use Gplanchat\Io\Exception\InvalidDependecyException;
use Gplanchat\Io\Loop\LoopAwareInterface;
use Gplanchat\Io\Net\Udp\SocketInterface;
use Gplanchat\Io\Net\Udp\ClientInterface;
use Gplanchat\Io\Net\Udp\ServerInterface;
use Gplanchat\Io\Adapter\Libuv\EventManager\EventEmitterTrait;
use Gplanchat\PluginManager\PluginManagerInterface;
use Gplanchat\PluginManager\PluginManagerTrait;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;

/**
 * UDP client class.
 *
 * @package    Gplanchat\Io
 * @subpackage Libuv
 * @category   Net\Udp
 * @author     Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence    GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */
class Client
    implements ClientInterface, PluginManagerInterface
{
    use ServiceManagerAwareTrait;
    use EventEmitterTrait;
    use PluginManagerTrait;
    use LoopAwareTrait;

    /**
     * @var SocketInterface
     */
    private $socket = null;

    /**
     * @var resource
     */
    private $connection = null;

    /**
     * Class constructor.
     *
     * @param ServiceManagerInterface $serviceManager
     * @param LoopInterface $loop
     * @param SocketInterface $socket
     * @throws InvalidDependecyException
     */
    public function __construct(ServiceManagerInterface $serviceManager, LoopInterface $loop, SocketInterface $socket = null)
    {
        $this->setLoop($loop);
        $this->connection = \uv_udp_init($this->loop->getBackend());

        if ($socket !== null) {
            $this->setSocket($socket);
        }
    }

    /**
     * Sends data to the socket.
     *
     * @param $buffer
     * @param callable|null $callback
     * @param SocketInterface|null $socket
     * @return $this
     */
    public function send($buffer, callable $callback = null, SocketInterface $socket = null)
    {
        if ($socket === null) {
            $socket = $this->getSocket();
        }

        $socket->send($this, $callback);

        return $this;
    }

    /**
     * Returns the internal libuv resource
     *
     * @return resource
     */
    public function getBackend()
    {
        return $this->connection;
    }

    /**
     * @param SocketInterface $socket
     * @return $this
     */
    public function setSocket(SocketInterface $socket)
    {
        $this->socket = $socket;

        return $this;
    }

    /**
     * @return ServerInterface|null
     */
    public function getSocket()
    {
        return $this->socket;
    }
}
