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
namespace Gplanchat\Io\Adapter\Libev;

use Gplanchat\ServiceManager\AbstractServiceManager;
use Gplanchat\Io\Adapter\Libev\Loop;
use Gplanchat\Io\Adapter\Libev\Net\Tcp;
use Gplanchat\Io\Adapter\Libev\Net\Udp;
use Gplanchat\Io\Net\Tcp\SocketFactory as TcpSocketFactory;
use Gplanchat\Io\Net\Udp\SocketFactory as UdpSocketFactory;

/**
 * Default service manager for the libev adapter.
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
        'Idle'         => Loop\Idle::class,
        'Loop'         => Loop\Loop::class,
        'Timer'        => Loop\Timer::class,
        'TcpClient'    => Tcp\Client::class,
//        'TcpIp4Socket' => Tcp\Ip4::class,
//        'TcpIp6Socket' => Tcp\Ip6::class,
//        'TcpServer'    => Tcp\Server::class,
//        'UdpClient'    => Udp\Client::class,
//        'UdpIp4Socket' => Udp\Ip4::class,
//        'UdpIp6Socket' => Udp\Ip6::class,
//        'UdpServer'    => Udp\Server::class
    ];

    protected $factories = [
        'TcpSocket' => TcpSocketFactory::class,
        'UdpSocket' => UdpSocketFactory::class
    ];
}
