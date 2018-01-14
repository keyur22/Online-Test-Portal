<?php

/*this file contains bootstrap header files and includes connect_db.php and core.inc.php' and also stores the
variable $l_id which contains the L_id of the user*/

require 'connect_db.php';
require 'core.inc.php';

$path = '/mcqs/';
$allowed = false;
$log = array('signup.php','signup(form).php','signup_specific.php');


$l_id = logged_in();


if($l_id || ($current_file == $path.'abc.php'))
	$allowed = true;
else {
	$handle = fopen("allowed.txt","r");
	if($handle)	{
		while(($line = fgets($handle)) != false)	{
			$line = substr($line, 0, strlen($line)-1);	//removing the next_line character from end of $line
			$string = $path.$line;
			//echo $line.'     '.strlen($line).'               '.$current_file.'        '.strcmp($current_file, $string).'<br>';
			if(strcmp($current_file, $string) == 0)	{
				$allowed = true;
				break;
			}
		}
		fclose($handle);
	} else echo 'error opening file';
}



if(isset($_SESSION['user_id'])){
	
	foreach($log as $l)	{
		if($path.$l == $current_file)	{
			echo '<script>	window.location.href="home.php"	</script>';
			break;
		}
	
    }
}


if(!$allowed)
	echo '<script>	window.location.href="abc.php"	</script>';
	//echo $allowed;


	

$image_folder = 'profile photos/';
$universitypapers = 'university papers/';
$logo = 'images and logos/';

//displaying all the files in allowed.txt
?>


<!DOCTYPE html>
<!--Before Login-->
<html lang="en">
	<head>
		
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		
		<!--for offline css-->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
	</head>
