<head>
	<link rel="stylesheet" type="text/css" href="test.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
/*
	to be shown:
	1.	are mcq based	*
	2.	total no.of questions and mark of each mcq
	3.	time of test
	4.	total marks
	5.	marks will not be stored (only for guest users)
	
*/
require 'required.php';
if(!isset($_SESSION['paperid']) || !isset($_SESSION['total']))	
	echo '<script> window.location.href="home.php";	</script>';
include 'navigation.php';

	$paperid = $_SESSION['paperid'];
	
	//taking total number of questions and mark of each mcq
	$query = 'select totalMarks from paper where Paper_id = '.$paperid;
	if($query_run = mysql_query($query))	{
		if(mysql_num_rows($query_run))	{
			$total_mrk = mysql_result($query_run, 0, 'totalMarks');
			$total_q = $total_mrk/2;
			$time = $total_q;
		}
	} else echo mysql_error();
	
?>

<br><br><br><br> 
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<center><h2><b>Instructions for the test</b></h2></center>
			</div>
			<ul class="list-group">
				<li class="list-group-item"><h4>
					The test will consists of multiple choice questions (mcqs) where for each question you have to select one from
					the four options
				</h4></li>
				<li class="list-group-item"><h4>
					The test consists of total <b><?php echo $total_q; ?></b> multiple choice questions
				</h4></li>
				<li class="list-group-item"><h4>
					The marks alloted to each mcq is 2
				</h4></li>
				<li class="list-group-item"><h4>
					Hence, the marks obtained will be out of <b><?php echo $total_mrk; ?></b>
				</h4></li>
				<li class="list-group-item"><h4>
					The total duration of the test is <b><?php echo $time; ?></b> minutes
				</h4></li>
				<li class="list-group-item"><h4>
					There will be <b>no negative</b> marking in this test.
				</h4></li>
				
<?php			if(!logged_in())	{	?>
					<li class="list-group-item"><h4>
						As you do not have an account, the results of the test can not be stored for future reference.
					</h4></li>
<?php			}	?>
			</ul>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2 col-md-offset-5">
				<a href = "home.php" onclick="window.open('test.php?no=1','window','toolbar=no, menubar=no, resizable=yes')" class="btn btn-success btn-lg"><h4>Start</h4></a>
			</div> 	
		</div>
		<br>
		
	</div>
</div>
<div class="row">
		<div class="col-md-8 col-md-offset-2 panel panel-danger">
			<h4><b><p class="text-center text-danger">
				<b>NOTE:</b> Test will open in a <b><i>new</b></i> window. 
			</p></b></h4>
		</div>
	</div>