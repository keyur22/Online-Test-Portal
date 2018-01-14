<?php

require 'required.php';


if(isset($_SESSION['paperid']))	{
	$paperid = $_SESSION['paperid'];
	$fake = 'fake.php';
	
	$rating = 1;
	$rating_message = array('silly!', 'bad', 'not bad', 'very good', 'excellent!');
	$logged = logged_in();
	
	if(isset($_POST['rate']))	{
		$rate = $_POST['rate'];
		/*to take mcqs of current paper*/
		$query = "select `Mcq_id` from `mcqinpaper` where `Paper_id` = '$paperid'";
		$i = 0;
		if($query_run = mysql_query($query))	{
			while($array = mysql_fetch_assoc($query_run))	{
				$mcqid[$i] = $array['Mcq_id'];
				$i++;
			}
		} else echo mysql_error();
		
		//updating rating of the paper
		$query = "select sum, count from paper where Paper_id = '$paperid'";
		if($query_run = mysql_query($query))	{
			if(mysql_num_rows($query_run))	{
				$psum = mysql_result($query_run, 0, 'sum');
				$pcnt = mysql_result($query_run, 0, 'count');
				$psum += $rate;
				$pcnt++;
				$prate = round($psum/$pcnt);
				//updating the rating
				$query = "update paper set sum = '$psum', count='$pcnt', rating = '$prate' where Paper_id = '$paperid'";
				if(!mysql_query($query))
					echo mysql_error();
			}
		} else echo mysql_error();
		
		/* to take and modify sum, count and rating of each mcq*/
		for($j=0;$j<$i;$j++)	{
			$query = "select `sum`, `count`, `rating` from `mcq` where `Mcq_id` = '$mcqid[$j]'";
			if($query_run = mysql_query($query))	{
				$current_sum = mysql_result($query_run, 0, 'sum');
				$current_count = mysql_result($query_run, 0, 'count');
				$current_rating = mysql_result($query_run, 0, 'rating');
				$sum = $current_sum + $rate;
				$count = $current_count + 1;
				$new_rating = round($sum/$count);
				/*replacing old with new*/
				$query_ins = "update `mcq` set `sum` = '$sum', `count` = '$count', `rating` = '$new_rating'
				where `Mcq_id` = '$mcqid[$j]'";
				if(!mysql_query($query_ins))
					echo mysql_error();
				if($logged)
					$home = 'home.php';
				else
					$home = 'abc.php';
				
				if(isset($_POST['check']))
				{	
					$check = $_POST['check'];
					if($check == 'yes')
					{
						echo '<script type=text/javascript> window.location.href="'.$fake.'";	</script>';
					}
					else
					{
						unset($_SESSION['paperid']);
						unset($_SESSION['paper_over']);
						if(!$logged) unset($_SESSION['correct_count']);
						echo '<script type=text/javascript> window.close()	</script>';
					}	
						
				}
			} else echo mysql_error();
		}
	}
} else echo '<script> window.location.href="home.php";	</script>';
	
if(isset($_SESSION['paperid']))	{
	?>
<head>
	<style>
		p	{
			line-height: 150%;
		}
	</style>
</head>
	<br><br>
	<!--thank you-->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1>
				Thank You, 
			</h1>
		</div>
	</div><br><br>
	<!--note-->
	<div class="row">
		<div class="col-md-12 col-md-offset-1">
			<h3><p>
				Thank you for attempting the paper. Before exiting, please rate the paper on the basis of the quality and
				difficulty of the questions.<br> 
				This will help us in improving our paper
				making methodologies.
			</p></h3>
		</div>
	</div><br>
	
	<form action="rating.php" method="POST">
		<!--rating panel-->
		<div class="row">
			<div class="panel panel-default col-md-10 col-md-offset-1">
				
				<div class="row">
					<div class="col-md-12 col-md-offset-1">
						<h3><p>
							How much would you like to rate the paper??
						</p></h3>
					</div>
				</div><br>
			
<?php			while($rating <= 5)	{		?>
					<div class = "row">
						<div class="col-md-3 col-md-offset-1">
							<h3><input type="radio" name="rate" value="<?php echo $rating;	?>" required>
<?php							echo $rating_message[($rating-1)];
								$rating ++;		?>
							</h3>
						</div>
<?php					if($rating <= 5)	{		?>
							<div class="col-md-3 col-md-offset-1">
								<h3><input type="radio" name="rate" value="<?php echo $rating;	?>" required>
<?php								echo $rating_message[($rating-1)];
									$rating ++;		?>
								</h3>
							</div>
<?php					}		?>
<?php					if($rating <= 5)	{		?>
							<div class="col-md-3 col-md-offset-1">
								<h3><input type="radio" name="rate" value="<?php echo $rating;	?>" required>
<?php								echo $rating_message[($rating-1)];
									$rating ++;		?>
								</h3>
							</div>
<?php					}		?>
					</div>
<?php			}		?>
				<br>
			</div>
		</div>
		<hr>
		<!--note 2-->
		<div class="row">
			<div class="col-md-12 col-md-offset-1">
				<h3><p>
					We are trying to find the questions which are incorrect. Help us find them.
				</p></h3>
			</div>
		</div><br>
		<!--fake question panel-->
		<div class="row">
			<div class="panel panel-default col-md-10 col-md-offset-1">
				
				<div class="row">
					<div class="col-md-6 col-md-offset-1">
						<h3><p>
						Did you find any questions fake or incorrect?
						</p></h3>
					</div>
				</div>
				<br>
				<div class="row">	
					<div class="col-md-4 col-md-offset-4">
						<h4><input type="radio" name ="check" value="yes" required> Yes, some questions were incorrect</h4>
					</div>
					
					<div class="col-md-4">
						<h4><input type="radio" name ="check" value="no" required> No, all were fine</h4>
					</div>
				</div>
				<br><br>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-2 col-md-offset-10">
				<input type="submit" value="submit" class="btn btn-lg btn-success">
			</div>
		</div><br>
	</form>
	
<?php
}	?>