<?php
require 'required.php';
include 'theme.php';

/*query to take current interests*/
$query = "select s.subjName, s.Subj_id from subject s join interests i
		on s.Subj_id = i.Subj_id
		where i.L_id = '$l_id' order by subjName";
$i = 0;
if($query_run = mysql_query($query))	{
	while($array = mysql_fetch_assoc($query_run))	{
		$subjname[$i] = $array['subjName'];
		$subjid[$i] = $array['Subj_id'];
		$i++;
	}
	$interest_cnt = $i;
} else {
	echo mysql_error();
}

$k = 0;
/*adding subjects of course to subjects array*/
$query = "select `Course_id`, `sem` from `student` where `L_id` = '$l_id'";
if($query_run = mysql_query($query))	{
	$courseid = mysql_result($query_run, 0, 'Course_id');
	$sem = mysql_result($query_run, 0, 'sem');
	if(($courseid != 0) && ($sem != 0))	{
		$query_subjects = "select s.subjName, s.Subj_id from subject s
							join subj_course_mapping sc on sc.Subj_id = s.Subj_id
							where sc.Course_id = '$courseid' and sc.sem = '$sem' order by s.subjName";
		if($query_run_subject = mysql_query($query_subjects))	{
			while($array = mysql_fetch_assoc($query_run_subject))	{
				$coursesubj[$k] = $array['subjName'];
				$coursesubjid[$k] = $array['Subj_id'];
				$k++;
			}
		}
	}
} else echo mysql_error();

?>
<head>
	<style>
		#remove:hover	{
			color: red;
		}
	</style>
	<link rel="stylesheet" href="specific.css">
	
	
	
</head>


		<br><br>
		<!--new subjects well-->
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="well">	
					<h3><p class="text-center">
						To add new subjects type the subject name in the search box on the top
					</p></h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2><p class="text-center">
					Subjects of Interest
				</p></h2>
			</div>
		</div><br>
		<!--confirm message-->
			<div class="row" id="confirm">
				<div class="col-md-10 col-md-offset-1">
					<div class="alert alert-dismissable alert-info">
						<div class="row"><center>
							<div class="col-md-9">
							
								Are you sure that you want to remove this interest??? This action cannot be reversed.
							</div>
						
						
						
							<div class="col-md-1 ">
								<a onclick = "deleteinterest('confirm','block','y')" class="btn btn-default">
									Yes
								</a>
							</div>
							<div class="col-md-1">
								<a onclick = "deleteinterest('confirm','none','n')" class="btn btn-default">
									No
								</a>
							</div></center>
						</div>
					</div>
				</div>
			</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
<?php			if(!empty($interest_cnt))	{	?>
					<ul class="list-group">
<?php					for($j=0;$j<$i;$j++)	{		?>
							<li class="list-group-item">
								<div class="row">
									<div class="col-md-7">
										<a href="subject.php?subjid=<?php	echo $subjid[$j];	?>" class="specific"><h4>
<?php										echo $subjname[$j];		?>
										</h4></a>
									</div>
									<div class="col-md-3 col-md-offset-2">
										<a href="#" onclick = "deleteinterest('confirm', 'block', <?php	echo $subjid[$j];	?>)" id="remove">
											<h5><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
											<b>remove</b></h5>
										</a>
									</div>
								</div>
							</li>
<?php					}		?>
					</ul>
<?php			} else	{	?>
					<h3><p class="text-center">
						You have not added any interest yet.
					</p></h3>
<?php			}	?>
			</div>
		</div>
<?php	if(isset($coursesubj))	{	?>
			<hr>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h3><p>
						Subjects related to your course:
					</p></h3>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<ul class="list-group">
	<?php				for($j=0;$j<$k;$j++)	{		?>
							<li class="list-group-item">
								<h4><a href="subject.php?subjid=<?php	echo $coursesubjid[$j];	?>" class="specific">
	<?php							echo $coursesubj[$j];		?>
								</a></h4>
							</li>
	<?php				}		?>
					</ul>
				</div>
			</div>
<?php	}		?>

	
	<script type="text/javascript">
		document.getElementById("confirm").style.display = 'none';
		var subjid = 0;
		function deleteinterest(id,visibility,no)	
		{			
			if(no!='y' && no!='n'){
				subjid = no;
				
			}else if(no =='y'){
				window.location.href="remove.php?subjid=" +subjid;
			}
			
			document.getElementById(id).style.display = visibility;
		}
	</script>
	
<?php include 'below.php';	?>