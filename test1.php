<head>
	<link rel="stylesheet" type="text/css" href="test.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php

require 'required.php';
include 'navigation.php';

if(isset($_GET['no']) && isset($_SESSION['paperid']) && isset($_SESSION['total'])) {
	$paperid = $_SESSION['paperid'];
	$total = $_SESSION['total'];
	$alloted = 60;
	$no = $_GET['no'];
	$diff = ($_SESSION['total']*$alloted + $_SESSION['start_time'])*1000;	//for timer
	if(isset($_SESSION['mcq'][$no]))
		$choosen = $_SESSION['mcq'][$no];
	
	if($no<=$total && $no>=1) {
		if($no!=1)
			$prev = $no - 1;
		
		if($no <= $total-1)
			$next = $no + 1;
		
		$date = date('d M, Y', time());	
		/*query to retrieve the correct mcq*/
		$query = "select `mcq`.`question`, `mcq`.`choice1`, `mcq`.`choice2`, `mcq`.`choice3`, `mcq`.`choice4`
					from `mcq` join `mcqinpaper` on `mcq`.`Mcq_id` = `mcqinpaper`.`Mcq_id`
					where `mcqinpaper`.`Paper_id` = '$paperid' and `mcqinpaper`.`no` = '$no'";
		if($query_run = mysql_query($query)) {
			if(mysql_num_rows($query_run))	{
				$question = trim(mysql_result($query_run, 0, 'question'));
				if(substr($question, strlen($question)-1) != '?')
					$question .= '?';
				$choice1 = mysql_result($query_run, 0, 'choice1');
				$choice2 = mysql_result($query_run, 0, 'choice2');
				$choice3 = mysql_result($query_run, 0, 'choice3');
				$choice4 = mysql_result($query_run, 0, 'choice4');
			}
		} else echo mysql_error();
	?>
		<head>
			<script type="text/javascript">
				//to store user's choice
				function store(choice, no)	{
					if(window.XMLHttpRequest)	{
						xmlhttp = new XMLHttpRequest();
					} else {
						xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
					}
					
					xmlhttp.onreadystatechange = function() {
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200)	{
							document.getElementById('optiondiv').innerHTML = xmlhttp.responseText;
						}
					}
					
					xmlhttp.open('GET', 'option.php?no=' + no + '&choice=' + choice, true);
					xmlhttp.send();
				}
				
				//function to convert seconds to h:m:s format
				function convert(milliseconds)	{
					var seconds = Math.floor(milliseconds/1000);
					var h, m, s;
					h=m=s=0;
					if(seconds>59 && seconds<259200)	{
						var minute = seconds/60;
						if(minute>60)	{
							h = Math.floor(seconds/3600);
							m = Math.floor((seconds - h*3600)/60);
							s = seconds-m*60-h*3600;
						}	else if(minute == 1)
								m = minute;
						else	{
							m = Math.floor(minute);
							s = seconds - m*60;
						}
					} else if(seconds < 60)	{
						var s = seconds;
					}
					var time = h + ':' + m + ':' + s;
					document.getElementById("left_time").innerHTML = '<h3><b>Time Left:	</b>' + time + '</h3>';
				}

				var diff = <?php	echo $diff;	?>;
				/*setInterval(function()	{
					var over = diff - Date.now();
					if(over > 0)
						convert(over);
					else
						window.location = "timeout.php";
				}, 1000);*/
				
				function confirmation()	{
					if(confirm("Are you sure you want to leave the test??") == true)
						window.location.href = "answers.php";
				}
			</script>
		</head>		
		<body>
			<div id="optiondiv"></div>
			<br><br>
			<!--question number-->
			<div class="row">
				<h2><p class="question">
					Question No. 
					<?php  echo $no;	?>
				</p></h2>
			</div><br>
			<!--Date & time left-->
			<div class="row">
				<div class="col-md-4 col-md-offset-3">
					<h3 id="date"><b>Date:</b>	
						<?php echo $date;	?>
					</h3>
				</div>
				<div class="col-md-4" id="left_time">
				</div>
			</div>
			<br><br>
			<!--Question & Options-->
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div id="que" class="panel panel-default">
						<!--Question-->
						<div class="panel-heading">
							<h2 id="display-question">
								<?php echo $question; ?>
							</h2>
						</div>
						<form id="option" name="option">	
							<!--Options-->
							<div class="panel-body">
								<!--option a & b-->
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1">
												<h3>
													<input type="radio" 
													onclick="store('1', <?php echo $no; ?>);" 
<?php												if(isset($choosen) && $choosen == 1)	{	?>
														checked
<?php												}	?>
													name="choice">
												</h3>
											</div>
											<div class="col-md-1">
												<h3 id="choices"><b>a)</b></h3>
											</div>
											<div class="col-md-10">
												<h3 id="choices">
													<?php echo $choice1;	?>
												</h3>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1">
												<h3>
													<input type="radio" 
													onclick="store('2', <?php echo $no; ?>);" 
