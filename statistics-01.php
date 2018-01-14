<?php

require 'required.php';
include 'theme.php';

/****Queries****/
/*taking course and sem from student*/
$query = "select `Course_id`, `sem` from `student` where `L_id` = '$l_id'";
if($query_run = mysql_query($query))	{
	$courseid = mysql_result($query_run, 0, 'Course_id');
	$sem = mysql_result($query_run, 0, 'sem');
}

$markforeachquestion = 2;
$subj_cnt = 0;

//taking subjects of which papers are available
$query = 'select s.Subj_id, s.subjName, sum(pa.correctChoices) as correct_sum, sum(p.totalMarks) as total_sum
			from papersappeared pa
			join paper p on pa.Paper_id = p.Paper_id
			join subject s on p.Subj_id = s.Subj_id
			where pa.L_id = '.$l_id.'
			group by p.Subj_id';
$i = 0;
if($query_run = mysql_query($query))	{
	$pprsubj_cnt = mysql_num_rows($query_run);
	if($pprsubj_cnt)	{
		while($array = mysql_fetch_assoc($query_run))	{
			$subject[$i]['name'] = $array['subjName'];
			$subject[$i]['id'] = $array['Subj_id'];
			$subject[$i]['percent'] = round((($markforeachquestion*$array['correct_sum'])/$array['total_sum'])*100);
			$i++;
		}
	}
} else echo mysql_error();

//taking other subjects of the course
if($sem == 1 || $sem == 2)
	$qcourse = 0;
else $qcourse = $courseid;

$query = 'select s.subjName, sc.Subj_id from subj_course_mapping sc
			join subject s on s.Subj_id = sc.Subj_id
			where sc.Course_id = '.$qcourse.' and sc.sem = '.$sem;
for($j=0;$j<$pprsubj_cnt;$j++)
	$query .= ' and sc.Subj_id != '.$subject[$j]['id'];

if($query_run = mysql_query($query))	{
	$oth_subj = mysql_num_rows($query_run);
	if($oth_subj != 0)	{
		while($array = mysql_fetch_assoc($query_run))	{
			$subject[$i]['name'] = $array['subjName'];
			$subject[$i]['id'] = $array['Subj_id'];
			$subject[$i]['percent'] = '0';
			$i++;
		}
	}
} else echo mysql_error();

//taking other interests
$query = 'select s.subjName, i.Subj_id from interests i
			join subject s on s.Subj_id = i.Subj_id
			where L_id = '.$l_id;
for($j=0;$j<$pprsubj_cnt;$j++)
	$query .= ' and i.Subj_id != '.$subject[$j]['id'];

if($query_run = mysql_query($query))	{
	if(mysql_num_rows($query_run))	{
		while($array = mysql_fetch_assoc($query_run))	{
			$subject[$i]['name'] = $array['subjName'];
			$subject[$i]['id'] = $array['Subj_id'];
			$subject[$i]['percent'] = '0';
			$i++;
		}
	}
} else echo mysql_error();
$subj_cnt += $i;

/*printing
foreach($subject as $s)	{
	echo $s['name'].'-'.$s['percent'].'<br>';
}*/



