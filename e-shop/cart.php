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
	else echo "<meta http-equiv=\"refresh\" content=\"0; URL=cart.php\" />";
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
	      <form class="navbar-form navbar-left" method="POST" action="homepage.php">
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
					<div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-12 col-xs-12">
						<div class="dropup">
						  <button class="btn btn-primary dropdown-toggle btndp btndp-primary" type="button" data-toggle="dropdown">Categories
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
						    <li><a href="football.php">Football</a></li>
						    <li><a href="basketball.php">Basketball</a></li>
						  </ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><li><a href="homepage.php" class="active">The newest</a></li></div>
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><li><a href="brand.php">Brand</a></li></div>
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><li><a href="onsale.php">On-Sale</a></li></div>
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><li><a href="payment.php">Buy</a></li></div>
					</ul>
			</div>
		</div>
		<div class="body">
		<div class="row">
			
			<?php 
			if($_SESSION['loggedin']==true)
			{
				$sql = "SELECT * FROM cart";
				$result = mysqli_query($conn, $sql);
				if ($result->num_rows > 0) {
					echo '<div class="col-md-12 col-sm-12 col-xs-12 text-left"><div class="title">Cart</div></div>';
					while($row = $result->fetch_assoc()) {
						
						echo '<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">';
						echo '<div class="product-cart"><img src="'.$row['img'].'" class="product  img-rounded"></div>';
						echo '<p class="description-title">'.$row['name'].'</p>';
						echo '<hr>';
						echo '<p class="description">'.$row['category'].'<br/>';				
						echo $row['price'].'&euro;</p><br>';
						echo '<a href="delete.php?d='.$row['id'].'"><button type="submit" class="btn btn-danger taraba">X</button></a>';
						echo '</div>';
					}
				}
				else echo "<p class='description-title' style='margin-bottom:300px;margin-top:300px;'>No items in cart!</p>";		
			}
			else echo "<p class='description-title' style='margin-bottom:300px;margin-top:300px;'>You are not logged in!</p>";		?>
							
		</div>

		</div>
		</div>
		</form>
<div class="container">
		<div class="pg">
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
				<div class="page">
				<ul class="pager">
					<ul class="pagination">
					  <li class="previous"><a href="#">Previous</a></li>
					  <li class="active"><a href="#">1</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li class="next"><a href="#">Next</a></li>
					</ul>
				</ul>
			</div>
				</div>
			<div class="col-lg-1"></div>
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