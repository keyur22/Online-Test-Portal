<?php

require 'required.php';
include 'theme.php';

?>

<head>
	<script>
		function subject(type, sort)	{
			if(window.XMLHttpRequest)	{
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			
			xmlhttp.onreadystatechange = function()	{
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200)	{
					document.getElementById('subjects').innerHTML = xmlhttp.responseText;
				}
			}
			//document.getElementById('dis').innerHTML = addr;
			xmlhttp.open('GET', 'filter.php?type=' + type + '&sort=' + sort, true);
			xmlhttp.send();
		}
		subject(1, 1);
	</script>
</head>
<br><br>
<!--heading-->
<div class="row">
	<h1><p class="text-center">
		All Subjects
	</p></h1>
</div>
<br>
<!--dropdown for selecting the type of sorting the list-->
<div class="row">
	<div class="col-md-offset-6">
		<div class="col-md-4">
			<h4><b>Sort according to: </b></h4>
		</div>
		<div class="col-md-8">
			<select class="form-control" onchange="subject(1, value);" onload="subject(1, 1)">
				<option value="1">Alphabetical Order</option>
				<option value="2">Course Wise</option>
			</select>
		</div>
	</div>
</div>
<br>
<!--panel for the list of subjects-->
<div class="panel panel-default">
	<div class="panel-body">
		<div id="subjects"></div>
	</div>
</div>