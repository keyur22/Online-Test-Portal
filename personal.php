<?php

require 'required.php';
include 'theme.php';

/*to take name, contactno, dob and photo from login table*/
$query = "select `name`, `contactNo`, `dob`, `email`, `gender`, `photo` from `login` where `L_id` = '$l_id'";
if($query_run = mysql_query($query)) {
	$name = mysql_result($query_run, 0, 'name');
	$contact = mysql_result($query_run, 0, 'contactNo');
	$dob = mysql_result($query_run, 0, 'dob');
	$photo = mysql_result($query_run, 0, 'photo');
	if(empty($photo))
		$photo = 'default-user.png';
	$gender = mysql_result($query_run, 0, 'gender');
	$email = mysql_result($query_run, 0, 'email');
}

/*to take course_id, semester and college_id from student table*/
$query = "select `courses`.`courseName`, `student`.`sem`, `college`.`collegeName`, `student`.`qualification` 
from `student` 
join `college` on `student`.`College_id` = `college`.`College_id`
join `courses` on `student`.`Course_id` = `courses`.`Course_id` 
where `L_id` = '$l_id'";
if($query_run = mysql_query($query))	{
	if(mysql_num_rows($query_run)) {	//checking if query returns empty
		$coursename = mysql_result($query_run, 0, 'courseName');
		$year = year(mysql_result($query_run, 0, 'sem'));
		$collegename = mysql_result($query_run, 0, 'collegeName');
		$qualification = mysql_result($query_run, 0,'qualification');
	}
}

//male or female
switch($gender)	{
	case 'm':	$gender = 'male';
		break;
	case 'f':	$gender = 'female';
		break;
}

?>

<body>
	<br>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1>
				Personal Details
			</h1>
		</div>
		<div class="col-md-3 col-md-offset-1">
			<a href="uploadphoto.php">
				<img src="<?php echo $image_folder.$photo; ?>" class="img img-rounded" width="200" height="200" title="Click on the picture to change it">
			</a>
		</div>
	</div><br><br>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<!--edit button-->
					<div class="row">
						<div class="col-md-2 col-md-offset-10">
							<a href="personalSettings.php" class="btn btn-default">
								<h4>
									<span class="glyphicon glyphicon-pencil"></span>
									Edit
								</h4>
							</a>
						</div>
					</div>
					<h3>
						<!--Name-->
						<div class="row">
							<div class="col-md-4">
								<b>Name: </b>
							</div>
							<div class="col-md-6">
<?php							echo $name;		?>
							</div>
						</div><br>
						<!--DOB-->
						<div class="row">
							<div class="col-md-4">
								<b>Date of Birth: </b>
							</div>
							<div class="col-md-5">
<?php							echo date('dS M, Y',$dob);		?>
							</div>
						</div><br>
						<!--gender-->
						<div class="row">
							<div class="col-md-4">
								<b>Gender: </b>
							</div>
							<div class="col-md-5">
<?php							echo $gender;		?>
							</div>
						</div><br>
						<!--E-mail-->
						<div class="row">
							<div class="col-md-4">
								<b>E-mail Address: </b>
							</div>
							<div class="col-md-6">
<?php							echo $email;		?>
							</div>
						</div><br>
						<!--Contact No.-->
						<div class="row">
							<div class="col-md-4">
								<b>Contact Number: </b>
							</div>
							<div class="col-md-5">
<?php							echo $contact;		?>
							</div>
						</div><br>
<?php					if(isset($collegename))	{		?>
							<!--College-->
							<div class="row">
								<div class="col-md-4">
									<b>College Name: </b>
								</div>
								<div class="col-md-5">
<?php								echo $collegename;		?>
								</div>
							</div><br>
<?php					}		?>
<?php					if(isset($coursename))	{	?>
							<!--Course-->
							<div class="row">
								<div class="col-md-4">
									<b>Course: </b>
								</div>
								<div class="col-md-5">
	<?php							echo $coursename;		?>
								</div>
							</div><br>
							<!--Year-->
							<div class="row">
								<div class="col-md-4">
									<b>Year: </b>
								</div>
								<div class="col-md-5">
	<?php							echo $year;		?>
								</div>
							</div><br>
<?php					}		
						if(!empty($qualification))	{		?>
							<!--qualification-->
							<div class="row">
								<div class="col-md-4">
									<b>Qualification: </b>
								</div>
								<div class="col-md-5">
	<?php							echo $qualification;		?>
								</div>
							</div>
<?php					}		?>
					</h3>
				</div>
			</div>
		</div>
	</div>
</body>