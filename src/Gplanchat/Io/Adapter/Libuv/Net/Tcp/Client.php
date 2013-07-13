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

namespace Gplanchat\Io\Adapter\Libuv\Net\Tcp;

use Gplanchat\Io\Loop\LoopAwareTrait;
use Gplanchat\Io\Adapter\Libuv\Loop\LoopInterface;
use Gplanchat\Io\Net\Tcp\SocketInterface;
use Gplanchat\Io\Net\Tcp\ClientInterface;
use Gplanchat\Io\Net\Tcp\ServerInterface;
use Gplanchat\EventManager\Event;
use Gplanchat\Io\Adapter\Libuv\EventManager\EventEmitterTrait;
use Gplanchat\PluginManager\PluginManagerInterface;
use Gplanchat\PluginManager\PluginManagerTrait;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;

class Client
    implements ClientInterface, PluginManagerInterface
{
    use ServiceManagerAwareTrait;
    use EventEmitterTrait;
    use PluginManagerTrait;
    use LoopAwareTrait;

    private $server = null;
    private $connection = null;

    /**
     * @param ServiceManagerInterface $serviceManager
     * @param LoopInterface $loop
     * @param SocketInterface $socket
     * @param callable $callback
     */
    public function __construct(ServiceManagerInterface $serviceManager, LoopInterface $loop, SocketInterface $socket = null, callable $callback = null)
    {
        $this->setLoop($loop);
        $this->connection = \uv_tcp_init($this->loop->getResource());

        if ($socket !== null) {
            $this->connect($socket, $callback);
        }
    }

    /**
     * @param ServerInterface $server
     * @return ClientInterface
     */
    public function accept(ServerInterface $server)
    {
        $this->server = $server;
        \uv_accept($server->getResource(), $this->connection);

        return $this;
    }

    /**
     * @param SocketInterface $socket
     * @param callable $callback
     * @return ClientInterface
     */
    public function connect(SocketInterface $socket, callable $callback)
    {
        $socket->connect($this, $callback);

        return $this;
    }

    /**
     * @return ClientInterface
     */
    public function poll()
    {
        $client = $this;

        \uv_read_start($this->getResource(), function($resource, $length, $buffer) use($client) {
            $client->emit(new Event('data'), [$client, $buffer, $length, false]);
        });

        return $this;
    }

    /**
     * @param $buffer
     * @param callable $callback
     * @return ClientInterface
     */
    public function write($buffer, callable $callback = null)
    {
        $client = $this;

        \uv_write($this->connection, $buffer, function($resource, $error) use($client, $buffer, $callback){
            if ($error) {
                $client->emit(new Event('error', ['data' => $buffer]));
                return;
            }

            if ($callback !== null) {
                call_user_func_array($callback, [$client]);
            }
        });

        return $this;
    }

    /**
     * @param callable $callback
     * @return ClientInterface
     */
    public function close(callable $callback = null)
    {
        $client = $this;

        \uv_close($this->connection, function($resource) use($client, $callback){
            $client->emit(new Event('close'));

            if ($callback !== null) {
                call_user_func_array($callback, [$client]);
            }
        });

        return $this;
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->connection;
    }

    /**
     * @return ServerInterface|null
     */
    public function getServer()
    {
        return $this->server;
    }
}
