<?php

namespace app\components\cache;

use Predis\Client;
use Predis\Collection\Iterator\Keyspace;

/**
 * Class RedisComponent
 * @package app\components
 */
class RedisComponent implements CacheInterface
{

    /**
     * @var Client
     */
    private $redis;

    /**
     * RedisComponent constructor.
     */
    public function __construct()
    {
        $this->redis = new Client();
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $data = [];
        $listKey = new Keyspace($this->redis);
        foreach ($listKey as $item) {
            if ($item)
                $data[$item] = $this->redis->get($item);
        }

        return $data;
    }

    /**
     * @param $key
     * @param $value
     * @param $time
     */
    public function add($key, $value, $time): void
    {
        $this->redis->set($key, $value);
        $this->redis->expire($key, $time);
    }

    /**
     * @param $key
     */
    public function remove($key): void
    {
        if ($this->redis->exists($key)) {
            $this->redis->del($key);
        }
    }

    public function get($key): string
    {
        // TODO: Implement get() method.
    }
}
