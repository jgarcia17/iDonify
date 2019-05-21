<?php
	require "header.php";
	session_start();
	
	$msg = "";

	if (isset($_POST['submit'])) 
	{
		require_once("dbhandler.php");

		$email = $conn->real_escape_string($_POST['email']);
		$pwd = $conn->real_escape_string($_POST['pwd']);
		$userId = "";
		
		if($email == "")
		{
			$msg = "Email is required";
		}
		elseif($pwd == "")
		{
			$msg = "Password is required";
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$msg = "Invalid email format";
		}
		else 
		{
			$sql = $conn->query("SELECT user_id, user_password, email_confirmed FROM users WHERE user_email='$email'");
			if ($sql->num_rows > 0) 
			{
				$data = $sql->fetch_array();
				if (password_verify($pwd, $data['user_password'])) 
				{
					if ($data['email_confirmed'] == 0)
					{
	                    $msg = "Please verify your email!";
						
					}
                    else 
					{
	                    $msg = "You have been logged IN!";
						$_SESSION['email'] = $email;
						
						header('location: user/user.php');
                    }
					
				} 
				else
				{
					$msg = "Please check your inputs!";
				}
			} 
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
		integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<img src="assets/images/logo.png"><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>
				
				<h1>Login</h1><br>
				<form method="post" action="login.php">
					<input class="form-control" type="email" name="email" placeholder="Email"><br>
					<input class="form-control" minlength="5" type="password" name="pwd" placeholder="Password"><br>
					<button class="btn btn-primary" type="submit" name="submit">Log In</button><br><br>
				</form>
				
				<ul class="nobullet">
					<li><a href="register.php">To register click here</a></li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>