<?php


require 'required.php';

if(isset($_GET['mcqid']) && isset($_POST['question']) && isset($_POST['choice1']) && isset($_POST['choice2']) && isset($_POST['choice3']) && isset($_POST['choice4']) && isset($_POST['answer']))	
{
	$question = $_POST['question'];
	$choice1 = $_POST['choice1'];
	$choice2 = $_POST['choice2'];
	$choice3 = $_POST['choice3'];
	$choice4 = $_POST['choice4'];
	$answer = $_POST['answer'];
	$timestamp = time();
	$mcqid = $_GET['mcqid'];
	
	//checking if the mcq is uploaded by the user
	$query = 'select Mcq_id from mcq where Mcq_id = '.$mcqid.' and L_id = '.$l_id;
	$found = false;
	if($query_run = mysql_query($query))	{
		if(mysql_num_rows($query_run))
			$found = true;
	} else echo mysql_error();
	
	if($found)	{
		if(!empty($question) && !empty($choice1) && !empty($choice2) && !empty($choice3) && !empty($choice4) && !empty($answer))
		{
			
			$query = "SELECT `question`,`choice1`,`choice2`,`choice3`,`choice4`,`correctChoice` FROM `mcq` WHERE `Mcq_id`='$mcqid'";
			if($query_run = mysql_query($query))
			{
				$bquestion = mysql_result($query_run,0,'question');
				$bchoice1 = mysql_result($query_run,0,'choice1');
				$bchoice2 = mysql_result($query_run,0,'choice2');
				$bchoice3 = mysql_result($query_run,0,'choice3');
				$bchoice4 = mysql_result($query_run,0,'choice4');
				$banswer = mysql_result($query_run,0,'correctChoice');
			}
			else
			{
				echo mysql_error();
				
			}
			
			if($bquestion!=$question || $bchoice1!=$choice1 || $bchoice2!=$choice2 || $bchoice3!=$choice3 || $bchoice4!=$choice4 || $banswer!=$answer)
			{
		
				
				/*query to update the mcq*/
				$query = "UPDATE `mcq` SET `question` = '$question',`choice1` = '$choice1',`choice2` = '$choice2',`choice3` = '$choice3',`choice4`= '$choice4',`correctChoice` = '$answer',
				`uploadTimestamp`='$timestamp' WHERE `Mcq_id`='$mcqid'";
			
				if($query_run = mysql_query($query))
				{
					
					echo '<script type"text/javascript> window.location.href="home.php?msg=4"; </script>"';
				}
				else
				{
					echo mysql_error();
				
				}
			}
		}
		else
		{
			echo 'All Fields Are Required';	
		}
	}
}	?>