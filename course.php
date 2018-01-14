<?php 

require 'required.php';
include 'theme.php';

//taking courseid
if(isset($_GET['courseid']) && $_GET['courseid']>=1)	{
	$courseid = $_GET['courseid'];
	
	//taking details of the course
	$query = "select Course_id, courseName, semNo, description from courses where Course_id = '$courseid'";
	if(($query_run = mysql_query($query)) && mysql_num_rows($query_run))	{
		$course['name'] = mysql_result($query_run, 0, 'courseName');
		$course['sem'] = mysql_result($query_run, 0, 'semNo');
		$course['desc'] = mysql_result($query_run, 0, 'description');
	} else echo mysql_error();
	
	//taking subjects of each sem
	$query = 'select sc.Subj_id, s.subjName, sc.sem from subj_course_mapping sc
				join subject s on sc.Subj_id = s.Subj_id
				where sc.Course_id = '.$courseid.' or (sc.sem = 1 or sc.sem = 2) order by sc.sem';
	$csem = -1;
	$j = 0;
	if($query_run = mysql_query($query))	{
		if($subj_cnt = mysql_num_rows($query_run))	{
			while($array = mysql_fetch_assoc($query_run))	{
				if($array['sem'] != $csem)	{
					if($csem != -1)
						$subject[$j]['count'] = $i;
					$csem = $array['sem'];
					$j++;
					$i = 0;
					$subject[$j]['sem'] = $csem;
				}
				$subject[$j][$i]['id'] = $array['Subj_id'];
				$subject[$j][$i]['name'] = $array['subjName'];
				$i++;
			}
			$subject[$j]['count'] = $i;
			$count = $j;
		}
		
	} else echo mysql_error();
	
?>

<head>
	<link rel="stylesheet" href="specific.css">
</head>
<body>
	<br><br>
	<!--course name-->
	<div class="row">
		<h1><p class="text-center">
<?php		echo $course['name'];	?>
		</p></h1>
	</div>
	<!--description-->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h3><p class="text-center">
<?php			echo $course['desc'];	?>
			</p></h3>
		</div>
	</div>
	<br><br>
<?php	
	if($subj_cnt)	{
		for($i=1;$i<=$count;$i++)	{	?>
			<!--sem-->
			<div class="row">
				<div class="col-md-4 col-md-offset-1">
					<h3><b><p>
						Semester <?php	echo $subject[$i]['sem'];	?>:
					</p><b></h3>
				</div>
			</div>
			<!--subjects of sem-->
			<div class="row">
				<div class="col-md-offset-1">
	<?php			$semcnt = $subject[$i]['count'];
					for($j=0;$j<$semcnt;$j++)	{	?>
						<div class="col-md-4">
							<a class="specific" href="subject.php?subjid=<?php echo $subject[$i][$j]['id']	?>">
								<h4><?php	echo $subject[$i][$j]['name'];	?></h4>
							</a>
						</div>
	<?php			}		?>
				</div>
			</div>
	<?php
		}	
	} else	{	?>
		<hr>
		<div class="row">
			<h4><b><p class="text-center">
				No subject are currently available for this course
			</p></b></h4>
		</div>
<?php
	}	?>
	<br><br>

</body>

<?php
}	?>