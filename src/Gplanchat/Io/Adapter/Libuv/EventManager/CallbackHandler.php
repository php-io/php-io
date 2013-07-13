<?php
/**
 * This file is part of php-io.
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
 */

/**
 * @namespace
 */
namespace Gplanchat\Io\Adapter\Libuv\EventManager;
use Gplanchat\EventManager\CallbackHandlerInterface;
use Gplanchat\EventManager\CallbackHandlerTrait;
use Gplanchat\Io\Loop\LoopAwareTrait;
use Gplanchat\Io\Adapter\Libuv\Loop\LoopInterface;
use Gplanchat\Io\Loop\LoopAwareInterface;

/**
 *
 */
class CallbackHandler
    implements CallbackHandlerInterface, LoopAwareInterface
{
    use CallbackHandlerTrait;
    use LoopAwareTrait;

    /**
     * @param LoopInterface $loop
     * @param callable $callback
     * @param array $data
     */
    public function __construct(LoopInterface $loop, callable $callback, array $data = [])
    {
        $this->callback = $callback;
        $this->data = $data;
        $this->setLoop($loop);
    }

    /**
     * @param array $parameters
     * @return void
     */
    public function call(array $parameters = [])
    {
        $callback = $this->getCallback();
        $realCallback = function() use($callback, $parameters) {
            call_user_func_array($callback, $parameters);
        };
        $resource = \uv_async_init($this->getLoop()->getResource(), $realCallback);
        \uv_async_send($resource);
    }
}
