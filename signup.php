<?php

require 'required.php';


if(isset($_POST['name']) && isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['cpassword']) 
&& isset($_POST['eid']) && isset($_POST['gender'])
&& isset($_POST['contact']) && isset($_POST['dob']) 
&& isset($_POST['security']) && isset($_POST['ans']))
{
	$name = htmlentities(mysql_real_escape_string($_POST['name']));
	$username = htmlentities(mysql_real_escape_string($_POST['uname']));
	$pass = md5($_POST['password']);
	$cpass = $_POST['cpassword'];
	$eid = $_POST['eid'];
	$gender = $_POST['gender'];
	$contact = $_POST['contact'];
	$dob = strtotime($_POST['dob']);
	$security = $_POST['security'];
	$ans = trim(strtolower(htmlentities(mysql_real_escape_string($_POST['ans']))));
		
	$query = "SELECT `username` FROM `login` WHERE `username` = '$username'";
	if($query_run=mysql_query($query))
	{
		$query_num_rows = mysql_num_rows($query_run);
		if($query_num_rows == 1)
		{
			echo '<script type=text/javascript>	window.location.href="signup(form).php?message=2";	</script>';
			//header("refresh :5;url=signupform.php");
		}
		else if($query_num_rows == 0)
		{
			$query = "INSERT INTO `login`
			VALUES(NULL,'$username','$pass','$name','$contact','$dob',2,'$security','$ans','','$eid','$gender')";
			if(!(mysql_query($query)))
			{	
				echo mysql_error();
			} else	{
				$lid = mysql_insert_id();
				$_SESSION['user_id'] = $lid;
				//creating record in student table
				$query = "insert into student values(NULL, '$lid', '0', '0', '0', '')";
				if(!(mysql_query($query))) 
					die(mysql_error());
				echo '<script type="text/javascript">	window.location.href="signup_specific(form).php";	</script>';
			}
		}
	}
}
?>