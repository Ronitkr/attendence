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


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	
  <!-- custom style -->
	<link rel="stylesheet" href="css/style.css">

  <!-- jquery -->
  
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
        <a class="nav-link" href="logout.php">Welcome <?php echo $user; ?> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-power-off text-dark"></i></a>
      </li>
    </ul>
  </div>
</nav>	

<div class="container">
	<div class="p-3 add bg-dark w-25 col-md=offset-3">
      				
			<form >
        <p id="message"></p>
				<input type="text" class="form-control mb-3" id="emp_name" placeholder="Employes name..." required>
        <input type="text" class="form-control mb-3" id="emp_father_name" placeholder="Employee Father name..." required>
        <input type="text" class="form-control mb-3" id="emp_desig" placeholder="Employee Designation..." required>
        <input type="email" class="form-control mb-3" id="emp_email" placeholder="Email id..." required>
				<input name="atten" id="atten" class="btn btn-primary" value="submit">
			</form>

	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
     $(document).ready(function(){
       $('#atten').click(function(){
          var name = $('#emp_name').val();
          var father = $('#emp_father_name').val();
          var pos = $('#emp_desig').val();
          var email = $('#emp_email').val();
          $.ajax({
            url:'insert.php',
            type:'post',
            // data:{name:name, mobile:mobile, email:email,pass:pass},
            data:{emp_name:name, emp_father_name:father, emp_desig:pos, emp_email:email},
            success: function(data){
              $('#message').html(data);
            }
        });
       });
     });
   </script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>


</body>
</html>