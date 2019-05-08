<?php
	session_start();
	include('functions.php');
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
	require "../header.php";
	//require_once("../dbhandler.php");
	$msg = "";
	
	
	if(isset($_SESSION['email']))
	{
		//$con = new mysqli('localhost', 'root', '', 'db_idonify');
		//get user data from database using email
		// let user access logged in only pages
		//header('location: user.php');
		//$getId = "SELECT user_id FROM users";
		//$result = $con->query($getId);
		
		//$donorId= $result;
		
		$donorId = "";
		
		if(isset($_POST['submit'])){
			$con = new mysqli('localhost', 'root', '', 'db_idonify');
			
			$fname = $con->real_escape_string($_POST['fname']);
			$lname = $con->real_escape_string($_POST['lname']);
			$email = $con->real_escape_string($_POST['email']);
			$pwd1 = $con->real_escape_string($_POST['pwd1']);
			$pwd2 = $con->real_escape_string($_POST['pwd2']);
			$userRole = $con->real_escape_string($_POST['urole']);
				
			if ($pwd1 != $pwd2)
			{
				$msg = "Please Check Your Passwords!";
			}
			else 
			{
				$hash = password_hash($pwd1, PASSWORD_BCRYPT);
				$con->query("INSERT INTO users (user_fname, user_lname,user_email, user_password, user_role) 
							VALUES ('$fname', '$lname', '$email', '$hash', '$userRole')");
				$msg = "You have been registered!";
			}
		}
		else
		{
			//Redirect or something else
		}
	}
	else
	{
		//Redirect to login pages
		header("Location: ../login.php");
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<!--<img src="images/logo.png"><br><br>-->

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>
				
				<h1>Add new user or admin</h1>
				<form method="post" action="add_admin.php">
					<input class="form-control" minlength="3" type="text" name="fname" value="" placeholder="First Name"><br>
					<input class="form-control" type="text" name="lname" value="" placeholder="Last Name"><br>
					<input class="form-control" type="text" name="email" value="" placeholder="Email"><br>
					<input class="form-control" minlength="5" type="password" name="pwd1" value="" placeholder="Password"><br>
					<input class="form-control" minlength="5" type="password" name="pwd2" value="" placeholder="Confirm Password"><br>
					<select class="form-control" name="urole" placeholder="User Role">
						<option value="user">user</option> 
						<option value="admin">admin</option>
					</select><br>
					<input class="btn btn-primary" name="submit" type="submit" value="Add"><br>
				</form>

			</div>
		</div>
	</div>
</body>
</html>
	
<?php
	//require "../footer.php";
?>