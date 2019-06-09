<?php
	
	require "user_header.php";
	$msg = "";
	
?>

<?php
	require "requests_menu.php";
?>

<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<!--<img src="images/logo.png"><br><br>-->

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>
				
				<h1>Your requests history</h1><br>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Request Type</th>
							<th scope="col">Household Size</th>
							<th scope="col">Household Income</th>
							<th scope="col">Description</th>
							<th scope="col">Request Type</th>
							<th scope="col">Date</th>
							<th scope="col">Status</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
							if(isset($_SESSION['username']))
							{
								require_once("../dbhandler.php");
								
								$email = $_SESSION['username'];
								$sql = "SELECT * FROM requests WHERE username = '$email';";
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);
								
								if($resultCheck > 0){
									while ($row = mysqli_fetch_assoc($result)){
										echo "<tr>";
										echo "<td>" . $row["device_type"] . "</td>";
										echo "<td>" . $row["household_number"] . "</td>"; 
										echo "<td>" . $row["household_income"] . "</td>"; 
										echo "<td>" . $row["request_description"] . "</td>";
										echo "<td>" . $row["request_type"] . "</td>";
										echo "<td>" . $row["request_date"] . "</td>";
										echo "<td>" . $row["request_status"] . "</td>";
									}
								}
								else
								{
									echo "You haven't made any requests";
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