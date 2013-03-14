<?php
/**
 * This file is part of php-io.
 *
 * php-io is free software: you can redistribute it and/or modify it under the
 * terms of the GNU LEsser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * php-io is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with php-io.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Grégory PLANCHAT <g.planchat@gmail.com>
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @copyright Copyright (c) 2013 Grégory PLANCHAT (http://planchat.fr/)
 */

namespace Gplanchat\Io\Net\Tcp;

use Gplanchat\Io\Loop\LoopInterface;
use Gplanchat\Io\Net\SocketInterface;
use Gplanchat\Io\Net\ServerInterface;
use Gplanchat\EventManager\Event;
use Gplanchat\EventManager\EventEmitterTrait;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use RuntimeException;

class Server
    implements ServerInterface, ServiceManagerAwareInterface
{
    use EventEmitterTrait;
    use ServiceManagerAwareTrait;

    private $loop = null;
    private $connection = null;

    public function __construct(ServiceManagerInterface $serviceManager, LoopInterface $loop, SocketInterface $socket = null)
    {
        $this->loop = $loop;
        $this->connection = \uv_tcp_init($this->loop->getResource());

        if ($socket !== null) {
            $this->registerSocket($socket);
        }

        $this->setServiceManager($serviceManager);
    }

    public function registerSocket(SocketInterface $socket)
    {
        $socket->bind($this);

        return $this;
    }

    public function listen($timeout, callable $callback)
    {
        $this->on(['connection'], $callback);

        $server = $this;

        \uv_listen($this->connection, $timeout, function() use($server) {
            $client = new Client($this->loop);
            $client->accept($server);

            $server->emit(new Event('connection'), [$client, $server]);

            \uv_read_start($client->getResource(), function($resource, $length, $buffer) use($client, $server) {
                $client->emit(new Event('data'), [$client, $buffer, $length, false]);
            });
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
     * @param LoopInterface $loop
     * @return ServerInterface|Server
     */
    public function setLoop(LoopInterface $loop)
    {
        $this->loop = $loop;

        return $this;
    }

    /**
     * @return LoopInterface
     */
    public function getLoop()
    {
        return $this->loop;
    }
}
