<?php

require 'required.php';

if(isset($_GET['type']) && isset($_GET['sort']))	{
	$sort_type = $_GET['sort'];
	$type = $_GET['type'];
	
	//segregating the extracted array
	switch($sort_type)	{
		case 1:
			//query to take all subjects
			$query = "select Subj_id, subjName from subject order by subjName";
			if($query_run = mysql_query($query))	{
				$subj_count = mysql_num_rows($query_run);
				if($subj_count)	{
					$current = '';
					$i = -1;	//count for alphabets
					$j = 0;	//count for subjects in each alphabet
					while($array = mysql_fetch_assoc($query_run))	{
						$subjName = strtoupper($array['subjName'][0]);	//converting to upper case
						if($subjName != $current)	{
							if($i!=-1)
								$subject[$i]['count'] = $j;
							$i++;
							$subject[$i]['head'] = $current = $subjName;
							$j = 0;
						} else	$j++;
						$subject[$i][$j]['name'] = $array['subjName'];
						$subject[$i][$j]['id'] = $array['Subj_id'];
					}
					$subject[$i]['count'] = $j;
					$alpha_cnt = $i;
				}
			} else echo mysql_error();
			break;
		case 2:
			$course_count = 0;	//count of total no.of courses
			//query to take subjects of sem 1 & 200%
			$query = 'select sc.sem, sc.Subj_id, s.subjName from subj_course_mapping sc
						join subject s on s.Subj_id = sc.Subj_id
						where sc.Course_id = 0 and (sc.sem = 1 or sc.sem = 2)
						order by sc.Course_id, sc.sem';
			$j = 0;	//sem
			$sem = 1;
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))	{
					while($array = mysql_fetch_assoc($query_run))	{
						if($array['sem'] != $sem)	{
							$common[$sem]['count'] = $j;
							$j=0;
							$sem = $array['sem'];
						}
						$common[$sem][$j]['id'] = $array['Subj_id']; 
						$common[$sem][$j]['name'] = $array['subjName'];
						$j++;
					}
					$common[$sem]['count'] = $j;
				}
			} else echo mysql_error();

			//query to take all subjects
			$query = 'select sc.Course_id, sc.sem, sc.Subj_id, s.subjName from subj_course_mapping sc
						join subject s on s.Subj_id = sc.Subj_id
						where sc.Course_id != 4
						order by sc.Course_id, sc.sem';
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))	{
					$i = -1;	//counter for courses
					$j = 0;	//counter for semesters
					$k = 0;	//counter for subjects
					$current_c = 0;	//current course
					$current_s = 0;	//current semester
					while($array = mysql_fetch_assoc($query_run))	{
						if($array['Course_id'] != $current_c)	{
							if($i != -1)	{
								$course[$i]['count'] = $j;
								$course[$i][$j]['count'] = $k;
							}
							$current_c = $array['Course_id'];
							$i++;
							$course[$i]['head'] = get_field('courses', 'courseName', 'Course_id', $array['Course_id']);
							$course[$i]['id'] = $array['Course_id'];
							$j = 0;	//initialising the counter for sem to zero
							$current_s = $course[$i][$j]['no'] = $array['sem'];	//storing the next sem
							$k = 0;	//initialising the counter for subjects to zero
						} else if($array['sem'] != $current_s)	{
							$course[$i][$j]['count'] = $k;
							$j++;
							$current_s = $course[$i][$j]['no'] = $array['sem'];
							$k = 0;	//initialising the counter for subjects to zero
						}
						$course[$i][$j][$k]['name'] = $array['subjName'];
						$course[$i][$j][$k]['id'] = $array['Subj_id'];
						$k++;
					}
					$course[$i]['count'] = $j;
					$course[$i][$j]['count'] = $k;
					$course_count += $i-1;
				}
			} else echo mysql_error();
			
			//query to take the subjects whose entry is not there in subj_course_mapping table
			$query = 'select s.Subj_id, s.subjName from subject s
					where not exists(select \'x\' from subj_course_mapping sc where sc.Subj_id = s.Subj_id)';
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))	{
					while($array = mysql_fetch_assoc($query_run))	{
						$course[$i][0][$k]['id'] = $array['Subj_id'];
						$course[$i][0][$k]['name'] = $array['subjName'];
						$k++;
					}
					$course[$i][0]['count'] += $k;
				}
			} else echo mysql_error();
			
			if($course[$i][0]['count'] != 0)
				$course_count++;
		break;
	}
	
	//pg type 
	switch($type)	{
		case 1: $page = 'subject.php';
		break;
		case 2: $page = 'g_pretest02.php';
		break;
	}
