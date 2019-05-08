<?php
	
	require "user_header.php";
	//require_once("../dbhandler.php");
	$msg = "";
	
	
	if(isset($_SESSION['email']))
	{
		require_once("../dbhandler.php");
		
		$email = $_SESSION['email'];
		$sql = "SELECT * FROM donations WHERE $email = 'donor_email';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck > 0)
		{
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr><td>" . $row["donation_type"] . "</td><td>" . $row["donation_qty"] . "</td><td>" 
				. $row["donation_date"] . "</td><td>" . $row["donation_description"] ."</td></tr>";
			}
			echo "</table>";
		}
		else
		{
			echo "0 Donations made";
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
				
				
				<table align="center" border="1px" >
					<tr>
						<th>Donation Type</th>
						<th>Quantity</th>
						<th>Date</th>
						<th>Description</th>
					</tr>
				</table>
				

			</div>
		</div>
</div>
	
<?php
	//require "../footer.php";
?>