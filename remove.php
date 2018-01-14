<?php


function remove($subjid)	{
	global $l_id;
	//global $http_referer;
	$query = "delete from `interests` where `Subj_id` = '$subjid' and `L_id` = '$l_id'";
	if($query_run = mysql_query($query))	{
		$query = "delete pa from papersappeared pa 
		join paper p on pa.Paper_id = p.Paper_id
		where p.Subj_id = '$subjid' and pa.L_id = '$l_id'";
		if(!mysql_query($query)) echo mysql_error();
	} else echo mysql_error();
}

if(isset($_GET['subjid']))	{
	require 'required.php';
	include 'updatetppr.php';
	$subjid = $_GET['subjid'];
	delete_topper($subjid);	//deleting the entries from toppers
	remove($subjid);	//deleting the interest
	
	echo '<script type=text/javascript> window.location.href="'.$http_referer.'";	</script>';
}

?>