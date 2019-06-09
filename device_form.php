<?php 
	include('server.php');
	require "user/user_header.php";
	

	require "user/requests_menu.php";
	
	
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
		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<h1>Device Request form</h1>
			<p>Please fill the form below to request a device,</p>

			<form method="post" action="server.php" style="width: 100%;">
				<?php include('errors.php'); ?>
				

				<div class="input-group">
					<label>First Name</label>
					<input type="text" name="d_fname" required="">
				</div>

				<div class="input-group">
					<label>Last Name</label>
					<input type="text" name="d_lname"  required="">
				</div>

				<div class="input-group">
					<label>Email</label>
					<input type="text" name="d_email" required="" >
				</div>

				<div class="input-group">
					<label>Occupation</label>
					<input type="text" name="d_occupation" required="" >
				</div>

				<div class="input-group">
					<label>Phone</label>
					<input type="text" name="d_phone" required="" >
				</div>

				<div class="input-group">
					<label>Annual Income</label>
					<input type="text" name="d_aIncome" required="" >
				</div>

				<div class="input-group">
					<label>Additional Details</label>
					<textarea name="d_additionalDetails" id="" cols="60" rows="10"></textarea>
				</div>
				
				<div class="input-group">
					<button type="submit" class="btn" name="device_request">Submit</button>
				</div>
			</form>
		<?php endif ?>
	</div>
		
</body>
</html>