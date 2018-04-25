<?php
require("phpMQTT.php");
$server = "localhost"; //change to 192.168.43.125    // change if necessary
$port = 1883;                     // change if necessary
$username = "";                   // set your username
$password = "";                   // set your password
$client_id = "phpMQTT-publisher"; // make sure this is unique for connecting to sever - you could use uniqid()
$mqtt = new phpMQTT($server, $port, $client_id);
if ($mqtt->connect(true, NULL)) {
	$mqtt->publish("switch", "ON", 2);
	$name = $_GET['name'];
   	$status = $_GET['status'];
	print_r($_GET);
	$mqtt->publish($name, $status, 2);
	$mqtt->close();
} else {
    echo "Time out!\n";
}


//$Redis = new RedisClient();
//$Redis->set($username,$password);
   
  //   echo "name: ".$username;
    //  echo "password: ".$password;
  
?>
