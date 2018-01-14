<?php

require 'required.php';

if(isset($_GET['no']) && isset($_GET['choice'])) {
	$choice = $_GET['choice'];
	$no = $_GET['no'];
	if(empty($choice))
		$choice = 0;
	$_SESSION['mcq'][$no] = $choice;
}

?>