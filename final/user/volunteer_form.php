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

	<div class="container" style="margin-top: 20px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<h1>Volunteer form</h1>
			<p>Please fill the form below to volunteer.</p>

			<form method="post" action="../server.php" style="width: 100%;">
				<?php include('errors.php'); ?>
				

				<div class="input-group">
					<label>First Name</label>
					<input type="text" name="v_fname" required="">
				</div>

				<div class="input-group">
					<label>Last Name</label>
					<input type="text" name="v_lname"  required="">
				</div>

				<div class="input-group">
					<label>Email</label>
					<input type="text" name="v_email" required="" >
				</div>

				<div class="input-group">
					<label>Phone</label>
					<input type="text" name="v_phoneNumber" required="" >
				</div>
				
				<p>Select all that apply:</p>

				<div class="input-group">
					<label>Phone</label>
					<input type="checkbox" name="v_phone" style="position: relative; top: -30px; left: 80px;">
				</div>
				

				<div class="input-group" >
					<label>Repairing devices?</label>
					<input type="checkbox" name="v_repair" style="position: relative; top: -30px; left: 80px;">
				</div>
				

				<div class="input-group">
					<label>Entering data</label>
					<input type="checkbox" name="v_enter" style="position: relative; top: -30px; left: 80px;">
				</div>
				

				<div class="input-group">
					<button type="submit" class="btn" name="volunteer_request">Submit</button>
				</div>
			</form>
		<?php endif ?>
	</div>
		
</body>
</html>


<?php
	require "footer.php";
?>
