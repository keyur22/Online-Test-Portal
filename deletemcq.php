<?php


require 'required.php';

if(isset($_GET['mcqid']))
{
	$mcqid = $_GET['mcqid'];
	
	$query = "delete from `mcq` where `Mcq_id` = '$mcqid'";
	if(!(mysql_query($query)))	{
		echo mysql_error();
	}

	echo '<script type=text/javascript> window.location.href="home.php?msg=6";	</script>';
}