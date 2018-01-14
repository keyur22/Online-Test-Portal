<?php

require 'required.php';
include 'theme.php';
$logged = logged_in();
	if($logged)	{
		/*to take s_id from l_id*/
		$query = "select `Course_id`, `sem` from `student` where `L_id` = '$l_id'";
		if($query_run = mysql_query($query)) {
			$courseid = mysql_result($query_run, 0, 'Course_id');
			$sem = mysql_result($query_run, 0, 'sem');
		}
	}

	$i = 0;	//count of subjects
	if($logged && $courseid != 0)	{
		/*to get subjects of that course*/
		if($sem == 1 || $sem == 2)
			$qcourse = 0;
		else $qcourse = $courseid;
		
		$query = "select s.Subj_id, s.subjName, sc.Course_id from subject s
				join subj_course_mapping sc on sc.Subj_id = s.Subj_id
				where sc.Course_id = '$qcourse' and sc.sem = '$sem'";
		if($query_run = mysql_query($query)) {
			if($crs_subj_cnt = mysql_num_rows($query_run))	{
				while($array = mysql_fetch_assoc($query_run))	{
					$subject[$i]['id'] = $array['Subj_id'];
					$subject[$i]['name'] = $array['subjName'];
					$subject[$i]['attribute'] = '';
					$subject[$i]['course'] = $array['Course_id'];
					$i++;
				}
			}
		} else echo mysql_error();
	}

	if($logged)	{
		//to get subjects from interests
		$query = "select i.Subj_id, s.subjName from interests i
				join subject s on s.Subj_id = i.Subj_id
				where i.L_id = '$l_id'";
		if($query_run = mysql_query($query))	{
			if($int_cnt = mysql_num_rows($query_run))	{
				while($array = mysql_fetch_assoc($query_run))	{
					$subject[$i]['id'] = $array['Subj_id'];
					$subject[$i]['name'] = $array['subjName'];
					$subject[$i]['attribute'] = '';
					$i++;
				}
			}
		} else echo mysql_error();
	}
	
	$default = 'selected';
	//default values of subjid and selected_chp
	$subjid = 0;
	$selected_chp = 0;
	//to take subjid from get
	if(isset($_GET['subjid']) || isset($_GET['chpid']))	{
		if(isset($_GET['subjid']))	{
			$subjid = $_GET['subjid'];
			$selected_chp = 0;
		} else if(isset($_GET['chpid']))	{
			$selected_chp = $_GET['chpid'];
			$query = "select Subj_id from chapter where Chp_id = '$selected_chp'";
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))
					$subjid = mysql_result($query_run, 0, 'Subj_id');
			} else echo mysql_error();
		}
		//finding the subject
		for($j=0;$j<$i;$j++)	{
			if($subject[$j]['id'] == $subjid)	{
				$subject[$j]['attribute'] = 'selected';
				$default = '';;
				break;
			}
		}
	}
	
	//message
	if(isset($_GET['error']) && $_GET['error'] == 1)
		$string = "please choose at least one chapter before proceeding";
	else if (logged_in() && $int_cnt == 0)	{
		if($courseid == 0)
			$string = "There are no subjects available for given course";
		else if(isset($crs_subj_cnt) && $crs_subj_cnt == 0)
			$string = "you do not have any interests or course selected.<br> To give a test please select an interests
			<br>You can search for subjects from the search bar";
	}
	
	?>

	<head>
		<style>
			p	{
				line-height: 150%;
			}
		</style>
	</head>
	<body>
		<br><br>
<?php	if(isset($string))	{	?>
			<div class="alert alert-danger">
				<h4><p class="text-center">
<?php				echo $string;	?>
				</p></h4>
			</div>
<?php	}	?>
		<div class="row">
			<h2><p class="text-center">
				Choose Subject and Chapters
			</p></h2>
		</div><br><br>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>
							<p class="text-center">Choose the subject and their chapters you want to have in your test</p>
						</h4>
					</div>
					<form action="questiongenerator.php" method="POST">	
						<div class="panel-body">
							<br>
							<div class="row">
								<div class="col-md-3 col-md-offset-1">
									<h4><b>
										Choose Subject: 
									</b></h4>
								</div>
								<div class="col-md-5">
									<select id="subj1" name="subject" class="form-control" onchange="chapter(value, 0);" onload="chapter(value, 0)"
									placeHolder="choose subject">
											<option disabled <?php echo $default;	?> value="0">Choose Subject</option>
<?php									if(!$logged)	{	?>
											<option disabled><hr></option>
<?php									}
										$k=0;
										for($j=0;$j<$i;$j++)	{
											if(!$logged && $j == $pointer[$k])	{
												if($j !=0)	{	?>
													<option disabled><hr></option>
<?php											}		?>
												<option disabled value="0">
													<p class="text-center">
														<?php echo get_field('courses', 'courseName', 'Course_id', $subject[$j]['course'])	?>
													</p>
												</option>
<?php											$k++;
											}	?>
											<option value="<?php echo $subject[$j]['id'];	?>" <?php echo $subject[$j]['attribute'];	?>>
		<?php									echo $subject[$j]['name'];		?>
											</option>
	<?php								}
										?>
									</select>
								</div>
							</div><br>
							<div id="chapter_div"></div>
						</div>
					</form>
				</div>
			</div>
		</div>	
	</body>
		<script type="text/javascript">
			var v = document.getElementById('subj1');
			var value = v.options[v.selectedIndex].value;
			function chapter(value, chpid)	{
				var addr;
				if(window.XMLHttpRequest)	{
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
				}
				
				xmlhttp.onreadystatechange = function()	{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)	{
						document.getElementById('chapter_div').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET', 'pretest02.php?subjid=' + value + '&chpid=' + chpid, true);
				xmlhttp.send();
			}
			if(value != 0)	{
				var chpid = <?php	echo $selected_chp;	?>;
				if(chpid != 0)
					chapter(value, chpid);
				else
					chapter(value, 0);
			}
		</script>