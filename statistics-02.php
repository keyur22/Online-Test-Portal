<?php

	require 'required.php';
	include 'theme.php';

if(isset($_GET['subjid']) && !empty($_GET['subjid']))	{
	$subjid = $_GET['subjid'];
	$markforeachquestion = 2;
	
	//taking papers of the subject
	$query = "select p.Paper_id, p.totalMarks, pa.correctChoices, pa.timestampAppear from paper p 
				join papersappeared pa on p.Paper_id = pa.Paper_id
				where p.Subj_id = '$subjid' and pa.L_id = '$l_id'
				order by pa.timestampAppear desc";
	if($query_run = mysql_query($query))	{
		$num_rows = mysql_num_rows($query_run);
		$i = 0;
		if($num_rows)	{
			while($array = mysql_fetch_assoc($query_run))	{
				$paper[$i]['id'] = $array['Paper_id'];
				$paper[$i]['time'] = date('d M, Y',$array['timestampAppear']);
				$paper[$i]['percent'] = round(($array['correctChoices']*$markforeachquestion/$array['totalMarks'])*100);
				$k = 0;	//count of chapters of current paper
				$queryc = "select c.chapterName from chapter c
							join chaptersinpaper cp on c.Chp_id = cp.Chp_id
							where cp.Paper_id = '".$array['Paper_id']."'";
				if($query_runc = mysql_query($queryc))	{
					while($arrayc = mysql_fetch_assoc($query_runc))	{
						$paper[$i]['chapter_name'][$k] = $arrayc['chapterName'];
						$k++;
					}
				}
				$chp_cnt[$i] = count($paper[$i]['chapter_name']);
				$i++;
			}
		}
	} else echo mysql_error();
}	else die();

?>

<html>
<head>
<style>
table,tr {
    padding:10px;
    text-align:center;
    border-collapse:collapse;
    table-border:5px;
    width:50%;
    border: 1px solid orange;
    
}

th {
    padding: 10px;
    background-color:orange;
    color:white;
    
}

td{
 padding:10px;      

}
td:hover{
 background-color:#F5DEB3;
}
td#at:hover{
background-color:#90EE10;
}

td#hf:hover{
background-color:gold;
}

.button {
    background-color: #4CAF50;
    border: solid green ;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 0px 0px;
    cursor: pointer;
}

tr#tr:nth-child(even){
background-color: #f2f2f2;
}
</style>
<title>Statistics</title>
</head>
<body>
<br><br>
<div class="subject">
	<div class="table">
		<table align="center"> 
			<tr>
				<th>Sr.no</th>
				<th>Topics Involved</th>
				<th>Date of Appearing</th>
				<th>Percent</th>
<!--			<th>Highest</th>
				<th>Hall of Fame</th>-->
				<th>Solution set</th>
			</tr>
<?php		for($j=0;$j<$i;$j++)	{	?>
				<tr id="tr">
					<td>
<?php					echo	($j+1);	?>
					</td>
					<td>
<?php					for($k=0;$k<$chp_cnt[$j];$k++)	{
							echo $paper[$j]['chapter_name'][$k];
							if($k!=($chp_cnt[$j]-1))
								echo ', ';
						}	?>
					</td>
					<td>
<?php					echo $paper[$j]['time'];	?>
					</td>	
					<td>
<?php					echo $paper[$j]['percent'].'%';	?>
					</td>
					<td id="at">
						<a class="button" type="submit" href="solution_set.php?paperid=<?php	echo $paper[$j]['id'];	?>">
							Solution
						</a>
					</td>
				</tr>
<?php		}	?>
		</table>
	</div>

</div>

</body>
</html>
