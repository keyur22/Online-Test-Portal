<?php

require 'required.php';

if(isset($_GET['subjid']) && isset($_GET['chpid']))	{
	$subjid = $_GET['subjid'];
	$chpid_mrk = $_GET['chpid'];
	
	//checking if the subject is from interests
	$query = 'select Subj_id from interests where L_id = '.$l_id.' and Subj_id = '.$subjid;
	if($query_run = mysql_query($query))	{
		if(mysql_num_rows($query_run))
			$interest = true;
		else $interest = false;
	} else die(mysql_error());
	
	$i = 0;	//count of course specific chapters
	if($interest == false)	{
		//taking student's course
		$courseid = get_field('student', 'Course_id', 'L_id', $l_id);
		
		/*to take chapters of subjid*/
		$query = "select cs.Chp_id, c.chapterName from chp_subj_mapping cs
					join chapter c on c.Chp_id = cs.Chp_id
					join subj_course_mapping sc on sc.Scm_id = cs.Scm_id
					where c.Subj_id = '$subjid' and sc.Course_id = '$courseid'
					order by c.chapterName";
		if($query_run = mysql_query($query)) {
			$numrows = mysql_num_rows($query_run);
			if($numrows>0)	{
				while($array = mysql_fetch_assoc($query_run)) {
					$chpname[$i] = $array['chapterName'];
					$chpid[$i] = $array['Chp_id'];
					$i++;
				}
			}
		} else echo mysql_error();
		
		//taking common chapters of the subject
		$query = 'select Chp_id, chapterName from chapter where Subj_id = '.$subjid.' and common = 1';
		if($query_run = mysql_query($query))	{
			if(mysql_num_rows($query_run))	{
				while($array = mysql_fetch_assoc($query_run))	{
					$chpname[$i] = $array['chapterName'];
					$chpid[$i] = $array['Chp_id'];
					$i++;
				}
			}
		}
	} else	{
		//taking all the chapters for the subject
		$query = 'select Chp_id, chapterName from chapter where Subj_id = '.$subjid;
		if($query_run = mysql_query($query))	{
			if(mysql_num_rows($query_run))	{
				while($array = mysql_fetch_assoc($query_run))	{
					$chpname[$i] = $array['chapterName'];
					$chpid[$i] = $array['Chp_id'];
					$i++;
				}
			}
		} else echo mysql_error();
	}
	$total = $i;
	

?>
		<div class="row">
			<h2><u><p class="text-center">Chapters</p></u></h2>
		</div><br><br>
<?php	if($total>0)	{		
			for($j=0;$j<$total;$j++)	{	
				//echo $chpid[$j];	?>
				<div class="row">
					<div class="col-md-1">
						<input type="checkbox" id="chp" name="chapters[]" 
						value="<?php echo $chpid[$j]; ?>" 
						class="form-control"
<?php					if($chpid[$j] == $chpid_mrk)	{	?>
							checked
<?php					}		?>>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<h4><b>
<?php						echo $chpname[$j];		?>								
						</b></h4>
					</div>
				</div><br>
<?php		}			?>
			<hr>
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
					<a href="home.php" class="btn btn-lg btn-default">Back</a>
				</div>
			</div>
<?php	} else {	?>
			<h4><p class="text-center">
				No chapters of this subject has been found in our database
			</p></h4>
<?php	}
}
?>
<script type="text/javascript">
	function all(source)	{
		var chps = document.getElementByName("chapters[]");
		for(var i in chps)
			chps[i].checked = source.checked;
	}
</script>