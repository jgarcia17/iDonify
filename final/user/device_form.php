<?php 
	include('../server.php');
	require "user_header.php";
	

	require "requests_menu.php";
	
	
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


		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>		
			
<div class="container" style="margin-top: 20px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>
				
				<h1>Request a Device</h1><br>

			<p>Please fill the form below to request a device,</p>

			<form method="post" action="../server.php" style="width: 60%;">
				<?php include('../errors.php'); ?>
					
				
				<input class="form-control" type="text" name="d_fname" required="" placeholder="First Name"><br>
				<input class="form-control" type="text" name="d_lname"  required="" placeholder="Last Name"><br>
				<input class="form-control" type="text" name="d_email" required="" placeholder="Email"><br>
				<input class="form-control" type="text" name="d_occupation" required="" placeholder="Occupation"><br>
				<input class="form-control" type="text" name="d_phone" required="" placeholder="Phone"><br>
				<input class="form-control" type="text" name="d_aIncome" required="" placeholder="Annual Income"><br>

				<div class="input-group">
					<label>Additional Details</label>
					<textarea name="d_additionalDetails" id="" cols="47" rows="5"></textarea>
				</div><br>
				

				<button type="submit" class="btn form-control" name="device_form">Submit</button>
			
			</form>
		<?php endif ?>
			</div>

		</div>
</div>
		
			
			
			
		
			

		
</body>
</html>

<?php
	require "../footer.php";
?>
