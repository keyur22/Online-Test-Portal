<?php

require 'required.php';
include 'theme.php';

if(isset($_GET['subjid']) && !empty($_GET['subjid']))	{
	$subj = $_GET['subjid'];
	
	//taking subject details
	$query = "select `subjName`, `description` from `subject` where `Subj_id` = '$subj'";
	if($query_run = mysql_query($query))	{
		if(mysql_num_rows($query_run))	{
			$name = mysql_result($query_run, 0, 'subjName');
			$info = mysql_result($query_run, 0, 'description');
		} else echo '<script> window.location.href="home.php";	</script>';
	} else die('1'.mysql_error());
	
	//taking the courses in which this subject is present
	$query = "select c.Course_id, sc.sem, c.courseName from subj_course_mapping sc 
				join courses c on (sc.Course_id != 4 and c.Course_id = sc.Course_id and sc.Subj_id = '$subj')";
	$i = 0; //count of courses
	if($query_run = mysql_query($query))	{
		$crs_cnt = mysql_num_rows($query_run);
		if($crs_cnt)	{
			while($array = mysql_fetch_assoc($query_run))	{
				$course[$i]['id'] = $array['Course_id'];
				$course[$i]['name'] = $array['courseName'];
				$course[$i]['sem'] = $array['sem'];
				$i++;
			}
		}
	} else echo mysql_error();
	
	//checking if this subject belongs to sem 1 or 2
	$query = 'select sem from subj_course_mapping where Subj_id = '.$subj.' and Course_id = 0';
	$common = false;
	if($query_run = mysql_query($query))	{
		if(mysql_num_rows($query_run))	{
			$common = true;
			$sem = mysql_result($query_run, 0, 'sem');
		}
	} else echo mysql_error();
	
	//taking chapters of the subject for each of the found courses
	$total_chp = 0;	//count of total no.of chapters
	if($crs_cnt && !$common)	{
		for($i=0;$i<$crs_cnt;$i++)	{
			$query = 'select c.chapterName, cs.Chp_id from chp_subj_mapping cs
						join chapter c on c.Chp_id = cs.Chp_id
						join subj_course_mapping sc on sc.Scm_id = cs.Scm_id
						where c.Subj_id = '.$subj.' and sc.Course_id = '.$course[$i]['id'];
			$j = 0;
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))	{
					while($array = mysql_fetch_assoc($query_run))	{
						$chp_crs[$i][$j]['name'] = $array['chapterName'];
						$chp_crs[$i][$j]['id'] = $array['Chp_id'];
						$j++;
					}
					$chp_crs[$i]['count'] = $j;
					$total_chp += $j;
				}
			} else echo '2'.mysql_error();
		}
		
		//taking the chapters which are common
		$query = 'select chapterName, Chp_id from chapter where Subj_id = '.$subj.' and common = 1 order by chapterName';
		if($query_run = mysql_query($query))	{
			$common_cnt = mysql_num_rows($query_run);
			if($common_cnt)	{
				while($array = mysql_fetch_assoc($query_run))	{
					for($i=0;$i<$crs_cnt;$i++)	{
						if(isset($chp_crs[$i]['count']))
							$index = $chp_crs[$i]['count'];
						else $index = $chp_crs[$i]['count'] = 0;
						$chp_crs[$i][$index]['name'] = $array['chapterName'];
						$chp_crs[$i][$index]['id'] = $array['Chp_id'];
						$chp_crs[$i]['count']++;
					}
				}
				$total_chp += $common_cnt;
			}
		} else echo mysql_error();
	} else	{	//case when the subject is not currently in any course
		$query = 'select chapterName, Chp_id from chapter where Subj_id = '.$subj;
		$j = 0;
		if($query_run = mysql_query($query))	{
			if(mysql_num_rows($query_run))	{
				while($array = mysql_fetch_assoc($query_run))	{
					$chp_crs[0][$j]['name'] = $array['chapterName'];
					$chp_crs[0][$j]['id'] = $array['Chp_id'];
					$j++;
				}
				$total_chp = $chp_crs[0]['count'] = $j;
			}
		} else echo mysql_error();
	}
	
	if(logged_in())	{
		//choosing page
		$test_page = 'pretest01.php';
		
		//taking users course and sem
		$query = "select `Course_id`, `sem` from `student` where `L_id` = '$l_id'";
		if($query_run= mysql_query($query))	{
			$usercourseid = mysql_result($query_run, 0, 'Course_id');
			$usersem = mysql_result($query_run, 0, 'sem');
		} else echo '3'.mysql_error();
		
		$present = false;
		for($i=0;$i<$crs_cnt;$i++)	{
			if($usercourseid == $course[$i]['id'] && $usersem == $course[$i]['sem'])	{
				$present = true;
				break;
			}
		}

		if(!$present)	{
			//taking interests of the user
			$query = "select `Subj_id` from `interests` where `L_id` = '$l_id' and `Subj_id` = '$subj'";
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))
					$present = true;
			} else echo '4'.mysql_error();
		}
	} else	{
		$test_page = 'g_pretest02.php';
	}
	
