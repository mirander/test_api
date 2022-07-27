<?php

namespace app\components\cache;

/**
 * Interface CacheInterface
 * @package app\interfaces
 */
interface CacheInterface
{

    /**
     * @return array
     */
    public function getAll();

    /**
     * @param $key
     * @param $value
     * @param $time
     */
    public function add($key, $value, $time): void;

    /**
     * @param $key
     * @return string
     */
    public function get($key): string;

    /**
     * @param $key
     */
    public function remove($key): void;
}
