<?php
require 'required.php';
include 'theme.php';
	
	/*taking course and sem from user*/
	$query = "select `Course_id`, `sem` from `student` where `L_id` = '$l_id'";
	if($query_run = mysql_query($query))	{
		$courseid = mysql_result($query_run, 0, 'Course_id');
		$sem = mysql_result($query_run, 0, 'sem');
	} else	die(mysql_error());
	
	$i = 0;	//count of subjects

		
	/*query to take subj_id from interests*/
		$query = "select `subject`.`Subj_id`, `subject`.`subjName` from `subject`
		join `interests`
		on `subject`.`Subj_id` = `interests`.`Subj_id`
		where `interests`.`L_id` = '$l_id'";
		if($query_run = mysql_query($query)) {
			$int_cnt = mysql_num_rows($query_run);
			while($subject_array = mysql_fetch_assoc($query_run))	{
				$subject[$i]['id'] = $subject_array['Subj_id'];
				$subject[$i]['name'] = $subject_array['subjName'];
				$i++;
			}
		} else echo mysql_error();

	/*query to take subjid from course*/
	if($courseid != 0)	{
		$query = "select s.Subj_id, s.subjName from subject s
					join subj_course_mapping sc on s.Subj_id = sc.Subj_id
					where sc.Course_id = '$courseid' and sc.sem = '$sem'";
		if($query_run = mysql_query($query))	{
			$course_cnt = mysql_num_rows($query_run);
			while($subject_array = mysql_fetch_assoc($query_run))	{
				$subject[$i]['id'] = $subject_array['Subj_id'];
				$subject[$i]['name'] = $subject_array['subjName'];
				$i++;
			}
		} else	{
			echo mysql_error();
		}
	}
	
	//message system
	if(isset($_GET['error']))	{
		$string = "Please fill all the details before submitting";
	} else if(!$courseid && !$int_cnt)	{
		$string = "You have not added any interest nor have you added any course.<br>
		Please add a course or an interest to upload a question";
	} else if (!$course_cnt)
		$string = "There are no subjects available for this course";
		

		?>

		<head>
			<script type="text/javascript">
				function subject(value)	{
					if(window.XMLHttpRequest)	{
						xmlhttp = new XMLHttpRequest();
					} else {
						xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
					}
					
					xmlhttp.onreadystatechange = function() {
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200)	{
							document.getElementById('chapter_div').innerHTML = xmlhttp.responseText;
						}
					}
					
					xmlhttp.open('GET', 'upload.php?subjid=' + value, true);
					xmlhttp.send();
				}
			</script>
			<style>
				p	{
					line-height: 150%;
				}
			</style>
		</head>
		<body>
			<br>
<?php		if(isset($string))	{	?>
				<div class="alert alert-danger">
					<h4><p class="text-center">
<?php					echo $string;	?>
					</p></h4>
				</div>
<?php		}		?>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h1><b><p class="text-center">
						Upload a Question
					</p></b></h1>
				</div>
			</div>
			<br>
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-body">
						<!--subject-->
						<div class="row">
							<div class="col-md-4">
								<h4><b>Choose subject:</b></h4>
							</div>
							<div class="col-md-4">
								<select class="form-control" name="subject1" onchange="subject(value);">
									<option disabled selected>Choose Subject</option>
	<?php							for($j=0;$j<$i;$j++)	{	?>
										<option value="<?php echo $subject[$j]['id'];	?>">
											<?php echo $subject[$j]['name'];	?>
										</option>							
	<?php							}					?>	
								</select>
							</div>
						</div>
						<br>
						<!--chapter-->
						<div id="chapter_div"></div>
					</div>
				</div>
			</div>
		</body>