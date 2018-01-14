<?php
require 'required.php';


if(isset($_SESSION['paperid']))	{
	$logged = logged_in();
	$paperid = $_SESSION['paperid'];
	$query = "select `mcqinpaper`.`no`,`mcq`.`question`,`mcq`.`Mcq_id` from `mcq` 
			join `mcqinpaper` on `mcq`.`Mcq_id` = `mcqinpaper`.`Mcq_id`
			Where `mcqinpaper`.`Paper_id`='$paperid'
			ORDER BY `mcqinpaper`.`no`";
	if($query_run = mysql_query($query))
	{
		$i = 0;
		while($array = mysql_fetch_assoc($query_run))	
		{
			$mcqid[$i] = $array['Mcq_id'];
			$question[$i] =  $array['question'];
			$no[$i] = $array['no'];		
			$i++;
			
			
		}
	} else echo mysql_error();
	
	if(isset($_POST['fake']))	{
		$fake = $_POST['fake'];	//array of fake questions
		//taking the fake_count of each mcq and incrementing them
		foreach($fake as $f)	{
			$fake_cnt = get_field('mcq', 'fake_count', 'Mcq_id', $f);
			$fake_cnt++;
			$query = "update mcq set fake_count = '$fake_cnt' where Mcq_id = '$f'";
			if(!(mysql_query($query)))
				die(mysql_error());
			else	{
				unset($_SESSION['paperid']);
				unset($_SESSION['paper_over']);
				if(!$logged) {
					unset($_SESSION['correct_count']);
					$page = 'abc.php';
				} else $page = 'home.php';
					
				echo '<script>	window.location.href = "'.$page.'";	</script>';
			} 
		}
	}
} else echo '<script> window.location.href="home.php";	</script>';


?>

		<br>
		<div class="row">
			<h2><p class="text-center">Following is the list of questions that you appeared recently</p></h2>
		</div><br>
		<div class="row">
			<h3><div class="col-md-8 col-md-offset-2">
				<p class="text-center">Mark those you feel were incorrect</p>
			</div></h3>
		</div><br>
		
		<div class="row">
			<div class="col-md-4 col-md-offset-9"><h3>Mark if Fake</h3></div>
		</div><br>
		<form action="fake.php" method="POST">
			<h4><b>
<?php			for($j=0;$j<$i;$j++)	{	?>
					<div class="row">
						<div class="col-md-1 col-md-offset-1">
							<?php echo $no[$j]; ?>
						</div>
		
						<div class="col-md-6 col-md-offset-1">
<?php						echo $question[$j];		?>								
						</div>
						
						<div class="col-md-1">
							<input type="checkbox" name="fake[]" value="<?php echo $mcqid[$j]; ?>" class="form-control">
						</div>
					</div><br>
<?php			}			?>
			</b></h4>
			<!--submit and back-->
			<br><br><br>
			<div class="row">
				<div class="col-md-2 col-md-offset-7">
					<input type="submit" onclick="window.close()" class="btn btn-lg btn-primary">
				</div>
				
				<div class="col-md-1">
					<a href="home.php" onclick="window.close()" class="btn btn-lg btn-default">Skip</a>
				</div>
			</div>
		</form>