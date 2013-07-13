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
class Server
    implements Tcp\ServerDecoratorInterface, ServiceManagerAwareInterface, PluginAwareInterface
{
    use Tcp\ServerDecoratorTrait;
    use ServiceManagerAwareTrait;
    use PluginAwareTrait;

    private $protocolUpgrader = null;

    public function __construct(ServiceManagerInterface $serviceManager, Tcp\ServerInterface $server)
    {
        $this->setDecoratedServer($server);
        $this->setServiceManager($serviceManager);
    }

    public function listen($timeout, callable $callback)
    {
        /** @var ServerConnectionHandler $connectionHandler */
        $connectionHandler = $this->getServiceManager()->get('ServerConnectionHandler', [$this->getServiceManager(), $callback]);

        return $this->getDecoratedServer()->listen($timeout, $connectionHandler);
    }

    /**
     * @param SocketInterface $socket
     * @return Tcp\ServerInterface
     */
    public function registerSocket(SocketInterface $socket)
    {
        $this->getDecoratedServer()->registerSocket($socket);

        return $this;
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->getDecoratedServer()->getResource();
    }

    /**
     * @param LoopInterface $loop
     * @return Tcp\ServerInterface
     */
    public function setLoop(LoopInterface $loop)
    {
        $this->getDecoratedServer()->setLoop($loop);

        return $this;
    }

    /**
     * @return LoopInterface
     */
    public function getLoop()
    {
        return $this->getDecoratedServer()->getLoop();
    }

    /**
     * @param ProtocolUpgraderInterface $protocolUpgrader
     * @return $this
     */
    public function setProtocolUpgrader(ProtocolUpgraderInterface $protocolUpgrader)
    {
        $this->protocolUpgrader = $protocolUpgrader;

        return $this;
    }

    /**
     * @return ProtocolUpgraderInterface
     */
    public function getProtocolUpgrader()
    {
        if ($this->protocolUpgrader === null) {
            $this->getServiceManager()->getDefaultProtocolUpgrader($this->getServiceManager());
        }

        return $this->protocolUpgrader;
    }
}
