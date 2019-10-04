<?php 

	require "user_header.php";
	require "requests_menu.php";	
	
ob_start();
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<body>

	<h2 align="center">Your request history</h2>

	      <table class="table text-center">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Occupation</th>
                    <th>Phone</th>
					<th>Annual Income</th>
					<th>Additional Details</th>
                </tr>
            </thead>
            <tbody>
				<?php 
include "../db_config.php";

$username = $_SESSION['username'];
$sql1 =  "SELECT * FROM device_request_submission WHERE username = '$username';";
    $result = $con->query($sql1);
    while($row=$result->fetch_assoc()){


				?>
                <tr>
                  
                    <td><?php echo $row['f_name']; ?></td>
                    <td><?php echo $row['l_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['occupation']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['annualIncome']; ?></td>
                    <td><?php echo $row['additionalDetails'];} ?></td>				
                </tr>
               
               
            </tbody>
        </table>
	
</div>
		
</body>
</html>
<?php
	require "../footer.php";
?>