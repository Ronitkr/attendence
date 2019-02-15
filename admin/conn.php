<?php 
$con = mysqli_connect('localhost', 'root','', 'attendence'); 

if (!$con) {
	echo die("Connection cannot be connected".$mysqli_error($con));
}
?>