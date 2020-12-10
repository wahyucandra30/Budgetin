<?php

$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "budgetin";
$connection = new mysqli($host, $db_user, $db_pass, $db_name);
if ($connection->connect_error){
	die("error");
}
?>
