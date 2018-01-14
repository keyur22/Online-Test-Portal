<?php
require 'required.php';
include 'theme.php';

/*taking username*/
$query ="select `username` from `login` where `L_id` = '$l_id'";
if($query_run = mysql_query($query))	{
	$username = mysql_result($query_run, 0, 'username');
}

//messages
if(isset($_GET['message']))	{
	$message = $_GET['message'];
	if($message == 1)	{
		$string = "Account reseted successfully!";
	} else if ($message == 2)	{
		$string = "Password changed successfully!";
	}
}
?>

<head>
</head>
<body>
	<br>
	<div class="row">
		<h1>
			<p class="text-center">Settings</p>
		</h1>
	</div><br>
	<!--success or failure msgs-->
	<div id="alert">
<?php	if(isset($string))	{	?>
			<div class="col-md-10 col-md-offset-1 alert alert-success">
				<h4><p class="text-center">
					<?php echo $string;	?>
				</p></h4>
			</div>
<?php	}		?>
	</div>
	<!--confirm-->
	<div id="confirm">
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info alert-dismissable">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h5>
							<p id="msg"></p>
						</h5>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-1 col-md-offset-8">
						<a href="#" class="btn btn-default" onclick="option(1)">
							Yes
						</a>
					</div>
					<div class="col-md-2">
						<a type="button" class="btn btn-default" onclick="option(2)">
							Cancel
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">				
					<!--tabs-->					
					<ul class="nav nav-tabs nav-justified">
						<li role="presentation" class="active"><a href="#"><h3>General</h3></a></li>
						<li role="presentation" class=""><a href="personalSettings.php"><h3>Personal</h3></a></li>
					</ul>
					<br><br>
					<!--Username-->
					<div class="row">
						<div class="col-md-2 col-md-offset-1">
							<h4><b>Username:	</b></h4>
						</div>
						<div class="col-md-2 col-md-offset-2">
							<h4>
								<?php echo $username;	?>
							</h4>
						</div>
					</div><br>
					<!--Password-->
					<div class="row">
						<div class="col-md-2 col-md-offset-1">
							<h4><b>Password:	</b></h4>
						</div>
						<div class="col-md-2 col-md-offset-2">
							<a href="changePassword.php">
								<h4>change password</h4>
							</a>
						</div>
						<div class="col-md-3 col-md-offset-1">
							<a href="fpass1.php">
								<h4>forgot password</h4>
							</a>
						</div>
					</div>
					<hr>
					<!--short statement-->
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<h4>
								<p>
								You can reset your score. This will delete the records of all the papers attempted
								by you and will also delete all the details of your score card.
								</p>
							</h4>
						</div>
					</div>
					<!--reset score card-->
					<div class="row">
						<div class="col-md-2 col-md-offset-1">
							<a href="#" onClick="confirmation(1);">
								<h4><b>Reset</b></h4>
							</a>
						</div>
					</div>
					<hr>
					<!--delete account statement-->
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<h4><p>
								You can delete your account. Deleting the account will delete all your information. This includes
								history of the papers attempted by you, your performance card and also all your personal details. Click
								on the below link to proceed with deleting your account
							</p></h4>
						</div>
					</div>
					<!--delete account-->
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<a href="#" onClick="confirmation(2);">
								<h4><b>Delete your account</b></h4>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	document.getElementById("confirm").style.display = 'none';
	var type = 0;
	function confirmation(value) {
		type = value;
		var msg;
		if(type == 1)
			msg = "Are you sure you want to reset your account???";
		else if (type == 2)
			msg = "Are you sure you want to delete your account???";
		msg += " This action cannot be reversed.";
		document.getElementById("confirm").style.display = 'block';
		document.getElementById("msg").innerHTML = msg;
		
	}
	function option(choice)	{
		if(choice == 1)	{
			var pg;
			if(type == 1)
				pg = 'reset.php';
			else if(type == 2)
				pg = 'delete.php';
			window.location.href = pg;
		}
		else document.getElementById("confirm").style.display = 'none';
	}
</script>