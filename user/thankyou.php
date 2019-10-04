<?php 
	include('../server.php');
	require "user_header.php";
//error_reporting(0);

//ob_start();
//	session_start(); 
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
	<div class="content">
		<!-- notification message -->
		<h4>Thank you for filling the form.You will receive a confirmation email soon. We will get back to you as soon as we can.</h4>
		<a href="user.php">Go back to homepage.</a>
	</div>
		
</body>
</html>


<?php
	require "../footer.php";
?>