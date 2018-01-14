<?php


require 'required.php';
require 'theme.php';

if(isset($_POST['cname']) && isset($_POST['cdesc']) && isset($_POST['semno']))
{
	$cname = $_POST['cname'];
	$cdesc = $_POST['cdesc'];
	$semno = $_POST['semno'];
	$_SESSION['semno'] = $semno;
	
	$query = "INSERT INTO `courses` VALUES (NULL,'$cname','$semno','$cdesc') ";
	if($query_run = mysql_query($query))
	{
		$courseid = get_field('courses', 'Course_id', 'courseName', $cname);
		$_SESSION['courseid'] = $courseid;
	}
	else
	{
		echo mysql_error();
	}
	
}

?>



<div class="row">
	<h2><p class="text-center">
		Admin Page For Inserting Subjects For Respective Course<br><center>STEP 2</center>
	</p></h2>
</div><br><br>



<form action="admins3.php" method="POST">

	<div class= "row">
	
	<?php	for($i=0;$i<$semno;$i++){		?>
	<div class="row">
		<div class="col-md-4 col-md-offset-1 ">
			<h4><b>
				Number of subjects in sem  <?php echo $i+3;?>:
			</b></h4>
		</div>
	
		<div class="col-md-6">
			<input type="number" min="0" name="subjno[]" placeHolder="No. of subjects" required>
		</div>
	</div>	
	<?php	}											?>	
	</div>
	
	<div class="row">
		<div class="col-md-2 col-md-offset-8">
			<input type="submit" id="submitbtn" class="btn btn-primary btn-lg" value="Submit">
			</div>
							
	</div>	

</form>