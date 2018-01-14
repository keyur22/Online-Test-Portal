<?php
require 'required.php';
include 'theme.php';

/*retrieving current photo*/
$query = "select `photo` from `login` where `L_id` = '$l_id'";
if($query_run = mysql_query($query)) {
	$photo = mysql_result($query_run, 0, 'photo');
	if(empty($photo))	{
		$photo = 'default-user.png';
		$empty = true;
	} else $empty = false;
} else {
	echo mysql_error();
}

if(isset($_GET['error']))	{
	$error = $_GET['error'];
	switch($error)	{
		case 1: $string = 'Please choose a photo';
			break;
		case 2: $string = 'The size of the image uploaded is very large. Please upload am image smaller than 2MB in size';
			break;
		case 3: $string = 'Please upload a jpeg or png file';
			break;
	}
}
?>
<body>
	<br><br>
<?php
	if(isset($_GET['error']))	{	?>
		<div class="alert alert-danger">
			<h3><p class="text-center">
<?php			echo $string;	?>
			</p></h3>
		</div>
<?php
	}	?>
	<div class="row">
		<h1><p class="text-center">
			Choose Photo
		</p></h1>
	</div><br>
	<!--confirm-->
	<div id="confirm">
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info alert-dismissable">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h5>
							Are you sure you want to remove your profile photo??
						</h5>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-1 col-md-offset-8">
						<a href="#" class="btn btn-default" onclick="option(1)">
							Yes
						</a>
					</div>
					<div class="col-md-2">
						<a type="button" class="btn btn-default" onclick="option(2)">
							Cancel
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="postuploadphoto.php" method="POST" enctype="multipart/form-data">	
						<div class="row">	
							<div class="col-md-2 col-md-offset-2">
								<br><br><br>
								<h4><input type="file" name="photo"></h4>
							</div>
							<div class="col-md-5 col-md-offset-3">
								<img src="<?php echo $image_folder.$photo; ?>" class="img img-rounded" width="200" height="200">
							</div>
						</div><br><br>
						<div class="row">
<?php						if(!$empty)	{	?>
								<div class="col-md-2 col-md-offset-1">
									<a href="#" class="btn btn-lg btn-default" onclick="display()">Remove Photo</a>
								</div>
<?php						}	?>
							<div class="col-md-2 col-md-offset-5">
								<input type="submit" value = "upload" class="btn btn-lg btn-primary">
							</div>
							<div class="col-md-1">
								<a href="<?php echo $http_referer;	?>" class="btn btn-lg btn-default">Back</a>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	document.getElementById("confirm").style.display = 'none';
	function display()	{
		document.getElementById("confirm").style.display = 'block';
	}
	function option(choice)	{
		if(choice == 1)
			window.location.href = 'postuploadphoto.php?rem=1';
		else document.getElementById("confirm").style.display = 'none';
	}
</script>