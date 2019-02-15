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
        <a class="nav-link text-dark" href="#">Welcome <?php echo $user; ?> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-power-off text-dark"></i></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
	<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Emp_id</th>
      <th scope="col">Name</th>
      <th scope="col">Father's Name</th>
      <th scope="col">Designation</th>
      <th colspan="2" >Email Id</th>
      <th colspan="2" >Action</th>

    </tr>
  </thead>
  <tbody>
    <?php 
      include 'conn.php';

      $q = "select * FROM add_emp ";
      $run = mysqli_query($con, $q);

      while ($result = mysqli_fetch_array($run)) {

     ?>
    <tr>
      <th scope="row"><?php echo $result['id']; ?></th></th>
      <td><?php echo $result['Name']; ?></th></td>
      <td><?php echo $result['FatherName']; ?></th></td>
      <td><?php echo $result['Designation']; ?></th></td>
      <td><?php echo $result['Email']; ?></th></td>
      <td><a href="view.php?see=<?php echo $result['id']; ?>" class="btn btn-primary w-100">View</a></td>
      <td><a href="delete.php?del=<?php echo $result['id']; ?>" class="btn btn-danger w-100">delete</a></td>
    </tr>
  <?php } ?>
    
  </tbody>
</table>
</div>	


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>



