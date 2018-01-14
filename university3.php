<?php
require 'required.php';

if(isset($_GET['courseid']) && isset($_GET['sem']))	
{
	$courseid = $_GET['courseid'];
	$sem = $_GET['sem'];

$i = 0;
//count of subjects
if($courseid != 0)	
{	
	/*to get subjects of that course*/
	$query = "select sc.Subj_id, s.subjName from subject s
				join subj_course_mapping sc on s.Subj_id = sc.Subj_id
				where sc.Course_id = '$courseid' and sc.sem = '$sem'";
	if($query_run = mysql_query($query)) 
	{
		if(mysql_num_rows($query_run))
		{	
			
			while($array = mysql_fetch_assoc($query_run))	
			{
				$subject_id[$i] = $array['Subj_id'];
				$subject_name[$i] = $array['subjName'];
				$i++;
			}
		}
	} else echo mysql_error();
}


$z=0;
//getting papers from universitypapers
for($j=0;$j<$i;$j++)
{
	$query = "SELECT `year`,`month`,`pname`,`Subj_id` FROM `universitypapers` WHERE `Subj_id` = '$subject_id[$j]'";
	if($query_run = mysql_query($query)) 
	{
		if(mysql_num_rows($query_run))
		{
			$k = 0;
			while($array = mysql_fetch_assoc($query_run))
			{
				$upapers[$j][$k]['year'] = $array['year'];
				$upapers[$j][$k]['month'] = $array['month'];
				$upapers[$j][$k]['pname'] = $array['pname'];
				$upapers[$j][$k]['Subj_id'] = $array['Subj_id'];
				$k++;				
			}						
			$count[$j]=count($upapers[$j]);// storing no of papers of each subject
			$z++;
		}
		else 
		{
			
		    $count[$j] = 0;
			
		
		}
	}
	else
	{
		echo mysql_error();
	}
}
}

?>


<?php if($i ==0)   	{ ?>
<br><br>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="alert alert-danger ">
		<h4><p class="text-center">
	
<?php		echo "No subjects available for your selection. Please Try different selection. ";	?>
		</p></h4>
		</div>
	</div>
</div>

<?php } else if($i!=0 && $z==0 )   	{ ?>
<br><br>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="alert alert-danger ">
		<h4><p class="text-center">
	
<?php		echo "Unfortunately no papers are currently available for all the subjects of your selected stream. Please try again after few days.  ";	?>
		</p></h4>
		</div>
	</div>
</div>


<?php	}else {              ?>

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h4><table class="table table-striped">			
			<thead>
			<tr>
				<th>Subject</th>
				<th><center>Papers</center></th>
			</tr>
			</thead>
			<tbody>
<?php		for($j=0;$j<$i;$j++ ) {		//loop for subjects ?>
			<tr>
				<td class="col-md-3">
<?php				echo $subject_name[$j];	?>
				</td>
				
				
				<td>
<?php				if($count[$j] != 0)     {	//validation for no papers available 			?>				
	<?php				for($k=0;$k<$count[$j];$k++){  //loop for papers of that subject  ?>
							<div class="col-md-3">
								<a href="<?php echo $universitypapers.$upapers[$j][$k]['pname'].".pdf";?>">
	<?php							echo $upapers[$j][$k]['month']?>&nbsp<?php echo $upapers[$j][$k]['year']		?>						
								</a>
							</div>
						<?php				}?>	
						
<?php				}		 else  {	?>
						<center>
							No papers are available
						</center>
<?php				}		?>
				</td>
				</tr>
<?php 			}				?>
			</tbody>
			</table>
	


</div>
</div>


<br><br>

<?php    }      ?>