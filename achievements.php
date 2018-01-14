<?php

require 'required.php';
include 'theme.php';

//to get position,score and subjid from toppers
$k=0;
$query = "SELECT `position`,`percentage`,`Subj_id` FROM `toppers` WHERE `L_id` = '$l_id' ";
if($query_run = mysql_query($query))
{
	if(mysql_num_rows($query_run))
	{
		while($array = mysql_fetch_assoc($query_run))
		{
			$toppers_pos[$k] = $array['position'];
			$toppers_score[$k] = $array['percentage'];
			$toppers_subjid[$k] = $array['Subj_id'];
			$k++;
		}
	}
		
}
else
{
	echo mysql_error();
}

//to get position rating and subjid from uploaders
$u=0;
$query = "SELECT `position`,`rating`,`Subj_id` FROM `uploaders` WHERE `L_id` = '$l_id' ";
if($query_run = mysql_query($query))
{
	if(mysql_num_rows($query_run))
	{
		while($array = mysql_fetch_assoc($query_run))
		{
			$uploaders_pos[$u] = $array['position'];
			$uploaders_rating[$u] = $array['rating'];
			$uploaders_subjid[$u] = $array['Subj_id'];
			$u++;
		}
	}
		
}
else
{
	echo mysql_error();
}


//to get subject name from subjects for toppers
$i=0;
for($j=0;$j<$k;$j++)
{
	$query = "select `subjName` from `subject` WHERE `Subj_id` = '$toppers_subjid[$j]'";
	if($query_run = mysql_query($query))
	{
		while($array = mysql_fetch_assoc($query_run))
		{
			$toppers_subjname[$i] = $array['subjName'];
			$i++;
		}
		
	}
	else
	{
		echo mysql_error();
	}
	
}

//to get subject name from subjects for uploaders
$i=0;
for($j=0;$j<$u;$j++)
{
	$query = "select `subjName` from `subject` WHERE `Subj_id` = '$uploaders_subjid[$j]'";
	if($query_run = mysql_query($query))
	{
		while($array = mysql_fetch_assoc($query_run))
		{
			$uploaders_subjname[$i] = $array['subjName'];
			$i++;
		}
		
	}
	else
	{
		echo mysql_error();
	}
	
}

//
$query = "select `name`,`photo` from `login` WHERE `L_id` = '$l_id'";
	if($query_run = mysql_query($query))
	{
		$name = mysql_result($query_run,0,'name');
		$photo = mysql_result($query_run, 0, 'photo');	
	}
	else
	{
		echo mysql_error();
	}


/*for($j=0;$j<$k;$j++)
{
	echo "$toppers_pos[$j]\t\t$toppers_score[$j]\t\t$toppers_subjid[$j]\t\t$toppers_subjname[$j]</br>"; 
	
}

*/












?>










<!DOCTYPE HTML>
<HTML>
<HEAD> <TITLE>Achivement</TITLE>

<style>	
		
<!--.image {
	border-radius: 50%;
	-webkit-transition: -webkit-transform .8s ease-in-out;
	transition: transform .5s ease-in-out;
	height:180px;
}


.image:hover {
	-webkit-transform: rotate(360deg);
	transform: rotate(-360deg);
}-->


.u{
	
}


.head{
		font: 70px TIMES NEW ROMAN, sans-serif;

		text-shadow: 2px 2px grey;
		text-align:center;
		color:white;
}


.head:hover{
		font: 75px TIMES NEW ROMAN, sans-serif;

		text-shadow: 2px 2px grey;
		text-align:center;
		color:orange;
}


.achive{
		border-style: solid ;
        border-width: 1px;
        border-color:grey;
        background-color:#CD853F;
        margin: 50px 100px 400px 300px;
        padding:50px;
        height:1000px;
}


.achive:hover{
        background-color:#D2691E;
}


h1{

		font:30px times new roman, sans-serif;
		color:white;
}

table {
		padding:0px;
		text-align:center;
		border-collapse:collapse;
		table-border:0px;
		width:100%;
		border:0px solid orange;
    
}

.t {
		padding: 20px;
		color:white;
    
}

td,th{
		padding:10px;
		color:white;      

}


h2{
		color:white;
		text-align:center;
		padding:20px;
}
	
</style>
</HEAD>
<BODY>
<div class="achive">
	<div class="head">
		<img src="<?php echo $logo.'achievement.png' ?>"  height="80" width="80">Achivements<img src="<?php echo $logo.'achievement.png' ?>"  height="80" width="80">
	</div><br/>
	<div style="float:left; width:20%;">
	
	<!-- Set Div As your requirement -->
		<div class="u">
			<img src="profile photos/<?php echo $photo;	?>" height="100" width="100"/><h1><?php echo $name;?></h1>
		</div>	
	</div>
	
	<div>
		<div class="table">
			<table align="center"> 
				<h2>Mcq's solved</h2>
				<tr>
					<div class="t">	
						<th>Score</th>
						<th>Topic</th>
						<th>Date</th>
						<th>Hall of Fame</th>
					</div>	
				</tr>
				
				<tr>
					
					<td>
<?php					for($j=0;$j<$k;$j++){		?>
							
<?php							echo "$toppers_pos[$j]\t\t\t\t\t\t\t\t\t\t$toppers_score[$j]\t\t\t\t\t\t\t\t\t\t\t$toppers_subjname[$j]</br>"; }?>
					
					</td>
					
				
				</tr>  <!-- Set Div As your requirement -->
			</table>
		</div>
	</div>	
	
	<div >	
		<div class="table">
			<table align=""> 
				<h2>Mcq's uploaded</h2>
				<tr>
					<div class="t">	
						<th>Topic</th>
						<th>Rating</th>
						<th>Hall of Fame</th>
					</div>	
				</tr>
				
				<tr>
					<td>
					<?php					for($j=0;$j<$u;$j++){		?>
							
<?php							echo "$uploaders_pos[$j]\t\t$uploaders_rating[$j]\t\t$uploaders_subjname[$j]</br>"; }?>
				
				</td></tr>  
			</table>			
		</div>
	</div>
</div>	
</BODY>
</HTML>


 






