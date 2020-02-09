<?php
$conn = mysqli_connect("localhost", "root", "", "e-shop");
session_start();

if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$_SESSION['search2'] = $_POST['search'];
		echo "<meta http-equiv=\"refresh\" content=\"0; URL=search.php\" />";
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
	<title>Basketball</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	

	<nav class="navbar navbar-inverse navbar-fixed-top" style="font-family: Consolas,monaco,monospace;
	font-size:23px;">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="homepage.php">Fanatic Shop</a>
	    </div>
	      <form class="navbar-form navbar-left" method="POST" action="basketball.php">
		      <div class="input-group">
		        <input type="text" class="form-control navbar-center" placeholder="Search" name="search">
		        <div class="input-group-btn">
		          <button class="btn btn-default form-control" type="submit">
		            <i class="glyphicon glyphicon-search"></i>
		          </button>
		        </div>
		      </div>
		    </form>
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
	        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	         <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> <?php if($_SESSION['loggedin'] == true) echo "Logout"; else echo "Login";?></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="container" style="margin-top:100px">
			<div id="ul-div">
				<div class="row">
					<ul>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="dropup">
						  <button class="btn btn-primary dropdown-toggle btndp btndp-primary" type="button" data-toggle="dropdown">Categories
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
						    <li><a href="football.php">Football</a></li>
						    <li><a href="basketball.php">Basketball</a></li>
						  </ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><li><a href="basketball.php" class="active">Kits&Jerseys</a></li></div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><li><a href="boots2.php">Boots</a></li></div>
					</ul>
			</div>
		</div>
		<div class="body">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 text-left"><div class="title">Nike</div></div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href='product.php?p=37'>
						<img src="img/prod13.webp" class="product  img-rounded"><br/>
							<p class="description-title">2019/20 Hawks Shirt</p>
							<hr>
							<p class="description">Basketball Shirt<br/>
								<?php
								$sql="SELECT price FROM product WHERE `id`='37'";
								$result=mysqli_query($conn,$sql);
								$row = mysqli_fetch_assoc($result);
								echo $row['price'];
							?>
							&euro;</p>
			      	</a>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href='product.php?p=38'>
						<img src="img/prod14.webp" class="product  img-rounded"><br/>
							<p class="description-title">2019/20 Celtic Shirt</p>
							<hr>
							<p class="description">Basketball Shirt<br/>
								<?php
								$sql="SELECT price FROM product WHERE `id`='38'";
								$result=mysqli_query($conn,$sql);
								$row = mysqli_fetch_assoc($result);
								echo $row['price'];
							?>
							&euro;</p>
			      	</a>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href='product.php?p=39'>
						<img src="img/prod15.webp" class="product  img-rounded"><br/>
							<p class="description-title">2019/20 Bulls Shirt</p>
							<hr>
							<p class="description">Basketball Shirt<br/>
								<?php
								$sql="SELECT price FROM product WHERE `id`='39'";
								$result=mysqli_query($conn,$sql);
								$row = mysqli_fetch_assoc($result);
								echo $row['price'];
							?>
							&euro;</p>
			      	</a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href='product.php?p=40'>
						<img src="img/prod16.webp" class="product  img-rounded"><br/>
							<p class="description-title">2019/20 Hornets Shirt</p>
							<hr>
							<p class="description">Basketball Shirt<br/>
								<?php
								$sql="SELECT price FROM product WHERE `id`='40'";
								$result=mysqli_query($conn,$sql);
								$row = mysqli_fetch_assoc($result);
								echo $row['price'];
							?>
							&euro;</p>
			      	</a>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href='product.php?p=41'>
						<img src="img/prod17.webp" class="product  img-rounded"><br/>
							<p class="description-title">2019/20 Spurs Shirt</p>
							<hr>
							<p class="description">Basketball Shirt<br/>
								<?php
								$sql="SELECT price FROM product WHERE `id`='41'";
								$result=mysqli_query($conn,$sql);
								$row = mysqli_fetch_assoc($result);
								echo $row['price'];
							?>
							&euro;</p>
			      	</a>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href='product.php?p=42'>
						<img src="img/prod18.webp" class="product  img-rounded"><br/>
							<p class="description-title">2019/20 Pistons Shirt</p>
							<hr>
							<p class="description">Basketball Shirt<br/>
								<?php
								$sql="SELECT price FROM product WHERE `id`='42'";
								$result=mysqli_query($conn,$sql);
								$row = mysqli_fetch_assoc($result);
								echo $row['price'];
							?>
							&euro;</p>
			      	</a>
			</div>
		</div>
		</div>


	</div>

	<div class="footer">
		<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-6 col-sm-6 col-xs-6"><p class="payment">Payment:</p></div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
				<div class="soc">
					<acronym title="Facebook | Fanatic Shop"><a href="https://www.facebook.com/"><img src="img/facebook.png" height="60px" style="margin-top: 22px;margin-right:-5px;"></a></acronym>
					<acronym title="Twitter | Fanatic Shop"><a href="https://www.twitter.com"><img src="img/twitter.png" class="social"></a></acronym>
					<acronym title="Youtube | Fanatic Shop"><a href="https://www.youtube.com"><img src="img/youtube.png" class="social"></a></acronym>
					<acronym title="Instagram | Fanatic Shop"><a href="https://www.instagram.com"><img src="img/instagram.png" class="social"></a></acronym>
				</div>
			</div>
		</div>	
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<img src="img/payment.png" width="400px" height="60px" style=" margin-bottom: 10px;">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="rights"><img src="img/macedonia.png" width="25px" height="25px">  Macedonia &copy; 2018 Fanatic. All rights reserved</div>
			</div>
	</div>

	</div>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="./Jumbotron Template for Bootstrap_files/jquery-slim.min.js.download"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>