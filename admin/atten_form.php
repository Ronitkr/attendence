<?php
include 'conn.php';
session_start();
$user = $_SESSION['user'];
if (!$user) {
	header('location:login.php');	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>atten_form</title>
	

	<!-- bootsrap cdn-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	
	<!-- custom style -->
	<link rel="stylesheet" href="css/style.css">

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark primary-color">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="add.php">ADD</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="emp_list.php">Employees List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="logout.php">Welcome <?php echo "<span class='text-danger'>".$user."</div>"; ?> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-power-off text-dark"></i></a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">

	<div class="d-flex align-items-center justify-content-center atten-form">
			<?php 

				$q = "select * from add_emp";
				$run = mysqli_query($con, $q);

			 ?>
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="w-100 px-3" method="post">
				<h5><span>Attendence</span></h5>
				<?php 
					if (isset($_POST['atten'])) {
						$id = $_POST['emp_id'];
						$date = $_POST['date'];
						$time = $_POST['time'];
						$status = $_POST['status'];

						$q1 = "INSERT INTO `atten`(`id`, `emp_id`, `date`, `time` , `staus`) VALUES ('', '$id', '$date', '$time', '$status');";
						$run1 = mysqli_query($con, $q1); 

						 
							
							if ($run1) {
							echo "<div class='alert alert-success'>submit successfully</div>";
						} 

					}

					 ?>
				<select name="emp_id" class="form-control">

				  <option value="" disabled selected>Choose your option</option>
				  <?php foreach ($run as $result) {
				  ?>
				  <option value="<?php echo $result['id']; ?>"><?php echo $result['Name']; ?></option>
				  <?php } ?>
				</select>

				<select name="emp_name" class="form-control mt-3">
				  <option value="" disabled selected>Choose your option</option>
				  <?php foreach ($run as $result) {
				  ?>
				  <option value="<?php echo $result['id'] ?>"><?php echo $result['FatherName'] ?></option>
				  <?php } ?>
				</select>

				<select name="emp_desig" class="form-control mt-3">
				  <option value="" disabled selected>Choose your option</option>
				  <?php foreach ($run as $result) {
				  ?>
				  <option value="<?php echo $result['id']; ?>"><?php echo $result['Designation']; ?></option>
				  <?php } ?>
				</select>

				<!-- days -->
				<div class="form-row mb-4">
			        <div class="col">
			            <input type="text" placeholder="date" name="date" class="form-control mt-3" value="<?php echo date('d-m-y') ?>">
			        </div>
			        <div class="col">
			            <input type="text" placeholder="time" name="time" class="form-control mt-3" value="<?php 
			            date_default_timezone_set("Asia/Kolkata");
			            echo date('h:i:sa') ?>">
			        </div>
			        <div class="col">
			            <select name="status" class="form-control mt-3">
			            	<option value="" disabled selected>Status</option>
			            	<option value="P">P</option>
			            	<option value="A">A</option>
			            	<option value="H">H</option>
			            	<option value="S">S</option>
			            </select>	
			        </div>
				</div>
			    <input type="submit" class="btn btn-info float-right mt-3" name="atten" value="Take Attendence">
				<!-- <button type="submit" name="atten" class="btn btn-info mt-5">Take attendence</button> -->				
			</form>

	</div>
</div>	


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

