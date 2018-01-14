<?php

require 'required.php';

if(isset($_POST['cname']) && isset($_POST['cdesc']))
{
	$cname = $_POST['cname'];
	$cdesc = $_POST['cdesc'];
	
	
	$cno = $_SESSION['cno'];
	$subjid = $_SESSION['subjid'];
	if(isset($_POST['common']))
		$common = $_POST['common'];
	$j = 0;	//count for common
	
	
	for($i=0;$i<$cno;$i++)
	{
		if(isset($common[$j]) && $common[$j] == $i)	{
			$set_common = 1;
			$j++;
		} else $set_common = 0;
		
		$query = "INSERT INTO `chapter` VALUES (NULL,'$cname[$i]','$subjid','$cno','$cdesc[$i]','$set_common')";
		if(!mysql_query($query))
			echo mysql_error();
		else echo '<script> window.location.href = "home.php";	</script>';
	}
	
}
	

?>



