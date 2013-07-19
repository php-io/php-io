<?php

namespace Gplanchat\Io\Filesystem;

use Gplanchat\Io\Loop\LoopAwareInterface;
use Gplanchat\Io\Loop\LoopAwareTrait;

/**
 * Interface FileInterface
 * @package Gplanchat\Io\Filesystem
 */
interface FileInterface
    extends LoopAwareInterface
{
    /**
     * @param FilesystemInterface $filesystem
     * @param int $streamId
     */
    public function __construct(FilesystemInterface $filesystem, $streamId);

    /**
     * @param FilesystemInterface $filesystem
     * @return $this
     */
    public function setFilesystem(FilesystemInterface $filesystem);

    /**
     * @return FilesystemInterface
     */
    public function getFilesystem();

    /**
     * @param int $streamId
     * @return $this
     */
    public function setStreamId($streamId);

    /**
     * @return int
     */
    public function getStreamId();

    /**
     * @param int $length
     * @param callable $callback
     * @return $this
     */
    public function truncate($length, callable $callback);

    /**
     * @param string $data
     * @param int $position
     * @param callable $callback
     * @return $this
     */
    public function write($data, $position, callable $callback);

    /**
     * @param string $data
     * @param int $offset
     * @param int $length
     * @param int $position
     * @param callable $callback
     * @return $this
     */
    public function writeBuffer($data, $offset, $length, $position, callable $callback);
}
