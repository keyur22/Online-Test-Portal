<?php
require 'required.php';
include 'theme.php';
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
	$query = "select sc.Subj_id, s.subjName from subject s 
				join subj_course_mapping sc on s.Subj_id = sc.Subj_id
				where sc.Course_id = '$courseid' and sc.sem = '$sem'";
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

//to get only 1st position topper for all subjects for carousel
$f=0;
for($j=0;$j<$i;$j++)
{
	$query = "SELECT `L_id`,`percentage`,`Subj_id` FROM `toppers` WHERE `Subj_id` = '$subject_id[$j]' and `position` = '1'";
	if($query_run = mysql_query($query)) 
	{
		if(mysql_num_rows($query_run))
		{
			while($array = mysql_fetch_assoc($query_run))
			{
				$ctoppers_Lid[$f] = $array['L_id'];
				
				$ctoppers_score[$f] = $array['percentage'];
				$ctoppers_Subjid[$f] = $array['Subj_id'];
				
				$f++;				
			}
		}
	} else echo mysql_error();
}




//to get Lid,position,score and subject id from toppers
$k=0;
for($j=0;$j<$i;$j++)
{
	$query = "SELECT `L_id`,`position`,`percentage`,`Subj_id` FROM `toppers` WHERE `Subj_id` = '$subject_id[$j]' order by `position`";
	if($query_run = mysql_query($query)) 
	{
		if(mysql_num_rows($query_run))
		{
			while($array = mysql_fetch_assoc($query_run))
			{
				$toppers_Lid[$k] = $array['L_id'];
				$toppers_position[$k] = $array['position'];
				$toppers_score[$k] = $array['percentage'];
				$toppers_Subjid[$k] = $array['Subj_id'];
				$k++;				
			}
		}
	} else echo mysql_error();
}

//to get Lid,position,rating and subject id from uploaders
$u=0;
for($j=0;$j<$i;$j++)
{
	$query = "SELECT `L_id`,`position`,`rating`,`Subj_id` FROM `uploaders` WHERE `Subj_id` = '$subject_id[$j]' order by `position`";
	if($query_run = mysql_query($query)) 
	{
		if(mysql_num_rows($query_run))
		{
			while($array = mysql_fetch_assoc($query_run))
			{
				$uploaders_Lid[$u] = $array['L_id'];
				$uploaders_position[$u] = $array['position'];
				$uploaders_rating[$u] = $array['rating'];
				$uploaders_Subjid[$u] = $array['Subj_id'];
				$u++;				
			}
		}
	} else echo mysql_error();
}


//to get username from login for carousel
$i=0;
for($j=0;$j<$f;$j++)
{
	$query = "select `photo`, `name` from `login` WHERE `L_id` = '$ctoppers_Lid[$j]'";
	if($query_run = mysql_query($query))
	{
		$photo = mysql_result($query_run, 0, 'photo');
		$ctoppers_name[$j] = mysql_result($query_run, 0, 'name');
		$position = strpos($ctoppers_name[$j], ' ');
		if(!empty($position))
			$ctoppers_name[$j] = substr($ctoppers_name[$j], 0, $position);
		
		if(empty($photo))
			$ctoppers_p[$j] = 'default-user.png';
		else
			$ctoppers_p[$j] = $photo;
	} else echo mysql_error();
	
}







//to get username from login for toppers
$i=0;
for($j=0;$j<$k;$j++)
{
	$query = "select `photo`, `name` from `login` WHERE `L_id` = '$toppers_Lid[$j]'";
	if($query_run = mysql_query($query))
	{
			$photo = mysql_result($query_run, 0, 'photo');
			$toppers_name[$j] = mysql_result($query_run, 0, 'name');
			$position = strpos($toppers_name[$j], ' ');
			if(!empty($position))
				$toppers_name[$j] = substr($toppers_name[$j], 0, $position);
			
			if(empty($photo))
				$toppers_p[$j] = 'default-user.png';
			else $toppers_p[$j] = $photo;
	} else echo mysql_error();
	
}


