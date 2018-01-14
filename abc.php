<?php
 require 'required.php';
 include 'navigation.php';
 
 //to get only 1st position topper for all subjects for carousel
$f=0;
	$query = "SELECT `L_id`,`percentage`,`Subj_id` FROM `toppers` WHERE `position` = '1'";
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
	}
	else
	{
		echo mysql_error();
	}
	
//to get Lid,position,score and subject id from toppers
$k=0;

	$query = "SELECT `L_id`,`position`,`percentage`,`Subj_id` FROM `toppers` order by `position`";
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
	}
	else
	{
		echo mysql_error();
	}

	
	
//to get username from login for carousel

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
	}
	else
	{
		echo mysql_error();
	}
	
}


//to get username from login for toppers

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
			else
				$toppers_p[$j] = $photo;
	}
	else
	{
		echo mysql_error();
	}
	
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
				
			}
			else
			{
				$ctoppers_subjname[$i] = $array['abbreviation'];
			}
			
			$i++;
		}
		
	}
	else
	{
		echo mysql_error();
	}
	
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
		
	}
	else
	{
		echo mysql_error();
	}
	
}

 
$query = "SELECT * FROM `toppers`";
if($query_run = mysql_query($query))
{
	$query_num_rows = mysql_num_rows($query_run);
	
}
else
{
	echo mysql_error();
}
 
 
 
 
 
 
 
?>

<head>
	<!--<link rel="stylesheet" href="style.css">-->
	<link rel="stylesheet" href="style2.css">
</head>

	
		<div id="suggestions" ></div>
		<div id="suggestions_ref" style="display: none;">
	
		<!--CAROUSEL-->
		<div class="carousel">
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
					<div class="item active ">
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
		
		
	<!--tiles -->

<div class="container">
  <br/>
  <div class="row">
    
    <div class="col-sm-4">
      <div class="tile red">
	  <a href="g_pretest01.php">
        <font color="white"><h3 class="title">MCQ'S</h3>
        <p>Hello, Solve MCQ's and earn the Hall Of Fame.</p>
		</font> </a>
   
	 </div>
    </div>
    <div class="col-sm-4">
      <div class="tile orange">
	<a href="login.php?request=1">	
	<font color="white">  <h3 class="title">Upload</h3>
        <p>Hey,register with us and upload your choice of Question.</p>
    </font>  </a>  </div>
    </div>
	<div class="col-sm-4">
      <div class="tile grey">
	  <a href="contactus.php">
        <font color="white"><h3 class="title">Contact-us</h3>
        <p>Contact us so we can build a bond.</p>
		</font> </a>
   
	 </div>
    </div>
	
  </div>
  <div class="row">
    <div class="col-sm-4">
      <div class="tile green">
       <a href="login.php?request=2"> 
	   <font color="white"><h3 class="title">PAPERS</h3>
        <p>Get the University papers absolutly Free.</p>
      </font> </a>  </div>
    </div>
	
    <div class="col-sm-4">
      <div class="tile blue">
	  <a href="all_subjects.php">
      <font color="white">  <h3 class="title">SUBJECT LIST</h3>
        <p>Hey,Check the list of all subjects</p>
	  </font> </a>	
      </div>
    </div> 
		<div class="col-sm-4">
      <div class="tile purpel">
       <a href="login.php?request=3"> 
	   <font color="white"><h3 class="title">Feedback</h3>
        <p>Hey please feed us back so we can improve us.</p>
      </font> </a>  </div>
    </div>
  </div>
</div>
</br></br>
</br></br>
</br></br>

		<div class="adv">
			<div class="famebox">
			<?php	if($query_num_rows!=0)	{				?>
				<h3 id="hof"><b>HALL OF FAME</b></h3>
				<hr>
				<table id="hof">
							<tr>
								<td>Photo</td>
								<td>Rank</td>
								<td>Name</td>
								<td>%</td>
								<td>Subject</td>
								
							</tr>
								<marquee> 
<?php								if($k>9){
									$k = 10;
								}
								for($j=0;$j<$k;$j++) { 		?>
									<tr>
										<td><img src="<?php echo $image_folder.$toppers_p[$j];?>" height="70" width="70"></td>
										<td><?php echo $toppers_position[$j]	?></td>
										<td><?php echo $toppers_name[$j]	?></td>
										<td><?php echo $toppers_score[$j]	?></td>
										<td><?php echo $toppers_subjname[$j]	?></td>
									</tr>
<?php						}	?>
								</marquee>
						</table>
			<?php	}				?>		
				
				<p><h4 id="promo">Get your Name into the Golden words in Hall of fame By simply solving the Online MCQ's!!!<h4></p>
				<br/>
				<div class="blink"><h1><a href="signup(form).php">Join US!!!</a><h2></div>
				
			</div>
		</div>
	
	<div id="footerHld">

		<div style="height: 30px; margin-top: 0px; position: absolute;width: 100%;z-index: 1; clear:both;line-height: 30px;text-align: center;
					background-color: white;background: rgba(255,255,255,0.9); box-shadow: 0 0 20px rgba(0,0,0,.3);" class="">
					Developed &amp; Maintained by
					<a style="color: blue;font-weight: bold;display: inline;padding: 0px;" href="aboutus.php" target="_parent">
					Srikanth Pisharody , Keyur Chaudhari &amp; Saifali Dhuka</a>
			
        </div>
 
	
	</div>
</body>
