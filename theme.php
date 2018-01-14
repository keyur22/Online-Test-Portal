<?php	
	//require 'required.php';
	if(logged_in())
		$col = 10;
	else $col = 12;

?>
<!--	CONTAINS NAV BAR AND LEFT SIDE BAR-->
<head>
	<!--<link rel="stylesheet" href="style.css">-->
	<link rel="stylesheet" href="style1.css">
</head>
<body bgcolor="#E6E6FA">
	<!--navigation-->
<?php	include 'navigation.php';	?>
<?php	
	if(logged_in())	{	?>
		<!--left side bar-->
		<div class="col-md-2" id="trial">
			<br><br>
			<h4>
			<ul class="nav nav-sidebar">
				<li>
					<img src="profile photos/<?php echo $photo;	?>" class="img img-rounded" width="170" height="170">
				</li>
				<li>
					<h2><p>
						<?php echo $name;	?>
					</p></h2>
				</li>
				<li>
					<a class="lt" href="pretest01.php">
						Give a test
					</a>
				</li>
				
				<li>
					<a class="lt" href="statistics-01.php">
						View your score card
					</a>
				</li>
				<li>
					<a class="lt" href="preupload.php">
						Upload an mcq
					</a>
				</li>
				<li>
					<a class="lt" href="uploadedmcqs01.php">
						View uploaded mcqs
					</a>
				</li>
				<li>
					<a class="lt" href="interest.php">
						Your Interests
					</a>
				</li>
				<li>
					<a class="lt" href="all_subjects.php">
						View list of all subjects
					</a>
				</li>
				<li>
					<a class="lt" href="contactus.php">
						Contact Us
					</a>

				</li>
				<li>
					<a class="lt" href="feedback.php">
						Feedback
					</a>

				</li>
				<li>
					<a class="lt" href="university1.php">
						University Papers
					</a>

				</li>
			</ul>
			</h4>
		</div>
<?php
	}	?>
	<div id="suggestions" class="col-md-<?php	echo $col;	?>"></div>
	<div id="suggestions_ref" style="display: none;">
	