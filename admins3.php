<?php

require 'required.php';
require 'theme.php';


if(isset($_POST['subjno']))
{
	$subjno = $_POST['subjno'];
	$_SESSION['subjno'] = $subjno;
	$semno = $_SESSION['semno'];
}

$i = 0;
$query = "SELECT `Subj_id`,`subjName` FROM `subject` order by subjName";
if($query_run = mysql_query($query))
{
	while($array = mysql_fetch_assoc($query_run))
	{
		$subjid[$i] = $array['Subj_id'];
		$subjname[$i] = $array['subjName'];
		$i++;
	}
}
else
{
	echo mysql_error();
}


?>

		<div class="row">
			<h2><p class="text-center">Following is the list of all subjects of all the courses.<br><br>Please Put respective Subject id in your
			respective semesters</p></h2>
		</div><br>

			<h4><b>
<?php			for($j=0;$j<$i;$j++)	{	?>
					<div class="row">
						<div class="col-md-1 col-md-offset-1">
							<?php echo $subjid[$j]; ?>
						</div>
		
						<div class="col-md-6 col-md-offset-2">
<?php						echo $subjname[$j];		?>								
						</div>
						
						
					</div><br>
<?php			}			?>
			</b></h4>
			<br><br>
			
			
<form action="admins4.php" method="POST">
			
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h4><table class="table table-striped">
						<tr>
							<th>SEM NO.</th>
							<th>
								<center>SUBJECT ID</center>
							</th>
						
						</tr>
<?php			for($j=0;$j<$semno;$j++ ) {//loop for semno ?>
			<tr>
				<td>
<?php				echo $j+3;	?>
				</td>

				
				<td>
							
	<?php				for($k=0;$k<$subjno[$j];$k++){  //loop for subject ids of that sem ?>
							<div class="col-md-3">
								
							<input type="number" min="0" name="subjid[]" placeHolder="No. of subjects" required>
								
							</div>
						<?php				}?>	
						

				</td>
				
			</tr>
<?php 			}				?>
						
						
						
						</table>
				</div>
			</div>
			
			<div class="row">
		<div class="col-md-2 col-md-offset-8">
			<input type="submit" id="submitbtn" class="btn btn-primary btn-lg" value="Submit">
			</div><br><br>
							
	</div>	
			
	
			
</form>
			
			
		
		



