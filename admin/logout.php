<?php 
	session_start();
	$user = $_SESSION['user'];

	$destroy = session_destroy();

	if ($destroy) {
		header('location:login.php');
	}


 ?>