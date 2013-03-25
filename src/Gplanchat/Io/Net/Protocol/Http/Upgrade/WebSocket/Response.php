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

use Gplanchat\io\Net\ClientInterface;
use Gplanchat\EventManager\EventEmitterInterface;
use Gplanchat\EventManager\EventEmitterTrait;

class Response
    extends \SplQueue
    implements EventEmitterInterface
{
    use EventEmitterTrait;

    public function send(ClientInterface $client)
    {
        $packet = '';
        while ($this->count() > 0) {
            try {
                $message = $this->dequeue();
            } catch (\Exception $e) {
                echo $e;
            }
            if (is_string($message)) {
                $messageLength = strlen($message);
            } else if (is_array($message) || is_scalar($message)) {
                $message = json_encode($message);
                $messageLength = strlen($message);
            } else {
                $message = $message.'';
                $messageLength = strlen($message);
            }

            if ($messageLength > 0xFFFF) {
                $packet .= "\x81\x7F";

                for ($i = 0; $i < 8; $i++) {
                    $packet .= chr(($messageLength & 0xFF));
                    $messageLength >>= 8;
                }
            } else if ($messageLength > 126) {
                $packet .= "\x81\x7E";
                $packet .= chr(($messageLength & 0x00FF));
                $packet .= chr(($messageLength & 0xFF00) >> 8);
            } else {
                $packet .= "\x81" . chr($messageLength);
            }

            $packet .= $message;
        }

        $client->write($packet);

        return $this;
    }

    public function addMessage($message)
    {
        $this->enqueue($message);

        return $this;
    }
}
