<?php

include 'required.php';


$query = "SELECT * FROM `securityquestion`";
$i=0;
if($query_run = mysql_query($query))
{
	while($array_row = mysql_fetch_assoc($query_run))
	{
		$id[$i] = $array_row['Security_id'];
		$question[$i] = $array_row['question'];		
		$i++;
		
	}
}
else
{
	echo mysql_error();
}

//message system
if(isset($_GET['message']) && !empty($_GET['message']))	{	
	switch($_GET['message'])	{
		case 1: $string = "Passwords do not match";
			break;
		case 2: $string = "The username entered already exists.<br>Please use some other username.";
			break;
		case 3: $string = "Please fill all the details before clicking on the submit button.";
			break;
	}
}

function checkifexists($valuel)	{
	echo $valuel;
}
		
?>


<body>
	<br><br>
<?php
	if(isset($_GET['message']) && !empty($_GET['message']))	{	?>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 panel panel-default">
				<h4><b><p class="text-center text-danger">
<?php				echo $string;		?>
				</p></b></h4>
			</div>
		</div>
<?php
	}		?>


	
<head>
	
<style>

.text-center{
color:white;
background-color:orange;
height:50px;
text-align:center;
padding:5px;
font-size:35px;
font-family:raleway;	
}
h4{
color:orange;	
}
.form-control:hover{
background-color:#ffffcc;
}
.form-control{
color:grey;
font-family:raleway;
}
#submitbtn{

background-color:#cd853f;
color:white;
border:1px solid yellow;

}
#submitbtn:hover{
background-color:orange;
}
#backbtn{
color:orange;
}
#backbtn:hover{

background-color:grey;
color:white;

}
.container{
background-color:grey;
padding:2px;
}
hr{
border-top:2px solid #CCC;

}
.div{
padding:10px;
}
#quote{
color:orange;
text-align:center;
padding:5px;
font-size:35px;
font-family:times new roman;	
} 
</style>
	</head>	
<body bgcolor="#FFFFCC">
	<div class="row">
		<h1><p class="text-center">
			Sign Up
		</p></h1>
	</div>
	</br>
	
		<p id="quote">
		Register And Get the Exclusive Access.</p>
	<br>
	
	<div class="row">
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-body">
					<br>
					<form name="signupform" action="signup.php" method="POST">
						<!--Name -->
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									Name: 
								</b></h4>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" placeHolder="Enter your name" required>
							</div>
						</div>
						<br>
						<!--username -->
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									Username: 
								</b></h4>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="uname" placeHolder="Enter your username" 
								onblur="checkifexists(value)"
								required>
							</div>
						</div>
						<br>
						<!--username already exists msg-->
						<div class="row">
							<div class="col-md-8 col-md-offset-1">
								<div  id="message"></div>
							</div>
						</div>
						<br>
						<!--password -->
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									password: 
								</b></h4>
							</div>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" 
								placeHolder="Enter a password" onkeyup="check_length();" required>
							</div>
							<div class="col-md-3">
								<h5><b>
									<p id="first"></p>
								</b></h5>
							</div>
						</div>
						<br>
						<!--password2 -->
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									Re-type password: 
								</b></h4>
							</div>
							<div class="col-md-6">
								<input type="password" class="form-control" name="cpassword" 
								placeHolder="Re-type the password" onkeyup="check_match();" required>
							</div>
							<div class="col-md-3">
								<h5><b>
									<p id="second"></p>
								</b></h5>
							</div>
						</div>
						<div class="row">
							<div id="pswd"></div>
						</div>
						<br>
						<!--Email -->
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									Email: 
								</b></h4>
							</div>
							<div class="col-md-6">
								<input type="email" class="form-control" name="eid" placeHolder="Enter your Email" required>
							</div>
						</div>
						<br>
						<!--Sex-->
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									Gender:
								</b></h4>
							</div>
							<div class="col-md-2">
								<h4>
									<input type="radio" name="gender" value="m" checked>
									Male
								</h4>
							</div>
							<div class="col-md-2">
								<h4>
									<input type="radio" name="gender" value="f">
									Female
								</h4>
							</div>
						</div>
						<br>
						<!--contact no-->
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									Contact No.: 
								</b></h4>
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control"name="contact" required>
							</div>
						</div>
						<br>
						<!--DOB -->
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									Date of Birth: 
								</b></h4>
							</div>
							<div class="col-md-6">
								<input type="date" class="form-control" size="25px" name="dob" required>
							</div>
						</div>
						<br>
						<hr>
						<!--security question-->
					<div class="div">	
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<h4><b>
									Please choose a security question. This question will be asked in case you ever forget
									your password
								</b></h4>
							</div>
						</div>
						<br>
						<!--security-->
						<div class="row">
							<div class="col-md-3 col-md-offset-1">
								<h4><b>
									Security Question: 
								</b></h4>
							</div>
							<div class="col-md-5">
								<select class="form-control" name="security" required>
	<?php							for($j=0;$j<$i;$j++)	{	?>
										<option value="<?php	echo $id[$j];	?>">
	<?php									echo $question[$j];		?>
										</option>
	<?php							}		?>
								</select>
							</div>
						</div>
						<br>
						<!--answer -->
						<div class="row">
							<div class="col-md-3 col-md-offset-1">
								<h4><b>
									Answer: 
								</b></h4>
							</div>
							<div class="col-md-5">
								<input type="text" class="form-control" name="ans" placeHolder="Enter your Answer" required>
							</div>
						</div>
						<br><br>
						<!--submit button-->
						<div class="row">
							<div class="col-md-2 col-md-offset-4">
								<input type="submit" id="submitbtn"
								disabled class="btn btn-primary btn-lg" value="Submit">
							</div>
							<div class="col-md-2">
								<a href="abc.php" id="backbtn" class="btn btn-default btn-lg">Back</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</body>

