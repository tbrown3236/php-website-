<?php



 $hostName = "mysql.php.theterrybrown.com";
 $userName = "brownterry3236";
 $password = "simple123";
 $dbName =  "mysqlphptheterrybrown";
  $cache_buster = rand(10,100000);

$mysqli = new mysqli($hostName, $userName, $password, $dbName);
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//echo $mysqli->host_info . "\n";


?>