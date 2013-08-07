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
namespace Gplanchat\Io\Adapter\Libuv\Filesystem;

use Gplanchat\Io\Filesystem\FileInterface;
use Gplanchat\Io\Filesystem\FilesystemInterface;
use Gplanchat\Io\Filesystem\FileTrait;

/**
 * Asynchronous file management
 *
 * @package    Gplanchat\Io
 * @subpackage Libuv
 * @category   Filesystem
 * @author     Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence    GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */
class File
    implements FileInterface
{
    use FileTrait;

    /**
     * @param FilesystemInterface $filesystem
     * @param int $streamId
     */
    public function __construct(FilesystemInterface $filesystem, $streamId)
    {
        $this->setFilesystem($filesystem);
        $this->setStreamId($streamId);
        $this->setLoop($filesystem->getLoop());
    }

    /**
     * @param int $length
     * @param callable $callback
     * @return $this
     */
    public function truncate($length, callable $callback = null)
    {
//        $self = $this;
//        \uv_fs_truncate($this->getLoop()->getResource(), $path, $length, function($fd) use($callback, $self) {
//            var_dump(func_get_args());
//            $callback($self, $fd);
//        });

        return $this;
    }

    /**
     * @param string $data
     * @param callable $callback
     * @return $this
     */
    public function write($data, callable $callback = null)
    {
        return $this;
    }

    /**
     * @param string $data
     * @param int $offset
     * @param int $length
     * @param int $position
     * @param callable $callback
     * @return $this
     */
    public function writeBuffer($data, $offset, $length, $position, callable $callback = null)
    {
        return $this;
    }

/**
 * Class: fs.Stats
 * fs.createReadStream(path, [options])
 *
 * Class: fs.ReadStream
 * Event: 'open'
 * fs.createWriteStream(path, [options])
 *
 * Class: fs.WriteStream
 * Event: 'open'
 * file.bytesWritten
 *
 * Class: fs.FSWatcher
 * watcher.close()
 * Event: 'change'
 * Event: 'error'
 */
}
