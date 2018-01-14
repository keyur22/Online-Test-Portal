<?php

require 'required.php';


	if(isset($_SESSION['paperid']))	{
		$paperid = $_SESSION['paperid'];
		$correct_count = 0;
		
		//total questions
		$query = "select `Mcq_id` from `mcqinpaper` where `Paper_id` = '$paperid'";
		if($query_run = mysql_query($query))	{
			$i = mysql_num_rows($query_run);
		} else echo mysql_error();

		if(logged_in())	{
			$query = "select `correctChoices` from `papersappeared`	
			where `L_id` = '$l_id' and `Paper_id` = '$paperid'";
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))
					$correct_count = mysql_result($query_run, 0, 'correctChoices');
			} else echo mysql_error();
		} else if(isset($_SESSION['correct_count']))	{
			$correct_count = $_SESSION['correct_count'];
		}
	
		//percentage--
		$percent = round($correct_count/$i * 100);
		
?>

<body>
	<br><Br>
	<div class="row">
		<h1><b><p class="text-center">
			Your Score Card!
		</p></b></h1>
	</div>
	<br><BR>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<!--total questions-->
					<div class="row">
						<div class="col-md-6">
							<h3><b>
								Total no.of questions appeared:	
							</b></h3>
						</div>
						<div class="col-md-5 col-md-offset-1">
							<h3>
<?php							echo $i;	?>
							</h3>
						</div>
					</div>
					<Br>
					<!--Correct answer-->
					<div class="row">
						<div class="col-md-6">
							<h3><b>
								No.of correct answers:	
							</b></h3>
						</div>
						<div class="col-md-5 col-md-offset-1">
							<h3>
<?php							echo $correct_count;		?>
							</h3>
						</div>
					</div>
					<br>
				</div>
			</div>
			<!--percentage-->
			<div class="row">
				<h1><b><p class="text-center">
					Percentage scored:	
				</p></b></h1>
			</div>
			<div class="row">
				<h1><p class="text-center">
<?php				echo $percent.'%!';		?>
				</p></h1>
			</div>
			<br><br>
			<div class="row">
				<div class="col-md-4 col-md-offset-3">
					<a href="solution_set.php" class="btn btn-primary btn-default">View solution set</a>
				</div>
				<div class="col-md-2">
					<a href="rating.php" class="btn btn-primary btn-default">Back to home page</a>
				</div>
			</div>
		</div>
	</div>
</body>

<?php
	} else echo '<script> window.location.href="home.php";	</script>';
?>