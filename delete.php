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


//deleting from interests
$query = "delete from `interests` where `L_id` = '$l_id'";
if(!(mysql_query($query)))	{
	echo mysql_error();
}

/*deleting from studentanswer
$query = "delete from `studentanswer` where `S_id` = '$s_id'";
if(!(mysql_query($query)))	{
	echo mysql_error();
}*/		//not currently in use

//deleting from student
$query = "delete from `student` where `L_id` = '$l_id'";
if(!(mysql_query($query)))	{
	echo mysql_error();
}

//deleting from login
$query = "delete from `login` where `L_id` = '$l_id'";
if(!(mysql_query($query)))	{
	echo mysql_error();
}

session_destroy();

echo '<script type=text/javascript> window.location.href="home.php";	</script>';
?>