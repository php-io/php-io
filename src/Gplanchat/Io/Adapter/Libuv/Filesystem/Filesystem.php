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

use Gplanchat\Io\Adapter\Libuv\Loop;
use Gplanchat\Io\Filesystem\FilesystemInterface;
use Gplanchat\Io\Loop\LoopAwareTrait;
use Gplanchat\Io\Loop\LoopInterface;

/**
 * Asynchronous file system management
 *
 * @package    Gplanchat\Io
 * @subpackage Libuv
 * @category   Filesystem
 * @author     Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence    GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */
class Filesystem
    implements FilesystemInterface
{
    use LoopAwareTrait;

    /**
     * @param LoopInterface $loop
     */
    public function __construct(LoopInterface $loop)
    {
        $this->setLoop($loop);
    }

    /**
     * Opens a file for reading/writing. The callback will get $this instance and a new instance of class
     * Gplanchat\Io\Filesystem\FileInterface on which file-related operations will be possible.
     * If the file was created, it will be assigned the mode 0644.
     *
     * @param string $path
     * @param int $flags
     * @param callable $callback
     * @return $this
     */
    public function open($path, $flags,  callable $callback = null)
    {
        $self = $this;
        \uv_fs_open($this->getLoop()->getBackend(), $path, $flags, 0644, function($streamId) use($callback, $self) {
            if ($callback === null) {
                return;
            }

            $callback($self, new File($self, $streamId));
        });

        return $this;
    }

    /**
     * Opens a file for reading/writing, assigning a mode to the file if was newly created.
     * The callback will get $this instance and a new instance of class Gplanchat\Io\Filesystem\FileInterface
     * on which file-related operations will be possible.
     *
     * @param string $path
     * @param int $flags
     * @param int $chmod
     * @param callable $callback
     * @return $this
     */
    public function openMode($path, $flags, $chmod,  callable $callback = null)
    {
        $self = $this;
        \uv_fs_open($this->getLoop()->getBackend(), $path, $flags, $chmod, function($streamId) use($callback, $self) {
            if ($callback === null) {
                return;
            }

            $callback($self, new File($self, $streamId));
        });

        return $this;
    }

    /**
     * Rename or move a file. The callback will get $this instance and an boolean determining if
     * the operation was successful or not.
     *
     * @param string $from
     * @param string $to
     * @param callable $callback
     * @return $this
     */
    public function rename($from, $to,  callable $callback = null)
    {
        $self = $this;
        \uv_fs_rename($this->getLoop()->getBackend(), $from, $to, function($success) use($callback, $self) {
            if ($callback === null) {
                return;
            }

            $callback($self, $success);
            });

        return $this;
    }

    /**
     * Change the ownership of a file/directory by path
     *
     * @param string $path
     * @param int|string $uid
     * @param int|string $gid
     * @param callable $callback
     * @return $this
     */
    public function chown($path, $uid, $gid,  callable $callback = null)
    {
        $self = $this;
        \uv_fs_chown($this->getLoop()->getBackend(), $path, $uid, $gid, function($fd) use($callback, $self) {
            if ($callback === null) {
                return;
            }

            $callback($self, $fd);
        });

        return $this;
    }

    /**
     * Change the mode of a file/directory by path
     *
     * @param string $path
     * @param int $mode
     * @param callable $callback
     * @return $this
     */
    public function chmod($path, $mode,  callable $callback = null)
    {
        $self = $this;
        \uv_fs_chmod($this->getLoop()->getBackend(), $path, $mode, function($fd) use($callback, $self) {
            if ($callback === null) {
                return;
            }

            $callback($self, $fd);
        });

        return $this;
    }

    /**
     * Change the ownership of a stream descriptor
     *
     * @param resource $fd
     * @param int|string $uid
     * @param int|string $gid
     * @param callable $callback
     * @return $this
     */
    public function fchown($fd, $uid, $gid,  callable $callback = null)
    {
        $self = $this;
        \uv_fs_fchown($this->getLoop()->getBackend(), $fd, $uid, $gid, function($fd) use($callback, $self) {
            if ($callback === null) {
                return;
            }

            $callback($self, $fd);
        });

        return $this;
    }

    /**
     * Change the mode of a stream descriptor
     *
     * @param resource $fd
     * @param int $mode
     * @param callable $callback
     * @return $this
     */
    public function fchmod($fd, $mode,  callable $callback = null)
    {
        $self = $this;
        \uv_fs_fchmod($this->getLoop()->getBackend(), $fd, $mode, function($fd) use($callback, $self) {
            if ($callback === null) {
                return;
            }

            $callback($self, $fd);
        });

        return $this;
    }

    /**
     * @todo
     * @param string $path
     * @param int $length
     * @param callable $callback
     * @return $this
     */
    public function truncate($path, $length,  callable $callback = null)
    {
//        $self = $this;
//        \uv_fs_truncate($this->getLoop()->getBackend(), $path, $length, function($fd) use($callback, $self) {
//            var_dump(func_get_args());
//            $callback($self, $fd);
//        });

        return $this;
    }

    /**
     * @todo
     * @param resource $fd
     * @param int $length
     * @param callable $callback
     * @return $this
     */
    public function ftruncate($fd, $length,  callable $callback = null)
    {
        $self = $this;
        \uv_fs_ftruncate($this->getLoop()->getBackend(), $fd, $length, function($fd) use($callback, $self) {
            $callback($self, $fd);
        });

        return $this;
    }

    /**
     * @todo
     * @param string $path
     * @param callable $callback
     * @return $this
     */
    public function stat($path,  callable $callback = null)
    {
        $self = $this;
        \uv_fs_stat($this->getLoop()->getBackend(), $path, function($fd) use($callback, $self) {
            $callback($self, $fd);
        });

        return $this;
    }

    /**
     * @todo
     * @param resource $fd
     * @param callable $callback
     * @return $this
     */
    public function fstat($fd,  callable $callback = null)
    {
        $self = $this;
        \uv_fs_fstat($this->getLoop()->getBackend(), $fd, function($fd) use($callback, $self) {
            $callback($self, $fd);
        });

        return $this;
    }

    /**
     * @todo
     * @param string $sourcePath
     * @param string $sestinationPath
     * @param callable $callback
     * @return $this
     */
    public function link($sourcePath, $sestinationPath, callable $callback)
    {
        $self = $this;
        \uv_fs_link($this->getLoop()->getBackend(), $sourcePath, $sestinationPath, function($fd) use($callback, $self) {
            $callback($self, $fd);
        });

        return $this;
    }

    /**
     * @todo
     * @param string $sourcePath
     * @param string $sestinationPath
     * @param callable $callback
     * @param int $flags
     * @return $this
     */
    public function symlink($sourcePath, $sestinationPath, callable $callback, $flags = null)
    {
        $self = $this;
        \uv_fs_symlink($this->getLoop()->getBackend(), $sourcePath, $sestinationPath, function($fd) use($callback, $self) {
            $callback($self, $fd);
        }, $flags);

        return $this;
    }

    /**
     * @todo
     *
     * File System
     * fs.lchown(path, uid, gid, callback)
     * fs.lchmod(path, mode, callback)
     * fs.lstat(path, callback)
     *
     * fs.readlink(path, callback)
     * fs.realpath(path, [cache], callback)
     * fs.unlink(path, callback)
     * fs.rmdir(path, callback)
     * fs.mkdir(path, [mode], callback)
     * fs.readdir(path, callback)
     * fs.utimes(path, atime, mtime, callback)
     * fs.futimes(fd, atime, mtime, callback)
     * fs.fsync(fd, callback)
     * fs.watchFile(filename, [options], listener)
     * fs.unwatchFile(filename, [listener])
     * fs.watch(filename, [options], [listener])
     * fs.exists(path, callback)
     *
     * fs.close(fd, callback)
     * fs.write(fd, buffer, offset, length, position, callback)
     * fs.read(fd, buffer, offset, length, position, callback)
     * fs.readFile(filename, [options], callback)
     * fs.writeFile(filename, data, [options], callback)
     * fs.appendFile(filename, data, [options], callback)
     */
}
