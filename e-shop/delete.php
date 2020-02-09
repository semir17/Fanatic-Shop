<?php 
$conn = mysqli_connect("localhost", "root", "", "e-shop");

session_start();

if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

$sql="DELETE FROM cart WHERE id='".$_GET['d']."'";
	$result=mysqli_query($conn,$sql);
	 echo "<meta http-equiv=\"refresh\" content=\"0; URL=cart.php\" />";
?>