<?php

/*this file contains some functions which will be useful in other programs*/

ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER'])){
	$http_referer = $_SERVER['HTTP_REFERER'];
}


function logged_in()
{
	if(isset($_SESSION['user_id']) || isset($_COOKIE['user_id']))
	{
		if(!empty($_SESSION['user_id']))
		{
			return $_SESSION['user_id'];
		}
		else if(!empty($_COOKIE['user_id']))
		{
			return $_COOKIE['user_id'];
		}
		
	}
	else{
		return false;
	}
}



function year($sem) {
	if($sem==1 || $sem==2) {
		return 'F.E.';
	} else if($sem==3 || $sem==4) {
		return 'S.E.';
	} else if($sem==5 || $sem==6) {
		return 'T.E.';
	} else if($sem==7 || $sem==8) {
		return 'B.E.';
	}
}

function get_field($table, $field, $field_condition, $value) {
	$query = "SELECT `$field` FROM `$table` WHERE `$field_condition` = '$value'";
	if($query_run = mysql_query($query))
		return mysql_result($query_run, 0, $field);
	else die(mysql_error());
}

//function to merge two sorted arrays
function merge($a, $m, $b, $n, $type)	{
	$i = 0;	// counter for first array
	$j = 0;	// counter for second array
	$k = 0;	//counter for resultant array
	if($type == 'a' || $type == 'd')	{
		if($type == 'a')	{	
			while($i<$m && $j<$n)	{
				if($a[$i] < $b[$j])	{
					$c[$k] = $a[$i];
					$i++;
				} else	{
					$c[$k] = $b[$j];
					$j++;
				}
				$k++;
			}
		} else {
			while($i<$m && $j<$n)	{
				if($a[$i] > $b[$j])	{
					$c[$k] = $a[$i];
					$i++;
				} else	{
					$c[$k] = $b[$j];
					$j++;
				}
				$k++;
			}
		}
		if($i == $m)
			while($j<$n)	{
				$c[$k] = $b[$j];
				$j++;
				$k++;
			}
		else if($j == $n)
			while($i<$m)	{
				$c[$k] = $a[$i];
				$i++;
				$k++;
			}
		return $c;
	} else	{
		echo 'not possible';
		return 0;
	}
}


?>