<?php

require 'required.php';
include 'theme.php';

/*taking course and sem from student*/
$query = "select `Course_id`, `sem` from `student` where `L_id` = '$l_id'";
if($query_run = mysql_query($query))	{
	$courseid = mysql_result($query_run, 0, 'Course_id');
	$sem = mysql_result($query_run, 0, 'sem');
} else {
	echo mysql_error();
}

/*query to take current interests*/
$query = "select `subject`.`subjName`, `subject`.`Subj_id` from `subject` join `interests` 
		on `subject`.`Subj_id` = `interests`.`Subj_id`
		where `L_id` = '$l_id'";
$i = 0;
if($query_run = mysql_query($query))	{
	while($array = mysql_fetch_assoc($query_run))	{
		$subjname[$i] = $array['subjName'];
		$subjid[$i] = $array['Subj_id'];
		$i++;
	}
} else {
	echo mysql_error();
}


//adding subjects of course to subjects array
if(($courseid != 0) && ($sem != 0))	{
	$query_subjects = "select s.subjName, s.Subj_id from subject s
						join subj_course_mapping sc on sc.Subj_id = s.Subj_id
						where sc.Course_id = '$courseid' and sc.sem = '$sem'";
	if($query_run_subject = mysql_query($query_subjects))	{
		while($array = mysql_fetch_assoc($query_run_subject))	{
			$subjname[$i] = $array['subjName'];
			$subjid[$i] = $array['Subj_id'];
			$i++;
		}
	} else echo mysql_error();
}

?>

	<head>
		<script type="text/javascript">
			function post(value)	{
				if(window.XMLHttpRequest)	{
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
				}
				
				xmlhttp.onreadystatechange = function()	{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)	{
						document.getElementById('question_div').innerHTML = xmlhttp.responseText;
					}
				}
				
				xmlhttp.open('GET', 'uploadedmcqs02.php?subjid=' + value, true);
				xmlhttp.send();
			}
		</script>
	</head>
	<body>
		<br><br>
		<div class="row">
			<h2><p class="text-center">
				Questions Uploaded
			</p></h2>
		</div><br><br>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<br>
						<div class="row">
							<div class="col-md-3 col-md-offset-1">
								<h4><b>
									Choose Subject: 
								</b></h4>
							</div>
							<div class="col-md-5">
								<select name="subject" class="form-control" onchange="post(value);" 
								placeHolder="choose subject">
									<option disabled selected>Choose Subject</option>
<?php								for($j=0;$j<$i;$j++)	{		?>									
										<option value="<?php echo $subjid[$j];	?>">
	<?php									echo $subjname[$j];		?>
										</option>
<?php								}				?>										
								</select>
							</div>
						</div><br>
					</div>
				</div>
				<div id="question_div"></div>
			</div>
		</div>	
	</body>