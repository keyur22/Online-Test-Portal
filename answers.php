<?php

require 'required.php';
require 'updatetppr.php';

if(isset($_SESSION['paperid']) && isset($_SESSION['mcq']))	{
	$paperid = $_SESSION['paperid'];
	$mcq = $_SESSION['mcq'];
	$count = count($mcq);
	$start_time = $_SESSION['start_time'];
	$marksforeachmcq = 2;
	$alloted = 60;	//time alloted for each mcq

	//checking which pg to redirect
	$left = ($_SESSION['total']*$alloted + $start_time)*1000 - time();
	if($left < 0)
		$addr = 'timeout.php';
	else $addr = 'score_card.php';
	
	//query to take correct answers
	$correct_count = 0;
	$i = 0;
	$query = "select m.correctChoice from mcq m join mcqinpaper mp on m.Mcq_id = mp.Mcq_id
				where mp.Paper_id = $paperid order by mp.no";
	if($query_run = mysql_query($query))	{
		while($array = mysql_fetch_assoc($query_run))	{
			$correct = $array['correctChoice'];
			if(isset($mcq[$i+1]) && ($correct == $mcq[$i+1]))
				$correct_count++;
			$i++;
		}
	} else die(mysql_error());

	if(logged_in())	{
		//updating toppers table
		update_topper($paperid, $correct_count, $marksforeachmcq);
		
		
		/*adding this paper to papersappeared table*/
		$query = "insert into `papersappeared` values(NULL, '$l_id', '$paperid', '$correct_count', '$start_time')";
		if(!mysql_query($query))
			die(mysql_error());
		
		/*storing mcqs in mcq appeared*/
		$query = "select Mcq_id from mcqinpaper mp where Paper_id = '$paperid'
				and not exists (select * from mcqsappeared ma where ma.Mcq_id = mp.Mcq_id and ma.L_id = '$l_id')";
		if($query_run = mysql_query($query))	{
			if(mysql_num_rows($query_run))	{
				while($array = mysql_fetch_assoc($query_run))	{
					$queryi = "insert into `mcqsappeared` values(NULL, '$l_id', '".$array['Mcq_id']."');";
					if(!($query_runi = mysql_query($queryi)))
						die(mysql_error());
				}
			}
		} else die(mysql_error());
		
	} else $_SESSION['correct_count'] = $correct_count;
	
	//indicating paper over
	$_SESSION['paper_over'] = true;
	
	//unsetting the sessions
	unset($_SESSION['start_time']);
	unset($_SESSION['total']);
	unset($_SESSION['mcq']);
	
	echo '<script> window.location.href="'.$addr.'";</script>';
}
?>