<?php

require 'required.php';
require 'theme.php';

?>

<div class="row">
	<h2><p class="text-center">
		Admin Page For Inserting Subjects For Respective Course<br><br><center>STEP 1</center>
	</p></h2>
</div><br><br><br>

<form action="admins2.php" method="POST">

	<div class= "row">

			<div class="col-md-8 ">

				<div class="row">
					<div class="col-md-2 ">
						<h4><b>
							Course Name: 
						</b></h4>
					</div>
	
					<div class="col-md-6">
						<input type="text" class="form-control" name="cname" placeHolder="Enter your course" required>
					</div>

				</div><br>

				<div class="row">
					<div class="col-md-2 ">
						<h4><b>
							Course Description: 
						</b></h4>
					</div>
	
					<div class="col-md-6">
						<textarea name="cdesc" rows="8" type="text" cols="67" placeholder ="  Enter the description"  required></textarea>
					</div>

				</div>

			</div>

			<div class="col-md-4 ">
				<div class="row">
					<div class="col-md-6">
						<h4><b>
							Number of semesters in that course:
						</b></h4>
					</div><br>

				</div>

				<div class="row">
	
					<div class="col-md-3">
						<input type="number" min="0" name="semno" placeHolder="No. of sems" required>
					</div>
				</div>

			</div>
			
	</div><br><br>
	
	<div class="row">
		<div class="col-md-2 col-md-offset-8">
			<input type="submit" id="submitbtn" class="btn btn-primary btn-lg" value="Submit">
			</div>
							
	</div>						
</form>	