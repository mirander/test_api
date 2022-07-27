<?php

namespace app\services;

use app\components\cache\CacheInterface;

/**
 * Class DataService
 * @package app\services
 */
class DataService
{

    /**
     * @var CacheInterface
     */
    public $cache;

    /**
     * DataService constructor.
     * @param CacheInterface $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param $key
     * @param $value
     * @param $time
     */
    public function setCache($key, $value, $time): void
    {
        $this->cache->add($key, $value, $time);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->cache->getAll();
    }

    /**
     * @param $key
     */
    public function remove($key): void
    {
        $this->cache->remove($key);
    }
}