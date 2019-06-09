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
			$householdNumber = $conn->real_escape_string($_POST['number']);
			$householdIncome = $conn->real_escape_string($_POST['income']);
			$document = "";
			$requestDate = $conn->real_escape_string($_POST['date']);
			$requestDescription = $conn->real_escape_string($_POST['description']);
			$requestType = "device";
			$deviceSerial = "N/A";
			$requestStatus = "in progress";
			$date = date("Y-m-d H:i:s", strtotime($requestDate)); //converting html input date to mysql datetime format
			
				
			$conn->query("INSERT INTO requests (device_type, household_number, household_income, document, request_description, 
							request_type, device_serial, request_date, request_status, requester_email) 
						VALUES ('$deviceType', '$householdNumber','$householdIncome', '$document', '$requestDescription', 
								'$requestType', '$deviceSerial', '$date', '$requestStatus', '$email')");
			$msg = "Your request was submitted successfully!";
		}
	}
	else
	{
		//Redirect to login pages
		header("Location: ../login.php");
	}
	
?>

<?php
	require "requests_menu.php";
?>

<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<!--<img src="images/logo.png"><br><br>-->

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>
				
				<h1>Device request</h1><br>
				<form method="post" action="device_request.php">
					<input class="form-control" type="text" name="type" placeholder="Device Type"><br>
					<input class="form-control" type="number" name="number" placeholder="Household Size" min="1" max="20"><br>
					<input class="form-control" type="number" name="income" placeholder="Household Income" min="0.00"><br>
					<input class="form-control" type="file" name="document"><br>
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