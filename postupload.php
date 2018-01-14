<?php

require 'required.php';

if(isset($_POST['chapter']) && isset($_POST['question']) && isset($_POST['choice1']) &&
isset($_POST['choice2']) && isset($_POST['choice3']) && isset($_POST['choice4']) && isset($_POST['answer']))	{
	$chapter = mysql_real_escape_string(htmlentities($_POST['chapter']));
	$question = mysql_real_escape_string(htmlentities($_POST['question']));
	$choice1 = mysql_real_escape_string(htmlentities($_POST['choice1']));
	$choice2 = mysql_real_escape_string(htmlentities($_POST['choice2']));
	$choice3 = mysql_real_escape_string(htmlentities($_POST['choice3']));
	$choice4 = mysql_real_escape_string(htmlentities($_POST['choice4']));
	$answer = mysql_real_escape_string(htmlentities($_POST['answer']));
	$timestamp = time();
	if(!empty($chapter) && !empty($question) && !empty($choice1) && !empty($choice2) && !empty($choice3) && 
	!empty($choice4) && !empty($answer))	{
		/*query to insert the mcq*/
		$query = 'insert into mcq 
		values(NULL, \''.$question.'\', \''.$choice1.'\', \''.$choice2.'\', \''.$choice3.'\', \''.$choice4.'\', \''.$answer.'\', \'0\', \'0\'
		, \'0\', \''.$chapter.'\', \''.$timestamp.'\', \''.$l_id.'\', \'0\')';
		echo $query.'<br>';
		if($query_run = mysql_query($query))	{
			echo '<script type"text/javascript> window.location.href="home.php?msg=1"; </script>"';
		} else {
			echo mysql_error();
		}
	} else {
		echo '<script type"text/javascript> window.location.href="preupload.php?error=1"; </script>"';
	}
	
} else {
	echo '<script type"text/javascript> window.location.href="preupload.php?error=1"; </script>"';
}

?>