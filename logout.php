<?php 

require 'required.php';

session_destroy();
setcookie('user_id','',time()-86400);

echo '<script type=text/javascript> window.location.href="abc.php";	</script>';

?>