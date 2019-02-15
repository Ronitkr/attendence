 
 <?php 
 
 $con = mysqli_connect('localhost', 'root','', 'attendence');

	$name = $_POST['emp_name'];
	$emp_father = $_POST['emp_father_name'];
	$emp_desig = $_POST['emp_desig'];
	$emp_email = $_POST['emp_email'];

		$q = "INSERT INTO add_emp ('id', 'Name', 'FatherName', 'Designation', 'Email') VALUES ('','$name', '$emp_father', '$emp_desig', '$emp_email')";
		$run = mysqli_query($con, $q) or die("Unavaible to connect".$msqli_error($con));

		if ($run) {
				echo "<div class='alert alert-success'>data successfully submitted</div>";
				 } 		

 // include 'validate.php';

?>


