<?php

require 'required.php';

/*deleting records from papers appeared table*/
$query = "delete from `papersappeared` where `L_id` = '$l_id'";
if(!(mysql_query($query)))
	echo mysql_error();

/*deleting records from mcqs appeared table*/
$query = "delete from `mcqsappeared` where `L_id` = '$l_id'";
if(!(mysql_query($query)))
	echo mysql_error();

/*deleting from score*/
$query = "delete from `score` where `L_id` = '$l_id'";
if(!(mysql_query($query)))
	echo mysql_error();
else echo '<script type=text/javascript> window.location.href="settings.php?message=1"; </script>';

?>