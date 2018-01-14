<?php

require 'required.php';
require 'notifications.php';

/*to take courseid and sem from l_id*/
$query = "select `Course_id`, `sem` from `student` where `L_id` = '$l_id'";
if($query_run = mysql_query($query)) 
{
	$courseid = mysql_result($query_run, 0, 'Course_id');
	$sem = mysql_result($query_run, 0, 'sem');
} 

$i = 0;	//count of subjects
if($courseid != 0)
{	
	/*to get subjects of that course*/
	$query = "select `Subj_id`, `subjName` from `subject` where `Course_id` = '$courseid' and `sem` = '$sem'";
	if($query_run = mysql_query($query))
	{
		if(mysql_num_rows($query_run))
		{
			while($array = mysql_fetch_assoc($query_run))
			{
				$subject_id[$i] = $array['Subj_id'];
				$subject_name[$i] = $array['subjName'];
				$i++;
			}
		}
	}
}
	
//to get subjects from interests
$query = "select `interests`.`Subj_id`, `subject`.`subjName` from `interests` 
			join `subject` on `subject`.`Subj_id` = `interests`.`Subj_id`
			where `interests`.`L_id` = '$l_id'";
if($query_run = mysql_query($query))	
{
	if(mysql_num_rows($query_run))
	{
		while($array = mysql_fetch_assoc($query_run))
		{
			$subject_id[$i] = $array['Subj_id'];
			$subject_name[$i] = $array['subjName'];
			$i++;
		}
	}
}

//to get Lid,position,score and subject id from toppers
$k=0;
for($j=0;$j<$i;$j++)
{
	$query = "SELECT `L_id`,`position`,`score`,`Subj_id` FROM `toppers` WHERE `Subj_id` = '$subject_id[$j]'";
	if($query_run = mysql_query($query)) 
	{
		if(mysql_num_rows($query_run))
		{
			while($array = mysql_fetch_assoc($query_run))
			{
				$toppers_Lid[$k] = $array['L_id'];
				$toppers_position[$k] = $array['position'];
				$toppers_score[$k] = $array['score'];
				$toppers_Subjid[$k] = $array['Subj_id'];
				$k++;				
			}
		}
	}
	else
	{
		echo mysql_error();
	}
}




//to get username from login 
$i=0;
for($j=0;$j<$k;$j++)
{
	$query = "select `name` from `login` WHERE `L_id` = '$toppers_Lid[$j]'";
	if($query_run = mysql_query($query))
	{
		while($array = mysql_fetch_assoc($query_run))
		{
			$uname[$i] = $array['name'];
			$i++;
		}
		
	}
	else
	{
		echo mysql_error();
	}
	
}

//to get subject name from subjects 
$i=0;
for($j=0;$j<$k;$j++)
{
	$query = "select `subjName` from `subject` WHERE `Subj_id` = '$toppers_Subjid[$j]'";
	if($query_run = mysql_query($query))
	{
		while($array = mysql_fetch_assoc($query_run))
		{
			$subjname[$i] = $array['subjName'];
			$i++;
		}
		
	}
	else
	{
		echo mysql_error();
	}
	
}

?>	

<head>
	<script type="text/javascript">
		function scorers()	//AJax to display papers
				{
					if(window.XMLHttpRequest)	{
						xmlhttp = new XMLHttpRequest();
					} else {
						xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
					}
					
					xmlhttp.onreadystatechange = function() {
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200)	{
							document.getElementById('topscorers_div').innerHTML = xmlhttp.responseText;
						}
					}
					
					xmlhttp.open('GET', 'fame.php',true);
					xmlhttp.send();
				}
			</script>
</head>



	
	<!--right side bar-->
	<div class="col-md-2" id="trial">
		<div class="row">
			<h3><b>HALL OF FAME</b></h3>
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
			</ul>
			<div class="tab-content" style="height: 100px">
				<div role="tabpanel" class="tab-pane active" id="home">
					<center><i>
<?php					for($j=0;$j<$i;$j++) { 		?>
							<FONT color="#DAA520">
								<?php echo "$toppers_position[$j]\t\t$uname[$j]\t\t$toppers_score[$j]\t\t$subjname[$j]\n<br/>";?>
							</font>
							<br/>
<?php					}	?>
					</i></center>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="profile"></div>
			</div>
			<div id = "topscorers_div"></div>
			<p><h4>Get your Name into the Golden words in Hall of fame By simply solving the Online MCQ's!!!<h4></p>
			<br/>
			<!--<div class="blink"><h2><a href="">Join US!!!</a><h2></div>-->
			<hr/>
<?php		if(!empty($msgs))	{		?>
				<font color="red" size="5px">NOTIFICATION!</font>
				<marquee style=" bottom:0; height: 100%; text-align="middle" scrollamount="2" direction="up" loop="true">
					<ul>
<?php					foreach($msgs as $m)	{	?>
							<li>
<?php							echo $m;	?>
							</li>
<?php					}		?>
					</ul>
				</marquee>
<?php		}		?>
		</div>
	</div>