<?php
/**
 * This file is part of php-event-manager.
 *
 * php-event-manager is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * php-event-manager is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU Lesser General Public License
 * along with php-event-manager.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author  Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @copyright Copyright (c) 2013 Grégory PLANCHAT (http://planchat.fr/)
 */

/**
 * @namespace
 */
namespace Gplanchat\Io\Adapter\Libuv\EventManager;

use Gplanchat\EventManager\EventEmitterTrait as BaseEventEmitterTrait;
use Gplanchat\Io\Adapter\Libuv\Loop\LoopInterface;
use Gplanchat\Io\Loop\LoopAwareTrait;

/**
 * Libuv specific event emitter trait. Used by libuv-related classes implementing
 * the event-emitter pattern.
 *
 * @package    Gplanchat\Io
 * @subpackage Libuv
 * @author     Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence    GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */
trait EventEmitterTrait
{
    use BaseEventEmitterTrait;

    /**
     * Returns the loop instance.
     *
     * @return LoopInterface
     */
    abstract function getLoop();

    /**
     * Instanciate a new object of type CallbackHandlerInterface. The created object
     * instance is libuv-specific.
     *
     * @param callable $callback
     * @param array $options
     * @return CallbackHandler
     */
    public function newCallbackHandler(callable $callback, array $options = [])
    {
        return new CallbackHandler($this->getLoop(), $callback, $options);
    }
}
