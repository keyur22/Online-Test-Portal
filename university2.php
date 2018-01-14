<?php

require 'required.php';
include 'theme.php';

//extracting course id and name from courses
$query = "SELECT * FROM `courses` WHERE `Course_id` != '4' " ;
$i=0;
if($query_run = mysql_query($query))
{
	while($array_row = mysql_fetch_assoc($query_run))
	{
		$cid[$i] = $array_row['Course_id'];
		$cname[$i] = $array_row['courseName'];		
		$i++;
		
	}
}
else
{
	echo mysql_error();
}


?>

<head>
			<script type="text/javascript">
				function upapers()//to check if both cid and sem are set or not
				{
					var cid=0;
					var sem=0;
					
					var cid = document.getElementById('cid').value;
					var sem = document.getElementById('sem').value;
					
					
					
					if(cid!=0 && sem!=0)
					{
						upapers1(cid,sem);
					}
					
				}
				
				
				function upapers1(choice,no)	//AJax to display papers
				{
					if(window.XMLHttpRequest)	{
						xmlhttp = new XMLHttpRequest();
					} else {
						xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
					}
					
					xmlhttp.onreadystatechange = function() {
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200)	{
							document.getElementById('upapers_div').innerHTML = xmlhttp.responseText;
						}
					}
					
					xmlhttp.open('GET', 'university3.php?courseid=' + choice + '&sem=' + no ,true);
					xmlhttp.send();
				}
			</script>
</head>

<body>

<br><br>
<div class="row">
	<h2><p class="text-center">
		University Papers
	</p></h2>
</div><br>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-2">
					<h4><b>Select Stream:</b></h4>
				</div>
				<div class="col-md-4">
					<select class="form-control" id= "cid" onchange="upapers(value);">
				<option disabled selected>Select Course</option>	
		<?php		for($j=0;$j<$i;$j++)	{	?>
				<option value="<?php	echo $cid[$j];	?>">
		<?php					  		echo $cname[$j];		?>
				</option>
	<?php							}		?>
					</select>
				</div>
				<div class="col-md-2">
					<h4><b>Semester:</b></h4>
				</div>
				<div class="col-md-4">
					<input type="number" id = "sem" max="8" min="1" class="form-control" onkeyup="upapers(value);" placeHolder="select semester">
				</div>
			</div>
		</div>
	</div>
</div>
<div id="upapers_div"></div> 

</body>
