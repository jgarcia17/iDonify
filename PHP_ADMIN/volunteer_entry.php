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
require_once 'config\config.php';
$db = getDbInstance();

//Get Dashboard information
$numusers = $db->getValue ("user", "count(*)");
$numCustomers = $db->getValue ("donations", "count(*)");

 ?>

	
            <!-- Navigation -->

        	
<h2>Administration</h2>

 
        <div class="col-sm-4">
        <div class="head1" style="margin-left: -30px;">
           <h4 class=""><a href="index.php" style="text-decoration: none;">  <i class="fa fa-dashboard fa-fw"></i>Dashboard</a></h4>
           <h4> <a href="donor.php" style="text-decoration: none;"> <i class="fa fa-list fa-fw"></i> Donor</a></h4>
           <h4> <a href="user.php" style="text-decoration: none;"><i class="fa fa-users fa-fw"></i>User</a></h4>
           <h4> <a href="device_entry.php" style="text-decoration: none;"><i class="fa fa-users fa-fw"></i>Device Request Entries</a></h4>
           <h4> <a href="volunteer_entry.php" style="text-decoration: none;"><i class="fa fa-users fa-fw"></i>Volunteer Request Entries</a></h4>
            </div>
        </div>
       
		

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Volunteer Request Entries List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    
     
        <div class="col-lg-12 col-md-6">
        
         <div class="body">

    <hr/>



          <table class="table text-center">
            <thead>
                <tr>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">Phone?</th>
                    <th class="text-center">Repair Devices?</th>
                    <th class="text-center">Entering Data?</th>
                </tr>
            </thead>
            <tbody>
                <?php 
include "db_config.php";

$sql1 =  "SELECT * FROM volunteer_form";
    $result = $con->query($sql1);
    while($row=$result->fetch_assoc()){



     ?>
                <tr>
                    <td><?php echo $row['f_name']; ?></td>
                    <td><?php echo $row['l_name']; ?></td>
                   <td><?php echo $row['email']; ?></td>
                   <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['q_phone']; ?></td>
                   <td><?php echo $row['q_repair_devices']; ?></td>
                   <td><?php echo $row['q_entering_data']; ?></td>
                   <?php } ?>
                </tr>
               
               
            </tbody>
        </table>
    
</div>
<br/><br/><br/>

        

       <script src="assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/js/metisMenu/metisMenu.min.js"></script>




    <!-- Custom Theme JavaScript -->
    <script src="assets/js/sb-admin-2.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>

</body>
</html>