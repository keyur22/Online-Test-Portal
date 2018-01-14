<?php

require 'required.php';
$logged = logged_in();

//question_generator(): takes in an array containing chpids and returns the paper_id
//checkifexists(): checks if the specified paper

function paper_generator($data, $type)	{
	/*steps involved for question_generator():
	1. extract mcqs of specified chapters	*
	2. sort the mcqid array in descending	*
	3. create paper record in paper table and store its details	*
	4. return paperid
	*/
	global $logged;
	if($logged)
		global $l_id;
	switch($type)	{
		case 0:	$chpid = $data;
				$chpno = count($chpid);
				$subjectid = get_field('chapter', 'Subj_id', 'Chp_id', $chpid[0]);
			break;
		case 1:	$subjectid = $data;
				
				$i=0;
				if($logged)	{
					
					//checking if interest
					$query = 'select Subj_id from interests where L_id = '.$l_id.' and Subj_id = '.$subjectid;
					if($query_run = mysql_query($query))	{
						if(mysql_num_rows($query_run))
							$interest = true;
						else $interest = false;
					} else die(mysql_error());

					
					if($interest == false)	{
						//taking the course and sem of the student
						$query = 'select Course_id, sem from student where L_id = '.$l_id;
						if($query_run = mysql_query($query))	{
							if(mysql_num_rows($query_run))	{
								$courseid = mysql_result($query_run, 0, 'Course_id');
								$sem = mysql_result($query_run, 0, 'sem');
							}
						}
						//taking the course specific subjects
						$chpno = 0;
						$query = "select cs.Chp_id from chp_subj_mapping cs
							join subj_course_mapping sc on sc.Scm_id = cs.Scm_id
							where sc.Subj_id = '$subjectid' and sc.Course_id = '$courseid' and sc.sem = '$sem'";
						if($query_run = mysql_query($query))	{
							while($array = mysql_fetch_assoc($query_run))	{
								$chpid[$i] = $array['Chp_id'];
								$i++;
							}
						} else die(mysql_error());

						$query = "select Chp_id from chapter where Subj_id = '$subjectid' and common = 1";
						if($query_run = mysql_query($query))	{
							while($array = mysql_fetch_assoc($query_run))	{
								$chpid[$i] = $array['Chp_id'];
								$i++;
							}
						} else die(mysql_error());
					} else {
						$query = 'select Chp_id from chapter where Subj_id = '.$subjectid;
						if($query_run = mysql_query($query))	{
							while($array = mysql_fetch_assoc($query_run))	{
								$chpid[$i] = $array['Chp_id'];
								$i++;
							}
						} else echo mysql_error();
					}
				} else	{
					$query = 'select Chp_id from chapter where Subj_id = '.$subjid;
					if($query_run = mysql_query($query))	{
						while($array = mysql_fetch_assoc($query_run))	{
							$chpid[$i] = $array['Chp_id'];
							$i++;
						}
					} else echo mysql_error();
				}
			$chpno = $i;
			break;
	}
	$timestamp = time();
	$j = 0;	//count of questions
	$noofquestions = 10;
	$marksforeachmcq = 2;
	//login check
	if($logged)
		global $l_id;
	
	/* query to take mcqs of the given chapter*/
	for($i=0;$i<$chpno;$i++)	{
		if($logged)	{
			$query = "	SELECT 
							m.Mcq_id, m.rating 
						FROM 
							mcq m
						where 
							not EXISTS (select * from mcqsappeared ma where ma.Mcq_id = m.Mcq_id and ma.L_id = '$l_id')
							and m.Chp_id = '$chpid[$i]'";
		} else	{
			$query = "select rating, Mcq_id from mcq where Chp_id = '$chpid[$i]'";
		}
		$query .= " order by fake_count, rating desc";
		if($query_run = mysql_query($query))	{
			$count = mysql_num_rows($query_run);
			if($count)	{
				while($array = mysql_fetch_assoc($query_run)) {
					$mcq[$j]['rating'] = $array['rating'];
					$mcq[$j]['id'] = $array['Mcq_id'];
					$j++;
				}
			}
		} else echo mysql_error();
	}
	
	//checking if required no.of mcqs are available else taking from mcqsappeared
	if($logged && $j<$noofquestions)	{
		for($i=0;$i<$chpno && $j<=$noofquestions;$i++)	{
			$query = "select m.rating, m.Mcq_id from mcq m
					join mcqsappeared ma on m.Mcq_id = ma.Mcq_id
					where ma.L_id = '$l_id' and m.Chp_id = '$chpid[$i]'
					order by m.rating desc";
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))	{
					while(($array = mysql_fetch_assoc($query_run)) && $j<$noofquestions) {
						$mcq[$j]['rating'] = $array['rating'];
						$mcq[$j]['id'] = $array['Mcq_id'];
						$j++;
					}
				}
			} else die(mysql_error());

		}
	}
	
	if($j!=0)	{		//checking if mcqs are available for the chapters
		/*sorting*/
		for($i=0;$i<$j;$i++)	{
			for($k=0;$k<$j;$k++)	{
				if($mcq[$i]['rating'] > $mcq[$k]['rating']) {
					$temp = $mcq[$i]['rating'];
					$mcq[$i]['rating'] = $mcq[$k]['rating'];
					$mcq[$k]['rating'] = $temp;
					$temp = $mcq[$i]['id'];
					$mcq[$i]['id'] = $mcq[$k]['id'];
					$mcq[$k]['id'] = $temp;
				}
			}
		}
		
		//setting max
		if($j < $noofquestions)
			$max = $j;
		else $max = $noofquestions;
		
		/*creating paper record*/
		$totalmarks = $max*$marksforeachmcq;
		$query = "insert into `paper` values(NULL, '$timestamp', '$subjectid', '$totalmarks', '0', '0', '0', '$type')";
		if($query_run = mysql_query($query)) {
			$query = "select `Paper_id` from `paper` where
					`timestampCreate` = '$timestamp' and `Subj_id` = '$subjectid' and `totalMarks` = '$totalmarks'";
			if($query_run = mysql_query($query)) {
				$paperid = mysql_result($query_run, 0, 'Paper_id');
			} else echo mysql_error();
		} else echo mysql_error();

		/*storing chapters*/
		for($i=0; $i<$chpno; $i++)	{
			$query = "insert into `chaptersinpaper` values (NULL, '$paperid', '$chpid[$i]')";
			if(!($query_run = mysql_query($query)))
				echo mysql_error();		
		}

		/*storing mcqs*/
		for($i=0;$i<$max;$i++)	{
			$k = $i+1;
			$query = "insert into `mcqinpaper` values(NULL, '$paperid', '".$mcq[$i]['id']."', '$k')";
			if(!($query_run = mysql_query($query)))
				echo mysql_error();
		}
		
		return $paperid;
		
	} else {		?>
		<div class="alert alert-primary">
			<h4><p class="text-center">
				Unfortunately mcqs for the chapters selected by you are either not available or all the available have been attempted by you.<br>
				Please check the site after some days for the same.
			</p></h4>
		</div>
<?php
		die();		//terminating the page after displaying the error message
	}
	
}

