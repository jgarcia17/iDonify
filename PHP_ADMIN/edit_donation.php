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
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="body">
<br/>
	<hr/>
<?php 
include "db_config.php";
$id = $_GET['id'];
if($_SERVER['REQUEST_METHOD']=='POST' && ISSET($_POST["submit"])){

$dtype=$_POST['dtype'];
$quantity=$_POST['quantity'];
$date=$_POST['date'];
$description=$_POST['description'];
$email=$_POST['email'];

$sql="UPDATE donations SET
    donation_type = '$dtype',
    donation_qty  = '$quantity',
    donation_date = '$date',
    donation_description = '$description',
    donor_email = '$email' 
    WHERE donation_id ='$id'";
$insert=$con->query($sql);
if($insert){

	header("location: donor.php");
}




}

 ?>

	<br/><br/>
	<h2 align="center">Device donations</h2>
	<form class="text-center" action="" method="post">
	    
	    <?php 
    include "db_config.php";
    $sql1 =  "SELECT * FROM donations WHERE donation_id='$id'";
        $result = $con->query($sql1);
        while($row=$result->fetch_assoc()){



     ?>
	    
	            <input type="text" name="dtype" class="form-group form-control" value="<?php echo $row['donation_type']; ?>">
				<input type="text" name="quantity" class="form-group form-control" value="<?php echo $row['donation_qty']; ?>">	
				<input type="date" name="date" class="form-group form-control" value="<?php echo $row['donation_date']; ?>">	
				<textarea type="text" name="description" class="form-group form-control" rows="1" ><?php echo $row['donation_description']; ?></textarea>
				<input type="email" name="email" class="form-group form-control" value="<?php echo $row['donor_email']; ?>">	
					<input type="submit" name="submit" class="btn btn-primary" value="Update" align="center">

        <?php } ?>
	</form>
</div>
		
</body>
</html>