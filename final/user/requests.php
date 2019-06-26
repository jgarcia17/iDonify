<?php 

	require "user_header.php";
	require "requests_menu.php";	
	
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

<body>


<?php 

include "../db_config.php";
if($_SERVER['REQUEST_METHOD']=='POST'){

$d_fname=$_POST['d_fname'];
$d_lname=$_POST['d_lname'];
$d_email=$_POST['d_email'];
$d_occupation=$_POST['d_occupation'];
$d_phone=$_POST['d_phone'];
$d_aIncome=$_POST['d_aIncome'];
$d_additionalDetails=$_POST['d_additionalDetails'];
$username = $_SESSION['username'];

$sql="INSERT INTO device_request_submission VALUES(NULL, '$d_fname', '$d_lname','$d_email', '$d_occupation', '$d_phone', '$d_aIncome', '$d_additionalDetails', '$username')";
$insert=$con->query($sql);
if($insert){

	echo "Request inserted successfully";
}



}

 ?>
 
 
 
	<br/><br/>
	<h2 align="center">Device Requests</h2>
	<form class="text-center" action="" method="post">
		<input type="text" name="d_fname" class="form-group form-control" placeholder="First Name">
		<input type="text" name="d_lname" class="form-group form-control" placeholder="Last Name">		
		<input type="text" name="d_email" class="form-group form-control" placeholder="Email">	
		<input type="text" name="d_occupation" class="form-group form-control" placeholder="Occupation">	
		<input type="text" name="d_phone" class="form-group form-control" placeholder="Phone">
		<input type="text" name="d_aIncome" class="form-group form-control" placeholder="Annual Income">
		<input type="text" name="d_additionalDetails" class="form-group form-control" placeholder="Additional Details">			
		<input type="submit" name="submit" class="btn btn-primary" value="Create" align="center">


	</form>
</div>
		
</body>
</html>

<?php
	require "../footer.php";
?>