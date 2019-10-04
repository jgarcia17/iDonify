<?php 

	require "user_header.php";
	require "donations_menu.php";	
	
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

	<h2 align="center">Your donation history</h2>

	      <table class="table text-center">
            <thead>
                <tr>
                    <th>Donation Type</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            	<?php 
include "../db_config.php";

$username = $_SESSION['username'];
$sql1 =  "SELECT * FROM donations WHERE donor_username = '$username';";
    $result = $con->query($sql1);
    while($row=$result->fetch_assoc()){



	 ?>
                <tr>
                  
                  

                    <td><?php echo $row['donation_type']; ?></td>
                    <td><?php echo $row['donation_qty']; ?></td>
                    <td><?php echo $row['donation_date']; ?></td>
                    <td><?php echo $row['donation_description']; ?></td>
                    <td><?php echo $row['donor_email'];} ?></td>
                </tr>
               
               
            </tbody>
        </table>
	
</div>
		
</body>
</html>

<?php
	require "../footer.php";
?>