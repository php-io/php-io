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
namespace Gplanchat\Io\Adapter\Polling;

use Gplanchat\ServiceManager\AbstractServiceManager;
use Psr\Log\NullLogger;

/**
 * Basic loop class. A loop is designed to run event-driven code, the loop runs
 * until there are registered I/O loops.
 *
 * @package    Gplanchat\Io
 * @subpackage Gplanchat\Io\Loop
 */
class DefaultServiceManager
    extends AbstractServiceManager
{
    /**
     * @var array
     */
    protected $invokables = [
        'Idle'      => 'Gplanchat\\Io\\Adapter\\Polling\\Loop\\Idle',
        'Loop'      => 'Gplanchat\\Io\\Adapter\\Polling\\Loop\\Loop',
        'Timer'     => 'Gplanchat\\Io\\Adapter\\Polling\\Loop\\Timer',
        'TcpClient' => 'Gplanchat\\Io\\Adapter\\Polling\\Net\\Tcp\\Client',
        'TcpIp4'    => 'Gplanchat\\Io\\Adapter\\Polling\\Net\\Tcp\\Ip4',
        'TcpIp6'    => 'Gplanchat\\Io\\Adapter\\Polling\\Net\\Tcp\\Ip6',
        'TcpServer' => 'Gplanchat\\Io\\Adapter\\Polling\\Net\\Tcp\\Server'
    ];

    protected $singletons = [
        'Logger' => 'Psr\\Log\\NullLogger'
    ];
}
