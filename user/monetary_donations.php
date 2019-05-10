<?php
	
	require "user_header.php";
	//require_once("../dbhandler.php");
	$msg = "";
	
	
	if(isset($_SESSION['email']))
	{
		require_once("../dbhandler.php");
		
		if(isset($_POST['submit'])){
			
			$email = $_SESSION['email'];
			$donationAmount = $conn->real_escape_string($_POST['amount']);
			$donationDate = $conn->real_escape_string($_POST['date']);
			$donationDescription = $conn->real_escape_string($_POST['description']);
			$date = date("Y-m-d H:i:s", strtotime($donationDate)); //converting html input date to mysql datetime format
			
				
			$conn->query("INSERT INTO donations (donation_amount, donation_date, donation_description, donor_email) 
						VALUES ('$donationAmount', '$date','$donationDescription', '$email')");
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
				
				<h1>Monetary donations</h1>
				<form method="post" action="monetary_donations.php">
					<input class="form-control" type="text" name="amount" placeholder="Amount"><br>
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