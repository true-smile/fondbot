<?php

declare(strict_types=1);

namespace Bot\Providers;

use Cache\Adapter\Filesystem\FilesystemCachePool;
use FondBot\Application\CacheServiceProvider as BaseCacheServiceProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;
use Psr\SimpleCache\CacheInterface;

class CacheServiceProvider extends BaseCacheServiceProvider
{
    /**
     * Cache adapter.
     *
     * @return CacheInterface
     */
    public function adapter(): CacheInterface
    {
        $filesystem = new Filesystem(
            new Local(resources('cache'))
        );

        return new FilesystemCachePool($filesystem);
    }
}
