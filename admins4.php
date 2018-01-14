<?php

require 'required.php';
include 'theme.php';

if(isset($_POST['subjid']))
{
	$subjid = $_SESSION['subjid'] = $_POST['subjid'];//array of subjids of all semesters
	$semno = $_SESSION['semno'];	//total no.of semesters
	$courseid = $_SESSION['courseid'];	//course id
	$subjno = $_SESSION['subjno'];//array of noof subjects
	
	$x=0;
	
	for($j=0;$j<$semno;$j++ )
	{
		for($k=0;$k<$subjno[$j];$k++)
		{
			
			$query = "INSERT INTO `subj_course_mapping` VALUES (NULL,'$courseid','$j'+3,'$subjid[$x]')";
			$x++;
			if(!mysql_query($query))
				echo mysql_error();
		}
	}
	
	// taking the chapter of the given subjects
	$x = 0;	//index for subjid
	for($i=0;$i<$semno;$i++)	{	//loop for semesters
		$chapters[$i]['head'] = 'Semester '.($i+1);
		for($j=0;$j<$subjno[$i];$j++)	{	//loop for subjects of each semester
			$chapters[$i][$j]['name'] = get_field('subject', 'subjName', 'Subj_id', $subjid[$x]);
			$chapters[$i][$j]['id'] = $subjid[$x];
			$query = 'select chapterName, Chp_id, common from chapter where Subj_id = '.$subjid[$x].' order by common desc';
			if($query_run = mysql_query($query))	{
				$chp_cnt = mysql_num_rows($query_run);
				if($chp_cnt)	{
					$k = 0;	//counter
					$common = 'common';
					$c = 1;
					$chapters[$i][$j]['common']['cnt'] = $chapters[$i][$j]['uncommon']['cnt'] = 0;
					while($array = mysql_fetch_assoc($query_run))	{
						if($array['common'] != $c)	{
							$common = 'uncommon';
							$c = $k = 0; //setting the common checker and counter to zero
						}
						$chapters[$i][$j][$common]['cnt']++;
						$chapters[$i][$j][$common][$k]['id'] = $array['Chp_id'];
						$chapters[$i][$j][$common][$k++]['name'] = $array['chapterName'];
					}
				} else $chapters[$i][$j]['common']['cnt'] = $chapters[$i][$j]['uncommon']['cnt'] = 0;
			} else echo mysql_error();
			$x++;
		}
	}
	$_SESSION['chapters'] = $chapters;
}	?>

<body>
	<br><br>
	<!--heading-->
	<div class="row">
		<h1><p class="text-center">
			Choose chapters of each subject
		</p></h1>
	</div>
	<br><br>
	<form action="admins5.php" method="POST">
<?php	for($i=0;$i<$semno;$i++)	{	?>
			<!--semester-->
			<div class="row">
				<div class="col-md-offset-1">
					<h2><b>
<?php 					echo $chapters[$i]['head'];	?>
					</b></h2>
				</div>
			</div>
<?php		for($j=0;$j<$subjno[$i];$j++)	{	
				$cmn_cnt = $chapters[$i][$j]['common']['cnt'];
				$ucmn_cnt = $chapters[$i][$j]['uncommon']['cnt'];	?>
				<!--subject name-->
				<div class="row">
					<div class="col-md-offset-2">
						<h3><b>
<?php						echo $chapters[$i][$j]['name'];	?>
						</b></h3>
					</div>
				</div>
<?php			if($cmn_cnt != 0)	{	?>
					<div class="row">
						<div class="col-md-offset-2">
							<h4><b>Common subjects (Tick the ones which ARE NOT there in this course)</b></h4>
						</div>
						<!--chapters and their checkboxes-->
						<div class="row">
							<div class="col-md-offset-3">
<?php							for($k=0;$k<$cmn_cnt;$k++)	{	?>
									<div class="col-md-6">
										<div class="row">
											<h5>
											<div class="col-md-2">
												<input type="checkbox" class="form-control" name="c_chapters[]"
												value="<?php	echo $chapters[$i][$j]['common'][$k]['id'];	?>">
											</div>
											<div class="col-md-8 col-md-offset-1">
												<b>
<?php												echo $chapters[$i][$j]['common'][$k]['name'];	?>
												</b>
											</div>
											</h5>
										</div>
									</div>
<?php							}	?>
							</div>
						</div>			
					</div>
<?php			}	?>
<?php			if($ucmn_cnt != 0)	{	?>
					<div class="row">
						<div class="col-md-offset-2">
							<h4><b>Uncommon subjects (Tick the ones which ARE there in this course)</b></h4>
							<!--chapters and their checkboxes-->
							<div class="row">
								<div class="col-md-offset-3">
<?php								for($k=0;$k<$ucmn_cnt;$k++)	{	?>
										<div class="col-md-6">
											<div class="row">
												<h5>
												<div class="col-md-2">
													<input type="checkbox" class="form-control" name="unc_chapters[]"
													value="<?php	echo $chapters[$i][$j]['uncommon'][$k]['id'];	?>">
												</div>
												<div class="col-md-8 col-md-offset-1">
													<b>
<?php													echo $chapters[$i][$j]['uncommon'][$k]['name'];	?>
													</b>
												</div>
												</h5>
											</div>
										</div>
<?php								}	?>
								</div>
							</div>
						</div>
					</div>
<?php			}	
				if($cmn_cnt == 0 && $ucmn_cnt == 0)	{	?>
					<div class="row">
						<div class="col-md-offset-4">
							<h4><b>No chapters are available for this subject</b></h4>
						</div>
					</div>
<?php			}	?>
<?php		}
		}	?>
		<br><br>
		<div class="row">
			<div class="col-md-2 col-md-offset-9">
				<input type="submit" class="btn btn-primary btn-lg">
			</div>
		</div>
	</form>
</body>