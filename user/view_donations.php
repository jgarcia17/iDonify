<?php
	
	require "user_header.php";
	$msg = "";
	
?>

<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<!--<img src="images/logo.png"><br><br>-->

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>
				
				
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Donation Type</th>
							<th scope="col">Quantity</th>
							<th scope="col">Date</th>
							<th scope="col">Description</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(isset($_SESSION['email']))
							{
								require_once("../dbhandler.php");
								
								
								$email = $_SESSION['email'];
								$sql = "SELECT * FROM donations WHERE donor_email = '$email';";
								$result = $conn->query($sql);
							
								while($row = $result->fetch_assoc()){
										echo "<tr>";
										echo "<td>" . $row["donation_type"] . "</td>";
										echo "<td>" . $row["donation_qty"] . "</td>"; 
										echo "<td>" . $row["donation_date"] . "</td>"; 
										echo "<td>" . $row["donation_description"] . "</td>";
										
								}
								

								
							}
							else
							{
								//Redirect to login pages
								header("Location: ../login.php");
							}
						?>
					</tbody>
				</table>
				

			</div>
		</div>
</div>
	
<?php
	//require "../footer.php";
?>