function common($input, $chapters)	{
	
	/*finding m and n*/
	$rows = count($input);
	for($row=0;$row<$rows;$row++)	{
		$cols = count($input[$row]);
		for($col=0;$col<$cols;$col++)	{}
	}
	$m = $row;
	$n = $col;
	
	/*filling zeros in undefined places*/
	for($i=0;$i<$m;$i++)	{
		for($j=0;$j<$n;$j++)	{
			if(!isset($input[$i][$j]))	{
				$input[$i][$j] = 0;
			}
		}
	}
	
	/*first loop to get output*/
	for($i=0;$i<$n;$i++)	{
		for($j=1;$j<$m;$j++)	{
			for($k=0;$k<$n;$k++)	{
				if($input[$j][$k] == $input[0][$i])	{
					$output[($j-1)][$i] = 1;
					break;
				} else {
					$output[($j-1)][$i] = 0;
				}
			}
		}
	}
	
	$k = 0;
	/*second loop to get common element*/
	for($i=0;$i<$n;$i++)	{
		$set = 1;
		for($j=0;$j<($m-1);$j++)	{
			if($output[$j][$i] == 0)	{
				$set = 0;
			}
		}
		if($set == 1)	{
			$common_element[$k] = $input[0][$i];
			$k++;
		}
	}
	
	if(isset($common_element))	{
		//refining the list of common papers for exclusivity wrt chapters
		//taking the chapters in each of common papers
		$n = count($common_element);	//noof common papers
		$k = 0;	//count for modified common_papers
		for($i=0;$i<$n;$i++)	{
			$j = 0;
			$query = "select cp.Chp_id from chaptersinpaper cp
				join chapter c on cp.Chp_id = c.Chp_id
				where cp.Paper_id = '$common_element[$i]'";
			if($query_run = mysql_query($query))	{
				while($array = mysql_fetch_assoc($query_run))	{
					$chpinppr[$i][$j] = $array['Chp_id'];
					$j++;
				}
				//checking if has exactly same chapters as in the array chapters
				if(empty(array_diff($chpinppr[$i], $chapters)))
					$common_element_r[$k++] = $common_element[$i];
			} else echo mysql_error();
		}
		
		if(isset($common_element_r))
			return $common_element_r;	//returns array containing papers which contain all and only the chapters in chpid
		else return 0;
	} else return 0;
}

