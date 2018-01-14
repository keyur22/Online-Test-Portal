<?php
require 'required.php';
include 'theme.php';

//`name`, `contactNo`, `dob`, `photo`, `email`, `securityQuestion`, `answer`, `gender`
/*to take name, contactno, dob and photo from login table*/
$query = "select `name`, `contactNo`, `dob`, `photo`, `email`, `securityQuestion`, `answer`, `gender`
 from `login` where `L_id` = '$l_id'";
if($query_run = mysql_query($query)) {
	$name = mysql_result($query_run, 0, 'name');
	$contact = mysql_result($query_run, 0, 'contactNo');
	$dob = mysql_result($query_run, 0, 'dob');
	$dob = date('Y-m-d',$dob);
	$photo = mysql_result($query_run, 0, 'photo');
	$email = mysql_result($query_run, 0, 'email');
	$security = mysql_result($query_run, 0, 'securityQuestion');
	$answer = mysql_result($query_run, 0, 'answer');
	$gender = mysql_result($query_run, 0, 'gender');
}

/*to take course_id, semester and college_id from student table*/
$query = "select `College_id`, `Course_id`, `sem`, `qualification` from `student` where `L_id` = '$l_id'";
if($query_run = mysql_query($query))	{
	if(mysql_num_rows($query_run)) {	//checking if query returns empty
		$course_id = mysql_result($query_run, 0, 'Course_id');
		$sem = mysql_result($query_run, 0, 'sem');
		$collegeid = mysql_result($query_run, 0, 'College_id');
		$qualification = mysql_result($query_run, 0,'qualification');
	}
}

/*taking security question*/
$query = "select `Security_id`, `question` from `securityquestion`";
$i = 0;
if($query_run = mysql_query($query))	{
	while($array = mysql_fetch_assoc($query_run))	{
		$security_id[$i] = $array['Security_id'];
		$security_question[$i] = $array['question'];
		$i++;
	}
	$security_c = count($security_id);
}

/*taking all courses*/
$query = "select `courseName`, `Course_id` from `courses` where courseName != 'independent'";
$k = 0;
if($query_run = mysql_query($query))	{
	while($array = mysql_fetch_assoc($query_run))	{
		$courses[$k] = $array['courseName'];
		$courses_id[$k] = $array['Course_id'];
		$k++;
	}
	$course_c = count($courses);
}

/*taking all college names*/
$query = "select `collegeName`, `College_id` from `college`";
$i = 0;
if($query_run = mysql_query($query))	{
	while($array = mysql_fetch_assoc($query_run))	{
		$colleges[$i] = $array['collegeName'];
		$colleges_id[$i] = $array['College_id'];
		$i++;
	}
	$college_c = count($colleges);
}

//messages
if(isset($_GET['message']))	{
	$message = $_GET['message'];
	if($message == 1)	{
		$string = "Please fill the details which are mandatory";
		$color = "danger";
	} else if ($message == 2) {
		$string = "Personal Details have been changed successfully!";
		$color = "success";
	}
}

//setting attributes
if(!empty($qualification))
	$value['q'] = 'value = "'.$qualification.'"';
else
	$value['q'] = 'placeHolder = "Not set"';
if(!empty($sem) && $sem != 0)
	$value['sem'] = 'value = "'.$sem.'"';
else
	$value['sem'] = 'placeHolder = "Not set"';
if(!empty($email))
	$value['email'] = 'value = "'.$email.'"';
else
	$value['email'] = 'placeHolder = "Not set"';
if($gender == 'm')	{
	$value['gender1'] = 'checked';
	$value['gender2'] = '';
}	else	{
	$value['gender2'] = 'checked';
	$value['gender1'] = '';
}
	


?>

<body>
	<br>
	<div class="row">
		<h1>
			<p class="text-center">Settings</p>
		</h1>
	</div><br>
