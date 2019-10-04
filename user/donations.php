<?php 

	require "user_header.php";
	require "donations_menu.php";	
	
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

$dtype=$_POST['dtype'];

$quantity=$_POST['quantity'];
$date=$_POST['date'];
$description=$_POST['description'];
$email=$_POST['email'];
$username = $_SESSION['username'];

$sql="INSERT INTO donations VALUES(NULL,'$dtype','$quantity','$date','$description','$email', '$username')";
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

<?php
	require "../footer.php";
?>