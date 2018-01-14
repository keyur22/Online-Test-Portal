<?php
require 'required.php';

if(isset($_GET['subjid']))	{
	$subj_id = $_GET['subjid'];
	
	/*to get the chapters from subject id*/
	$i = 0;
	$query = "select `Chp_id`, `chapterName` from `chapter` where `Subj_id` = '$subj_id'";
	if($query_run = mysql_query($query)) {
		$numrows = mysql_num_rows($query_run);
		if($numrows)	{
			while($chapter = mysql_fetch_assoc($query_run)) {
				$chapter_id[$i] = $chapter['Chp_id'];
				$chapter_name[$i] = $chapter['chapterName'];
				$i++;
			}
			$count_chapter = count($chapter_id);
		}
	} else {
		echo mysql_error();
	}

	if($numrows)	{		?>
		<form action="postupload.php" method="POST">
			<div class="row">
				<div class="col-md-4">
					<h4><b>Choose chapter:</b></h4>
				</div>
				<div class="col-md-4">
					<select class="form-control" name="chapter">
<?php					for($j=0;$j<$count_chapter;$j++)	{			?>
							<option value="<?php echo $chapter_id[$j]; ?>">
<?php							echo $chapter_name[$j];			?>
							</option>					
<?php					}				?>
					</select>
				</div>
			</div>
			<br><br>
			<!--question-->
			<div class="row">
				<div class="col-md-10">
					<h4><b>Enter your question:</b></h4>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-10">
					<textarea class="form-control" rows="2" placeHolder="Question" name="question"></textarea>					
				</div>
			</div>
			<br>
			<!--options-->
			<div class="row">
				<div class="col-md-9">
					<h4><b>
						Enter the four options:
					</b></h4>
				</div>
				<div class="col-md-3">
					<h4><b>
						Tick on the correct option
					</b></h4>
				</div>
			</div><br>
			
			<!--first-->
			<div class="row">
				<div class="col-md-1">
					<h4><b>
						a)	
					</b></h4>
				</div>
				<div class="col-md-8">
					<textarea class="form-control" rows="1" name="choice1"></textarea>
				</div>
				<div class="col-md-2 col-md-offset-1">
					<div class="radio">
						<input type="radio" name="answer" value="1">								
					</div>
				</div>
			</div><br>
			<!--second-->
			<div class="row">
				<div class="col-md-1">
					<h4><b>
						b)	
					</b></h4>
				</div>
				<div class="col-md-8">
					<textarea class="form-control" rows="1" name="choice2"></textarea>
				</div>
				<div class="col-md-2 col-md-offset-1">
					<div class="radio">
						<input type="radio" name="answer" value="2">								
					</div>
				</div>
			</div><br>
			<!--third-->
			<div class="row">
				<div class="col-md-1">
					<h4><b>
						c)	
					</b></h4>
				</div>
				<div class="col-md-8">
					<textarea class="form-control" rows="1" name="choice3"></textarea>
				</div>
				<div class="col-md-2 col-md-offset-1">
					<div class="radio">
						<input type="radio" name="answer" value="3">								
					</div>
				</div>					
			</div><br>
			<!--fourth-->
			<div class="row">
				<div class="col-md-1">
					<h4><b>
						d)	
					</b></h4>
				</div>
				<div class="col-md-8">
					<textarea class="form-control" rows="1" name="choice4"></textarea>
				</div>
				<div class="col-md-2 col-md-offset-1">
					<div class="radio">
						<input type="radio" name="answer" value="4">								
					</div>
				</div>					
			</div><br><br><br>
			<!--submit-->
			<div class="row">
				<div class="col-md-2 col-md-offset-4">
					<input type="submit" class="btn btn-success btn-lg" value="upload">
				</div>
				<div class="col-md-1">
					<a class="btn btn-primary btn-lg" href="home.php">Back</a>
				</div>
			</div>
		</form>
<?php
	} else {	?>
			<h4><B><p class="text-center">
				No chapters of this subject has been found in our database
			</p></B></h4>
<?php	}
}
?>