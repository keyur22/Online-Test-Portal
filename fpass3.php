<?php

require 'required.php';

if(isset($_POST['ans']))
{
	$ans = trim(strtolower($_POST['ans']));
	if(!empty($_POST['ans']))
	{
		$lid = $_SESSION['L_id'];
		$query = "SELECT `answer` FROM `login` WHERE `L_id` = '$lid'"; 
		if($query_run = mysql_query($query))
		{
			$answer = trim(strtolower(mysql_result($query_run, 0, 'answer')));
					
			if($answer == $ans)
			{
				$length = 6;

				$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
				$randomString_md5 = md5($randomString);
				$query = "UPDATE `login` SET `password` = '$randomString_md5' WHERE `L_id` = '$lid'";
				
				if($query_run = mysql_query($query))
				{   
					?>
				<br><br>
				<div class="alert alert-success container">
					<h2><p class="text-center">
						Your New Password Has been Generated. You Can change the password later
					</p></h2>
				</div>
					
<?php			session_destroy();	
				}
				else
				{
					echo mysql_error();
				}
				
			}
			else
			{
				?>
				<br><br>
				<div class="alert alert-danger container">
					<h2><p class="text-center">
						The answer you entered is incorrect<br>click
						<a href="fpass1.php">here</a> to go back to <B>STEP 1</B>
					</p></h2>
				</div>
<?php		}
			
		}
		else
		{
			echo mysql_error();
		}
		
		
		
	}
	else
	{
		echo 'Please Give a valid answer!!!!!!!!!';
	}
	
}

 if(isset($randomString))
{
		
		
?> 

<body>

<br><br><div class="container">
			<div class="panel panel-default">
				<div class="panel-body">
					<br>
					<form name="signupform" action="fpass3.php" method="POST">
			<div class="row">
				<h1><p class="text-center">
						
				</p></h1>
			</div><br><br>
	<!--security-->
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<h4><b>Password Generated : </b></h4>
		</div>
		<div class="col-md-2">
			<center><h3><?php echo $randomString ;?><h3></center>
		</div>
	</div>
	<br>
	<br><br>
	<!--submit button-->
	<div class="row">
		<center><a href="abc.php" class="btn btn-success btn-lg" role="button">Go Back To Home Page</a></center>
	</div>
	
<?php } ?>
