/*function to check if paperwith given chapters already exists and if it is attempted by that student before*/
//returns paperid if a paper with same chapters and which is not attempted by that student is present and
//returns zero if no such paper exists
function checkifexists($data, $type) {
	global $logged;
	if($logged)
		global $l_id;
	
	if($type == 0)	{
		$chpid = $data;
		$chpno = count($chpid);
		/*taking all papers of each chapter in chpid*/
		for($i=0;$i<$chpno;$i++)	{
			$query = "select `Paper_id` from `chaptersinpaper` where `Chp_id` = '$chpid[$i]' order by `Paper_id`";
			if($query_run = mysql_query($query)) {
				$j = 0;
				while($array = mysql_fetch_assoc($query_run)) {
					$paperid[$i][$j] = $array['Paper_id'];
					$j++;
				}
			} else echo mysql_error();
		}
		
		if(isset($paperid))	{
			/*finding papers containing all chapters in chpid*/
			$common_papers = common($paperid, $chpid);
			$n = count($common_papers);	//noof common papers
			if($n)	{
				if($logged)	{
					//finding the paper not attempted by the student
					for($i=0; $i<$n; $i++)	{
						/*query to check if taken paper is already attended*/
						$query = "select `Paper_id` from `papersappeared` 
						where `L_id` = '$l_id' and `Paper_id` = '$common_papers[$i]'";
						if($query_run = mysql_query($query))	{
							if(mysql_num_rows($query_run) == 0)	{
								$unique = $common_papers[$i];
								break;
							}
						}
					}
					if(isset($unique))	{
						return $unique;
					} else {
						return 0;
					}
				} else return $common_papers[0];
			} else return 0;
		} else return 0;
	} else	{
		$subjid = $data;
		if($logged)	{
			//checking if there are full subject papers not appeared by the user
			$query = "	select 
							Paper_id from paper p
						where
							p.full_subj = 1
							and p.Subj_id = '$subjid'
							and not exists (select * from papersappeared pa where pa.Paper_id = p.Paper_id and pa.L_id = '$l_id')
						order by p.rating";
		} else	{
			$query = "select Paper_id from paper where full_subj = 1 and Subj_id = '$subjid' order by rating";
		}
		if($query_run = mysql_query($query))	{
			if(mysql_num_rows($query_run))	{
				$paperid = mysql_result($query_run, 0, 'Paper_id');
				return $paperid;
			} else return 0;
		} else die(mysql_error());
		
	}
}

/*					MAIN			*/

//to store subjid from get
if(isset($_POST['chapters']) || isset($_POST['allsubj'])) {
	global $logged;
	if(isset($_POST['chapters']))	{
		$data = $_POST['chapters'];
		$type = 0;	//flag to indicate whether full subject or array of chapters
		
		$subjid = get_field('chapter', 'Subj_id', 'Chp_id', $data[0]);
		
		$total_chp = 0;
		if($logged)	{
			//checking if the subject is in the interests of the user(if logged in)
			$query = 'select Subj_id from interests where L_id = '.$l_id.' and Subj_id = '.$subjid;
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))
					$interest = true;
				else $interest = false;
			} else die(mysql_error());
				
			if($interest == false)	{
				//getting the course of the student
				$courseid = get_field('student', 'Course_id', 'L_id', $l_id);
				//taking no.of chapters of this subject
				$query = "select cs.Chp_id from chp_subj_mapping cs
					join subj_course_mapping sc on sc.Scm_id = cs.Scm_id
					where sc.Subj_id = '$subjid' and sc.Course_id = '$courseid'";
				if($query_run = mysql_query($query))
					$total_chp += mysql_num_rows($query_run);
				else die(mysql_error());
				
				//taking common chapters
				$query = "select Chp_id from chapter where Subj_id = '$subjid' and common = 1";
				if($query_run = mysql_query($query))
					$total_chp += mysql_num_rows($query_run);
				else die(mysql_error());
			} else	{
				$query = 'select Chp_id from chapter where Subj_id = '.$subjid;
				if($query_run = mysql_query($query))
					$total_chp += mysql_num_rows($query_run);
				else echo mysql_error();
			}
		} else	{
			$query = 'select Chp_id from chapter where Subj_id = '.$subjid;
			if($query_run = mysql_query($query))
				$total_chp += mysql_num_rows($query_run);
			else echo mysql_error();
		}
		
		//taking count of data
		$given_chp = count($data);
		if($total_chp == $given_chp)	{
			$data = $subjid;
			$type = 1;
		}
	} else if(isset($_POST['allsubj']))	{
		$data = $_POST['allsubj'];
		$type = 1;
	}
	$start_time = time();
	
	/*taking paperid*/
	if(!($paperid = checkifexists($data, $type)))	{
		$paperid = paper_generator($data, $type);		
	}

	/*unsetting previous sessions*/
	if(isset($_SESSION['mcq']))
		unset($_SESSION['mcq']);
	
	if(isset($_SESSION['start_time']))
		unset($_SESSION['start_time']);
	
	if(isset($_SESSION['paperid']))
		unset($_SESSION['paperid']);
	
	if(isset($_SESSION['total']))
		unset($_SESSION['total']);
	
	//query to take no.of mcqs
	$query = "select Mcq_id from mcqinpaper where Paper_id = '$paperid'";
	if($query_run = mysql_query($query))
		$total = mysql_num_rows($query_run);
	else die(mysql_error());
	
	$_SESSION['start_time'] = $start_time;
	$_SESSION['paperid'] = $paperid;
	$_SESSION['total'] = $total;
	$_SESSION['paper_over'] = false;
	
	for($i=0;$i<$total;$i++)
		$_SESSION['mcq'][$i] = 0;
	
	echo '<script type="text/javascript"> window.location.href="instructions.php"; </script>';
} else {
	echo '<script> window.location.href="pretest01.php?error=1";	</script>';
}
?>