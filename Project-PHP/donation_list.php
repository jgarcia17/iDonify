<?php 

	require "header.php";
	
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
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="head">
		<div style="float: left;"><h6 ><a href="donations.php" style="text-decoration: none;">Device Donations</h6></a></div>
		<div style="float: right;"><a href="donation_list.php" style="text-decoration: none;"><h6>Donation History</h6></a></div>



	</div>
<div class="body">
<br/>
	<hr/>

	<br/><br/>
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
include "db_config.php";

$sql1 =  "SELECT * FROM donations";
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