//to get username from login for uploaders
$i=0;
for($j=0;$j<$u;$j++)
{
	$query = "select `photo`, `name` from `login` WHERE `L_id` = '$uploaders_Lid[$j]'";
	if($query_run = mysql_query($query))
	{
		$photo = mysql_result($query_run, 0, 'photo');
		$uploaders_name[$j] = mysql_result($query_run, 0, 'name');
		$position = strpos($uploaders_name[$j], ' ');
		if(!empty($position))
			$uploaders_name[$j] = substr($uploaders_name[$j], 0, $position);
		
		if(empty($photo))
			$uploaders_p[$j] = 'default-user.png';
		else
			$uploaders_p[$j] = $photo;
	} else echo mysql_error();
	
}



//to get subject abbreviation from subjects for carousel
$i=0;
for($j=0;$j<$f;$j++)
{
	$query = "select `subjName`,`abbreviation` from `subject` WHERE `Subj_id` = '$ctoppers_Subjid[$j]'";
	if($query_run = mysql_query($query))
	{
		while($array = mysql_fetch_assoc($query_run))
		{
			$ctopper_subjname[$i] = $array['subjName'];
			$a = strlen($ctopper_subjname[$i]);
			if($a <= 40)
			{
				$ctoppers_subjname[$i] = $array['subjName'];
				
			} else $ctoppers_subjname[$i] = $array['abbreviation'];
			$i++;
		}
		
	} else echo mysql_error();
	
}

//to get subject abbreviation from subjects for toppers
$i=0;
for($j=0;$j<$k;$j++)
{
	$query = "select `abbreviation` from `subject` WHERE `Subj_id` = '$toppers_Subjid[$j]'";
	if($query_run = mysql_query($query))
	{
		while($array = mysql_fetch_assoc($query_run))
		{
			$toppers_subjname[$i] = $array['abbreviation'];
			$i++;
		}
	} else echo mysql_error();
}


//to get subject abbreviation from subjects for uploaders
$i=0;
for($j=0;$j<$u;$j++)
{
	$query = "select `abbreviation` from `subject` WHERE `Subj_id` = '$uploaders_Subjid[$j]'";
	if($query_run = mysql_query($query))
	{
		while($array = mysql_fetch_assoc($query_run)) {
			$uploaders_subjname[$i] = $array['abbreviation'];
			$i++;
		}
		
	} else echo mysql_error();
}

//message system
if(isset($_GET['msg']))	{
	switch($_GET['msg'])	{
		case 1: $msg = 'Your question has been successfully uploaded';
			break;
		case 2:	$msg = 'your comment and rating has been saved successfully';
			break;
		case 3: $msg = 'Your message Has been successfully sent.<br>Thank you for contacting us';
			break;
		case 4: $msg = 'Changes have been saved successfully';
			break;
		case 5: $msg = 'New course was added successfully';
			break;
		case 6: $msg = 'MCQ deleted successfully';
			break;
	}
}

$trial = 'akash';
?>
<body id="bd">
<div class="row">
	<div class="col-md-9">
