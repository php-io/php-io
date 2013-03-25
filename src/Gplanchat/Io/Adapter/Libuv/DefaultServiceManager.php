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
namespace Gplanchat\Io\Adapter\Libuv;

use Gplanchat\ServiceManager\Configurator;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\ServiceManager\ServiceManagerTrait;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Basic loop class. A loop is designed to run event-driven code, the loop runs
 * until there are registered I/O loops.
 *
 * @package    Gplanchat\Io
 * @subpackage Gplanchat\Io\Loop
 */
class DefaultServiceManager
    implements ServiceManagerInterface
{
    use ServiceManagerTrait;

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
                    'Loop\\Idle'       => __NAMESPACE__ . '\\Loop\\Idle',
                    'Loop\\Loop'       => __NAMESPACE__ . '\\Loop\\Loop',
                    'Loop\\Timer'      => __NAMESPACE__ . '\\Loop\\Timer',
                    'Net\\Tcp\\Client' => __NAMESPACE__ . '\\Net\\Tcp\\Client',
                    'Net\\Tcp\\Ip4'    => __NAMESPACE__ . '\\Net\\Tcp\\Ip4',
                    'Net\\Tcp\\Ip6'    => __NAMESPACE__ . '\\Net\\Tcp\\Ip6',
                    'Net\\Tcp\\Server' => __NAMESPACE__ . '\\Net\\Tcp\\Server',
                ],
                'singletons' => [],
                'aliases' => [
                    'Idle'      => 'Loop\\Idle',
                    'Loop'      => 'Loop\\Loop',
                    'Timer'     => 'Loop\\Timer',
                    'TcpClient' => 'Net\\Tcp\\Client',
                    'TcpServer' => 'Net\\Tcp\\Server',
                    'TcpIp4'    => 'Net\\Tcp\\Ip4',
                    'TcpIp6'    => 'Net\\Tcp\\Ip6',
                ],
                'factories'  => []
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
