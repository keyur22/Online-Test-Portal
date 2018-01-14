<?php
 
require 'required.php';

if(logged_in())
	echo '<script>	window.location.href="home.php";	</script>';

$form_action = 'login.php';
//get system
if(isset($_GET['request']) && !empty($_GET['request']))	{
	$request = $_GET['request'];
	switch($request)	{
		case 1: $msg = 'To upload mcqs, you first need to login';
				$redirect = 'preupload.php';
				$form_action .= '?request=1';
		break;
		case 2: $msg = 'To download university papers, you first need to login';
				$redirect = 'university1.php';
				$form_action .= '?request=2';
		break;
		case 3: $msg = 'To give a feedback, you first need to login';
				$redirect = 'feedback.php';
				$form_action .= '?request=3';
		break;
	}
}


/*CODE TO CHECK USERNAME AND PASSWORD*/
if (isset($_POST['username']) && isset($_POST['password']))	{
	$username = $_POST['username'];
	$password = $_POST['password'];
    $password_hash = md5($password);
	if (isset($_POST['autologin']))
	{
		$rememberme = $_POST['autologin'];
	}
	else
	{
		$rememberme = '';
	}
	 
		
	if(!empty($username) && !empty($password))
	{
	    $query = 'SELECT `L_id` FROM `login` WHERE `username`= \''.$username.'\' AND `password`= \''.$password_hash.'\'';
		
		if($query_run = mysql_query($query))
		{
			
			$query_num_rows = mysql_num_rows($query_run);
			
			if($query_num_rows == 0)
			{	
				/*echo '
				<script>
					document.getElementById("display").innerHTML = document.getElementById("incorrect").innerHTML;
				</script>
				';*/
				$msg = 'The username/password you entered is incorrect. Please try again.';
				
			}
			else if($query_num_rows == 1)
			{
				$user_id = mysql_result($query_run , 0 , 'L_id');
				if($rememberme == 'on')
				{
					setcookie('user_id',$user_id,time()+86400);
				}
				else if($rememberme == '')
				{
					$_SESSION['user_id'] = $user_id;
				}
				if(!isset($redirect))
					$redirect = 'home.php';
				echo '<script type=text/javascript>	window.location.href="'.$redirect.'";	</script>';
			}																		
		}	
		else
		{
			echo mysql_error();
		}						
	}
	else
	{		
		echo 'All fields are required.'	;	
	}
	
	
}
?>

<head>
	<style>
		#description	{
			line-height: 25px;
		}
		body	{
			background-color: orange;
		}
		#request_msg{
			color: red;
		}
	</style>
</head>


<body>
	<br>
	<div id="display"><br><br>
<?php 	if(isset($msg))	{	?>
			<!--request div-->
			<h2><b><p class="text-center" id="request_msg">
<?php				echo $msg;	?>
			</p></b></h2>
<?php	} else	?>
			<br><br>
	</div>

	<br>
	<div class="row">
		<!--advantages of logging in-->
		<div class="col-md-5 col-md-offset-1">
			<h2><b>Here is why you should have an account:</b></h2>
			<ul class="unstyled">
				<li>
					<dl>
						<dt><h3>No more searching for subjects</h3></dt>
						<dd><h4>
							<p id="description">
								With an account, you can add various subjects to your interests lists and the subjects related to your course are automatically 
								added to your list of interests. Each time a new paper is available, we will notify you.
							</p>
						</h4></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt><h3>Store your results and track your performance</h3></dt>
						<dd><h4>
							<p id="description">
								When you have an account, the result of each test given by you is stored and you can assess your performance in each subject
							</p>
						</h4></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt><h3>Download university papers for free</h3></dt>
						<dd><h4>
							<p id="description">
								When logged in, you can download the university exam papers of your as well as other streams for free!
							</p>
						</h4></dd>
					</dl>
				</li>
			</ul>
				
		</div>
		<!--login window-->
		<div class="col-md-4 col-md-offset-1">
			<Br><br>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Login</h2>
					<h4>Please enter your username and password to login</h4>
				</div>
				<form action="<?php echo $form_action;	?>" method="POST">
					<div class="panel-body">
						<!--username-->
						<div class="row">
							<div class="col-md-4 col-md-offset-1">
								<h4><b>Username: </b></h4>
							</div>
							<div class="col-md-5">
								<input type="text" name="username" class="form-control">
							</div>
						</div>
						<br>
						<!--password-->
						<div class="row">
							<div class="col-md-4 col-md-offset-1">
								<h4><b>Password: </b></h4>
							</div>
							<div class="col-md-5">
								<input type="password" name="password" class="form-control">
							</div>
						</div>
						<Br>
						<!--forgot password-->
						<div class="row">
							<div class="col-md-8 col-md-offset-1">
								<h4><b>
									Forgot Password??<a href="fpass1.php">Click here</a>
								</b></h4>
							</div>	
						</div>
						
						<!--signup-->
						<div class="row">
							<div class="col-md-9 col-md-offset-1">
								<h4><b>
									Don't have an account??<a href="signup(form).php">Sign Up</a>
								</b></h4>
							</div>	
						</div>
						<br>
						<!--submit and back button-->
						<div class="row">
							<div class="col-md-3 col-md-offset-6">
								<input type="submit" value="login" class="btn btn-success btn-lg">
							</div>
							<div class="col-md-3">
								<a href="abc.php" class="btn btn-primary btn-lg">Back</a>
							</div>
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>
</body>
