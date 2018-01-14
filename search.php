<?php

require 'required.php';

/*info about array contains
it has following attributes for each matched element
1.	index - the index from words
2.	wordposition - the start position of the word that matched in the subject string
3.	termlength - the length of the search term that was found
4.	field - the field with respect to which matching is done
*/

//function to find the sentences with at least one of the given words
function match($terms, $subjects, $field)	{
	if(isset($subjects[0][$field]))	{
		$terms_count = count($terms);
		$s_count = count($subjects);
		
		//creating a matrix of the subject words and finding count for each words row
		for($j=0;$j<$s_count;$j++)	{
			$words[$j] = explode(' ', $subjects[$j][$field]);
			$count_w[$j] = count($words[$j]);
		}
		
		//the loop to match words
		$l = 0;		//counter for the array contains
		for($i=0;$i<$s_count;$i++)	{		//loop for each row of words
			$check = 0;
			for($k=0;$k<$count_w[$i];$k++)	{	//loop for each word from the current subject
				for($j=0;$j<$terms_count;$j++)	{	//loop for each element of terms
					if(stripos($words[$i][$k], $terms[$j]) === 0)	{
						$array = highlight($k, $words[$i], $terms, $j);		//storing word count for highlighting purpose
						$contains[$l]['wordposition'] = $array['index'];
						$contains[$l]['termlength'] = $array['length'];	//stores the length of the term that is found
						$check = 1;
						break;
					}
				}
				if($check)
					break;
			}
			if($check)	{
				$contains[$l]['index'] = $i;
				$contains[$l]['field'] = $field;
				$l++;
			}
		}

		
		if(isset($contains))	{
			$len = count($contains);	//length of contains
			//sorting the elements acc. to termlength
			for($i=0;$i<$len;$i++)	{
				for($j=0;$j<$len;$j++)	{
					if($contains[$i]['termlength'] > $contains[$j]['termlength'])	{
						$temp = $contains[$i];
						$contains[$i] = $contains[$j];
						$contains[$j] = $temp;
					}
				}
			}
			
			return $contains;
		}
	}
}	

//function for highlighting the search text-center
//it will return the proper position of occurence of the term of search string and also the region to highlight
function highlight($wordindex, $words, $terms, $termindex)	{
	$search = implode($terms, ' ');
	$srch_len = strlen($search);
	$word = strtolower(implode($words, ' '));
	$c_words = count($words);	//count of words
	$word_len = strlen($word);
	
	$srchpos = $trmpos = 0;	
	
	//finding array position of the word at wordindex
	for($i=0;$i<$wordindex;$i++)	{
		$srchpos += (strlen($words[$i])+1);
	}
	
	//finding the array position of the word at termindex
	for($i=0;$i<$termindex;$i++)	{
		$trmpos += (strlen($terms[$i])+1);
	}
	
	//finding the length to highlight
	$length = $i = $j = strlen($terms[$termindex]);
	$i += $srchpos;
	$j += $trmpos;
	while($i<$word_len && $j<$srch_len)	{
		if($word[$i] == $search[$j])	{
			$length++;
			$i++;
			$j++;
		}
		else break;
	}
	
	$array['index'] = $srchpos;
	$array['length'] = $length;
	
	return $array;

}

if(logged_in())	{
	
	$test_page = 'pretest01.php';
	
	//getting interests of user
	$query_interest = "select `Subj_id` from `interests` where `L_id` = '$l_id'";
	$k = 0;
	if($query_run_interest = mysql_query($query_interest))	{
		while($array = mysql_fetch_assoc($query_run_interest))	{
			$studentinterests[$k] = $array['Subj_id'];
			$k++;
		}
	}

	//getting student course_id and sem
	$query = "select `sem`, `Course_id` from `student` where `L_id` = '$l_id'";
	if($query_run  = mysql_query($query))	{
		$student_sem = mysql_result($query_run, 0, 'sem');
		$student_courseid = mysql_result($query_run, 0, 'Course_id');
	} else echo mysql_error();
	
} else	$test_page = 'g_pretest02.php';