?>
<head>
	<link rel="stylesheet" href="specific.css">
</head>
<body>
	<br><br><br>
	<!--subject name and give test option-->
	<div class="row">
		<div class="col-md-7">
			<h1><p>
<?php			echo $name;	?>
			</p></h1>
		</div>
		<div class="col-md-3 col-md-offset-2">
<?php			if(logged_in() && $present == false)	{	?>
				<a href="add.php?subjid=<?php echo $subj;	?>">
					<h2><span class="glyphicon glyphicon-plus"></span>
					add to interests</h2>
				</a>
<?php			} else if($total_chp)	{	
					$redirect = $test_page.'?subjid='.$subj;	?>
				<a href="<?php echo $redirect;	?>">
					<h2>give test</h2>
				</a>
<?php			}	?>
		</div>
	</div>
	<!--description-->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h3><p>
<?php			echo $info;	?>
			</p></h3>
		</div>
	</div>
	<br><br>
	<!--dept and sem-->
	<div class="row">
		<h3><div class="col-md-6">
			<b>Courses which have this subject in their syllabus:</b>
		</div></h3>
	</div>
<?php	if($common)	{	?>
			<br>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h3>This subject is present in all the streams in semester <?php echo $sem;	?> </h3>
				</div>
			</div>
<?php	}
		if($crs_cnt)	{
			if($common)	{	?>
				<br>
				<div class="row">
					<div class="col-md-6">
						<h3><b>Additionally this subject is also present in:</b></h3>
					</div>
				</div>
				<br>
<?php		}
			for($i=0;$i<$crs_cnt;$i++)	{	?>
				<h3>
					<div class="row">
						<div class="col-md-5 col-md-offset-2">
							<a href="course.php?courseid=<?php	echo $course[$i]['id'];	?>" class="specific">
<?php							echo ($i+1).'. '.$course[$i]['name'];	?>
							</a>
						</div>
						<div class="col-md-2">
							<b>Semester:</b>
						</div>
						<div class="col-md-2">
<?php						echo $course[$i]['sem'];	?>
						</div>
					</div>
				</h3>
<?php		}
		} else if(!$common) {	?>
			<br>
			<div class="row">
				<div class="col-md-7 col-md-offset-3">
					<h3>None of the courses have this subject in their syllabus</h3>
				</div>
			</div>
<?php	}	?>
	<br><br>
<?php
	if($total_chp)	{	?>
		<!--chapters-heading-->
		<div class="row">
			<div class="col-md-4">
				<h3><b>Chapters:<b></h3>
			</div>
		</div>
		
		<br><br>
		<!--chapters-->
<?php	if($crs_cnt)	{
			for($i=0;$i<$crs_cnt;$i++)	{
				$chp_cnt = $chp_crs[$i]['count'];	
				if($chp_cnt)	{	?>
					<div class="row">
						<div class="col-md-4">
							<h4><b>
<?php							echo $course[$i]['name'];	?>
							</b></h4>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<table class="table table-bordered">
								<tr>
<?php							for($j=0;$j<$chp_cnt;$j++)	{	?>
										<td>
											<h4><a href="chapter.php?chpid=<?php	echo $chp_crs[$i][$j]['id'];	?>" class="specific">
<?php											echo $chp_crs[$i][$j]['name'];		?>
											</a></h4>
										</td>
<?php								if(($j+1)%3 == 0 && $j!=0)	{	?>
										</tr>
										<tr>
<?php								}		?>
<?php							}	?>
							</table>
						</div>
					</div>
<?php			}	?>
<?php		}	?>
<?php	} else if(isset($chp_crs))	{
			$chp_cnt = $chp_crs[0]['count'];	?>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<table class="table table-bordered">
						<tr>
<?php						for($j=0;$j<$chp_cnt;$j++)	{	?>
								<td>
									<h4><a href="chapter.php?chpid=<?php	echo $chp_crs[0][$j]['id'];	?>" class="specific">
<?php									echo $chp_crs[0][$j]['name'];		?>
									</a></h4>
								</td>
<?php							if(($j+1)%3 == 0 && $j!=0)	{	?>
									</tr>
									<tr>
<?php							}		?>
<?php						}	?>
					</table>
				</div>
			</div>
<?php	}
	} else {	
		echo '<h3>No chapters are available for this subject.</h3>';
	}	?>
</body>
<?php
} else echo '<script> window.location.href="home.php";	</script>';
?>