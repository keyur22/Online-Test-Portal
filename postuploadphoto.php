<?php
require 'required.php';

/*retrieving current photo*/
$query = "select `photo` from `login` where `L_id` = '$l_id'";
if($query_run = mysql_query($query)) {
	$current_photo = mysql_result($query_run, 0, 'photo');
} else {
	echo mysql_error();
}


/*code to upload the given photo*/
if(isset($_FILES['photo']))	{
	$name = $_FILES['photo']['name'];
	$tmp_name = $_FILES['photo']['tmp_name'];
	$size = $_FILES['photo']['size'];
	$type = $_FILES['photo']['type'];
	$extension = strtolower(substr($name, strpos($name, '.') + 1));
	$max = 1000000;	//2MB
	if(!empty($name)) {
		if($size <= $max && ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') && 
		($type == 'image/jpeg' || $type == 'image/png')) {
			if(move_uploaded_file($tmp_name, $image_folder.$name)) {
				/*query to store image name in database*/
				$query = "update `login` set `photo` = '$name' where `L_id` = '$l_id'";
				if(!($query_run = mysql_query($query))) {
					echo mysql_error();
				} else {
					/*code to delete previous photo*/
					if(!empty($current_photo))
						unlink($image_folder.$current_photo);
					echo '<script type=text/javascript> window.location.href = "personal.php"; </script>';						
				}
			} else {
				echo 'not successful';
			}		
		} else if($size> $max)
			echo '<script type=text/javascript> window.location.href = "uploadphoto.php?error=2";	</script>';
		else
			echo '<script type=text/javascript> window.location.href = "uploadphoto.php?error=3";	</script>';
	} else {
		echo '<script type=text/javascript> window.location.href = "uploadphoto.php?error=1";	</script>';
	}
} else if(isset($_GET['rem']))	{	//code to remove photo
	$query = "update login set photo = '' where L_id = '$l_id'";
	if(!mysql_query($query))
		echo mysql_error();
	else
		echo '<script type=text/javascript> window.location.href = "personal.php"; </script>';						
}


?>