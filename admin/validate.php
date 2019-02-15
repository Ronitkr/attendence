<?php 

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		function validate($str){
			return trim(htmlspecialchars($str));
			}

		// emplyee name
		if (empty($_POST['emp_name'])) {
			echo  '<div class="alert alert-danger">Name should be filled</div>';
			}else{
				$name = validate($_POST['emp_name']);
				if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
					echo '<div class="alert alert-danger"> Name can only contain letters, numbers and white spaces</div>';
					}

					// employe father name
					if (empty($_POST['emp_father_name'])) {
						echo  '<div class="alert alert-danger">Father Name should be filled</div>';
						}else{
							$emp_father = validate($_POST['emp_father_name']);
							if (!preg_match('/^[a-zA-Z0-9\s]+$/', $emp_father)) {
								echo '<div class="alert alert-danger"> Name can only contain letters, numbers and white spaces</div>';
								}	
								
									//disgnation 
								if (empty($_POST['emp_desig'])) {
									echo  '<div class="alert alert-danger">Designation should be filled</div>';
									}else{
										$emp_desig = validate($_POST['emp_father_name']);
											if (!preg_match('/^[a-zA-Z0-9\s]+$/', $emp_desig)) {
												echo '<div class="alert alert-danger"> Name can only contain letters, numbers and white spaces</div>';
												}

												// email	
												if (empty($_POST['emp_email'])) {
													echo  '<div class="alert alert-danger">Email should be filled</div>';
													}else{
													  $emp_email = validate($_POST['emp_email']);
													        if (!filter_var($emp_email, FILTER_VALIDATE_EMAIL)) {
														        echo "<div class='alert alert-danger'>Email is invalid</div>";
														}
													
														//connection	
															$con = mysqli_connect('127.0.0.1', 'root','', 'attendence');

															
																$name = $_POST['emp_name'];
																$emp_father = $_POST['emp_father_name'];
																$emp_desig = $_POST['emp_desig'];
																$emp_email = $_POST['emp_email'];

																$q = "INSERT INTO `add_emp`(`id`, `Name`, `FatherName`, `Designation`, `Email`) VALUES ('','$name','$emp_father','$emp_desig','$emp_email')";
																$run = mysqli_query($con, $q) or die("Unavaible to connect".$msqli_error($con));

																if ($run) {
																 	echo "<div class='alert alert-success'>data successfully submitted</div>";
																 } 
															

														 }

											}

								 
							}
						}
					}	

				 ?>