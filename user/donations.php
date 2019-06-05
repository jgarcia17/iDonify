<?php
	
	require "user_header.php";
	//require_once("../dbhandler.php");
	$msg = "";
	
	
	if(isset($_SESSION['email']))
	{
		require_once("../dbhandler.php");
		
		if(isset($_POST['submit'])){
			
			$email = $_SESSION['email'];
			$deviceType = $conn->real_escape_string($_POST['type']);
			$deviceSerial = $conn->real_escape_string($_POST['serial']);
			$deviceQty = $conn->real_escape_string($_POST['qty']);
			$donationDate = $conn->real_escape_string($_POST['date']);
			$donationDescription = $conn->real_escape_string($_POST['description']);
			//$date = date("Y-m-d H:i:s", strtotime($donationDate)); //converting html input date to mysql datetime format
			
				
			$conn->query("INSERT INTO device_donations (device_type, device_serial, device_qty, donation_date, donation_description, donor_email) 
						VALUES ('$deviceType', '$deviceSerial', '$deviceQty', '$donationDate','$donationDescription', '$email')");
			$msg = "Your donation was added successfully!";
		}
	}
	else
	{
		//Redirect to login pages
		header("Location: ../login.php");
	}
	
?>

<?php
	require "donations_menu.php";
?>

<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<!--<img src="images/logo.png"><br><br>-->

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>
				
				<h1>Device donations</h1><br>
				<form method="post" action="donations.php">
					<input class="form-control" type="text" name="type" placeholder="Device Type"><br>
					<input class="form-control" type="text" name="serial" placeholder="Device Serial"><br>
					<input class="form-control" type="text" name="qty" placeholder="Quantity"><br>
					<input class="form-control" type="date" name="date"><br>
					<textarea class="form-control" name="description" placeholder="Description"></textarea><br>
					<button class="btn btn-primary" type="submit" name="submit">Create</submit><br>
				</form>

			</div>
		</div>
</div>


	
<?php
	//require "../footer.php";
?>