<?php
session_start();
$user = $_SESSION['user'];
if (!$user) {
  header('location:login.php'); 
}
?>

<?php 
      include 'conn.php';

      $id = $_GET['del'];
      $q = "DELETE FROM add_emp WHERE id = $id";
      $run = mysqli_query($con, $q);
		if ($run) {
			header('location:Emp_list.php');
		}

 ?>     