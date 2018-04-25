<?php
namespace Examples;

require (dirname(__DIR__).'/vendor/autoload.php');
include 'arrayToJSON.php';
// or require (dirname(__DIR__).'/src/autoloader.php');

use RedisClient\RedisClient;
use RedisClient\Client\Version\RedisClient2x6;
use RedisClient\ClientFactory;

// Example 2. Create new Instance without config. Client will use default config.
$Redis = new RedisClient();
// By default, the client works with the latest stable version of Redis.
//echo 'RedisClient: '. $Redis->getSupportedVersion() . PHP_EOL; // RedisClient: 3.2
//echo 'Redis: '. $Redis->info('Server')['redis_version'] . PHP_EOL; // Redis: 3.0.3

$arList = $Redis->lrange("devices", 0, -1);
$converted = [];

foreach ($arList as $value) {

  $data = array(
      'name'        => $value,
      'status'       => $Redis->get($value)
  );
  array_push($converted,$data);
}

$newData["devices"] = $converted;

echo json_encode($newData,JSON_PRETTY_PRINT);
json_encode($newData,JSON_PRETTY_PRINT);

?>
