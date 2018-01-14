<?php
require 'required.php';

$query = "SELECT * FROM `college`";
$i=0;
if($query_run = mysql_query($query))
{
	while($array_row = mysql_fetch_assoc($query_run))
	{
		$collid[$i] = $array_row['College_id'];
		$collname[$i] = $array_row['collegeName'];
		$i++;

	}
}
	$clg_cnt = count($collid);	//no.of elemtns in college

	$query = "SELECT * FROM `courses`";
	$i=0;
	if($query_run = mysql_query($query))
	{
		while($array_row = mysql_fetch_assoc($query_run))
		{
			$courseid[$i] = $array_row['Course_id'];
			$coursename[$i] = $array_row['courseName'];
			$i++;
		}
	}
	$course_cnt = count($courseid);	//no.of elemtns in course

?>
<html>

<body>
	<br><br>
	<div class="row">
		<div class="col-md-8 col-md-offset-2 panel panel-success">
			<h4><b><p class="text-center text-success">
				Your account has been successfully created! Fill the below details and you're done
			</p></b></h4>
		</div>
	</div>
	<br><br>
	<div class="row">
		<h1><p class="text-center">
			Details
		</p></h1>
	</div>
	<br><br>
	<div class="row">
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-body">
					<br>
					<form action="signup_specific.php" method="POST">
						<!--College -->
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									Choose College:
								</b></h4>
							</div>
							<div class="col-md-6">
								<select name="college" class="form-control">
<?php								for($j=0;$j<$clg_cnt;$j++)	{	?>
										<option value="<?php	echo $collid[$j];	?>">
											<?php	echo $collname[$j];		?>
										</option>
<?php								}		?>
								</select>
							</div>
						</div>
						<br>
						<!--course -->
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									Choose course:
								</b></h4>
							</div>
							<div class="col-md-6">
								<select name="course" class="form-control">
<?php								for($j=0;$j<$course_cnt;$j++)	{	?>
										<option value="<?php	echo $courseid[$j];	?>">
											<?php	echo $coursename[$j];		?>
										</option>
<?php								}		?>
								</select>
							</div>
						</div>
						<br>
						<!--Semester -->
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									Semester:
								</b></h4>
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" name="sem" max="8">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-2 col-md-offset-1">
								<h4><b>
									Qualification:
								</b></h4>
							</div>
							<div class="col-md-6">
								<input type="text" name="qualification" class="form-control">
							</div>
						</div>
						<br>
						<Br><br>
						<!--submit & back-->
						<div class="row">
							<div class="col-md-2 col-md-offset-8">
								<input type="submit" class="btn btn-lg">
							</div>
							<div class="col-md-1">
								<a class="btn btn-lg btn-primary" href="home.php">Skip</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-8 col-md-offset-2 panel panel-danger">
			<h4><b><p class="text-center text-danger">
				If you skip this step,you could also enter the above details in the <b><i>personal details</i></b> section of your settings.
			</p></b></h4>
		</div>
	</div>
	
</body>
