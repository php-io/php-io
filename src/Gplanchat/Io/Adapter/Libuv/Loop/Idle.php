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
namespace Gplanchat\Io\Adapter\Libuv\Loop;

use Gplanchat\Io\Adapter\Libuv\Exception\InvalidLoopInstance;
use Gplanchat\Io\Loop\IdleInterface;
use Gplanchat\Io\Loop\LoopAwareInterface;
use Gplanchat\Io\Loop\LoopAwareTrait;
use Gplanchat\Io\Loop\LoopInterface as BaseLoopInterface;

/**
 * Libuv specific idling caller. Used to call routines when the loop is inactive.
 *
 * @package    Gplanchat\Io
 * @subpackage Libuv
 * @category   Loop
 * @author     Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence    GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */
class Idle
    implements IdleInterface, LoopAwareInterface
{
    use LoopAwareTrait;

    /**
     * The internal php-uv resource
     *
     * @var resource
     */
    private $idler = null;

    /**
     * Constructor. Accepts as an argument the loop on which the idler will run.
     *
     * @param BaseLoopInterface $loop
     * @throws InvalidLoopInstance
     */
    public function __construct(BaseLoopInterface $loop)
    {
        if (!$loop instanceof LoopInterface) {
            throw new InvalidLoopInstance('Loop instance does not use the Libuv adapter.');
        }

        $this->setLoop($loop);

        $this->idler = \uv_idle_init($this->getLoop()->getBackend());
    }

    /**
     * Starts the idler.
     *
     * @param callable $callback
     * @return Idle
     */
    public function start(callable $callback)
    {
        $self = $this;
        \uv_idle_start($this->idler, function($uv, $status) use($self, $callback) {
            $callback($self, $status);
        });

        return $this;
    }

    /**
     * Stops the idler.
     *
     * @return Idle
     */
    public function stop()
    {
        \uv_timer_stop($this->idler);

        return $this;
    }
}
