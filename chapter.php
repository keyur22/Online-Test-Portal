<?php

require 'required.php';
include 'theme.php';

if(isset($_GET['chpid']))	{
	$chpid = $_GET['chpid'];
	
	//taking details of the chapter
	$query = "select `Subj_id`, `chapterName`, `description` from `chapter` where `Chp_id` = '$chpid'";
	if($query_run = mysql_query($query))	{
		$exists = mysql_num_rows($query_run);
		if($exists)	{
			$name = mysql_result($query_run, 0, 'chapterName');
			$info = mysql_result($query_run, 0, 'description');
			$subjid = mysql_result($query_run, 0, 'Subj_id');
			$subjname = get_field('subject', 'subjName', 'Subj_id', $subjid);
		}
	} else echo mysql_error();
	
	if($exists)	{
		//getting subj and course name
		$query = "select sc.Course_id, c.courseName, sc.sem from subj_course_mapping sc
			join courses c on sc.Course_id = c.Course_id
			where sc.Subj_id = '$subjid'";
			if($query_run = mysql_query($query))	{
				$crs_cnt = mysql_num_rows($query_run);
				if($crs_cnt)	{
					$i = 0;
					while($array = mysql_fetch_assoc($query_run))	{
						$course[$i]['name'] = $array['courseName'];
						$course[$i]['sem'] = $array['sem'];
						$course[$i]['id'] = $array['Course_id'];
						$i++;
					}
				}
			} else die(mysql_error());
			
		if(logged_in())	{
			
			$test_page = 'pretest01.php';
			
			//getting user's course and id
			$query = "select `sem`, `Course_id` from `student` where `L_id` = '$l_id'";
			if($query_run  = mysql_query($query))	{
				$student_sem = mysql_result($query_run, 0, 'sem');
				$student_courseid = mysql_result($query_run, 0, 'Course_id');
			} else echo mysql_error();
			
			$found = false;
			//checking if chapter in user's course
			if($crs_cnt)	{
				foreach($course as $c)	{
					if($student_courseid == $c['id'] && $student_sem == $c['sem'])	{
						$found = true;
						break;
					}
				}
			}
			
			if(!$found)	{
				//checking for the chapter in user's interests
				$query = "select Subj_id from interests where Subj_id = '$subjid' and L_id = '$l_id'";
				if($query_run = mysql_query($query))	{
					if(mysql_num_rows($query_run))
						$found = true;
				} else echo mysql_error();
			}
		} else	{
			$test_page = 'g_pretest02.php';
		}
	}
}

?>
<?php
	if(isset($_GET['chpid']) && $exists)	{	?>
<head>
	<link rel="stylesheet" href="specific.css">
</head>
<body>
	<br><br><br>
	<!--chapter name-->
	<div class="row">
		<div class="col-md-7">
			<h1><p>
<?php			echo $name;	?>
			</p></h1>
		</div>
<?php	if(!logged_in()|| $found)	{	?>
			<!--test link-->
			<div class="col-md-3 col-md-offset-2">
<?php			$redirect = $test_page.'?chpid='.$chpid;	?>
				<a href="<?php echo $redirect;	?>">
					<h2>give test</h2>
				</a>
			</div>
<?php	}	?>
	</div>
	<!--description-->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h3><p>
<?php			echo $info;	?>
			</p></h3>
		</div>
	</div>
	<hr>
<?php	
	if(logged_in() && !$found)	{	?>
		<!--note-->
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3><p>
					To give test of this chapter, you will have to add this subject in your interests.<br>
					Click on the subject to go to the subject page.
				</p></h3>
			</div>
		</div>
<?php
	}	?>
	<br><br>
	<!--subject-->
	<div class="row">
		<h3><div class="col-md-2">
			<b>Subject:</b>
		</div>
		<a class="specific" href="subject.php?subjid=<?php	echo $subjid;	?>">
			<div class="col-md-8">
<?php			echo $subjname;	?>
			</div></h3>
		</a>
	</div>
	<br>
<?php	/*
	<!--dept and sem-->
	<div class="row">
		<h3><div class="col-md-2">
			<b>Course:</b>
		</div>
		<div class="col-md-4">
			<a href="course.php?courseid=<?php	echo $course	?>" class="specific">
<?php			echo $coursename;	?>
			</a>
		</div>
		<div class="col-md-2">
			<b>Semester:</b>
		</div>
		<div class="col-md-4">
<?php		echo $sem;	?>
		</div></h3>
	</div>	*/	?>
	
</body>

<?php
	}	?>