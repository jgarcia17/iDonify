<?php
	require "header.php";
	$msg = "";
	
	if(isset($_POST['send']))
	{
		require_once('dbhandler.php');
		
		$first = $conn->real_escape_string($_POST['fname']);
		$last = $conn->real_escape_string($_POST['lname']);
		$phone = $conn->real_escape_string($_POST['phone']);
		$email = $conn->real_escape_string($_POST['email']);
		$message = $conn->real_escape_string($_POST['message']);
		$date = "";
		
		if($first == "")
		{
			$msg = "First name is required";
		}
		elseif($last == "")
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
		elseif(!preg_match("/^[a-zA-Z ]*$/", $first))
		{
			$msg = "Only letters allowed for First name";
		}
		elseif(!preg_match("/^[a-zA-Z ]*$/", $last))
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
			$conn->query("INSERT INTO contact (first_name, last_name, email, phone, message) 
				VALUES('$first', '$last', '$email', '$phone', '$message')");
							
			$msg = "Your message was sent successfully";
		}
	}
?>
<!doctype html>
<html lang="en">



<body>
	<div class="container" style="margin-top: 20px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>
				
				<h1>Contact us</h1><br>
				<form method="post" action="contact.php">
					<input class="form-control" minlength="3" type="text" name="fname" value="" placeholder="First Name"><br>
					<input class="form-control" type="text" name="lname" value="" placeholder="Last Name"><br>
					<input class="form-control" type="text" name="email" value="" placeholder="Email"><br>
					<input class="form-control" type="tel" name="phone" value="" placeholder="Phone number"><br>
					<textarea class="form-control" name="message" placeholder="Write your message here"></textarea><br>
					<input class="btn btn-primary" name="send" type="submit" value="Send"><br><br>
				</form>

			</div>
		</div>
	</div>
</body>
</html>
	
<?php
	require "footer.php";
?>