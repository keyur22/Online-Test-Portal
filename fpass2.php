<?php

require 'required.php';

if(isset($_POST['uname']) && isset($_POST['dob']))
{
	$uname = $_POST['uname'];
	$dob = strtotime($_POST['dob']);
	
	if(!empty($uname) && !empty($dob))
	{
		$query = "Select `L_id` FROM `login` WHERE `username` = '$uname'";
		
		If($query_run = mysql_query($query))
		{
			$query_num_rows = mysql_num_rows($query_run);
			if($query_num_rows == 0)
			{
				?>
				<br><br>
				<div class="alert alert-danger container">
					<h2><p class="text-center">
						The username/date of birth you entered is incorrect<br>click
						<a href="fpass1.php">here</a> to try again
					</p></h2>
				</div>
				
<?php			}	
			else if($query_num_rows == 1)
			{
				
				$_SESSION['L_id'] = mysql_result($query_run, 0, 'L_id');
				$lid = $_SESSION['L_id'];
				$query = "Select `securityquestion`.`question` FROM `securityquestion` JOIN `login` ON `login`.`securityQuestion` = `securityquestion`.`Security_id` Where `login`.`L_id` = '$lid'";

				if($query_run = mysql_query($query))
				{
			
					$question = mysql_result($query_run, 0, 'question');
				}
				else
				{
					echo mysql_error();
				}			
				
			}
			
		}
		else
		{ 
			echo mysql_error();
		}
		
	}
	else
	{
		echo 'All Fields Are Required.';		
	}
}	
		


if(isset($question))
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
						STEP 2 OF 2
				</p></h1>
			</div><br><br>
	<!--security-->
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<h4><b>Security Question: </b></h4>
		</div>
		<div class="col-md-4">
			<center><h3><?php echo $question .'?' ;?><h3></center>
		</div>
	</div>
	<br>
	<!--answer -->
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<h4><b>
				Answer: 
			</b></h4>
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="ans" placeHolder="enter your answer" required>
		</div>
	</div>
	<br><br>
	<!--submit button-->
	<div class="row">
		<center><div class="col-md-2 col-md-offset-5">
			<input type="submit" id="submitbtn"
		 class="btn btn-primary btn-lg" value="Submit">
		</div></center>
	</div>
	
<?php } ?>
		