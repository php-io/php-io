<?php

namespace Gplanchat\Io\Filesystem;

use Gplanchat\Io\Filesystem\FileInterface;
use Gplanchat\Io\Filesystem\FilesystemInterface;
use Gplanchat\Io\Loop\LoopAwareTrait;

/**
 * Class File
 * @package Gplanchat\Io\Adapter\Libuv\Filesystem
 */
trait FileTrait
{
    use LoopAwareTrait;

    /**
     * @var FilesystemInterface
     */
    private $filesystem = null;

    /**
     * @var int
     */
    private $streamId = null;

    /**
     * @param FilesystemInterface $filesystem
     * @return $this
     */
    public function setFilesystem(FilesystemInterface $filesystem)
    {
        $this->filesystem = $filesystem;

        return $this;
    }

    /**
     * @return Filesystem
     */
    public function getFilesystem()
    {
        return $this->filesystem;
    }

    /**
     * @param int $streamId
     * @return $this
     */
    public function setStreamId($streamId)
    {
        $this->streamId = $streamId;

        return $this;
    }

    /**
     * @return int
     */
    public function getStreamId()
    {
        return $this->streamId;
    }
}