?>
<head>
	<style>
		body	{
			line-height: 200%;
		}
	</style>
</head>
<?php 
	switch($sort_type)	{
		case 1: 
			for($i=0;$i<=$alpha_cnt;$i++)	{	?>
				<!--group-->
				<div class="row">
					<div class="col-md-offset-1">
						<!--grp heading-->
						<div class="row">
							<h3><b>
<?php							echo $subject[$i]['head'];	?>
							</b></h3>
						</div>
						<div class="col-md-11 col-md-offset-1">
<?php						$subj_cnt = $subject[$i]['count'];	?>
							<!--items-->
							<div class="row">
<?php							for($j=0;$j<=$subj_cnt;$j++)	{	?>
									<div class="col-md-4"><h4>
<?php									$redirect = $page.'?subjid='.$subject[$i][$j]['id'];	?>
										<a href="<?php	echo $redirect;	?>">
<?php										echo $subject[$i][$j]['name'];	?>
										</a>
									</h4></div>
<?php							}	?>
							</div>
						</div>
					</div>
				</div>
<?php		}	
		break;	
		case 2:	?>
			<div class="row">
				<!--statement-->
				<div class="row">
					<h3><p class="text-center">
						The subjects for semesters 1 and 2 are same for all the branches
					</p></h3>
				</div>
				<!--subjects-->
				<div class="row">
					<div class="col-md-offset-1">
<?php					for($i=1;$i<=2;$i++)	{	?>
							<!--grp heading-->
							<div class="row">
								<h3><b>
<?php								echo 'Semester'.$i.':';	?>
								</b></h3>
							</div>
							<div class="col-md-offset-1">
								<div class="row">
<?php								$cnt = $common[$i]['count'];
									for($j=0;$j<$cnt;$j++)	{	
										$redirect = $page.'?subjid='.$common[$i][$j]['id'];	?>
										<div class="col-md-4"><h4>
											<a href="<?php	echo $redirect;	?>">
<?php										echo $common[$i][$j]['name'];	?>
											</a>
										</h4></div>
<?php								}	?>
								</div>
							</div>
<?php					}	?>
					</div>
				</div>
			</div><br>	
<?php		for($i=0;$i<=$course_count;$i++)	{	?>
				<!--group-->
				<div class="row">
					<div class="col-md-offset-1">
						<!--grp heading-->
						<div class="row">
							<h3><b><a href="course.php?courseid=<?php	echo $course[$i]['id'];	?>">
<?php								echo $course[$i]['head'];	?>
							</a></b></h3>
						</div>
						<!--sub group(if any)-->
						<div class="row">
							<div class="col-md-offset-1">
<?php							$sem_cnt = $course[$i]['count'];
								$course_id = $course[$i]['id'];
								for($j=0;$j<=$sem_cnt;$j++)	{
									if($course_id != 4)	{	?>
										<!--subgrp heading-->
										<div class="row">
											<h4><b>	
<?php											echo 'Semester '.$course[$i][$j]['no'];	?>
											</b></h4>
										</div>
<?php								}	?>
									<div class="col-md-11 col-md-offset-1">
										<!--items-->
										<div class="row">
<?php										$subj_cnt = $course[$i][$j]['count'];	
											for($k=0;$k<$subj_cnt;$k++)	{	?>
												<div class="col-md-4"><h4>
<?php												$redirect = $page.'?subjid='.$course[$i][$j][$k]['id'];
													if($type == 2)	$redirect .= '&courseid='.$course[$i]['id'];	?>
													<a href="<?php	echo $redirect;	?>">
<?php													echo $course[$i][$j][$k]['name'];	?>
													</a>
												</h4></div>
<?php										}	?>
										</div>
									</div>
<?php							}	?>
							</div>
						</div>
					</div>
				</div>
<?php		}	
		break;
	}
}
?>