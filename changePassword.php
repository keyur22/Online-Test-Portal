<?php

require 'required.php';
include 'theme.php';

if(isset($_POST['oldpassword']) && isset($_POST['newpassword1']) && isset($_POST['newpassword2']))	{
	$old = mysql_real_escape_string(htmlentities($_POST['oldpassword']));
	$new1 = mysql_real_escape_string(htmlentities($_POST['newpassword1']));
	$new2 = mysql_real_escape_string(htmlentities($_POST['newpassword2']));
	if(!empty($old) && !empty($new1) && !empty($new2))	{
		if($new1 == $new2)	{
			$new1 = md5($new1);
			$old = md5($old);
			$error = 0;
			$query = "select `L_id` from `login` where `password` = '$old' and `L_id` = '$l_id'";
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run) == 1)	{
					$query = "update `login` set `password` = '$new1' where `L_id` = '$l_id'";
					if(!mysql_query($query))	{
						echo mysql_error();
					} else {
						echo '<script type=text/javascript> window.location.href="settings.php?message=2"; </script>';
					}
				} else {
					$error = 'The password you entered is wrong!';
				}
			}
		} else {
			$error = 'The new passwords do not match';
		}
	} else {
		$error = 'Please fill all the details';
	}
}


?>


<br><br>
<div class="row">
	<h2><p class="text-center">
		Change password
	</p></h2>
</div><br>
<?php 	if(isset($error)) {		?>
			<div class="col-md-10 col-md-offset-1 alert alert-danger">
				<h4><p class="text-center">
<?php				echo $error;		?>
				</p></h4>
			</div>
<?php	}		?>
<br>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="changePassword.php" method="POST">
					<div class="row">
						<div class="col-md-5">
							<h4><b>
								Type your current password: 
							</b></h4>
						</div>
						<div class="col-md-6">
							<input type="password" name="oldpassword" class="form-control">
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-5">
							<h4><b>
								Type the new password: 
							</b></h4>
						</div>
						<div class="col-md-6">
							<input type="password" name="newpassword1" class="form-control">
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-5">
							<h4><b>
								Re-type the new password: 
							</b></h4>
						</div>
						<div class="col-md-6">
							<input type="password" name="newpassword2" class="form-control">
						</div>
					</div><br><br>
					<div class="row">
						<div class="col-md-2 col-md-offset-7">
							<input type="submit" value="Change Password" class="btn btn-primary btn-lg">
						</div>
						<div class="col-md-1 col-md-offset-1">
							<a href="settings.php" class="btn btn-primary btn-lg">Back</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
