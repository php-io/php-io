<?php

namespace Gplanchat\Io\Adapter\Libuv\Filesystem;

use Gplanchat\Io\Adapter\Libuv\Loop\LoopAwareTrait;
use Gplanchat\Io\Adapter\Libuv\Loop\LoopInterface;
use Gplanchat\Io\Loop\Loop;
use Gplanchat\Io\Loop\LoopAwareInterface;
use SplFileInfo;

class Filesystem
    implements LoopAwareInterface
{
    use LoopAwareTrait;

    /**
     * @param LoopInterface $loop
     */
    public function __construct(LoopInterface $loop)
    {
        $this->setLoop($loop);
    }

    public function open($fileInfo, $flags, $chmod, callable $callback)
    {
        \uv_fs_open($this->getLoop());
    }
}

/*
PHP_FE(uv_fs_open, arginfo_uv_fs_open)
PHP_FE(uv_fs_close, arginfo_uv_fs_close)

PHP_FE(uv_fs_read, arginfo_uv_fs_read)
PHP_FE(uv_fs_write, arginfo_uv_fs_write)

PHP_FE(uv_fs_fsync, arginfo_uv_fs_fsync)
PHP_FE(uv_fs_fdatasync, arginfo_uv_fs_ftruncate)
PHP_FE(uv_fs_ftruncate, arginfo_uv_fs_ftruncate)
PHP_FE(uv_fs_mkdir, arginfo_uv_fs_mkdir)
PHP_FE(uv_fs_rmdir, arginfo_uv_fs_rmdir)
PHP_FE(uv_fs_unlink, arginfo_uv_fs_unlink)
PHP_FE(uv_fs_rename, arginfo_uv_fs_rename)
PHP_FE(uv_fs_utime, arginfo_uv_fs_utime)
PHP_FE(uv_fs_futime, arginfo_uv_fs_futime)
PHP_FE(uv_fs_chmod, arginfo_uv_fs_chmod)
PHP_FE(uv_fs_fchmod, arginfo_uv_fs_fchmod)
PHP_FE(uv_fs_chown, arginfo_uv_fs_chown)
PHP_FE(uv_fs_fchown, arginfo_uv_fs_fchown)
PHP_FE(uv_fs_link, arginfo_uv_fs_link)
PHP_FE(uv_fs_symlink, arginfo_uv_fs_symlink)
PHP_FE(uv_fs_readlink, arginfo_uv_fs_readlink)
PHP_FE(uv_fs_stat, arginfo_uv_fs_stat)
PHP_FE(uv_fs_lstat, arginfo_uv_fs_lstat)
PHP_FE(uv_fs_fstat, arginfo_uv_fs_fstat)
PHP_FE(uv_fs_readdir, arginfo_uv_fs_readdir)
PHP_FE(uv_fs_sendfile, arginfo_uv_fs_sendfile)
PHP_FE(uv_fs_event_init, arginfo_uv_fs_event_init)
 */
