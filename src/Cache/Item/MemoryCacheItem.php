<?php

namespace TechartAbac\Cache\Item;

use Psr\Cache\CacheItemInterface;

use TechartAbac\Cache\Exception\ExpiredCacheException;

class MemoryCacheItem implements CacheItemInterface
{
    /** @var string **/
    protected $key;
    /** @var mixed **/
    protected $value;
    /** @var int **/
    protected $defaultLifetime = 3600;
    /** @var \DateTime **/
    protected $expiresAt;
    /** @var string **/
    protected $driver = 'memory';

    public function __construct(string $key, int $ttl = null)
    {
        $this->key = $key;
        $this->expiresAfter($ttl);
    }

    public function set($value): MemoryCacheItem
    {
        $this->value = $value;

        return $this;
    }

    public function isHit(): bool
    {
        return $this->expiresAt >= new \DateTime();
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function get()
    {
        if (!$this->isHit()) {
            throw new ExpiredCacheException('Cache item is expired');
        }
        return $this->value;
    }

    public function expiresAfter($time): MemoryCacheItem
    {
        $lifetime = ($time !== null) ? $time : $this->defaultLifetime;

        $this->expiresAt = (new \DateTime())->setTimestamp(time() + $lifetime);

        return $this;
    }

    public function expiresAt($expiration): MemoryCacheItem
    {
        $this->expiresAt =
            ($expiration === null)
            ? (new \DateTime())->setTimestamp(time() + $this->defaultLifetime)
            : $expiration
        ;
        return $this;
    }

    public function getExpirationDate(): \DateTime
    {
        return $this->expiresAt;
    }

    public function getDriver(): string
    {
        return $this->driver;
    }
}
