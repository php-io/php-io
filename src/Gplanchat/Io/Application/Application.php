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

namespace Gplanchat\Io\Application;

use Gplanchat\EventManager\Event;
use Gplanchat\EventManager\EventEmitterInterface;
use Gplanchat\EventManager\EventEmitterTrait;
use Gplanchat\Io\Adapter\Libuv\DefaultServiceManager as LibuvServiceManager;
use Gplanchat\Io\Exception\InvalidDependencyException;
use Gplanchat\Io\Exception\MissingDependecyException;
use Gplanchat\Io\Exception\MissingExtensionException;
use Gplanchat\Io\Loop\IdleInterface;
use Gplanchat\Io\Loop\LoopInterface;
use Gplanchat\Io\Loop\TimerInterface;
use Gplanchat\Io\Net\Tcp\ClientInterface;
use Gplanchat\Io\Net\Tcp\ServerInterface;
use Gplanchat\Io\Net\SocketInterface;
use Gplanchat\PluginManager\PluginManagerInterface;
use Gplanchat\PluginManager\PluginManagerTrait;
use Gplanchat\ServiceManager\BadMethodCallException;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

/**
 * Class ApplicationLoop
 * @package Gplanchat\Io\Loop
 * @method \Gplanchat\Io\Loop\LoopInterface getLoop()
 * @method \Gplanchat\Io\Loop\TimerInterface getTimer(\Gplanchat\Io\Loop\LoopInterface $loop)
 * @method IdleInterface getIdle(\Gplanchat\Io\Loop\LoopInterface $loop)
 * @method \Gplanchat\Io\Net\Tcp\ClientInterface getTcpClient(\Gplanchat\ServiceManager\ServiceManagerInterface $serviceManager, \Gplanchat\Io\Loop\LoopInterface $loop, \Gplanchat\Io\Net\SocketInterface $socket = null, callable $callback = null)
 * @method \Gplanchat\Io\Net\Tcp\ServerInterface getTcpServer(\Gplanchat\ServiceManager\ServiceManagerInterface $serviceManager, \Gplanchat\Io\Loop\LoopInterface $loop, \Gplanchat\Io\Net\SocketInterface $socket = null)
 * @method \Gplanchat\Io\Net\SocketInterface getTcpIp4($address, $port)
 * @method \Gplanchat\Io\Net\SocketInterface getTcpIp6($address, $port)
 */
class Application
    implements ServiceManagerAwareInterface, LoggerAwareInterface, EventEmitterInterface, PluginManagerInterface
{
    use ServiceManagerAwareTrait;
    use LoggerAwareTrait;
    use EventEmitterTrait;
    use PluginManagerTrait;

    /**
     * @var LoopInterface
     */
    private $loop = null;

    /**
     * @var array
     */
    private $storage = [];

    /**
     * @param ServiceManagerInterface $serviceManager
     * @param LoggerInterface $logger
     * @throws MissingExtensionException
     */
    public function __construct(ServiceManagerInterface $serviceManager = null, LoggerInterface $logger = null)
    {
        if ($logger !== null) {
            $this->setLogger($logger);
        } else {
            $this->setLogger(new NullLogger());
        }

        $this->setServiceManager($serviceManager);
    }

    /**
     * @param callable $callback
     * @return Application
     */
    public function init(callable $callback)
    {
        $this->on('bootstrap', $callback);

        return $this;
    }

    /**
     * @return Application
     */
    public function bootstrap()
    {
        $this->emit(new Event('bootstrap'), [$this]);

//        foreach ($this->getPlugins('bootstrap') as $plugin) {
//            /** @var PluginInterface $plugin */
//            $plugin($this);
//        }

        return $this;
    }

    /**
     * @return Application
     */
    public function run()
    {
        $this->emit(new Event('run'), [$this]);

        $this->getCurrentLoop()->run();

        return $this;
    }

    /**
     * @param LoopInterface $loop
     * @return Application
     */
    public function setCurrentLoop(LoopInterface $loop)
    {
        $this->loop = $loop;

        return $this;
    }

    /**
     * @return LoopInterface
     * @throws MissingDependecyException
     */
    public function getCurrentLoop()
    {
        if ($this->loop === null) {
            /** @var LoopInterface $loop */
            $loop = $this->getServiceManager()->get('Loop');
            $this->setCurrentLoop($loop);

            $loop->init();
        }

        return $this->loop;
    }

    /**
     * @param $method
     * @param array $arguments
     * @return mixed
     * @throws BadMethodCallException
     */
    public function __call($method, array $arguments)
    {
        $prefix = substr($method, 0, 3);
        if ($prefix === 'get') {
            return $this->getServiceManager()->get(substr($method, 3), $arguments);
        }

        throw new BadMethodCallException(sprintf('Method "%s" does not exist.', $method));
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getStorage($key)
    {
        if (isset($this->storage[$key])) {
            return $this->storage[$key];
        }

        return null;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return Application
     */
    public function setStorage($key, $value)
    {
        $this->storage[$key] = $value;

        return $this;
    }
}
