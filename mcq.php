<?php

require 'required.php';
require 'theme.php';

if(isset($_GET['mcqid']) && !empty($_GET['mcqid']))	{
	$mcqid = $_GET['mcqid'];
	
	//checking if the mcq is uploaded by the user
	$query = 'select Mcq_id from mcq where Mcq_id = '.$mcqid.' and L_id = '.$l_id;
	$found = false;
	if($query_run = mysql_query($query))	{
		if(mysql_num_rows($query_run))
			$found = true;
	} else echo mysql_error();
	
	if($found)	{
		/* to get mcq details from mcqid*/
		$query = "select `mcq`.*, `chapter`.`chapterName` from `mcq` join `chapter` on `mcq`.`Chp_id` = `chapter`.`Chp_id`
				where `Mcq_id` = '$mcqid'";
		if($query_run = mysql_query($query)) {
			$question = mysql_result($query_run, 0, 'question');
			$choice1 = mysql_result($query_run, 0, 'choice1');
			$choice2 = mysql_result($query_run, 0, 'choice2');
			$choice3 = mysql_result($query_run, 0, 'choice3');
			$choice4 = mysql_result($query_run, 0, 'choice4');
			$answer = mysql_result($query_run, 0, 'correctChoice');
			$chpname = mysql_result($query_run, 0, 'chapterName');
			$timestamp = mysql_result($query_run, 0, 'uploadTimestamp');
			$date = date('d M, Y',$timestamp);
		} else {
			echo mysql_error();
		}
		
		/*to find correct option*/
		switch($answer)	{
			case 1 : $correctoption = 'a';
			break;
			case 2 : $correctoption = 'b';
			break;
			case 3 : $correctoption = 'c';
			break;
			case 4 : $correctoption = 'd';
			break;		
		}
	}
} 
?>

<head>
	<script type="text/javascript">
		function deletemcq(id, visibility)	
		{
			document.getElementById(id).style.display = visibility;
		}
		
		
	</script>
</head>
<?php
	if($found)	{	?>
		<body>
			<br><br>
			<!--confirm message-->
			<div class="row" id="confirm">
				<div class="col-md-10 col-md-offset-1">
					<div class="alert alert-dismissable alert-info">
						<div class="row">
							<center>
								Are you sure that you want to delete the mcq???<br>
								This action cannot be reversed.
							</center>
						</div>
						<br>
						<div class="row">
							<div class="col-md-1 col-md-offset-5">
								<a href="deletemcq.php?mcqid=<?php echo $mcqid; ?>" class="btn btn-default">
									Yes
								</a>
							</div>
							<div class="col-md-1">
								<a onclick = "deletemcq('confirm','none')" class="btn btn-default">
									No
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-3 col-md-offset-8">
				<a class="btn btn-default" onclick = "deletemcq('confirm', 'block')">
						<h4>
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						delete</h4>
					</a>
					<a class="btn btn-default" href="mcqedit.php?mcqid=<?php echo $mcqid; ?>">
						<h4>
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						edit</h4>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-2">
					<h3><b>Chapter:</b></h3>
				</div>
				<div class="col-md-5">
					<h3>
		<?php			echo $chpname;		?>
					</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-2">
					<h3><b>Date of upload:	</b></h3>
				</div>
				<div class="col-md-5">
					<h3>
		<?php			echo $date;		?>
					</h3>
				</div>
			</div><br><br>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">	
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>
		<?php					echo $question;		?>						
							</h2>
						</div>
						<div class="panel-body">
							<!--option a & b-->
							<div class="row">
								<div class="col-md-5 col-md-offset-1">
									<div class="row">
										<div class="col-md-1">
											<h3><b>a)</b></h3>
										</div>
										<div class="col-md-5">
											<h3>
		<?php									echo $choice1;		?>
											</h3>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-md-offset-1">
									<div class="row">
										<div class="col-md-1">
											<h3><b>b)</b></h3>
										</div>
										<div class="col-md-5">
											<h3>
		<?php									echo $choice2;		?>									
											</h3>
										</div>
									</div>
								</div>
							</div><br><br>
							<!--option c & d-->
							<div class="row">
								<div class="col-md-5 col-md-offset-1">
									<div class="row">
										<div class="col-md-1">
											<h3><b>c)</b></h3>
										</div>
										<div class="col-md-5">
											<h3>
		<?php									echo $choice3;		?>									
											</h3>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-md-offset-1">
									<div class="row">
										<div class="col-md-1">
											<h3><b>d)</b></h3>
										</div>
										<div class="col-md-5">
											<h3>
		<?php									echo $choice4;		?>									
											</h3>
										</div>
									</div>
								</div>					
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<h3><b>Correct Option:	</b></h3>
						</div>
						<div class="col-md-1">
							<h3>
		<?php					echo $correctoption.')';		?>
							</h3>
						</div>
						<div class="col-md-2 col-md-offset-5">
							<h3>
								<a href="uploadedmcqs01.php" class="btn btn-lg btn-primary">
									<span class="glyphicon glyphicon-arrow-left"></span>
									Back
								</a>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</body>
<?php
	}	?>
	
	<script type="text/javascript">
		document.getElementById("confirm").style.display = 'none';
	</script>