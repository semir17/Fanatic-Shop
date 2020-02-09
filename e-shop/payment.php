<?php
$conn = mysqli_connect("localhost", "root", "", "e-shop");
session_start();

if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

if($_SERVER['REQUEST_METHOD']=="POST")
{
	$sql2="SELECT id FROM user WHERE status=1";
	$result2=mysqli_query($conn,$sql2);
	$result2=mysqli_query($conn,$sql2);
	while($row = $result2->fetch_assoc()){
		$userid = $row['id'];
	}

	$sqli="SELECT id FROM cart WHERE `id`=".$_SESSION['id']."";
	$resulti=mysqli_query($conn,$sqli);

	if(mysqli_num_rows($resulti) == 0)
	{

	$sql="SELECT * FROM product WHERE `id`=".$_SESSION['id']."";
	$result=mysqli_query($conn,$sql);
	while($row = $result->fetch_assoc()){
		$insert = "INSERT INTO cart(id,uid,name,category,price,discountprice,img) VALUES(".$row['id'].",".$userid.",'".$row['name']."','".$row['category']."',".$row['price'].",".$row['discountprice'].",'".$row['img']."')";
		$resulti=mysqli_query($conn, $insert);
	}
}
}
if (isset($_POST['payment'])) {
	
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$insert = "INSERT INTO sales(uid,name,surname,address,postalcode,phone,method,price) VALUES(".$userid.",'".$_POST['name']."','".$_POST['surname']."','".$_POST['address']."',".$_POST['code'].",'".$_POST['phone']."','".$_POST['method']."','".$_SESSION['total']."')";
		$result2=mysqli_query($conn, $insert);

		$sql1="UPDATE product 
  			  SET orders = orders + 1
			 WHERE id IN (SELECT id FROM cart)";
		$result3=mysqli_query($conn,$sql1);

		$result4=mysqli_query($conn, "DELETE FROM cart");


	}
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
	      <form class="navbar-form navbar-left" method="POST" action="payment.php">
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
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="dropup">
						  <button class="btn btn-primary dropdown-toggle btndp btndp-primary" type="button" data-toggle="dropdown">Categories
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
						    <li><a href="football.php">Football</a></li>
						    <li><a href="basketball.php">Basketball</a></li>
						  </ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><li><a href="homepage.php">The newest</a></li></div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><li><a href="brand.php">Brand</a></li></div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><li><a href="onsale.php">On-Sale</a></li></div>
					</ul>
			</div>
		</div>
		<form action="payment.php" method="POST">
		<div class="body">
			<br><br>
			<div class="row">
				<div class="col-lg-5"><p class="description-title">Select your shipping information:</p></div>
			</div>
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
				  <div class="form-group pay">
					  <label for="usr">Name:</label>
				  <input type="text" name="name" class="form-control" required="asd">
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
				  <div class="form-group pay">
					  <label for="usr">Surname:</label>
				  <input type="text" name="surname" class="form-control" required="asd">
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
				  <div class="form-group pay">
					  <label for="usr">Address:</label>
				  <input type="text" name="address" class="form-control" required="asd">
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
				  <div class="form-group pay">
					  <label for="usr">City & State:</label>
				  <input type="text" class="form-control" required="asd">
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
				  <div class="form-group pay">
					  <label for="usr">Postal Code:</label>
				  <input type="text" name="code" class="form-control" required="asd">
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
				  <div class="form-group pay">
					  <label for="usr">Mobile Phone:</label>
				  <input type="text" name="phone" class="form-control" required="asd">
				</div>
			</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-5"><p class="description-title">Confirm your order:</p></div>
			</div><br><br>
			<div class="row" style="margin-left: 460px; margin-top:10px; margin-bottom: 10px;">
				<?php 
				$sql="SELECT id FROM user WHERE status=1";
				$result=mysqli_query($conn,$sql);
				while($row = $result->fetch_assoc()){
					$userid = $row['id'];
				}

				$sql="SELECT * FROM cart WHERE `uid`=".$userid."";
				$result=mysqli_query($conn,$sql);
				while($row = $result->fetch_assoc()){
					echo "<div class='row' style='margin-left:-80px;'><div class='col-lg-4 confirm'>";
					echo $row['name']."</div>";
					echo "<div class='col-lg-3' style='color:black;'>".$row['discountprice']." &euro;</div></div>";
				}
				echo "<br><div class='row' style='margin-left:-80px;'><div class='col-lg-4 confirm'>Totalprice:</div>";
				$sql="SELECT SUM(discountprice) AS totalprice FROM cart WHERE `uid`=".$userid."";
				$result=mysqli_query($conn,$sql);
				while($row = $result->fetch_assoc()){
					$_SESSION['total'] = $row['totalprice'];
					echo "<div class='col-lg-3' style='color:black;'>".$_SESSION['total']." &euro;</div></div>";
				}
				?>
			</div>
			<div class="row">
				<div class="col-lg-5"><p class="description-title">Payment method:</p></div>
			</div>
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
				  <div class="form-group pay">
					  <label for="usr">Your credit number:</label>
				  <input type="text" class="form-control" required="asd">
				</div>
			</div>
		</div>
			<div class="row">
				<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
				  <div class="form-group pay">
					  <label for="usr">Payment method:</label>
			</div></div>
			<div class="row">
				<div class="col-lg-5 col-sm-5 col-xs-5"></div>
						<div class="col-lg-2 col-sm-2 col-xs-2" style="text-align: left;"><div class="radio">
												  <label><input type="radio" name="method" value="VISA">VISA</label>
												</div>
												<div class="radio">
												  <label><input type="radio" name="method" value="VISA ELECTRON">VISA ELECTRON</label>
												</div>
												<div class="radio">
												  <label><input type="radio" name="method" value="MASTERCARD">MASTERCARD</label>
												</div>
												<div class="radio">
												  <label><input type="radio" name="method" value="MAESTRO">MAESTRO</label>
												</div>
						</div>
			</div>
		</div>
		<div class="row" style="margin-top: 25px;">
					<div class="col-lg-4"></div>
					<div class="col-lg-3" style="margin-left: 15px;"><div class="form-group">
											<button class="btn btn-login" name="payment">Confirm and PAY</button>
										  </div>
					</div>
		<br><br>
</div>
</div>
</div>
</div>
</form>
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
				<div class="rights"><img src="img/macedonia.png" width="25px" height="25px">  Macedonia &copy; 2020 Fanatic. All rights reserved</div>
			</div>
	</div>

	</div>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="./Jumbotron Template for Bootstrap_files/jquery-slim.min.js.download"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>