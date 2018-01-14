<?php

require 'required.php';

if(isset($_GET['username']) && !empty($_GET['username']))	{
	$username = $_GET['username'];
	//checking if username already exists
	$query = 'select \'x\' from login where username = \''.$username.'\'';
	if($query_run = mysql_query($query))	{
		if(mysql_num_rows($query_run))
			echo '<b>The username entered by you already exists. Please try some other username.</b>';
	} else echo mysql_error();
}
?>
