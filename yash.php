<?php
namespace Examples;

require (dirname(__DIR__).'autoload.php');
include 'arrayToJSON.php';
// or require (dirname(__DIR__).'/src/autoloader.php');

use RedisClient\RedisClient;
use RedisClient\Client\Version\RedisClient2x6;
use RedisClient\ClientFactory;



// Example 2. Create new Instance without config. Client will use default config.
$Redis = new RedisClient();
// By default, the client works with the latest stable version of Redis.
echo 'RedisClient: '. $Redis->getSupportedVersion() . PHP_EOL; // RedisClient: 3.2
echo 'Redis: '. $Redis->info('Server')['redis_version'] . PHP_EOL; // Redis: 3.0.3



$arList = $Redis->lrange("devices", 0, -1);
$newData = arrayToJSON($arList);
echo json_encode($arList);




?>
