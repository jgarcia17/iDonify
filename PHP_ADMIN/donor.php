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

 ?>

	
            <!-- Navigation -->

        	
<h2>Administration</h2>

       <div class="col-sm-4">
        <div class="head1">
           <h4 class=""><a href="index.php" style="text-decoration: none;">  <i class="fa fa-dashboard fa-fw"></i>Dashboard</a></h4>
           <h4> <a href="donor.php" style="text-decoration: none;"> <i class="fa fa-list fa-fw"></i> Donor</a></h4>
           <h4> <a href="user.php" style="text-decoration: none;"><i class="fa fa-users fa-fw"></i>User</a></h4>
            </div>
        </div>
		



	
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Donor History</h1>
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
                    <th>Donation Type</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Email</th>
                    <th>Action</th>
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
                    <td><?php echo $row['donor_email']; ?></td>
                      <td><a href="edit_donation.php?id=<?php echo $row['donation_id']; ?>" class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-edit"></span>

                    <a onClick="return confirm('Are You Sure To Delete');" href="delete_donor.php?id=<?php echo $row['donation_id']; ?>"  class="btn btn-danger delete_btn" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span></td>
                    <?php } ?>
                </tr>
               
               
            </tbody>
        </table>
    
</div>
        <div class="col-lg-3 col-md-6">
            
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">


            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">

            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>
    <!-- /.row -->
</div>


       <script src="assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/js/metisMenu/metisMenu.min.js"></script>




    <!-- Custom Theme JavaScript -->
    <script src="assets/js/sb-admin-2.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>

</body>
</html>