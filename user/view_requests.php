<?php
	
	require "user_header.php";
	$msg = "";
	
?>

<?php
	require "requests_menu.php";
?>

<div class="container" style="margin-top: 20px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

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
								
								$username = $_SESSION['username'];
								$sql = "SELECT * FROM device_request_submission WHERE username = '$username';";
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);
								
								if($resultCheck > 0){
									while ($row = mysqli_fetch_assoc($result)){
										echo "<tr>";
										echo "<td>" . $row["f_name"] . "</td>";
										echo "<td>" . $row["l_name"] . "</td>"; 
										echo "<td>" . $row["email"] . "</td>"; 
										echo "<td>" . $row["occupation"] . "</td>";
										echo "<td>" . $row["phone"] . "</td>";
										echo "<td>" . $row["annualIncome"] . "</td>";
										echo "<td>" . $row["additionalDetails"] . "</td>";
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
	require "../footer.php";
?>