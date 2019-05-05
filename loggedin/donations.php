<?php
	require "../header.php";
	require_once("../dbhandler.php");
	
	if(isset($_POST['submit'])){
		$donationType = $_POST['type'];
		$donationQty = $_POST['qty'];
		$donationDate 	= $_POST['date'];
		$donationDescription = $_POST['description'];
		
		//$sqlid = "SELECT user_id FROM users WHERE"
		//$donorId = mysqli_query($conn, $sqlid);
		
		$sql = "INSERT INTO donations (donation_type, donation_qty, donation_date, donation_description) 
			VALUES('$donationType', '$donationQty', '$donationDate','$donationDescription')";
		$result = mysqli_query($conn, $sql);
		if($result)
		{
			echo "Donation created successfully";
		}
		//$conn->query("INSERT INTO donations (donation_type, donation_qty, donation_date, donation_description) 
		//	VALUES('$donationType', '$donationQty', '$donationDate','$donationDescription')");
		//$msg = "Donation created successfully";
	}
?>

	<div>
		<h1>Donations</h1>

		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<input type="text" name="type" placeholder="Donation Type">
			<input type="text" name="qty" placeholder="Quantity">
			<input type="date" name="date">
			<input type="text" name="description" placeholder="Description">
			<button type="submit" name="submit">Create</submit>
		</form>
	</div>
	
<?php
	require "../footer.php";
?>