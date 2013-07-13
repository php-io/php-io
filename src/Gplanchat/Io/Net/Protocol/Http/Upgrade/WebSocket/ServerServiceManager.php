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

namespace Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket;

use Gplanchat\ServiceManager\Configurator;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use Gplanchat\ServiceManager\ServiceManagerTrait;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class ServerServiceManager
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
                    'RequestHandler' => 'Gplanchat\\Io\\Net\\Protocol\\Http\\Upgrade\\WebSocket\\RequestHandler'
                ],
                'singletons' => [],
                'alias'      => [],
                'factories'  => [
                    'Request'  => 'Gplanchat\\Io\\Net\\Protocol\\Http\\Upgrade\\WebSocket\\RequestFactory',
                    'Response' => 'Gplanchat\\Io\\Net\\Protocol\\Http\\Upgrade\\WebSocket\\ResponseFactory'
                    ]
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
