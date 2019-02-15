<?php 
session_start();
$user = $_SESSION['user'];
if (!$user) {
	header('location:login.php');
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	

	<!-- bootsrap cdn-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	
	<!-- custom style -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>


<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark primary-color">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="atten_form.php">Attendence</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add.php">ADD</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ajaxinsert.php">ADD using Ajax</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="emp_list.php">Employees List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="logout.php">Welcome <?php echo $user; ?> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-power-off text-dark"></i></a>
      </li>
    </ul>
  </div>
</nav>
	<div class="d-flex align-items-center justify-content-center add">
			
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="bg-dark w-100 p-3" method="POST">
				<h5>Add Employees</h5>
				<?php include 'validate.php'; ?>
				 
				<input type="text" class="form-control mb-3" name= "emp_name" placeholder="Employes name...">
				<input type="text" class="form-control mb-3" name="emp_father_name" placeholder="Employee Father name...">
				<input type="text" class="form-control mb-3" name="emp_desig" placeholder="Employee Designation...">
				<input type="email" class="form-control mb-3" name="emp_email" placeholder="Email id...">
				<input type="submit" name="add" class="btn btn-info" value="Take Attendence" id="atten">

			</form>

	</div>
</div>	


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>