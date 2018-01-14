<?php

require 'required.php';


if(isset($_GET['subjid']))	{
	$subj_id = $_GET['subjid'];
	
	//taking subject name
	$subjname = get_field('subject', 'subjName', 'Subj_id', $subj_id);
	
	/*code to extract questions uploaded by that user of that subject*/
	$query ="select `mcq`.`Mcq_id`, `mcq`.`question` from `mcq` join `chapter` on `mcq`.`Chp_id` = `chapter`.`Chp_id`
				where `mcq`.`L_id` = '$l_id' and `chapter`.`Subj_id` = '$subj_id'";
	$i = 0;	//count of questions
	if($query_run = mysql_query($query))	{
		while($array = mysql_fetch_assoc($query_run)) {
			$mcqid[$i] = $array['Mcq_id'];
			$question[$i] = $array['question'].'<br>';
			$i++;
		}
	} else {
		echo mysql_error();
	}
}


?>
		<body>
			<br>
<?php		if(!empty($mcqid))	{		?>
				<!--subject heading-->
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h3><b><p class="text-center">
			<?php				echo $subjname;		?>
						</p></b></h3>
					</div>
				</div><br>
				<!--questions-->
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="list-group">
			<?php			for($j=0;$j<$i;$j++)	{		?>
								<a class="list-group-item" href="mcq.php?mcqid=<?php echo $mcqid[$j];	?>">
									<h3>
										<?php	echo $question[$j];	?>
									</h3>
								</a>					
			<?php			}						?>			
						</div>
					</div>
				</div>
<?php		} else	{		?>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h4><b><p class="text-center">
							You have not uploaded any questions of this subject yet. <br><br>
							When any questions are uploaded, they can be viewed here.
						</p></b></h4>
					</div>
				</div>
<?php		}		?>
		</body>