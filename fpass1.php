<?php

require 'required.php';


?>
<body>

<div class="row">
		<h1><p class="text-center">
			Forgot Password ? No Worries
		</p></h1>
</div>
<br><br><div class="container">
			<div class="panel panel-default">
				<div class="panel-body">
					<br>
					<form name="signupform" action="fpass2.php" method="POST">
			<div class="row">
				<h1><p class="text-center">
						STEP 1 OF 2
				</p></h1>
			</div><br><br>
	<!--username -->
	<div class="row">
		<div class="col-md-2 col-md-offset-1">
			<h4><b>
			Username: 
			</b></h4>
		</div>
		<div class="col-md-6">
			<input type="text" class="form-control" name="uname" placeHolder="enter your username" required>
		</div>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-md-2 col-md-offset-1">
			<h4><b>
				Date of Birth: 
			</b></h4>
		</div>
		<div class="col-md-6">
			<input type="date" class="form-control" name="dob" required>
		</div>
	</div>
	<br>
	
	<!--submit button-->
	<div class="row"><center>
		<div class="col-md-2 col-md-offset-3">
			<a href="abc.php" class="btn btn-primary btn-lg">Back</a>
		</div>
	
		<div class="col-md-2 col-md-offset-1">
			<input type="submit" id="submitbtn"
		 class="btn btn-success btn-lg" value="Proceed">
		</div></center>
	</div>
	</div>
	</div>
	
	
