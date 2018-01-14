<?php

require 'required.php';
	
	if((isset($_SESSION['paperid']) && isset($_SESSION['paper_over'])) || isset($_GET['paperid']))	{
		$allowed = false;
		if(isset($_SESSION['paperid']))	{
			$paperid = $_SESSION['paperid'];
			if($_SESSION['paper_over'])
				$allowed = true;
		} else {
			$paperid = $_GET['paperid'];
			//checking if user is allowed to view this paper
			$query = 'select \'x\' from papersappeared where L_id = '.$l_id.' and Paper_id = '.$paperid;
			if($query_run = mysql_query($query))	{
				if(mysql_num_rows($query_run))
					$allowed = true;
			} else echo mysql_error();
			
		}
		$no=1;
		
		//checking if paper is over
		if($allowed)	{
		
			//taking mcqids
			$query = "select `Mcq_id` from `mcqinpaper` where `Paper_id` = '$paperid' order by `no`";
			$i=0;
			if($query_run = mysql_query($query))	{
				while($array = mysql_fetch_assoc($query_run))	{
					/* to get mcq details from mcqid*/
					$queryd = 'select * from mcq where Mcq_id = '.$array['Mcq_id'];
					if($query_rund = mysql_query($queryd)) {
						$mcq[$i]['question'] = mysql_result($query_rund, 0, 'question');
						$mcq[$i]['choice1'] = mysql_result($query_rund, 0, 'choice1');
						$mcq[$i]['choice2'] = mysql_result($query_rund, 0, 'choice2');
						$mcq[$i]['choice3'] = mysql_result($query_rund, 0, 'choice3');
						$mcq[$i]['choice4'] = mysql_result($query_rund, 0, 'choice4');
						$answer = mysql_result($query_rund, 0, 'correctChoice');
						//highlighting the right one
						switch($answer)	{
							case 1: $mcq[$i]['choice1'] = '<mark>'.$mcq[$i]['choice1'].'</mark>';
								break;
							case 2: $mcq[$i]['choice2'] = '<mark>'.$mcq[$i]['choice2'].'</mark>';
								break;
							case 3: $mcq[$i]['choice3'] = '<mark>'.$mcq[$i]['choice3'].'</mark>';
								break;
							case 4: $mcq[$i]['choice4'] = '<mark>'.$mcq[$i]['choice4'].'</mark>';
								break;
						}
						$i++;
					} else echo mysql_error();
				}
				$count = $i;
			} else echo mysql_error();
		}
	
if($allowed)	{	?>
	<body>
		<br><br>
		<div class="row">
			<h1><p class="text-center">
				Solution set of your paper
			</p></h1>
		</div>
		<br><br>
		<h3><p class="text-center">
			*The correct option is highlighted
		</p></h3>
		<br><Br>
	<?php	
		for($i=0;$i<$count;$i++)	{	?>
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">	
						<div class="panel panel-default">
							<div class="panel-heading"><h3>Q.
	<?php							  echo $no.'';   ?>
				
	<?php						echo $mcq[$i]['question'].'?';	?>
								</h3>
							</div>
							<div class="panel-body">
								<!--option a & b-->
								<div class="row">
									<div class="col-md-5 col-md-offset-1">
										<div class="row">
											<div class="col-md-1">
												<h4><b>a)</b></h4>
											</div>
											<div class="col-md-5">
												<h4>
<?php												echo $mcq[$i]['choice1'];	?>
												</h4>
											</div>
										</div>
									</div>
									<div class="col-md-5 col-md-offset-1">
										<div class="row">
											<div class="col-md-1">
												<h4><b>b)</b></h4>
											</div>
											<div class="col-md-5">
												<h4>
<?php												echo $mcq[$i]['choice2'];	?>
												</h4>
											</div>
										</div>
									</div>
								</div><br>
								<!--option c & d-->
								<div class="row">
									<div class="col-md-5 col-md-offset-1">
										<div class="row">
											<div class="col-md-1">
												<h4><b>c)</b></h4>
											</div>
											<div class="col-md-5">
												<h4>
			<?php									echo $mcq[$i]['choice3'];	?>
												</h4>
											</div>
										</div>
									</div>
									<div class="col-md-5 col-md-offset-1">
										<div class="row">
											<div class="col-md-1">
												<h4><b>d)</b></h4>
											</div>
											<div class="col-md-5">
												<h4>
<?php												echo $mcq[$i]['choice4'];	?>
												</h4>
											</div>
										</div>
									</div>					
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
	<?php $no++;
		}	?>
	<div class="row"><center>
		<div class="col-md-2 col-md-offset-3">
			<a href="<?php	echo $http_referer;	?>" class="btn btn-primary btn-lg">Back</a>
		</div>
	<!--
		<div class="col-md-2 col-md-offset-1">
			<a href="home.php" class="btn btn-success btn-lg">Go To Home Page</a>
		</div>--></center>
	</div><br><br>
	</body>
<?php
}	
} else echo '<script> window.location.href="home.php";	</script>';
?>
