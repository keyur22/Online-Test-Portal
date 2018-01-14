<?php

require 'required.php';
require 'theme.php';

?>


<body>


<div class="row">
	<h2><p class="text-center">
		Admin Page For Inserting Chapters For Respective Subject 
	</p></h2>
</div><br><br>

<form action="adminc2.php" method="POST">

	<div class= "row">

			<div class="col-md-8 ">

				<div class="row">
					<div class="col-md-2 ">
						<h4><b>
							Subject Name: 
						</b></h4>
					</div>
	
					<div class="col-md-6">
						<input type="text" class="form-control" name="subjname" placeHolder="Enter your subject" required>
					</div>

				</div><br>

				<div class="row">
					<div class="col-md-2 ">
						<h4><b>
							Subject Description: 
						</b></h4>
					</div>
	
					<div class="col-md-6">
						<textarea name="subjdesc" rows="8" type="text" cols="67" placeholder ="  Enter the description"  required></textarea>
					</div>

				</div>

			</div>

			<div class="col-md-4 ">
				<div class="row">
					<div class="col-md-2">
						<h4><b>
							Abbreviation: 
						</b></h4>
					</div><br>

				</div>

				<div class="row">
	
					<div class="col-md-6">
						<input type="text" class="form-control" name="subjabb" placeHolder="abbreviation" required>
					</div>
				</div>

			</div>
			
	</div><br><br>
	
	<div class="row">
	
		<div class="col-md-6 ">
			<h4><b>
				Number of Chapters In that subject (Including All Semesters): 
			</b></h4>
		</div>
	
		<div class="col-md-2">
			<input type="number" name="cno" placeHolder="No. of chapters" required>
		</div>
	
	</div><br><br>
	
	
	<div class="row">
		<div class="col-md-2 col-md-offset-8">
			<input type="submit" id="submitbtn" class="btn btn-primary btn-lg" value="Submit">
			</div>
							
	</div>						
</form>	
	
	
	



</body>


