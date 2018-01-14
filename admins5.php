<?php

require 'required.php';

if(isset($_POST['c_chapters']) || isset($_POST['unc_chapters']))	{
	if(isset($_POST['c_chapters']))	{
		$c_chapters = $_POST['c_chapters'];
		$c_cnt = count($c_chapters);
	} else $c_cnt = 0;
	if(isset($_POST['unc_chapters']))	{
		$unc_chapters = $_POST['unc_chapters'];
		$unc_cnt = count($unc_chapters);
	} else $unc_cnt = 0;
	
	$courseid = $_SESSION['courseid'];
	$subjid = $_SESSION['subjid'];
	$subjno = $_SESSION['subjno'];//array of noof subjects
	$semno = $_SESSION['semno'];	//total no.of semesters
	$chapters = $_SESSION['chapters'];
	
	$i = $j = 0;	//counter for subjects
	
	//adding the uncommon
	if($unc_cnt != 0)	{
		for($l=0;$l<$unc_cnt;$l++)	{
			$chpid = $unc_chapters[$l];
			while($i<$semno)	{
				while($j<$subjno[$i])	{
					$subjectid = $chapters[$i][$j]['id'];
					$chp_subjid = get_field('chapter', 'Subj_id', 'Chp_id', $chpid);
					if($chp_subjid == $subjectid)	{
						$unc_chp['id'] = $chpid;
						$unc_chp['subj'] = $subjectid;
						$unc_chp['sem'] = ($i+3);
						break;
					}
					$j++;
				}
				if($chp_subjid == $subjectid) 
					break;
				else $j = 0;
				$i++;
			}
			if($chp_subjid != $subjectid)
				$i = 0;
			
			//storing the chapter
			$query = 'select Scm_id from subj_course_mapping where Course_id = '.$courseid.' and sem = '.$unc_chp['sem']
					.' and Subj_id = '.$unc_chp['subj'];
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))	{
					$scmid = mysql_result($query_run, 0, 'Scm_id');
					$queryi = 'insert into chp_subj_mapping values(NULL, '.$scmid.', '.$unc_chp['id'].')';
					if(!mysql_query($queryi))
						echo mysql_error();
				}
			} else echo mysql_error();
		}
	}
	
	//doing changes for the common chapters
	if($c_cnt != 0)	{
		for($i=0;$i<$c_cnt;$i++)	{
			$subjid = get_field('chapter', 'Subj_id', 'Chp_id', $c_chapters[$i]);
			//taking scmids for the subj
			$query = 'select Scm_id from subj_course_mapping where Subj_id = '.$subjid.' and Course_id != '.$courseid;
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))	{
					//adding this chapter for each of the scmids taken in the chp_subj_mapping table
					while($array = mysql_fetch_assoc($query_run))	{
						$queryi = 'insert into chp_subj_mapping values(NULL, \''.$array['Scm_id'].'\', \''.$c_chapters[$i].'\')';
						if(!mysql_query($queryi))
							echo mysql_error();
					}
					//unsetting the common attribute of the chapter
					$queryu = 'update chapter set common = 0 where Chp_id = '.$c_chapters[$i];
					if(!mysql_query($queryu))
						echo mysql_error();
				}
			} else echo mysql_error();
		}
		
	}
	
	//unsetting the sessions used
	if($unc_cnt || $c_cnt)	{
		unset($_SESSION['courseid']);
		unset($_SESSION['subjid']);
		unset($_SESSION['subjno']);
		unset($_SESSION['semno']);
		unset($_SESSION['chapters']);
	}
	
} 
echo '<script> window.location.href="home.php?msg=5";	</script>';

?>