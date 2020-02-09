<?php

session_start();

$errors = array();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$conn = mysqli_connect("localhost", "root", "", "e-shop");

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

if($_SESSION['loggedin'] == false)
{
	$username = $_POST['username'];
	$password = SHA1($_POST['password']);

	$result = mysqli_query($conn, "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
	if(mysqli_num_rows($result) == 1)
	{
		$_SESSION['loggedin'] = true;
		$result = mysqli_query($conn, "UPDATE user SET status=1 WHERE username='$username'");
		echo "<meta http-equiv=\"refresh\" content=\"0; URL=homepage.php\" />";
	}
	else 
		array_push($errors, "<p class=\"error\" style=\"color:#870a0a;\"><b>Wrong username and/or password!</b></p>");
}
}
else
{
	$conn = mysqli_connect("localhost", "root", "", "e-shop");

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$_SESSION['loggedin'] = false;
	$result = mysqli_query($conn, "UPDATE user SET status=0");
} 
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/jumbotron.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/FSicon.png" type="image/png">
	<title>Fanatic Shop</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
				<div class="logo">
					<div class="logo-h"></div>
						<div class="logo-img">
							<a href="homepage.php"><img src="img/FanaticShopLogo2.png" ></a>
						</div>
					</div>
					<div class="logo-f"></div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2" >
				<form action="login.php" method="POST">
					<div class="panel" style="margin-top:50px;border-color:#870a0a; ">
						<div class="panel-heading">
							<h4>Login</h4>
						</div>
						<div class="panel-body panel-login">
							<div class="form-group">
								<label>
									Username
								</label>
								<input type="text" name="username" class="form-control" placeholder="Type your username...">
							</div>
							<div class="form-group">
								<label>
									Password
								</label>
								<input type="password" name="password" class="form-control" placeholder="Type your password...">
							</div>
							<center><?php include('errors.php'); ?></center>
							<div class="form-group">
								<button name="login" type="submit" class="btn btn-login pull-right">Login</button>
							</div>
						</div>
						<div class="panel-footer">
							<a href="#">Forgot Password ?</a>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="./Jumbotron Template for Bootstrap_files/jquery-slim.min.js.download"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>