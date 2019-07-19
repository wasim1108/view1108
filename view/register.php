<?php 
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" href="../dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../custom_code/custom.css">
</head> 
<body>
	<?php
	global $msg_success;
	// or $msg_success = "";
	if(isset($_POST['create'])){
		
		$name = mysqli_real_escape_string($conn, trim($_POST['name']));
		$age = trim($_POST['age']);
		$email = mysqli_real_escape_string($conn, trim($_POST['email']));
		$password = mysqli_real_escape_string($conn, md5($_POST['password']));

		$sql = "INSERT INTO cp_register (name, age, email, password) VALUES ('$name', $age, '$email', '$password')";	

		if(mysqli_query($conn, $sql)){
			$msg_success = "you are registered successfully";
		} else {
			echo "Error: ".$sql."<br>".mysqli_error($conn);
		}
	}

	mysqli_close($conn);
	?>
	<div class="container container-register">
		<div class="main-section well">
			<div class="login-title text-center">
				<h2 class="heading-standard">User Registration</h2>
				<div class="alert-msg text-center"><?php echo $msg_success; ?></div>
			</div>
			
			<div class="login-form">
				<form action="register.php" method="POST" class="form-horizontal">
					<div class="control form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required />
					</div>

					<div class="control form-group">
						<label>Age</label>
						<input type="number" name="age" class="form-control" required/>
					</div>

					<div class="control form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" required/>
					</div>

					<div class="control form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required/>
					</div>

					<div class="control-btn form-group text-center">
						<input type="submit" name="create" value="Submit" class="btn btn-primary btn-block">
					</div>

					<div class="control-link text-center">
					<a href="login.php" style="color:#000;"><p>Already has an account? Then click here to LOGIN..</p></a>
				</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>



