<?php

namespace app;

use app\components\cache\RedisComponent;
use app\components\RoutingComponent;

require_once __DIR__ . '/vendor/autoload.php';

$GLOBALS['cache'] = new RedisComponent();
// $GLOBALS['cache'] = new MemcachedComponent();

// Start routing
$routingComponent = new RoutingComponent();
$routingComponent->main();
