<?php



//this function will take as input the paperid and no.of correct options and will update the topper table
function update_topper($paperid, $correct_cnt, $marksforeachmcq)	{
	global $l_id;
	//taking details of paper
	$query = "select Subj_id, full_subj, totalMarks from paper where Paper_id = '$paperid'";
	if($query_run = mysql_query($query))	{
		$full_subj = mysql_result($query_run, 0, 'full_subj');
		$subjid = mysql_result($query_run, 0, 'Subj_id');
		$totalmrks = mysql_result($query_run, 0, 'totalMarks');
		$user_percnt = (($correct_cnt*$marksforeachmcq)/$totalmrks)*100;
	} else die(mysql_error());
	
	if($full_subj)	{
		//taking toppers of this subject
		$query = "select position, L_id, percentage from toppers where Subj_id = '$subjid' order by position";
		$i = 0;
		if($query_run = mysql_query($query))	{
			$tppr_cnt = mysql_num_rows($query_run);
			if($tppr_cnt)	{
				while($array = mysql_fetch_assoc($query_run))	{
					$topper[$i]['lid'] = $array['L_id'];
					$topper[$i]['percent'] = $array['percentage'];
					$i++;
				}
			}
		} else die(mysql_error());

		$query = '';
		
		//creating user 
		$user['lid'] = $l_id;
		$user['percent'] = $user_percnt;
		
		if($tppr_cnt)	{
			/*//displaying before sort
			echo 'displaying before sort<br>';
			for($i=0;$i<$tppr_cnt;$i++)
				echo $topper[$i]['lid'].'--'.$topper[$i]['percent'].'<br>';*/
			
			//checking for duplicate values
			for($i=0;$i<$tppr_cnt && ($topper[$i]['percent'] != $user['percent']);$i++)	{}
			
			if($i == $tppr_cnt)	{	//true only if no duplicate value is found
				//shifting elements
				for($i=($tppr_cnt-1);$i>=0 && $topper[$i]['percent']<$user_percnt;$i--)
					$topper[$i+1] = $topper[$i];
				$i++;
				if($i>0 && ($topper[$i-1]['percent'] != $user['percent']))
					$topper[$i] = $user;
				else if($i<=0)
					$topper[$i] = $user;
				if($tppr_cnt > 3)
					array_pop($topper);
				
				$tppr_cnt_new = count($topper);
				
				//finding if there are multiple records of same user
				$j = 0;	//count of noof same user
				for($i=0;$i<$tppr_cnt_new;$i++)
					if($topper[$i]['lid'] == $user['lid'])
						$repeat[$j++] = $i;

				if($j>1)	{
					//finding smaller among the two repeated
					if($topper[$repeat[0]]['percent'] < $topper[$repeat[1]]['percent'])
						$smaller = $repeat[0];
					else
						$smaller = $repeat[1];
					
					//deleting the smaller value
					for($j=$smaller;$j<($tppr_cnt_new-1);$j++)
						$topper[$j] = $topper[$j+1];
					
					array_pop($topper);	//removing the last value
					$tppr_cnt_new--;
					
				}
				//storing in database
				//updating the existing
				for($i=0;$i<$tppr_cnt;$i++)	{
					$query = 'update toppers set L_id = '.$topper[$i]['lid'].', percentage = '.$topper[$i]['percent'].' 
					where position = '.($i+1).' and Subj_id = '.$subjid.';';
					//echo '<br>'.$query.'<br>';
					if(!($query_run = mysql_query($query)))
						die(mysql_error());
					else echo mysql_error();
				}
				
				//creating records for the non-existing
				if($tppr_cnt < 3)	{
					for(;$i<3 && $i<$tppr_cnt_new;$i++)	{
						$query = 'insert into toppers values (NULL, '.$subjid.', '.($i+1).', '.$topper[$i]['lid'].', '.$topper[$i]['percent'].')';
						//echo '<br>'.$query.'<br>';
						if(!($query_run = mysql_query($query)))
							die(mysql_error());
						else echo mysql_error();
					}
				}
			}
		} else {
			$query .= 'insert into toppers values (NULL, '.$subjid.', 1, '.$l_id.', '.$user['percent'].');';
			//echo '<br>'.$query.'<br>';
			if(!($query_run = mysql_query($query)))
				die(mysql_error());
		}
		/*displaying the array after sort
		echo '<br>displaying the array after sort<br>';
		for($i=0;$i<$tppr_cnt_new;$i++)
			echo $topper[$i]['lid'].'--'.$topper[$i]['percent'].'<br>';*/
	}
}

//this function deletes entries of the current user of the passed subj from the toppers table and will shift the toppers below the user
function delete_topper($subjid)	{
	global $l_id;
	
	//updating the toppers table
	$queryt = 'select position, L_id from toppers 
				where exists (select \'x\' from toppers where L_id = '.$l_id.' and Subj_id = '.$subjid.')
				and Subj_id = '.$subjid.' order by position';
	$i = 0;
	if($query_runt = mysql_query($queryt))	{
		$tppr_cnt = mysql_num_rows($query_runt);
		if($tppr_cnt)	{
			while($arrayt = mysql_fetch_assoc($query_runt))	{	//taking the current toppers of the subject
				$topper[$i]['pos'] = $arrayt['position'];
				$topper[$i]['lid'] = $arrayt['L_id'];
				$i++;
			}
			
			$found = 0;	//finding the lid
			for($j=0;$j<$i;$j++)	{
				if($topper[$j]['lid'] == $l_id)	{
					$found = $j;
					break;
				}
			}
			
			if($found!=2)	{	//shifting the toppers below lid to above
				for($j=$found;$j<($i-1);$j++)
					$topper[$j]['lid'] = $topper[$j+1]['lid'];
			}
			
			for($j=0;$j<($tppr_cnt-1);$j++)	{	//query to update the toppers table
				$queryu = 'update toppers set L_id = '.$topper[$j]['lid'].' 
							where Subj_id = '.$subjid.' and position = '.$topper[$j]['pos'];
				if(!mysql_query($queryu))	
					echo mysql_error();
			}
			
			//deleting the last topper
			$queryd = 'delete from toppers where Subj_id = '.$subjid.' and 
						position = '.$topper[($tppr_cnt-1)]['pos'];
			if(!mysql_query($queryd))
				echo mysql_error();
		}
	} else echo mysql_error();
}
?>