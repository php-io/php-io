<?php

namespace Gplanchat\Io\Adapter\Libuv\Filesystem;

use Gplanchat\Io\Adapter\Libuv\Loop;
use Gplanchat\Io\Filesystem\FilesystemInterface;
use Gplanchat\Io\Loop\LoopAwareTrait;
use Gplanchat\Io\Loop\LoopInterface;

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
     * @param string $path
     * @param int $flags
     * @param callable $callback
     * @return $this
     */
    public function open($path, $flags, callable $callback)
    {
        $self = $this;
        \uv_fs_open($this->getLoop()->getResource(), $path, $flags, 0644, function($streamId) use($callback, $self) {
            $callback(new File($self, $streamId));
        });

        return $this;
    }

    /**
     * @param string $path
     * @param int $flags
     * @param int $chmod
     * @param callable $callback
     * @return $this
     */
    public function openMode($path, $flags, $chmod, callable $callback)
    {
        $self = $this;
        \uv_fs_open($this->getLoop()->getResource(), $path, $flags, $chmod, function($streamId) use($callback, $self) {
            $callback(new File($self, $streamId));
        });

        return $this;
    }

    /**
     * @param string $from
     * @param string $to
     * @param callable $callback
     * @return $this
     */
    public function rename($from, $to, callable $callback)
    {
        $self = $this;
        \uv_fs_rename($this->getLoop()->getResource(), $from, $to, function($success) use($callback, $self) {
            $callback($self, $success);
            });

        return $this;
    }

    /**
     * @todo
     * @param string $path
     * @param int|string $uid
     * @param int|string $gid
     * @param callable $callback
     * @return $this
     */
    public function chown($path, $uid, $gid, callable $callback)
    {
        $self = $this;
        \uv_fs_chown($this->getLoop()->getResource(), $path, $uid, $gid, function($fd) use($callback, $self) {
            $callback($self, $fd);
        });

        return $this;
    }

    /**
     * @todo
     * @param string $path
     * @param int $mode
     * @param callable $callback
     * @return $this
     */
    public function chmod($path, $mode, callable $callback)
    {
        $self = $this;
        \uv_fs_chmod($this->getLoop()->getResource(), $path, $mode, function($fd) use($callback, $self) {
            $callback($self, $fd);
        });

        return $this;
    }

    /**
     * @todo
     * @param resource $fd
     * @param int|string $uid
     * @param int|string $gid
     * @param callable $callback
     * @return $this
     */
    public function fchown($fd, $uid, $gid, callable $callback)
    {
        $self = $this;
        \uv_fs_fchown($this->getLoop()->getResource(), $path, $uid, $gid, function($fd) use($callback, $self) {
            $callback($self, $fd);
        });

        return $this;
    }

    /**
     * @todo
     * @param resource $fd
     * @param int $mode
     * @param callable $callback
     * @return $this
     */
    public function fchmod($fd, $mode, callable $callback)
    {
        $self = $this;
        \uv_fs_fchmod($this->getLoop()->getResource(), $path, $mode, function($fd) use($callback, $self) {
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
    public function truncate($path, $length, callable $callback)
    {
//        $self = $this;
//        \uv_fs_truncate($this->getLoop()->getResource(), $path, $length, function($fd) use($callback, $self) {
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
    public function ftruncate($fd, $length, callable $callback)
    {
        $self = $this;
        \uv_fs_ftruncate($this->getLoop()->getResource(), $fd, $length, function($fd) use($callback, $self) {
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
    public function stat($path, callable $callback)
    {
        $self = $this;
        \uv_fs_stat($this->getLoop()->getResource(), $path, function($fd) use($callback, $self) {
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
    public function fstat($fd, callable $callback)
    {
        $self = $this;
        \uv_fs_fstat($this->getLoop()->getResource(), $fd, function($fd) use($callback, $self) {
            $callback($self, $fd);
        });

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
     * fs.link(srcpath, dstpath, callback)
     * fs.symlink(srcpath, dstpath, [type], callback)
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
