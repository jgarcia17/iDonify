<?php
	require "header.php";
	$msg = "";
	
	if(isset($_POST['submit']))
	{
		require_once('dbhandler.php');
		
		$fname = $conn->real_escape_string($_POST['fname']);
		$lname = $conn->real_escape_string($_POST['lname']);
		$phone = $conn->real_escape_string($_POST['phone']);
		$email = $conn->real_escape_string($_POST['email']);
		$message = $conn->real_escape_string($_POST['message']);
		$date = "";
		
		if($fname == "")
		{
			$msg = "First name is required";
		}
		elseif($lname == "")
		{
			$msg = "Last name is required";
		}
		elseif($email == "")
		{
			$msg = "Email is required";
		}
		elseif($phone == "")
		{
			$msg = "Phone number is required";
		}
		elseif($message == "")
		{
			$msg = "Message field is required";
		}
		elseif(!preg_match("/^[a-zA-Z ]*$/", $fname))
		{
			$msg = "Only letters allowed for First name";
		}
		elseif(!preg_match("/^[a-zA-Z ]*$/", $lname))
		{
			$msg = "Only letters allowed for Last name";
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$msg = "Invalid email format";
		}
		elseif(!is_numeric($phone))
		{
			$msg = "Invalid phone number";
		}
		else
		{
			$conn->query("INSERT INTO contact (first_name, last_name, email, phone, message, date) 
							VALUES ('$fname', '$lname', '$email', '$phone', '$message', '$date')");
							
			$msg = "Your message was sent successfully";
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
    <title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<img src="assets/images/logo.png"><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>
				
				<h1>Contact us</h1><br>
				<form method="post" action="contact.php">
					<input class="form-control" minlength="3" type="text" name="fname" value="" placeholder="First Name"><br>
					<input class="form-control" type="text" name="lname" value="" placeholder="Last Name"><br>
					<input class="form-control" type="text" name="email" value="" placeholder="Email"><br>
					<input class="form-control" type="tel" name="phone" value="" placeholder="Phone number"><br>
					<textarea class="form-control" name="message" placeholder="Write your message here"></textarea><br>
					<input class="btn btn-primary" name="submit" type="submit" value="Send"><br><br>
				</form>

			</div>
		</div>
	</div>
</body>
</html>
	
<?php
	require "footer.php";
?>