<?php

require 'required.php';

//to store entered feedback
 if(isset($_GET['rating']))	{
	$user_rating = $_GET['rating'];
	$time = time();
	if(!empty($user_rating))	{
		$query = "select `rating` from `rate` where `L_id` = '$l_id'";
		if($query_run = mysql_query($query))	{
			if(mysql_num_rows($query_run))	{
				$query = "update `rate` set `rating` = '$user_rating' where `L_id` = '$l_id'";
			} else	{
				$query = "insert into `rate` values(NULL, '$l_id', '$user_rating')";
			}
		}
		if(!(mysql_query($query)))	{
			echo mysql_error();
		}
	} else {
		echo 'please rate before clicking on submit';
	}
 }


?>