<?php 	if(isset($string))	{		?>		
			<div class="alert alert-<?php echo $color;	?>" role="alert">
				<h4><p class="text-center">
					<?php echo $string;		?>
				</p></h4>
			</div>
<?php	}		?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">				
					<!--tabs-->					
					<ul class="nav nav-tabs nav-justified">
						<li role="presentation" class=""><a href="settings.php"><h3>General</h3></a></li>
						<li role="presentation" class="active"><a href="#"><h3>Personal</h3></a></li>
					</ul>
					<br><br>
					<!--photo change-->
					<div class="row">
						<div class="col-md-8 col-md-offset-1">	
							<h4>
								<b>You can change your profile photo by clicking the given button:</b>
							</h4>
						</div>
						<div class="col-md-1">
							<a href="uploadPhoto.php" class="btn btn-default">Change Photo</a>
						</div>
					</div><br>
					<form action="postpersonalSettings.php" method="POST">
						<h3>
							<!--Name*-->
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<b>Name: </b>
								</div>
								<div class="col-md-5">
									<input type="text" class="form-control" name="name" 
									value="<?php echo $name;	?>" required>
								</div>
							</div><br>
							<!--DOB*-->
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<b>Date of Birth: </b>
								</div>
								<div class="col-md-5">
									<input type="date" class="form-control" name="dob" 
									value="<?php echo $dob;	?>" required>
								</div>
							</div><br>
							<!--Contact No.*-->
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<b>Contact No.: </b>
								</div>
								<div class="col-md-5">
									<input type="number" class="form-control" name="contact" 
									value="<?php echo $contact;	?>" max="9999999999" required>
								</div>
							</div><br>
							<!--gender-->
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<b>Gender:	</b>
								</div>
								<div class="col-md-2">
									<h4>
										<input type="radio" name="gender" value="m"
										<?php	echo $value['gender1'];	?>	>
										male
									</h4>
								</div>
								<div class="col-md-2">
									<h4>
										<input type="radio" name="gender" value="f"
										<?php	echo $value['gender2'];	?>	>
										female
									</h4>
								</div>
							</div>
							<br>
							<!--email-->
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<b>Email Address: </b>
								</div>
								<div class="col-md-5">
									<input type="text" class="form-control" name="email" 
									<?php echo $value['email'];	?> required>
								</div>
							</div><br>
							<!--College-->
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<b>College: </b>
								</div>
								<div class="col-md-5">
									<select class="form-control" name="college">
<?php									if(isset($collegeid) && ($collegeid != 0))		?>
											<option selected disabled>Choose college</option>
<?php									for($j=0;$j<$college_c;$j++)	{
											if(isset($collegeid) && ($collegeid != 0) && $colleges_id[$j] == $collegeid)	{
												$attribute = 'selected';
											} else {
												$attribute = '';
											}		?>
											<option <?php echo $attribute;	?>
												value="<?php echo $colleges_id[$j];	?>">
<?php											echo $colleges[$j];		?>
											</option>
<?php									}		?>
									</select>
								</div>
							</div><br>
							<!--Course-->
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<b>Course: </b>
								</div>
								<div class="col-md-5">
									<select class="form-control" name="course">
<?php									if(isset($course_id) && $course_id != 0)	?>
											<option disabled selected>Choose course</option>
<?php										for($j=0;$j<$course_c;$j++)	{	
												if(isset($course_id) && $course_id != 0 && $courses_id[$j] == $course_id)	{
													$attribute = 'selected';
												} else {
													$attribute = '';
												}	?>		
												<option <?php echo $attribute;	?>
												value="<?php echo $courses_id[$j];	?>">
	<?php											echo $courses[$j];		?>
												</option>
	<?php									}		?>
									</select>
								</div>
							</div><br>
							<!--Semester-->
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<b>Semester: </b>
								</div>
								<div class="col-md-5">
									<input type="number" class="form-control" name="sem" min="1" max="8"
									<?php echo $value['sem'];	?>>
								</div>
							</div><br>
							<!--Qualification-->
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<b>Qualification: </b>
								</div>
								<div class="col-md-5">
									<input type="text" class="form-control" name="qualification" 
									<?php echo $value['q'];	?>>
								</div>
							</div><br>
							<!--security-->
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<b>Security Question: </b>
								</div>
								<div class="col-md-5">
									<select class="form-control" name="security">
<?php									for($j=0;$j<$security_c;$j++)	{	
											if($security == $security_id[$j])
												$attribute = 'selected';
											else
												$attribute = '';		?>
												<option value="<?php echo $security_id[$j];	?>"
												<?php echo $attribute;	?>>
	<?php											echo $security_question[$j];		?>
												</option>
<?php									}	?>
									</select>
								</div>
							</div><br>
							<!--answer-->
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<b>Answer: </b>
								</div>
								<div class="col-md-5">
									<input type="text" class="form-control" name="answer" 
									value="<?php echo $answer;	?>" required>
								</div>
							</div><br>
						</h3><br>

						<!--submit button-->
						<div class="row">
							<div class="col-md-2 col-md-offset-8">
								<input type="submit" class="btn btn-primary btn-lg" value="Save" name="save">
							</div>
							<div class="col-md-1">
								<a href="home.php" class="btn btn-default btn-lg">
									Back
								</a>
							</div>
						</div><br>
					</form>	
				</div>
			</div>
		</div>
	</div>
</body>