<?php

require 'required.php';
include 'theme.php';

if(isset($_GET['subjid']) || isset($_GET['chpid']))	{
	if(isset($_GET['chpid']))	{
		$chpid_mrk = $_GET['chpid'];
		//taking subject of the chapter
		$subjid = get_field('chapter', 'Subj_id', 'Chp_id', $chpid_mrk);
	} else if(isset($_GET['subjid']))	{
		$subjid = $_GET['subjid'];
		$chpid_mrk = 0;
	}
	
	$i = 0;
	if(isset($_GET['courseid']))	{
		$courseid = $_GET['courseid'];
		//query to take common subjects
		$query = 'select chapterName, Chp_id from chapter where Subj_id = '.$subjid.' and common = 1';
		if($query_run = mysql_query($query))	{
			if(mysql_num_rows($query_run))	{
				while($array = mysql_fetch_assoc($query_run))	{
					$chapter[$i]['id'] = $array['Chp_id'];
					$chapter[$i]['name'] = $array['chapterName'];
					$i++;
				}
			}
		} else echo mysql_error();
		
		//query to take all the chapters of this according to this course
		$query = 'select c.chapterName, cs.Chp_id from chp_subj_mapping cs
					join subj_course_mapping sc on cs.Scm_id = sc.Scm_id
					join chapter c on c.Chp_id = cs.Chp_id
					where sc.Course_id = '.$courseid.' and sc.Subj_id = '.$subjid;
	} else
		$query = 'select chapterName, Chp_id from chapter where Subj_id = '.$subjid;
	
	if($query_run = mysql_query($query))	{
		if(mysql_num_rows($query_run))	{
			while($array = mysql_fetch_assoc($query_run))	{
				$chapter[$i]['id'] = $array['Chp_id'];
				$chapter[$i]['name'] = $array['chapterName'];
				$i++;
			}
		}
	} else echo mysql_error();
	
	$total = $i;
	
} else echo '<script> window.location.href = "g_pretest01.php";	</script>';
?>

	<br><br>
	<div class="row">
		<h2><u><p class="text-center">Chapters</p></u></h2>
	</div><br><br>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form action="questiongenerator.php" method="POST">
				<div class="panel panel-default">
					<div class="panel-body">
<?php					if($total>0)	{
							for($j=0;$j<$total;$j++)	{	
								//echo $chpid[$j];	?>
								<div class="row">
									<div class="col-md-1">
										<input type="checkbox" id="chp" name="chapters[]" 
										value="<?php echo $chapter[$j]['id']; ?>" 
										class="form-control"
<?php									if($chapter[$j]['id'] == $chpid_mrk)	{	?>
											checked
<?php									}		?>>
									</div>
									<div class="col-md-6 col-md-offset-1">
										<h4><b>
<?php										echo $chapter[$j]['name'];		?>								
										</b></h4>
									</div>
								</div><br>
<?php						}			?>
							<div class="row">
								<div class="col-md-1">
									<input type="checkbox" name="allsubj"  value="<?php echo $subjid;	?>" class="form-control">
								</div>
								<div class="col-md-6 col-md-offset-1">
									<h4><b>
										Full subject
									</b></h4>
								</div>
							</div><br>
							<!--submit and back-->
							<div class="row">
								<div class="col-md-2 col-md-offset-8">
									<input type="submit" value="give test" class="btn btn-lg btn-primary">
								</div>
								<div class="col-md-1">
									<a href="#" class="btn btn-lg btn-default">Back</a>
								</div>
							</div>
<?php					} else {	?>
							<h4><p class="text-center">
								No chapters of this subject has been found in our database
							</p></h4>
<?php					}	?>
					</div>
				</div>
			</form>
		</div>
	</div>