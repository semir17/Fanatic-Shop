<?php
$conn = mysqli_connect("localhost", "root", "", "e-shop");
session_start();
if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}



if (isset($_GET['p']) && is_numeric($_GET['p'])){
	$_SESSION['id'] = $_GET['p'];

	$sql="SELECT * FROM product WHERE `id`='".$_SESSION['id']."'";
	$result=mysqli_query($conn,$sql);


	if(mysqli_num_rows($result) ==1){
	while($row = $result->fetch_assoc()){
	
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
	      <form class="navbar-form navbar-left" method="POST" action="product.php">
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
		<div class="body">
			<div class="row">
				<form action="payment.php" method="POST">
				<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12"><div class="product-buy"><img src="<?php echo $row['img'] ; ?>" class="product-buy-img" ></div></div>
				<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 30px; text-align: center;"><p class="description-title"><?php echo $row['name'] ; ?> - <?php echo $row['category'] ; ?></p></div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px; text-align: center;"><p class="description-title" style="color:#870a0a;"><?php echo $row['orders'] ; ?> orders</p></div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><hr style="width: 80%; "></div>
					</div>
					<div class="row">
						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"><p class="description"><b>Price:</b></p></div>
						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"><p class="description"><strike><?php echo $row['price'] ; ?>&euro;</strike></p></div>
					</div>
					<div class="row">
						<div class="col-lg-1"></div>
						<div class="col-lg-3"><p class="description"><b>Discount Price:</b></p></div>
						<div class="col-lg-1"><p class="description" style="color:#870a0a;""><b><?php echo $row['discountprice'] ; ?>&euro;</b></p></div>
						<div class="col-lg-1"></div>
						<div class="col-lg-2"><center><p class="description" style="background-color:#870a0a; width:40px; border-radius: 3px; text-align: center;">-<?php echo $row['sale'] ; ?>%</p></center></div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"><p class="description"><b>Size:</b></p></div>
						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"><div class="radio description">
							<?php if($row['category']=="Basketball Boots" || $row['category']=="Football Boots"){?>
												<label><input type="radio" name="size" value="41" checked="">41</label>
												</div>
												<div class="radio description">
												  <label><input type="radio" value="42" name="size">42</label>
												</div>
												<div class="radio description">
												  <label><input type="radio" value="43" name="size">43</label>
												</div>
												<div class="radio description">
												  <label><input type="radio" value="44" name="size">44</label>
												</div>
												<div class="radio description">
												  <label><input type="radio" value="45" name="size">45</label>
												</div>
							<?php } else {?>		

												  <label><input type="radio" value="S" name="size" checked>S</label>
												</div>
												<div class="radio description">
												  <label><input type="radio" value="M" name="size">M</label>
												</div>
												<div class="radio description">
												  <label><input type="radio" value="L" name="size">L</label>
												</div>
												<div class="radio description">
												  <label><input type="radio" value="XL" name="size">XL</label>
												</div>
												<div class="radio description">
												  <label><input type="radio" value="XXL" name="size">XXL</label>
												</div>
							<?php } ?>
										
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"><p class="description"><b>Shipping:</b></p></div>
						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"><p class="description">to </p></div>
						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" ><div class="form-group">
											  <center><select name="countries" class="form-control countries">
											  	<option value="1">Bulgaria</option>
											    <option value="2">Macedonia</option>
											    <option value="3">Albania</option>
											    <option value="4">Kosova</option>
											    <option value="5">Grecce</option>
											    <option value="6">Serbia</option>
											    <option value="7">Croatia</option>
											    <option value="8">Montenegro</option>
											  </select></center>
											</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;"><p class="description" style="font-size:14px;">Estimated Delivery Time :<span class="description-title" style="font-size:14px;"> 24 - 39 days</span></p></div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"><p class="description"><b>Quantity:</b></p></div>
						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"><div class="form-group">
											 <center><select class="form-control countries" name="quantity">
											    <option value="1">1</option>
											    <option value="2">2</option>
											    <option value="3">3</option>
											    <option value="4">4</option>
						   					    <option value="5">5</option>
											  </select></center>
											</div>
					</div>
					<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
					<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12"><p class="description" style="font-size: 14px;">  piece (max 5 pieces for one customer)</p></div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12"></div>
					<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12"><div class="form-group">
											<button name="buy" type="submit" class="btn btn-login" <?php if($_SESSION['loggedin']==false) echo "disabled";  ?>>Buy Now</button>
										  </div>
					</div>
					</form>
					<form method="POST" action="cart.php">
					<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12"><div class="form-group">
											<button name="cart" type="submit" class="btn btn-login" <?php if($_SESSION['loggedin']==false) echo "disabled";  ?>>Add to Cart</button>
										</div>
					</div>
				</form>
				</div>
				<br><br>
	</div>
</div>
</div>	
	
<br>	



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
<?php
 }}} 
 if (isset($_POST['search'])) {
        $_SESSION['search2'] = $_POST['search'];
		echo "<meta http-equiv=\"refresh\" content=\"0; URL=search.php\" />";
    }

?>