<?php

	if(logged_in())	{
		/*taking user name from field*/
		$query = "select `name`, `photo` from `login` where `L_id` = '$l_id'";
		if($query_run = mysql_query($query))	{
			$name = mysql_result($query_run, 0, 'name');
			$position = strpos($name, ' ');
			if(!empty($position))
				$name = substr($name, 0, $position);
			$photo = mysql_result($query_run, 0, 'photo');
			if(empty($photo))
				$photo = 'default-user.png';
		} else echo mysql_error();
	}
	
	function test_over($page)	{
		if(isset($_SESSION['paper']) && isset($_SESSION['paper_over']) && $_SESSION['paper_over'] == false)
			echo '<script>	confirmation("'.$page.'");	</script>';
	}

?>
<head>
	<script type="text/javascript">
		function suggest()	{
			if(window.XMLHttpRequest)	{
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			
			xmlhttp.onreadystatechange = function()	{
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200)	{
					document.getElementById('suggestions').innerHTML = xmlhttp.responseText;
				}
			}
			
			xmlhttp.open('GET', 'search.php?search_text=' + document.search_form.search_text.value, true);
			xmlhttp.send();
		}
		function check_search()	{
			var value = document.search_form.search_text.value;
			if(value != '')
				suggest();
			else {
				document.getElementById('suggestions').innerHTML = document.getElementById('suggestions_ref').innerHTML;
			}
		}
		/*function confirmation(page)	{
			if(confirm("Are you sure you want to quit the test???") == true)
				window.location.href = page;
		}*/
	</script>


<script  src="js.js">

</script>
<link rel="stylesheet" type="text/css" href="saif.css">

</head>
<body onload="check_search();">
	<nav class=" navbar-custom">
		<div class="container-fluid">
			<!--<a class="navbar-brand" href="#"><img height="29" width="100" src="book.jpg"></a>-->
			<ul class="nav navbar-nav">
				<li class="active">
					<a href="home.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<!--	<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Features <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Papers</a></li>
							<li><a href="#">MCQ's</a></li>
							<li><a href="#">Discussion forum</a></li>
						</ul>
					</li>-->
			</ul>
			<form class="navbar-form navbar-left" role="search" method ="POST" name="search_form">
				<div class="row">
					<div class="col-md-6 col-md-offset-6">
						<input type="text" class="form-control" 
						name="search_text" size="50" onkeyup="check_search();"
						placeHolder="search for subjects, chapters and streams" 
<?php					if($current_file == $path.'test1.php')	{	?>
							disabled
<?php					}	?>
						>
					</div>
				</div>
			</form>
<?php		if(logged_in())	{		?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="aboutus.php">About</a></li>
					<li><a href="personal.php">
						<?php echo $name;		?>
					</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
						</ul>
					</li>
				</ul>
<?php		}	else {		?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="aboutus.php">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<!--<li id="popup" onclick="div_show()"><a href="#"> <span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
							<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
							<li><a href="signup(form).php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
						</ul>
					</li>
					
				</ul>

<?php		}				?>
		</div>
	</nav>
	
	
	
	<!---->
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="login.php" id="form" method="post" name="form">
<img id="close" src="cross.png" onclick ="div_hide()">
<h2 id ="logg">Log-In</h2>
<hr>
<input id="name" name="username" placeholder="User name" type="text" size="25" required>
</br></br>
<input id="password" name="password" placeholder="Password" type="password" size="25" required>
</br></br>
<table align="center">
<tr>
<td>
<input id="submit" type="submit" value="Login"></a>
</td>
<td>
<a href="fpass1.php" id="forgotpassword">forgot password?</a>
</td>
</tr>
</table>
<hr>
<h5 id="sup">
Don't have an account?<a href="signup(form).php"> Sign up »</a>
</h5>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
<!-- Display Popup Button -->
