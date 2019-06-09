<?php 
	include('server.php');
	require "header.php";
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
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<h4>Thank you for filling the form.You will recive a confirmation email soon.We will get back to you as soon as we can.</h4>
		<a href="index.php">Go back to homepage.</a>
	</div>
		
</body>
</html>