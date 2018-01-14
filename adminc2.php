<?php

require 'required.php';
require 'theme.php';

if(isset($_POST['subjname']) && isset($_POST['subjdesc']) && isset($_POST['subjabb']) && isset($_POST['cno']))	
{
	
	
	$subjname = $_POST['subjname'];
	$subjdesc = $_POST['subjdesc'];
	$subjabb = $_POST['subjabb'];
	$cno = $_POST['cno'];
	
	
	if(!empty($subjname) && !empty($subjdesc) && !empty($subjabb) && !empty($cno))
	{
		$query = 'INSERT INTO subject VALUES (NULL, \''.$subjname.'\', \''.$subjdesc.'\', \''.$subjabb.'\')';
		if($query_run = mysql_query($query))
		{
			$subjid = get_field('subject', 'Subj_id', 'subjName', $subjname);
			$_SESSION['subjid'] = $subjid;
			$_SESSION['cno'] = $cno;
			
		}
		else
		{
			echo '1'.mysql_error();
		}
		
		
	}
	else
	{
		echo 'ALL fields are required';
	}
	
	
}




?>	
	
	<div class="row">
	<h2><p class="text-center">
		Admin Page For Inserting Chapters For Respective Subject 
	</p></h2>
	</div><br><br>
	
<form action="adminc3.php?a=1&b=2" method="POST">	
	
	<div class="row">
			<div class="col-md-4 col-md-offset-10"><h3>Mark if Common</h3></div>
	</div><br>

	
	<div class="row">
	
	<?php	for($i=0;$i<$cno;$i++)  {									?>	
			<div class="col-md-4">			
				<div class="row">
					<div class="col-md-2">
						<h4><b>
							Chapter Name: 
						</b></h4>
					</div>
					<div class="col-md-9">
						<input type="text" class="form-control" name="cname[]" placeHolder="Chapter Name" required>
					</div>
				</div>
				
				
			
			</div>
		
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-2">
						<h4><b>
							Chapter description: 
						</b></h4>
					</div>
					<div class="col-md-4">
						<textarea name="cdesc[]" rows="6" type="text" cols="60" placeholder ="Enter the description"  required></textarea>
					</div>
				</div>
		
		
			</div>
			
			<div class="col-md-1">
				<div class="row">
					
						<input value="<?php	echo $i;	?>" type="checkbox" name="common[]" class="form-control">
					
				</div>	
			</div><br>
	<?php	}				?>
		
	</div><br>
	
	<div class="row">
		<div class="col-md-2 col-md-offset-8">
			<input type="submit" id="submitbtn" class="btn btn-primary btn-lg" value="Submit">
			</div>
							
	</div>	
</form>	
	
