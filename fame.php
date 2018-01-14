<?php

require 'required.php';
//require 'notifications.php';	


/*to take courseid and sem from l_id*/
$query = "select `Course_id`, `sem` from `student` where `L_id` = '$l_id'";
if($query_run = mysql_query($query)) 
{
	$courseid = mysql_result($query_run, 0, 'Course_id');
	$sem = mysql_result($query_run, 0, 'sem');
} 

$i = 0;	//count of subjects
if($courseid != 0)
{	
	/*to get subjects of that course*/
	$query = "select `Subj_id`, `subjName` from `subject` where `Course_id` = '$courseid' and `sem` = '$sem'";
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
}
	
//to get subjects from interests
$query = "select `interests`.`Subj_id`, `subject`.`subjName` from `interests` 
			join `subject` on `subject`.`Subj_id` = `interests`.`Subj_id`
			where `interests`.`L_id` = '$l_id'";
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

//to get Lid,position,score and subject id from toppers
$k=0;
for($j=0;$j<$i;$j++)
{
	$query = "SELECT `L_id`,`position`,`score`,`Subj_id` FROM `toppers` WHERE `Subj_id` = '$subject_id[$j]'";
	if($query_run = mysql_query($query)) 
	{
		if(mysql_num_rows($query_run))
		{
			while($array = mysql_fetch_assoc($query_run))
			{
				$toppers_Lid[$k] = $array['L_id'];
				$toppers_position[$k] = $array['position'];
				$toppers_score[$k] = $array['score'];
				$toppers_Subjid[$k] = $array['Subj_id'];
				$k++;				
			}
		}
	}
	else
	{
		echo mysql_error();
	}
}




//to get username from login 
$i=0;
for($j=0;$j<$k;$j++)
{
	$query = "select `name` from `login` WHERE `L_id` = '$toppers_Lid[$j]'";
	if($query_run = mysql_query($query))
	{
		while($array = mysql_fetch_assoc($query_run))
		{
			$uname[$i] = $array['name'];
			$i++;
		}
		
	}
	else
	{
		echo mysql_error();
	}
	
}

//to get subject name from subjects 
$i=0;
for($j=0;$j<$k;$j++)
{
	$query = "select `subjName` from `subject` WHERE `Subj_id` = '$toppers_Subjid[$j]'";
	if($query_run = mysql_query($query))
	{
		while($array = mysql_fetch_assoc($query_run))
		{
			$subjname[$i] = $array['subjName'];
			$i++;
		}
		
	}
	else
	{
		echo mysql_error();
	}
	
}


//display position,name,score and subjects of toppers

?>


<!--top scorers -->
			<div class="tab-content">
				<div class="tab-pane fade in active">
						<hr><center><i>
<?php					for($j=0;$j<$i;$j++) { 		?>
					<a href=""><FONT color="#DAA520"><?php echo "$toppers_position[$j]\t\t$uname[$j]\t\t$toppers_score[$j]\t\t$subjname[$j]\n<br/>";?>
					</font></a> <br/>
<?php				}?>
							</i></center>
				</div>			
			</div>