/* old code
//query to take marks
$query = "select p.Subj_id, p.totalMarks, pa.correctChoices from papersappeared pa
			join paper p on pa.Paper_id = p.Paper_id
			where pa.L_id = '$l_id'
			order by p.`Subj_id`";
$i = 0;
if($query_run = mysql_query($query))	{
	$paper_cnt = mysql_num_rows($query_run);//count of papers
	if($paper_cnt)	{
		while($array = mysql_fetch_assoc($query_run))	{
			$paper[$i]['subjid'] = $array['Subj_id'];
			$paper[$i]['total'] = $array['totalMarks'];
			$paper[$i]['correct'] = $array['correctChoices'];
			$i++;
		}
	}
	else { $paper_cnt =0;}
} else echo mysql_error();



	$i = 0;

	//adding subjects of course to subjects array
	if(($courseid != 0) && ($sem != 0))	{
		$query_subjects = "select Subj_id from subj_course_mapping 
		where Course_id = '$courseid' and sem = '$sem'
		order by Subj_id";
		if($query_run_subject = mysql_query($query_subjects))	{
			$crs_subj_cnt = mysql_num_rows($query_run_subject);
			
			while($array = mysql_fetch_assoc($query_run_subject))	{
				$subj_c[$i] = $array['Subj_id'];
				$i++;
			}
		} else echo mysql_error();
	}

	//query to take current interests
	$query = "select `subject`.`subjName`, `subject`.`Subj_id` from `subject` 
			join `interests` on `subject`.`Subj_id` = `interests`.`Subj_id`
			where `L_id` = '$l_id'
			order by `subject`.`Subj_id`";
	$i = 0;
	if($query_run = mysql_query($query))	{
		while($array = mysql_fetch_assoc($query_run))	{
			$subj_i[$i] = $array['Subj_id'];
			$i++;
		}
		$interest_cnt = $i;	//no.of elements in bigger array
	}

	if(!empty($crs_subj_cnt) && !empty($interest_cnt))	{
		//merging course and interest subjects
		$subj = merge($subj_c, $crs_subj_cnt, $subj_i, $interest_cnt, 'a');
		$subj_cnt = count($subj);
	} else if(!empty($crs_subj_cnt))	{
		$subj = $subj_c;
		$subj_cnt = $crs_subj_cnt;
	} else if (!empty($interest_cnt))	{
		$subj = $subj_i;
		$subj_cnt = $interest_cnt;
	} else $subj_cnt = 0;
	

	if(!empty($subj_cnt) && !empty($paper_cnt))	{ 
		//taking names of subjects
		echo $subj_cnt;
		for($i=0;$i<$subj_cnt;$i++)
			$subj_n[$i] = get_field('subject', 'subjName', 'Subj_id', $subj[$i]);
		echo 'ok';
		// Queries Over    


		$subject[0]['count'] = 1;
		$subject[0]['subjid'] = $paper[0]['subjid'];
		$subject[0]['correct'] = $paper[0]['correct'];
		$subject[0]['total'] = $paper[0]['total'];
		$j=0;

		//maintaining the properties of each subjid
		for($i=0;$i<$paper_cnt-1;$i++)	{
			if($paper[$i]['subjid'] == $paper[$i+1]['subjid'])	{
				$subject[$j]['count']++;
				$subject[$j]['correct'] += $paper[$i+1]['correct'];
				$subject[$j]['total'] += $paper[$i+1]['total'];
			} else	{
				$j++;
				$subject[$j]['count'] = 1;
				$subject[$j]['subjid'] = $paper[$i+1]['subjid'];
				$subject[$j]['correct'] = $paper[$i+1]['correct'];
				$subject[$j]['total'] = $paper[$i+1]['total'];
			}
		}
		$count_subject = count($subject);


		//calculating percent of each subject
		for($i=0;$i<$count_subject;$i++)	{
			$subject[$i]['percent'] = round(($subject[$i]['correct']/$subject[$i]['total'])*100);
		}

		//comparing array containing subjects and their percentage with the array containing all subjects
		//bigger array:	subj
		//smaller array:	subject
		$k = 0;		//count of smaller array
		for($i=0;$i<$subj_cnt;$i++)	{
			if($k < $count_subject && $subject[$k]['subjid'] == $subj[$i])	{
				$subj_p[$i] = $subject[$k]['percent'];
				$k++;
			}	else
				$subj_p[$i] = 0;
		}

	} else {
		$count_subject = 0;
		}
*/
		//coloring system
		$colors = array('', 'warning', 'success', 'info', 'danger');
?>

<html>
	<head>
		<style>

			.content{
			 text-align: center;
			 padding:50px;
			}	
			.t{
			 font: 80px TIMES NEW ROMAN, sans-    serif;

			 text-shadow: 2px 2px #FF0000;
			 text-align: center;
			 text-align: center;
			 background-color: #f2f2f2;
			 color: orange;

			}


			.progress {
				position: relative;
				height: 60px;
				
			}
			.progress > .progress-type {
				position: absolute;
				left: 10px;
				font-weight: 800;
				padding: 25px 30px 2px 10px;
				color: rgb(255, 255, 255);
				
					font-size:25px;      
			}
			.progress > .progress-completed {
				position: absolute;
				right: 10px;
				font-weight: 800;
				padding: 15px 10px 2px 10px;
					font-size:25px;
			}
		</style>
	</head>
	<body>
	  <div class="t">
	   Statistics <img src="statistics.png"  height="100" width="100">
	  </div>
	  <br><br>
<?php
	if($pprsubj_cnt != 0)	{	?>
	<div class="container">
		<div class="row">                   
	<?php	for($i=0;$i<$subj_cnt;$i++)	{	?>
				<div class="col-md-4">
					<h4>
<?php					echo $subject[$i]['name'];	?>
					</h4>
				</div>
				<div class="col-md-8">
<?php				if($subject[$i]['percent'] != 0)	{		?>
						<a href="statistics-02.php?subjid=<?php	echo $subject[$i]['id']	?>">
							<div class="progress">
								<div class="progress-bar progress-bar-<?php echo $colors[$i%5];	?>" 
									role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" 
									style="width: <?php echo $subject[$i]['percent'];	?>%;">
									<span class="sr-only"><?php echo $subject[$i]['percent'];	?>% Complete</span>
								</div>
									<!--<span class="progress-type">
									</span>-->
									<span class="progress-completed">
										<?php echo $subject[$i]['percent'].'%';	?>
									</span>
									<span class="progress-type"><font color ="orange">
									</font></span>
							</div>
						</a>
<?php				} else	{  ?><h4>
<?php					echo 'No Test Given Or Yet To score in this subject';   			?>
						</h4><br>
<?php				}	?>
				</div>
<?php		}	?>
		</div>
	</div>  
			
<?php   
	} else if ($subj_cnt == 0) { ?>
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
<?php	
	} else if ($pprsubj_cnt == 0) {	?>
		<br><br>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="alert alert-danger ">
				<h4><p class="text-center">
<?php				echo "Unfortunately no tests are given for any of the subjects of your selected stream ";	?>
				</p></h4>
				</div>
			</div>
		</div>	
<?php	
	} ?>		

</body>
</html>