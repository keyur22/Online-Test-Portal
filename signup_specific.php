<?php

require 'required.php';



if(isset($_POST['college']) || (isset($_POST['course']) && isset($_POST['sem']))
	|| isset($_POST['qualification']))
{
	$lid = $_SESSION['user_id'];
	
	if(isset($_POST['college']))
		$college = $_POST['college'];
	else
		$college = 0;
	
	if(isset($_POST['qualification']))
		$qualification = htmlentities(mysql_real_escape_string($_POST['qualification']));
	else
		$qualification = '';

	if(isset($_POST['course']) && isset($_POST['sem']))	{
		$course = $_POST['course'];
		$sem = $_POST['sem'];
	} else	$course = $sem = 0;
	
	if(!empty($college) || (!empty($course) && !empty($sem)) || !empty($qualification))
	{
		$query = "update `student`
					set College_id = '$college', Course_id = '$course', sem = '$sem', qualification = '$qualification'
					where L_id = '$l_id'";
		if (mysql_query($query))
		{
			echo '<script type=text/javascript>	window.location.href="home.php";	</script>';
		}
		else
		{
			echo mysql_error();
		}
	}
	
}

?>