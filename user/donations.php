<?php
	//require "../header.php";
	//require_once("../dbhandler.php");
	$msg = "";
	
	
	
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
				
				<h1>Donations</h1>

				<form method="post" action="donations.php">
					<input class="form-control" type="text" name="type" placeholder="Donation Type"><br>
					<input class="form-control" type="text" name="qty" placeholder="Quantity"><br>
					<input class="form-control" type="date" name="date"><br>
					<input class="form-control" type="text" name="description" placeholder="Description"><br>
					<button class="btn btn-primary" type="submit" name="submit">Create</submit><br>
				</form>

			</div>
		</div>
	</div>
</body>
</html>
	
<?php
	//require "../footer.php";
?>