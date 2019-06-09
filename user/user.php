<?php
	require "user_header.php";
	
	//session_start();
	
	if(isset($_SESSION['username']))
	{
		//get user data from database using email
		// let user access logged in only pages
		//header('location: user.php');
		
		//echo("{$_SESSION['email']}");
		//echo("{$_SESSION['id']}");
		
	}
	else
	{
		//Redirect to login pages
		header("Location: ../login.php");
	}
?>
	
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>



		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
			integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/style.css">



<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			
			<div class="error success" >
				<h3>
					<?php
						$_SESSION['success'] = "You are now logged in!!!!!!";
						echo $_SESSION['success']; 
						unset($_SESSION['success']);

					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="../device_form.php" style="color: blue;">Device request form</a> </p>
			<p> <a href="../volunteer_form.php" style="color: blue;">Volunteer Form</a></p>
			<p> <a href="user.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>
	
	


<?php

$headers = 'From: ga.grace.ga@gmail.com' . "\r\n" . 
           'MIME-Version: 1.0' . "\r\n" .
           'Content-Type: text/html; charset=utf-8';

$result = mail("ga.grace.ga@gmail.com", "Hello World", "This is email body", $headers);
var_dump($result);	
	
?>
		
</body>
</html>