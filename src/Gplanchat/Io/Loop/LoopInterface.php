<?php
/**
 * This file is part of php-io.
 *
 * php-io is free software: you can redistribute it and/or modify it under the
 * terms of the GNU LEsser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * php-io is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with php-io.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Grégory PLANCHAT <g.planchat@gmail.com>
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @copyright Copyright (c) 2013 Grégory PLANCHAT (http://planchat.fr/)
 */

namespace Gplanchat\Io\Loop;

interface LoopInterface
{
    /**
     * Initialize the loop
     *
     * @return LoopInterface
     */
    public function init();

    /**
     * Cleans up the loop
     *
     * @return LoopInterface
     */
    public function cleanup();

    /**
     * Runs the loop infinitely
     *
     * @return LoopInterface
     */
    public function run();

    /**
     * Runs the loop only once
     *
     * @return LoopInterface
     */
    public function runOnce();

    /**
     * Stops the loop (mainly in case the loop would have been run infinitely)
     *
     * @param int|null $signal
     * @return LoopInterface
     */
    public function stop($signal = null);

    /**
     * Returns the uv_loop, for direct operations on the loop
     *
     * @return resource
     */
    public function getResource();
}
