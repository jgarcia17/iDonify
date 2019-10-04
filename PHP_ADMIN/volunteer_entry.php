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
		



	
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Volunteer Entries</h1>
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
                   <td><a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-edit"></span>

                    <a href="delete_user.php?id=<?php echo $row['id']; ?>"  class="btn btn-danger delete_btn" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span></td>
                   <?php } ?>
                </tr>
               
               
            </tbody>
        </table>
    
</div>
<br/><br/><br/>

        <div class="col-sm-12">
        <div class="card-header text-center"> <h1>Admin Conversation</h1></div>

            <?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){

            $usrname=$_SESSION['username_admin'];
            $comment=$_POST['comments'];
            $sql="INSERT INTO `comments` VALUES (NULL,'$usrname','$comment')";


            $insert= $con->query($sql);


}
 $sql =  "SELECT * FROM `comments`";
   $result = $con->query($sql);
 while($row=$result->fetch_assoc()){
    ?>
 <div class="card" >

 <?php


  echo $row['comment']; ?> </div>
  <div class="btn btn-primary" >
  <?php echo $row['username'];?> </div>
<button class="btn btn-light" style="float: right"><a href="delete.php?id=<?php echo $row['id']; ?>" style="text-decoration: none"> Delete</a></button>


<?php }
   ?>
       
   
  

        </div>

    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-sm-12">
<div class="form-group">
     
            <form action="" method="post">

                <textarea type="text" name="comments" class="form-control form-group" rows="5" >
                    

                </textarea>
<input type="submit" class="btn btn-success" name="submit" value="Comments">
            </form>

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




</body>
</html>