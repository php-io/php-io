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

namespace Gplanchat\Io\Net\Protocol;

use Gplanchat\EventManager\CallbackHandlerInterface;
use Gplanchat\Io\Net\Tcp\ClientInterface;
use Gplanchat\EventManager\Event;
use Gplanchat\EventManager\EventEmitterInterface;

interface RequestHandlerInterface
    extends EventEmitterInterface
{
    /**
     * @param Event $event
     * @param ClientInterface $client
     * @param string $buffer
     * @param int $length
     * @param bool $isError
     * @throws \Exception
     * @return RequestHandlerInterface
     */
    public function __invoke(Event $event, ClientInterface $client, $buffer, $length, $isError);

    /**
     * @param CallbackHandlerInterface $callbackHandler
     * @return RequestHandlerInterface
     */
    public function setCallbackHandler(CallbackHandlerInterface $callbackHandler);

    /**
     * @return CallbackHandlerInterface
     */
    public function getCallbackHandler();
}
