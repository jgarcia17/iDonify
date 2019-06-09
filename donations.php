<?php 

	require "header.php";
	
ob_start();
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="head">
		<div style="float: left;"><h6 ><a href="donations.php" style="text-decoration: none;">Device Donations</h6></a></div>
		<div style="float: right;"><a href="donation_list.php" style="text-decoration: none;"><h6>Donation History</h6></a></div>


	</div>
<div class="body">
<br/>
	<hr/>
<?php 
include "db_config.php";
if($_SERVER['REQUEST_METHOD']=='POST'){

$dtype=$_POST['dtype'];

$quantity=$_POST['quantity'];
$date=$_POST['date'];
$description=$_POST['description'];
$email=$_POST['email'];

$sql="INSERT INTO donations VALUES(NULL,'$dtype','$quantity','$date','$description','$email')";
$insert=$con->query($sql);
if($insert){

	echo "Data inserted successfully";
}




}

 ?>

	<br/><br/>
	<h2 align="center">Device donations</h2>
	<form class="text-center" action="" method="post">
		<input type="text" name="dtype" class="form-group form-control" placeholder="Device Type">
			
				<input type="text" name="quantity" class="form-group form-control" placeholder="Quantity">	
				<input type="date" name="date" class="form-group form-control" placeholder="mm/dd/yyyy">	
				<textarea type="text" name="description" class="form-group form-control" rows="1" placeholder="Description"></textarea>
				<input type="email" name="email" class="form-group form-control" placeholder="Email">	
					<input type="submit" name="submit" class="btn btn-primary" value="Create" align="center">


	</form>
</div>
		
</body>
</html>