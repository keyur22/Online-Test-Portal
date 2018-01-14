<?php

require 'required.php';

if(isset($_POST['message']))	{
	$time = time();
	$message = mysql_real_escape_string($_POST['message'])	;
	if(!logged_in())
	{
		$name = mysql_real_escape_string($_POST['name']);
		$eid = $_POST['eid'];
		$query = "INSERT INTO `contactus(guest)` VALUES (null,'$name','$eid','$message','$time')";
	} else	{
		$query = "INSERT INTO `contactus(user)` VALUES (null,'$l_id','$message','$time')";		
	}

	if(mysql_query($query))
		echo '<script> window.location.href="home.php?msg=3";	</script>';
	else echo mysql_error();
}

?>