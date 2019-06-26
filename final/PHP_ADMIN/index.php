<?php 

	require "header.php";
	
ob_start();
	session_start(); 

	if (!isset($_SESSION['username_admin'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username_admin']);
		header("location: login.php");
	}

?>
<?php 
require_once 'config/config.php';
$db = getDbInstance();

//Get Dashboard information
$numCustomers = $db->getValue ("user", "count(*)");
$numusers = $db->getValue ("donations", "count(*)");
$numRequests = $db->getValue ("device_request_submission", "count(*)");
$numVolunteers = $db->getValue ("volunteer_form", "count(*)");

 ?>

<!-- Left Side Navigation -->

        	
<h2>Administration</h2>

 
        <div class="col-sm-4">
        <div class="head1" style="margin-left: -30px;">
           <h4 class=""><a href="index.php" style="text-decoration: none;">  <i class="fa fa-dashboard fa-fw"></i>Dashboard</a></h4>
           <h4> <a href="donor.php" style="text-decoration: none;"> <i class="fa fa-list fa-fw"></i> Donor</a></h4>
           <h4> <a href="user.php" style="text-decoration: none;"><i class="fa fa-users fa-fw"></i>User</a></h4>
           <h4> <a href="device_entry.php" style="text-decoration: none;"><i class="fa fa-users fa-fw"></i>Device Requests</a></h4>
           <h4> <a href="volunteer_entry.php" style="text-decoration: none;"><i class="fa fa-users fa-fw"></i>Volunteer Requests</a></h4>
            </div>
        </div>








<!DOCTYPE html>
<html>

<body>

<h1> Welcome to the administrative panel!</h2>

		
</body>
</html>