if (isset($_GET['search_text']))	{
	$search = strtolower(mysql_real_escape_string($_GET['search_text']));
	$terms = explode(" ", $search);
	$total = 0;	//total search findings
	
	//searching for subjects
	{
		$query = 'select subjName, Subj_id, abbreviation from subject where subjName like \''.$search.'\'';
		foreach($terms as $each)
 			$query .= ' or subjName like \'%'.$each.'%\' or abbreviation like \'%'.$each.'%\'';
		if($query_run = mysql_query($query))	{
			$num = mysql_num_rows($query_run);					
			$i = 0;
			if($num > 0 && !empty($search)) {
				while($row = mysql_fetch_assoc($query_run))	{
					$subj[$i]['name'] = $row['subjName'];
					$subj[$i]['id'] = $row['Subj_id'];
					$subj[$i]['abbr'] = $row['abbreviation'];
					//taking courses having the subjects
					$queryl = 'select sem, Course_id from subj_course_mapping where Subj_id = '.$subj[$i]['id'];
					$j = 0;
					
					if($queryl_run = mysql_query($queryl))	{
						$subj[$i]['crs_cnt'] = mysql_num_rows($queryl_run);
						if($subj[$i]['crs_cnt'])	{
							while($array = mysql_fetch_assoc($queryl_run))	{
								$subj[$i]['course'][$j] = $array['Course_id'];
								$subj[$i]['sem'][$j] = $array['sem'];
								$j++;
							}
						}
					} else echo mysql_error();
					$i++;
				}
				
				$contains = match($terms, $subj, 'name');
				$count_contains = count($contains);
				$contains_abbr = match($terms, $subj, 'abbr');
				$count_contains_abbr = count($contains_abbr);
				
				//we'll have to search for each element of contains_abbr in contains and if not found then add the element in contains
				if($count_contains && $count_contains_abbr)	{
					for($i=0;$i<$count_contains;$i++)	{
						for($k=0;$k<$count_contains_abbr;$k++)	{
							if($contains[$i]['index'] == $contains_abbr[$k]['index'])
								$repeat[$k] = 1;
							else $repeat[$k] = 0;
						}
					}
					//adding the non-repeating ones to contains array
					$i = $count_contains;
					for($k=0;$k<$count_contains_abbr;$k++)	{
						if($repeat[$k] == 0)	{
							$contains[$i] = $contains_abbr[$k];
							$i++;
						}
					}
				} else if($count_contains_abbr != 0)	{
					$contains = $contains_abbr;
					$count_contains = $count_contains_abbr;
				}
				
				if(isset($contains))	{
					if(logged_in())	{
						//setting found for each subject
						foreach($contains as $c)	{
							$crs_cnt = $subj[$c['index']]['crs_cnt'];
							if($crs_cnt)	{
								for($i=0;$i<$crs_cnt;$i++)	{
									if($subj[$c['index']]['course'][$i] == $student_courseid && $subj[$c['index']]['sem'][$i] == $student_sem)	{
										$subj[$c['index']]['found'] = 1;
										break;
									} else $subj[$c['index']]['found'] = 0;
								}
							} else $subj[$c['index']]['found'] = 0;
							
							if($subj[$c['index']]['found'] == 0 && isset($studentinterests))	{
								foreach($studentinterests as $s)	{
									if($s == $subj[$c['index']]['id'])	{
										$subj[$c['index']]['found'] = 3;
										break;
									} else
										$subj[$c['index']]['found'] = 0;
								}
							}
						}
						
					} else
						foreach($contains as $c)
							$subj[$c['index']]['found'] = 2;	//for guests
					$total += $count_contains;
				}
			}
		} else echo mysql_error();
	}
	
	//searching for chapters
	{
		$query = 'select Chp_id, chapterName from chapter where chapterName like \''.$search.'\'';
		foreach($terms as $t)
			$query .= ' or chapterName like \'%'.$t.'%\'';
		if($query_run = mysql_query($query))	{
			$chp_num = mysql_num_rows($query_run);
			$i = 0;
			if($chp_num)	{
				while($array = mysql_fetch_assoc($query_run))	{
					$chp[$i]['id'] = $array['Chp_id'];
					$chp[$i]['name'] = $array['chapterName'];
					$i++;
				}
				
				$contains_chp = match($terms, $chp, 'name');
				
				if(isset($contains_chp))	{
					$count_containschp = count($contains_chp);
					$total += $count_containschp;
				}
			}
		}
	}
	//searching streams
	{
		$query = 'select Course_id, courseName from courses where courseName like \''.$search.'\'';
		foreach($terms as $t)
			$query .= ' or courseName like \'%'.$t.'%\'';
		$query .= " and courseName != 'independent'";
		if($query_run = mysql_query($query))	{
			$crs_num = mysql_num_rows($query_run);
			$i = 0;
			if($crs_num)	{
				while($array = mysql_fetch_assoc($query_run))	{
					$crs[$i]['id'] = $array['Course_id'];
					$crs[$i]['name'] = $array['courseName'];
					$i++;
				}
				
				$contains_crs = match($terms, $crs, 'name');
				
				if(isset($contains_crs))	{
					$count_containscrs = count($contains_crs);
					$total += $count_containscrs;
				}
		
			}
		}
	}

	//creating the strings
	{
		//for subjects
		if(isset($contains))	{
			for($i=0;$i<$count_contains;$i++)	{
				$start = $contains[$i]['wordposition'];
				$length = $contains[$i]['termlength'];
				if($contains[$i]['field'] == 'name')	{
					$string = $subj[$contains[$i]['index']]['name'];
					$subj_result[$i] = substr($string, 0, $start).'<b>'.substr($string, $start, $length).'</b>'.substr($string, ($start + $length));
					$subj_result[$i] .= ' ('.$subj[$contains[$i]['index']]['abbr'].')';
				} else if($contains[$i]['field'] == 'abbr')	{
					$string = $subj[$contains[$i]['index']]['abbr'];
					$subj_result[$i] = $subj[$contains[$i]['index']]['name'];
					$subj_result[$i] .= ' ('.substr($string, 0, $start).'<b>'.substr($string, $start, $length).'</b>'.substr($string, ($start + $length)).')';
				}
			}
		}
		//for chapters
		if(isset($count_containschp))	{
			for($i=0;$i<$count_containschp;$i++)	{
				$start = $contains_chp[$i]['wordposition'];
				$length = $contains_chp[$i]['termlength'];		
				if($contains_chp[$i]['field'] == 'name')	{
					$string = $chp[$contains_chp[$i]['index']]['name'];
					$chp_result[$i] = substr($string, 0, $start).'<b>'.substr($string, $start, $length).'</b>'.substr($string, ($start + $length));
				}
			}
		}
		
		//for streams
		if(isset($count_containscrs))	{
			for($i=0;$i<$count_containscrs;$i++)	{
				$start = $contains_crs[$i]['wordposition'];
				$length = $contains_crs[$i]['termlength'];
				if($contains_crs[$i]['field'] == 'name')	{
					$string = $crs[$contains_crs[$i]['index']]['name'];
					$strms_result[$i] = substr($string, 0, $start).'<b>'.substr($string, $start, $length).'</b>'.substr($string, ($start + $length));
				}
			}
		}
	}
?>

<head>
	<link rel="stylesheet" href="specific.css">
</head>
<body>
	<div class="col-md-8 col-md-offset-2">
<?php	if($total > 0 && !empty($search))	{
			$string = "$total result(s) found";		?>
			<br><br>
			<h3>
				<p class="text-center">
<?php				echo $string;		?>
				</p>
			</h3><br><br>
<?php		if($num>0 && isset($contains))	{	?>
				<div class="row">
					<div class="col-md-2">
						<h3><b>
							Subjects:
						</b></h3>
					</div>
				</div>
				<br>
				<div class="list-group">
<?php				for($i=0;$i<$count_contains;$i++)	{	?>
						<div class="list-group-item">
							<div class="row">
								<div class="col-md-5">
									<h4><a class = "specific" href="subject.php?subjid=<?php echo $subj[$contains[$i]['index']]['id']; ?>"> 
<?php									echo $subj_result[$i];

									?></a></h4>
								</div>
								<div class="col-md-4 col-md-offset-2">
<?php								if($subj[$contains[$i]['index']]['found'] == 0)	{		?>
										<a href="add.php?subjid=<?php echo $subj[$contains[$i]['index']]['id']; ?>">
											<h4>
												<span class="glyphicon glyphicon-plus"></span>
												add
											</h4>
										</a>
										<p>
											click on the add link to add this subject to your list of interests
										</p>
<?php								} else if ($subj[$contains[$i]['index']]['found'] == 3){		?>
										<a href="remove.php?subjid=<?php echo $subj[$contains[$i]['index']]['id']; ?>">
											<h4>
												<span class="glyphicon glyphicon-remove"></span>
												remove
											</h4>
										</a>
<?php								} else {	
										$redirect = $test_page.'?subjid='.$subj[$contains[$i]['index']]['id'];	?>
										<a href="<?php	echo $redirect;	?>">
											<h4>give test</h4>
										</a>
<?php								}	?>
								</div>
							</div>
						</div>
<?php				}	?>	
				</div>
<?php		}	?>
<?php		if($chp_num>0 && isset($contains_chp))	{	?>
				<div class="row">
					<div class="col-md-2">
						<h3><b>
							Chapters:
						</b></h3>
					</div>
				</div>
				<br>
				<div class="list-group">
<?php				for($i=0;$i<$count_containschp;$i++)	{	?>
						<div class="list-group-item">
							<div class="row">
								<div class="col-md-10">
									<h4><a class="specific" href="chapter.php?chpid=<?php echo $chp[$contains_chp[$i]['index']]['id'];	?>">
<?php									echo $chp_result[$i];	?>
									</a></h4>
								</div>
							</div>
						</div>
<?php				}	?>
				</div>
<?php		}	?>
<?php		if($crs_num>0 && isset($contains_crs))	{	?>
				<div class="row">
					<div class="col-md-2">
						<h3><b>
							Courses:
						</b></h3>
					</div>
				</div>
				<br>
				<div class="list-group">
<?php				for($i=0;$i<$count_containscrs;$i++)	{	?>
						<div class="list-group-item">
							<div class="row">
								<div class="col-md-5">
									<a href="course.php?courseid=<?php echo $crs[$contains_crs[$i]['index']]['id'];	?>" class="specific">
										<h4><?php 
											echo $strms_result[$i];	
										?></h4>
									</a>
								</div>
							</div>
						</div>
<?php				}	?>
				</div>
<?php		}		?>
<?php	} else if(empty($search)) {
			echo '<script type=text/javascript> window.location.href='.$http_referer.'; </script>';
		} else {		?>
			<br><br>
			<div class="row">
				<h3><p class="text-center">
					No results found!
				</p></h3>
			</div>
<?php	}			?>
	</div>
</body>
<?php
}
?>