<?php

require 'required.php';

if(isset($_GET['subjid']))	{
	$subjid = $_GET['subjid'];
	/*to insert into interests*/
	$query = "insert into `interests` values (NULL, '$l_id', '$subjid')";
	if(!($query_run = mysql_query($query)))	{
		echo mysql_error();
	} else {
		echo '<script type=text/javascript> window.location.href="interest.php"; </script>';
	}
}

?>