<?php	if(isset($msg) && !empty($msg))	{	?>
			<br>
			<div class="row">
				<div class="alert alert-success" role="alert">
					<center>
<?php					echo $msg;	?>
					</center>
				</div>
			</div>
			<br>
<?php	}	?>
		<!--CAROUSEL-->
		<div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0"></li>
				  <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<br><br>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="book.jpg"  width="360" height="345">
					</div>
					<?php				for($j=0;$j<$f;$j++)  {									?>
					<div class="item ">
						<div class="row">
							<div class="col-md-4 col-md-offset-2">
								<img src="<?php echo $image_folder.$ctoppers_p[$j];?>" height="250px" width="250px">
							</div>
							<div class="col-md-5">
								<!--percentage and rank-->
								<div class="row">
									<div class="col-md-4">
										<h1><div id="rank">1st</div></h1>
									</div>
								</div>
								<!--name-->
								<div class="row">
									<div class="col-md-4">
										<h1><?php echo $ctoppers_name[$j];?></h1>
									</div>
								</div>
								<!--subject-->
								<div class="row">
									<div class="col-md-8">
										<h3><?php echo $ctoppers_subjname[$j];?></h3>
									</div>
									<div class="col-md-2">
										<h2><?php echo $ctoppers_score[$j].'%';?>	</h2>
									</div>
								</div>
								<br><br>
							</div>
						</div>
					</div>
					<?php }?>
				  
					<div class="item">
						<img src="mcqs.jpg" alt="Flower" width="360" height="345">
					</div>

					<div class="item">
						<img src="sm.png" alt="Flower" width="360" height="360">
					</div>
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<br><Br><br><Br><br><Br><br><Br><br><Br><br><Br><br><Br>
		<!--tiles-->
		<div class="row">
			<div class="container">
				<br/>
				<div class="row">
					<div class="col-sm-4">
						<div class="tile red">
							<a href="pretest01.php">
								<font color="white"><h3 class="title">MCQ'S</h3>
									<p>Solve MCQ's and earn the Hall Of Fame.</p>
								</font>
							</a>	
						</div>
					</div>
					<div class="col-sm-4">
						<div class="tile orange">
							<a href="preupload.php">
								<font color="white"><h3 class="title">UPLOAD</h3>
									<p>Hey <?php echo $name	?>, have some questions to share? click here</p>
								</font>
							</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="tile green">
							<a href="university1.php">
								<font color="white"><h3 class="title">PAPERS</h3>
									<p>Get the University papers absolutly Free.</p>
								</font>
							</a>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="tile blue">
							<a href="statistics-01.php">
								<font color="white"><h3 class="title">STATISTICS</h3>
									<p>Hey <?php echo $name	?>,Check your Status.</p>
								</font>
							</a>
						</div>
					</div>    
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3" id="trial">
		<br>
		<!--hall of fame-->
		<div class="row">
			<h4><b><font color="#ff9933"><center>HALL OF FAME</center></font></b></h4>
			<br>
			<ul class="nav nav-tabs nav-justified">
				<li role="presentation" class="active"><a href="#top_scorers" aria-controls="top scorers" data-toggle="tab">top scorers</a></li>
				<li role="presentation"><a href="#top_uploaders" aria-controls="top uploaders" data-toggle="tab">top uploaders</a></li>
			</ul>
			<div class="tab-content">
				<br>
				<div role="tabpanel" class="tab-pane active col-md-offset-1" id="top_scorers">
						<table id="hof">
							<tr>
								<th></th>
								<th>Rank</th>
								<th>Name</th>
								<th>%</th>
								<th>Subject</th>
							</tr>
								<marquee >
<?php						for($j=0;$j<$k;$j++) { 		?>
									<tr>
										<td><img src="<?php echo $image_folder.$toppers_p[$j];?>" height="20" width="20"></td>
										<td><?php echo $toppers_position[$j]	?></td>
										<td><?php echo $toppers_name[$j]	?></td>
										<td><?php echo $toppers_score[$j]	?></td>
										<td><?php echo $toppers_subjname[$j]	?></td>
									</tr>
<?php						}	?>
								</marquee>
						</table>
							<br/>						
				</div>
				<div role="tabpanel" class="tab-pane fade" id="top_uploaders">
						<table id="hof">
							<tr>
								<th></th>
								<th>Rank</th>
								<th>Name</th>
								<th>Rating</th>
								<th>Subject</th>
							</tr>
								<marquee >
<?php						for($j=0;$j<$u;$j++) { 		?>
									<tr>
										<td><img src="<?php echo $image_folder.$uploaders_p[$j];?>" height="20" width="20"></td>
										<td><?php echo $uploaders_position[$j]	?></td>
										<td><?php echo $uploaders_name[$j]	?></td>
										<td><?php echo $uploaders_rating[$j]	?></td>
										<td><?php echo $uploaders_subjname[$j]	?></td>
									</tr>
<?php						}	?>
								</marquee>
						</table>
						<br/>		
				</div>
			</div>
		</div>
		<!--notifications-->
		<div class="row">
			<!--<div class="blink"><h2><a href="">Join US!!!</a><h2></div>-->
			<hr/>
<?php		if(!empty($msgs))	{		?>
				<font color="lightblue" size="5px">NOTIFICATION!</font>
				<br><br><br>
				<marquee style=" bottom:0; height: 200px; text-align="middle" scrollamount="2" direction="up" loop="true">
					<ul>
<?php					foreach($msgs as $m)	{	?>
							<li id="notify">
<?php							echo $m;	?>
							</li>
<?php					}		?>
					</ul>
				</marquee>
<?php		}		?>
		</div>
	</div>

</div>
	
</body>