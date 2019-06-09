<?php
	require "user_header.php";
	
	//session_start();
	
	if(isset($_SESSION['email']))
	{
		//get user data from database using email
		// let user access logged in only pages
		//header('location: user.php');
		
		//echo("{$_SESSION['email']}");
		//echo("{$_SESSION['id']}");
		
	}
	else
	{
		//Redirect to login pages
		header("Location: login");
	}
?>
<?php 
require_once 'config/config.php';
$db = getDbInstance();

//Get Dashboard information
$numCustomers = $db->getValue ("users", "count(*)");
$numusers = $db->getValue ("donations", "count(*)");

 ?>

	
            <!-- Navigation -->

        	
<h2>Administration</h2>

      <div class="col-sm-4">
        <div class="head1">
           <h4 class=""><a href="dashboard.php" style="text-decoration: none;">  <i class="fa fa-dashboard fa-fw"></i>Dashboard</a></h4>
           <h4> <a href="donor.php" style="text-decoration: none;"> <i class="fa fa-list fa-fw"></i> Donor</a></h4>
           <h4> <a href="user.php" style="text-decoration: none;"><i class="fa fa-users fa-fw"></i>User</a></h4>
            </div>
        </div>
		



	
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User List</h1>
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
                        <th class="text-center">User ID</th>
                    <th class="text-center">Email</th>
                <th class="text-center">Password</th>
                   <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
include "dbhandler.php";

$sql1 =  "SELECT * FROM users";
    $result = $conn->query($sql1);
    while($row=$result->fetch_assoc()){



     ?>
                <tr>
                  
                  

                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['user_email']; ?></td>
                   <td><?php echo $row['user_password']; ?></td>
                   <td><a href="edit_user.php?id=<?php echo $row['user_id']; ?>" class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-edit"></span>

                    <a href="delete_user.php?id=<?php echo $row['user_id']; ?>"  class="btn btn-danger delete_btn" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span></td>
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

            $usrname=$_SESSION['username'];
            $comment=$_POST['comments'];
            $sql="INSERT INTO `comments` VALUES (NULL,'$usrname','$comment')";


            $insert= $con->query($sql);


}
 $sql =  "SELECT * FROM `comments`";
   $result = $conn->query($sql);
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


       <script src="assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/js/metisMenu/metisMenu.min.js"></script>




    <!-- Custom Theme JavaScript -->
    <script src="assets/js/sb-admin-2.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>

</body>
</html>