<script type="text/javascript">
	function check_match()	{
		var pswd = document.signupform.password.value;
		var pswd1 = document.signupform.cpassword.value;
		if(pswd1.length >= pswd.length && pswd.length!=0)	{
			if(pswd1 == pswd)	{
				document.getElementById("second").innerHTML = '<span class="glyphicon glyphicon-ok"></span>Passwords match!';
				document.getElementById("second").setAttribute('class','text-success');
				document.getElementById("submitbtn").removeAttribute('disabled');
			} else {
				document.getElementById("second").innerHTML = '<span class="glyphicon glyphicon-remove"></span>Passwords do not match!';
				document.getElementById("second").setAttribute('class','text-danger');
				document.getElementById("submitbtn").setAttribute("disabled", true);
			}
		} else {
				document.getElementById("second").innerHTML = "";
				document.getElementById("submitbtn").setAttribute("disabled", true);
		}
	}
	function check_length()	{
		var pswd = document.signupform.password.value;
		document.getElementById("second").innerHTML = "";
		document.getElementById("submitbtn").setAttribute("disabled", true);
		document.signupform.cpassword.value = "";
		var string, classes;
		if(pswd.length < 5 && pswd.length>0)	{
			string = "Strength: weak";
			classes = "danger";
			document.getElementById("submitbtn").setAttribute("disabled", true);
		}
		else if (pswd.length >= 5 && pswd.length < 10)	{
			string = "Strength: medium";
			classes = "primary";
		}
		else if (pswd.length >= 10)	{
			string = "Strength: strong";
			classes = "success";
		}
		else 
			string = "";
		
		document.getElementById("first").innerHTML = string;
		document.getElementById("first").setAttribute('class','text-' + classes);
	}
	function checkifexists(username)	{
		if(window.XMLHttpRequest)	{
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}
		
		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)	{
				document.getElementById('message').innerHTML = xmlhttp.responseText;
			}
		}
		
		xmlhttp.open('GET', 'checkusername.php?username=' + username, true);
		xmlhttp.send();
	}
	
	/*document.getElementById("message").style.display = "none";*/
</script>
