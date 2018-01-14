<?php

/*this file is used to connect to the database*/


$error = 'Connection error';
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'mcqsystem';

if(!@mysql_connect($host, $user, $password) || !@mysql_select_db($db)) {
	echo $error;
}
?>
