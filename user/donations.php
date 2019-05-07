<?php
	
	require "user_header.php";
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
			
			$donationType = $con->real_escape_string($_POST['type']);
			$donationQty = $con->real_escape_string($_POST['qty']);
			$donationDate 	= $con->real_escape_string($_POST['date']);
			$donationDescription = $con->real_escape_string($_POST['description']);
				
			$con->query("INSERT INTO donations (donation_type, donation_qty, donation_date, donation_description) 
						VALUES ('$donationType', '$donationQty', '$donationDate','$donationDescription')");
			$msg = "Your donation was added successfully!";
		}
		else
		{
			
		}
	}
	else
	{
		//Redirect to login pages
		header("Location: ../login.php");
	}
	
?>

<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<!--<img src="images/logo.png"><br><br>-->

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>
				
				<h1>Donations</h1>

				<form method="post" action="donations.php">
					<input class="form-control" type="text" name="type" placeholder="Donation Type"><br>
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