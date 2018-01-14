<?php
require 'required.php';
include 'theme.php';
?>
<head>
	<style>
		#remove:hover {
			color: red;
		}
	</style>
</head>
<body>
	<br>
	<div class="row">
			<h1>
				<p class="text-center">Settings</p>
			</h1>
	</div><br><br>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">				
					<!--tabs-->					
					<ul class="nav nav-tabs nav-justified">
						<li role="presentation" class=""><a href="settings.php"><h3>General</h3></a></li>
						<li role="presentation" class=""><a href="personalSettings.php"><h3>Personal</h3></a></li>
						<li role="presentation" class="active"><a href="#"><h3>Interests</h3></a></li>
					</ul><br><br>
					<div class="row">
						<div class="col-md-4 col-md-offset-2">
							<h4>1. Introduction to microprocessors</h4>
						</div>
						<div class="col-md-2 col-md-offset-2">
							<a href="#" id="remove">
								<h4><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								<b>remove</b></h4>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-md-offset-2">
							<h4>2. 80386 Architecure</h4>
						</div>
						<div class="col-md-2 col-md-offset-2">
							<a href="#" id="remove">
								<h4><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								<b>remove</b></h4>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-md-offset-2">
							<h4>3. 8086 Instruction Set</h4>
						</div>
						<div class="col-md-2 col-md-offset-2">
							<a href="#" id="remove">
								<h4><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								<b>remove</b></h4>
							</a>
						</div>
					</div><br><br>
					<div class="row">
						<div class="col-md-3 col-md-offset-9">
							<a href="#"><h3><u>Add new subjects</u></h3></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>