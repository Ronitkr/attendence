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
        <a class="nav-link text-dark" href="logout.php">Welcome <?php echo $user; ?> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-power-off text-dark"></i></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
	<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Emp_id</th>
      <th scope="col">Name</th>
      <th scope="col">Father's Name</th>
      <th scope="col">Designation</th>
      <th colspan="2" >Email Id</th>

    </tr>
  </thead>
  <tbody>
    <?php 
      include 'conn.php';

      $id = $_GET['see'];
      $q = "select * FROM add_emp WHERE id = $id ";
      $run = mysqli_query($con, $q);

      while ($result = mysqli_fetch_array($run)) {

     ?>
    <tr>
      <th scope="row"><?php echo $result['id']; ?></th></th>
      <td><?php echo $result['Name']; ?></th></td>
      <td><?php echo $result['FatherName']; ?></th></td>
      <td><?php echo $result['Designation']; ?></th></td>
      <td><?php echo $result['Email']; ?></th></td>
    </tr>
  <?php } ?>
    
  </tbody>
</table>
</div>	

<div class="count-date">
  <div class="container">
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Jan &nbsp;&nbsp;2019</th>
      <th scope="col"><span class="text-danger">Holiday</span><span>/</span><span class="text-success">Sunday</span></th>
      <th scope="col"><span class="text-warning">Absent</span></th>
      <th scope="col"><span class="text-info">Present</span></th>
    </tr>
  </thead>
</table>

  <div class="d-flex text-center align-items-center justify-content-center">
    <?php 
      
      /*$getDate = getdate();
      print_r( $getDate ); exit;*/
      
      $date_query = "select * from atten where emp_id = $id";
      $run_date_query = mysqli_query($con, $date_query);
      
      $getSelRows = mysqli_num_rows($run_date_query);
      $remainingDays = 28-$getSelRows;

      // echo $getSelRows; exit;
      $i = 0;
      while ( $result_run = mysqli_fetch_array($run_date_query)) {
        $i++;

        if ($result_run['staus'] == "P") {
            echo "<div class='date bg-info' data-toggle='tooltip' data-placement='top' title='".$result_run['time']."'>".$i. "</div>";
            echo "<br>";
          }else if ($result_run['staus'] == "S") {
            echo "<div class='date bg-danger' data-toggle='tooltip' data-placement='top' title='".$result_run['time']."'>".$i. "</div>";
            echo "<br>";
          }else{
           echo "<div class='date bg-warning' data-toggle='tooltip' data-placement='top' title='".$result_run['time']."'>".$i."</div>";
          }  
      
      }
      
      for ($j=$i+1; $j <=$remainingDays+$i; $j++) {        
        echo "<div class='date bg-white' data-toggle='tooltip' data-placement='top' title=''>".$j."</div>";  
      
      }
      
     ?>

     <!-- <?php 
     
      ?> -->
    <!-- <div class="date bg-info data-toggle="tooltip" data-placement="top" title="TIME""><#?php echo $result['emp_id'] ?>1</div> -->
  <?php //} ?>
   
  </div>
  </div>
  
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>