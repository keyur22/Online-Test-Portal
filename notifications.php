<?php

//require 'required.php';
//include 'theme.php';

//interest string
$string = "You do not have any interests and you have also not mentioned any course.";

//message count
$msg_cnt = -1;

//taking course from student
$query = "select `Course_id`, `sem` from `student` where `L_id` = '$l_id'";
if($query_run = mysql_query($query)) {
	$course_id = mysql_result($query_run, 0, 'Course_id');
	$sem = mysql_result($query_run, 0, 'sem');
} else echo mysql_error();

//taking interests of student
$query = "select `Subj_id` from `interests` where `L_id` = '$l_id'
		order by `Subj_id`";
$i = 0;
if($query_run = mysql_query($query))	{
	$interests_count = mysql_num_rows($query_run);
	if($interests_count)	{
		//taking interests
		while($array = mysql_fetch_assoc($query_run))	{
			$interests[$i] = $array['Subj_id'];
			$i++;
		}
	}
} else echo mysql_error();

//no interest and course checking
if($course_id || $interests_count)	{
	//taking subjects of course
	if($course_id != 0)	{
		/*to get subjects of that course*/
		$query = "select Subj_id from subj_course_mapping where Course_id = '$course_id' and sem = '$sem'
				order by Subj_id";
		$i = 0;
		if($query_run = mysql_query($query)) {
			$course_count = mysql_num_rows($query_run);
			if($course_count)	{
				while($array = mysql_fetch_assoc($query_run))	{
					$courses[$i] = $array['Subj_id'];
					$i++;
				}
			}
		} else echo mysql_error();
	}

	if($course_count || $interests_count)	{
		//merging the two interests and course subject array
		if($course_count != 0 && $interests_count != 0)	{
			$subjects = merge($interests, $interests_count, $courses, $course_count, 'a');
			$subjects_count = count($subjects);
		} else if ($course_count != 0)	{
			$subjects = $courses;
			$subjects_count = $course_count;
		} else	{
			$subjects = $interests;
			$subjects_count = $interests_count;
		}
		
		//taking all the papers of the found subjects and sorting them
		for($j=0;$j<$subjects_count;$j++)	{
			$query = "select `Paper_id` from `paper` where `Subj_id` = '$subjects[$j]'
					order by `Paper_id`";
			if($query_run = mysql_query($query)) {
				if($paper_count = mysql_num_rows($query_run))	{
					$i = 0;
					while($array = mysql_fetch_assoc($query_run))	{
						$papers_current[$i] = $array['Paper_id'];
						$i++;
					}
					//code to sort
					if(isset($papers))	{
						$papers = merge($papers, $papers_c, $papers_current, $i, 'a');
						$papers_c = count($papers);
					} else	{
						$papers = $papers_current;
						$papers_c = $i;
					}
				}
			} else echo mysql_error();
		}
		
		//query to take papers appeared
		$query = "select `Paper_id` from `papersappeared` where `L_id` = '$l_id' order by `Paper_id`";
		$i = 0;
		if($query_run = mysql_query($query)) {
			if($appeared_c = mysql_num_rows($query_run))	{
				while($array = mysql_fetch_assoc($query_run))	{
					$appeared[$i] = $array['Paper_id'];
					$i++;
				}
			}
		} else echo mysql_error();

		//checking if both exists
		if(isset($papers_c) && $appeared_c != 0)	{
			//finding the uncommon papers
			for($i=0 & $k=0 & $j=0;$i<$papers_c && $k<$appeared_c;$i++)	{
				if($appeared[$k] != $papers[$i])	{
					$notappeared[$j] = $papers[$i];
					$j++;
				} else
					$k++;
			}
			$notappeared_cnt = $j;
		} else if($appeared_c == 0 && isset($papers_c))	{	//if only papers exists	
			$notappeared = $papers;
			$notappeared_cnt = $papers_c;
		}

		if(isset($notappeared_cnt) && !empty($notappeared_cnt))	{
			//constructing the query
			$query = "select distinct s.subjName from subject s
				join paper p on s.Subj_id = p.Subj_id where ";
			for($i=0;$i<$notappeared_cnt;$i++)	{
				if($i!=0)	
					$query .= " or ";
				$query .= "p.Paper_id = '$notappeared[$i]'";
			}
			/*echo $notappeared_cnt;
			echo $query;
			die();*/
			$i = 0;
			if($query_run = mysql_query($query))	{
				while($array = mysql_fetch_assoc($query_run))	{
					$notappeared_s[$i] = $array['subjName'];
					$i++;
				}
			} else echo 'a'.mysql_error();

			$notappeared_s_cnt = $i;
			
			$msgs[++$msg_cnt] = 'We have new papers in ';
			
			//displaying 
			for($i=0;$i<$notappeared_s_cnt;$i++)	{
				$msgs[$msg_cnt] .= $notappeared_s[$i];
				if($i < $notappeared_s_cnt-2)
					$msgs[$msg_cnt] .= ', ';
				else if ($i == $notappeared_s_cnt-2)
					$msgs[$msg_cnt] .= ' and ';
					
			}
		}
	}
} else	$msgs[++$msg_cnt] = $string;

?>