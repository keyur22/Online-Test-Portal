<?php
require 'required.php';
include 'theme.php';

	
	
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
			$time=time();
			
		} else echo mysql_error();
	}
}	?>
<?php
	if($found)	{	?>
		<body>
			<br>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h1><b><p class="text-center">
						Edit the Question
					</p></b></h1>
				</div>
			</div>
			<br>
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="updatemcq.php?mcqid=<?php echo $mcqid;?>" method="POST">							
							<!--question-->
							<div class="row">
								<div class="col-md-10">
									<h4><b>Question:</b></h4>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-10">
									<textarea class="form-control" rows="2" name="question" required><?php echo $question;?> </textarea>					
								</div>
							</div>
							<br>
							<!--options-->
							<div class="row">
								<div class="col-md-9">
									<h4><b>
										Enter the four options:
									</b></h4>
								</div>
								<div class="col-md-3">
									<h4><b>
										Tick on the correct option
									</b></h4>
								</div>
							</div><br>
							
							<!--first-->
							<div class="row">
								<div class="col-md-1">
									<h4><b>
										a)	
									</b></h4>
								</div>
								<div class="col-md-8">
									<textarea class="form-control" rows="1" name="choice1" required><?php echo $choice1;?></textarea>
								</div>
								<div class="col-md-2 col-md-offset-1">
									<div class="radio">
										<input type="radio" name="answer" value="1"
										<?php 
                                            if($answer==1) echo 'checked="checked"';
										?>>								
									</div>
								</div>
							</div><br>
							<!--second-->
							<div class="row">
								<div class="col-md-1">
									<h4><b>
										b)	
									</b></h4>
								</div>
								<div class="col-md-8">
									<textarea class="form-control" rows="1" name="choice2" required><?php echo $choice2;?></textarea>
								</div>
								<div class="col-md-2 col-md-offset-1">
									<div class="radio">
										<input type="radio" name="answer" value="2"
										<?php 
                                            if($answer==2) echo 'checked="checked"';
										?>>								
									</div>
								</div>
							</div><br>
							<!--third-->
							<div class="row">
								<div class="col-md-1">
									<h4><b>
										c)	
									</b></h4>
								</div>
								<div class="col-md-8">
									<textarea class="form-control" rows="1" name="choice3" required><?php echo $choice3;?></textarea>
								</div>
								<div class="col-md-2 col-md-offset-1">
									<div class="radio">
										<input type="radio" name="answer" value="3"
										<?php 
                                            if($answer==3) echo 'checked="checked"';
										?>>									
									</div>
								</div>					
							</div><br>
							<!--fourth-->
							<div class="row">
								<div class="col-md-1">
									<h4><b>
										d)	
									</b></h4>
								</div>
								<div class="col-md-8">
									<textarea class="form-control" rows="1" name="choice4"required><?php echo $choice4;?></textarea>
								</div>
								<div class="col-md-2 col-md-offset-1">
									<div class="radio">
										<input type="radio" name="answer" value="4"
										<?php 
                                            if($answer==4) echo 'checked="checked"';
										?>>	
										
									</div>
								</div>					
							</div><br><br><br>
							<!--submit-->
							<div class="row">
								<div class="col-md-2 col-md-offset-4">
									<input type="submit" class="btn btn-success btn-lg" value="Update">
								</div>
								<div class="col-md-1">
									<a class="btn btn-primary btn-lg" href="mcq.php?mcqid=<?php echo $mcqid;?> ">Back</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</body>
<?php
	}	?>