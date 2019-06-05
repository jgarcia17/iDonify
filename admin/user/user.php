<?php
	require "user_header.php";
	
	//session_start();
	
	if(isset($_SESSION['email']))
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
		header("Location: ../login");
	}
?>
	
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
		integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	
</head>
<body>
	
			
</body>
</html>
	
<?php
	//require "../footer.php";	
?>