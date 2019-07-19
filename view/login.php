<?php 

	include("config.php");
	session_start();

	global $error;
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = mysqli_real_escape_string($conn, trim($_POST['name']));
		$pword = mysqli_real_escape_string($conn, md5($_POST['password']));	

		$sql = "SELECT id FROM cp_register WHERE name = '$name' and password = '$pword'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$active = $row['active'];

		$count = mysqli_num_rows($result);

		if($count == 1){
		//	session_register($name);  //Deprecated in PHP 5.x
			$_SESSION['login_user'] = $name;

			header("location: welcome_user.php");
		} else {
			$error = "Your login name or password is invalid";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
	<link rel="stylesheet" href="../dist/css/bootstrap.min.css">
	<link href="../custom_code/custom.css" rel="stylesheet">
	
</head>

<body>


	<div class="container container-login">
		<div class="border-hr"></div>
		<div class="section-login">
			<div class="text-center"> <?php echo $error;?>  </div>
			<form action="" method="POST" class="form-horizontal">
				<h3 class="text-center head-title">Login</h3>
				<div class="control form-group">
					<input type="text" placeholder="Username" name="name" class="form-control" required/>
				</div>
				<div class="control form-group">
					<input type="password" placeholder="Password" name="password" class="form-control" required/>
				</div>
				<div class="control form-group">
					<input type="submit" name="sign-in" value="Sign In" class="btn btn-warning btn-block"/>
				</div>
				<div class="control-link text-center">
					<a href="register.php"><p>Don`t have an account? Register</p></a>
				</div>

			</form>
		</div>
	</div>
</body>
</html>