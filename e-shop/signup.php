<?php

session_start();
$errors = array();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$conn = mysqli_connect("localhost", "root","", "e-shop");

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$pass2 = $_POST['password2'];

	if(isset($email) && $email !== "")
	{
			if(isset($username) && $username !== "")
			{
				if(isset($pass) && $pass !== "")
				{
					if(isset($pass2) && $pass2 !== "")
					{
						if($pass == $pass2)
						{	
							$result = mysqli_query($conn, "SELECT * FROM `user` WHERE `username`='$username' AND `email`='$email'");
							if(mysqli_num_rows($result) == 1)
								 array_push($errors,"<p class=\"error\"><b>You have been registered before!</b></p>");

							else 
							{
							$sql = "INSERT INTO user (username, email,gender,password) VALUES ('$username', '$email', '$gender',SHA1('$pass'))";
								if (mysqli_query($conn, $sql)) 
							 	 array_push($errors,"<p class=\"error\"><b>You were registered successfully!</b></p>");
								else  array_push($errors,"<p class=\"error\"><b>Something went wrong!Try again</b></p>");
							}
							
							
						}
						else array_push($errors,"<p class=\"error\"><b>The passwords do not match!</b></p>");
					}
					else array_push($errors,"<p class=\"error\"><b>Confirm password!</b></p>");
				}
				else array_push($errors,"<p class=\"error\"><b>Put password!</b></p>");
			}
			else array_push($errors,"<p class=\"error\"><b>Put username!</b></p>");
		}
		else array_push($errors,"<p class=\"error\"><b>Put e-mail!</b></p>");
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
				<div class="logo" style="margin-top: 20px;">
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
				<form action="signup.php" method="POST">
					<div class="panel" style="margin-top:30px;border-color:#870a0a; ">
						<div class="panel-heading">
							<h4>Login</h4>
						</div>
						<div class="panel-body panel-login">
							<div class="form-group">
								<label>
									E-Mail
								</label>
								<input type="text" name="email" class="form-control" placeholder="Type your e-mail..." value='<?php if(isset($email)) echo "$email";?>'>
							</div>
							<div class="form-group">
							       	 <label class="control-label">Gender:</label>
							       			 <select name="gender" class="form-control">
							          			<option value="M">Male</option>
							          			<option value="F">Female</option>
							        		 </select>        
							</div>
							<div class="form-group">
								 <label class="control-label">Birthdate:</label><br>
								<select style="color:#555;">
									<option selected="selected">Day</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
								<select style="color:#555;">
									<option selected="selected" value="">Month</option>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
								<select style="color:#555;">
									<option selected="selected" value="">Year</option>
									<option value="2017">2017</option>
									<option value="2016">2016</option>
									<option value="2015">2015</option>
									<option value="2014">2014</option>
									<option value="2013">2013</option>
									<option value="2012">2012</option>
									<option value="2011">2011</option>
									<option value="2010">2010</option>
									<option value="2009">2009</option>
									<option value="2008">2008</option>
									<option value="2007">2007</option>
									<option value="2006">2006</option>
									<option value="2005">2005</option>
									<option value="2004">2004</option>
									<option value="2003">2003</option>
									<option value="2002">2002</option>
									<option value="2001">2001</option>
									<option value="2000">2000</option>
									<option value="1999">1999</option>
									<option value="1998">1998</option>
									<option value="1997">1997</option>
									<option value="1996">1996</option>
									<option value="1995">1995</option>
									<option value="1994">1994</option>
									<option value="1993">1993</option>
									<option value="1992">1992</option>
									<option value="1991">1991</option>
									<option value="1990">1990</option>
									<option value="1989">1989</option>
									<option value="1988">1988</option>
									<option value="1987">1987</option>
									<option value="1986">1986</option>
									<option value="1985">1985</option>
									<option value="1984">1984</option>
									<option value="1983">1983</option>
									<option value="1982">1982</option>
									<option value="1981">1981</option>
									<option value="1980">1980</option>
									<option value="1979">1979</option>
									<option value="1978">1978</option>
									<option value="1977">1977</option>
									<option value="1976">1976</option>
									<option value="1975">1975</option>
									<option value="1974">1974</option>
									<option value="1973">1973</option>
									<option value="1972">1972</option>
									<option value="1971">1971</option>
									<option value="1970">1970</option>
									<option value="1969">1969</option>
									<option value="1968">1968</option>
									<option value="1967">1967</option>
									<option value="1966">1966</option>
									<option value="1965">1965</option>
									<option value="1964">1964</option>
									<option value="1963">1963</option>
									<option value="1962">1962</option>
									<option value="1961">1961</option>
									<option value="1960">1960</option>
									<option value="1959">1959</option>
								</select>
							</div> 						
							<div class="form-group">
								<label>
									Username
								</label>
								<input type="text" name="username" class="form-control" placeholder="Type your username..." value='<?php if(isset($username)) echo "$username";?>'>
							</div>
							<div class="form-group">
								<label>
									Password
								</label>
								<input type="password" name="password" class="form-control" placeholder="Type your password..." >
							</div>
							<div class="form-group">
								<label>
									Confirm password
								</label>
								<input type="password" name="password2" class="form-control" placeholder="Type your password...">
							</div>
							<center><?php include('errors.php'); ?></center>
							<div class="form-group">
								<button type="submit" name="signup" class="btn btn-login pull-right">Sign Up</button>
							</div>
						</div>
						<div class="panel-footer">
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