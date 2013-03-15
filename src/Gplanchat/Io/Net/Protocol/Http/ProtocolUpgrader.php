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

use Gplanchat\EventManager\CallbackHandler;
use Gplanchat\Io\Net\ClientInterface;
use Gplanchat\Io\Net\Protocol\Http\Upgrade\ProtocolUpgradeAwareInterface;
use Gplanchat\ServiceManager\ServiceManager;
use Gplanchat\ServiceManager\Configurator;

class ProtocolUpgrader
    extends ServiceManager
{
    /**
     * @param array $config
     * @param Configurator $configurator
     */
    public function __construct(array $config = null, Configurator $configurator = null)
    {
        if ($config === null) {
            $config = [
                'invokables' => [
                    'WebSocket' => __NAMESPACE__ . '\\Upgrade\\WebSocket\\RequestHandler'
                ],
                'singletons' => [],
                'alias'      => [
                    'websocket' => 'WebSocket'
                ],
                'factories'  => []
            ];
        }

        if ($configurator === null) {
            $configurator = new Configurator();
        }

        $configurator($this, $config);
    }

    /**
     * @param $name
     * @param CallbackHandler $callbackHanlder
     * @throws Exception\UnsupportedUpgradeException
     * @return ProtocolUpgradeAwareInterface
     */
    public function upgrade($name, CallbackHandler $callbackHanlder, ClientInterface $client, Request $request, Response $response)
    {
        $requestHandler = $this->get($name);
        if (!$requestHandler instanceof ProtocolUpgradeAwareInterface) {
            throw new Exception\UnsupportedUpgradeException(sprintf('Protocol upgrade "%s" not supported.', $name));
        }

        $callbackHanlder->setCallback($requestHandler);
        $requestHandler->upgrade($client, $request, $response);

        return $requestHandler;
    }
}
