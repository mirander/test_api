<?php
namespace app;

use app\components\cache\RedisComponent;
use app\services\DataService;

require_once __DIR__ . '/vendor/autoload.php';

$redis = new RedisComponent();
$cache = new DataService($redis);

if (isset($argv) && count($argv) <= 5 && $argv[1] == 'redis') {
    switch ($argv[2]) {
        case 'add':
            $cache->setCache($argv['3'], $argv['4'], 3600);
            echo "Param " . $argv['3'] . ": " . $argv['4'] . " added";
            break;

        case 'delete':
            $cache->remove($argv[3]);
            echo "Param " . $argv['3'] . " removed";
            break;
    }
}
