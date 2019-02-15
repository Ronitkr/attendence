<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	

	<!-- bootsrap cdn-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	
	<!-- custom style -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
	<div class="d-flex align-items-center justify-content-center login">
			
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="bg-dark w-100 p-3" method="post">
				<h5>Login</h5>
				<?php 

				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					// primary validate function
					function validate($str) {
						return trim(htmlspecialchars($str));
					}

					if (empty($_POST['user_id'])) {
						echo  '<div class="alert alert-danger">Name should be filled</div>';
					} else {
						$name = validate($_POST['user_id']);
						if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
							echo '<div class="alert alert-danger"> Name can only contain letters, numbers and white spaces</div>';
						}
					}

					if (empty($_POST['pwd'])) {
						echo '<div class="alert alert-danger">Password cannot be empty</div>';
					} else {
						$password = validate($_POST['pwd']);
						if (strlen($password) < 2) {
							echo '<div class="alert alert-danger">Please should be longer than 6 characters</div>';
						}
					}
					

					$con = mysqli_connect('127.0.0.1', 'root','', 'attendence');
					if (isset($_POST['submit'])) {
						$login = $_POST['user_id'];
						$password = $_POST['pwd'];


						$q = "select * from admin_user where (user_id = '$login') and password = '$password'";

						$run = mysqli_query($con,$q) or die("connection failed".$mysqli_error($con));

						$result = mysqli_fetch_array($run);
						$name = $result['user_id'];
						
						if ($result) {
							$_SESSION['user'] = $name;
							header('location:atten_form.php');
						}

					}
 


				}

				?>

				<input type="text" class="form-control mb-3" name="user_id" placeholder="user_id">
				<input type="password" class="form-control" name="pwd" placeholder="**********">
				<input type="submit" class="btn btn-info mt-3" name="submit">

			</form>



	</div>
	<!-- <span class="alert alert-info"> <?php echo $user_id ." " . $pwd; ?></span> -->
</div>	


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>