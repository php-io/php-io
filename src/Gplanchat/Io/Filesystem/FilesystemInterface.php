<?php

namespace Gplanchat\Io\Filesystem;

use Gplanchat\Io\Loop\LoopInterface;
use Gplanchat\Io\Loop\LoopAwareInterface;

interface FilesystemInterface
    extends LoopAwareInterface
{
    /**
     * @param LoopInterface $loop
     */
    public function __construct(LoopInterface $loop);

    /**
     * @param string $path
     * @param int $flags
     * @param callable $callback
     * @return $this
     */
    public function open($path, $flags, callable $callback);

    /**
     * @param string $path
     * @param int $flags
     * @param int $chmod
     * @param callable $callback
     * @return $this
     */
    public function openMode($path, $flags, $chmod, callable $callback);

    /**
     * @param string $from
     * @param string $to
     * @param callable $callback
     * @return $this
     */
    public function rename($from, $to, callable $callback);

    /**
     * @param string $path
     * @param int|string $uid
     * @param int|string $gid
     * @param callable $callback
     * @return $this
     */
    public function chown($path, $uid, $gid, callable $callback);

    /**
     * @param string $path
     * @param int $mode
     * @param callable $callback
     * @return $this
     */
    public function chmod($path, $mode, callable $callback);

    /**
     * @param resource $fd
     * @param int|string $uid
     * @param int|string $gid
     * @param callable $callback
     * @return $this
     */
    public function fchown($fd, $uid, $gid, callable $callback);

    /**
     * @param resource $fd
     * @param int $mode
     * @param callable $callback
     * @return $this
     */
    public function fchmod($fd, $mode, callable $callback);

    /**
     * @param resource $fd
     * @param int $length
     * @param callable $callback
     * @return $this
     */
    public function ftruncate($fd, $length, callable $callback);

    /**
     * @todo
     * @param string $path
     * @param callable $callback
     * @return $this
     */
    public function stat($path, callable $callback);

    /**
     * @todo
     * @param resource $fd
     * @param callable $callback
     * @return $this
     */
    public function fstat($fd, callable $callback);
}
