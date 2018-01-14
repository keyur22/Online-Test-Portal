<?php

require 'required.php';
include 'theme.php';

//to take courseid and sem from student
$query = "select `Course_id`, `sem` from `student` where `L_id` = '$l_id'";
if($query_run = mysql_query($query)) 
{
	$courseid = mysql_result($query_run, 0, 'Course_id');
	$sem = mysql_result($query_run, 0, 'sem');
} else echo mysql_error();

$i = 0;	//count of subjects
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

//to get subjects from interests
$query = "select i.Subj_id, s.subjName from interests i 
			join subject s on s.Subj_id = i.Subj_id
			join subj_course_mapping sc on sc.Subj_id = i.Subj_id
			where i.L_id = '$l_id' AND sc.Course_id != '4' ";
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
}
else
{
	echo mysql_error();
}


//to get papers from universitypapers
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
		}
		else $count[$j] = 0;
	}
	else
	{
		echo mysql_error();
	}
}

/*for($j=0;$j<$k;$j++)
{
	echo "$upapers_Subjid[$j]<br/>";
	
}
*/
?>


<br><br>
<div class="row">
	<h2><p class="text-center">
		University Papers
	</p></h2>
</div><br>


<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h4><table class="table table-striped">
			<tr>
				<th>Subject</th>
				<th>
					<center>Papers</center>
				</th>
			</tr>
<?php			for($j=0;$j<$i;$j++ ) {//loop for subjects ?>
			<tr>
				<td>
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
			</table>
	</div>
</div>
<br><br>
<div class="row">
	<div class="col-md-5 col-md-offset-7">
		<h4>
			Need papers of other subjects???
			<b><u>
				<a href="university2.php">
					Click Here
				</a>
			</b></u>
		</h4>
	</div>
</div>	