<?php												if(isset($choosen) && $choosen == 2)	{	?>
														checked
<?php												}	?>
													name="choice">
												</h3>
											</div>								
											<div class="col-md-1">
												<h3 id="choices"><b>b)</b></h3>
											</div>
											<div class="col-md-10">
												<h3 id="choices">
													<?php echo $choice2;	?>
												</h3>
											</div>
										</div>
									</div>			
								</div>					
								<!--option c & d-->
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1">
												<h3>
													<input type="radio" 
													onclick="store('3', <?php echo $no; ?>);" 
<?php												if(isset($choosen) && $choosen == 3)	{	?>
														checked
<?php												}	?>
													name="choice">
												</h3>
											</div>
											<div class="col-md-1">
												<h3 id="choices"><b>c)</b></h3>
											</div>
											<div class="col-md-10">
												<h3 id="choices">
													<?php echo $choice3;	?>
												</h3>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1">
												<h3>
													<input type="radio" 
													onclick="store('4', <?php echo $no; ?>);" 
<?php												if(isset($choosen) && $choosen == 4)	{	?>
														checked
<?php												}	?>
													name="choice">
												</h3>
											</div>								
											<div class="col-md-1">
												<h3 id="choices"><b>d)</b></h3>
											</div>
											<div class="col-md-10">
												<h3 id="choices">
													<?php echo $choice4;	?>
												</h3>
											</div>
										</div>
									</div>			
								</div>
							</div>
						</form>
					</div>
					<br>
				</div>
			</div><br>
			<div class="row">	
				<center>
				<br/>
				<ul ID="jump">
<?php				for($i=1;$i<=$total;$i++)	{	?>
						<li><a href="test1.php?no=<?php	echo $i;	?>">
<?php						echo $i;	?>
						</a></li>
<?php				}	?>
				</ul></center>
			</div>
			<br>
			<!--previous, submit & next-->
			<div class="col-md-8 col-md-offset-2">
				<div class="row">
					<!--previous-->
					<div class="col-md-2">
	<?php				if(isset($prev)) {		?>
							<a href="test1.php?no=<?php echo $prev; ?>">
								<h3 id="previous">
									<span class="glyphicon glyphicon-backward"></span>
									Previous
								</h3>
							</a>
	<?php				} ?>
					</div>
					<!--submit button-->
					<div class="col-md-2 col-md-offset-3">
						<h3 ><a href="#" onclick="confirmation()" id="subm" class="btn btn-primary btn-lg">
							<b>Submit</b>
						</a></h3>
					</div>
		<?php		if(isset($next)) {		?>				
						<!--next-->
						<div class="col-md-2 col-md-offset-3">
							<a href="test1.php?no=<?php echo $next; ?>">	
								<h3 id="next">
									Next
									<span class="glyphicon glyphicon-forward"></span>
								</h3>
							</a>
						</div>
						
		<?php		}	?>
				</div>
			</div>
		</body>
<?php	
	} else echo '<script>	window.location.href = \'test1.php?no=1\';	</script>';
} else echo '<script>	window.location.href = \'pretest01.php\';	</script>';
?>

<script type="text/javascript">
	document.getElementById("confirm").style.display = 'none';
</script>