<?php include('dbhandler.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Update Data</h2>
	</div>
<?php	
	include "dbhandler.php";
    $id = $_GET['user_id'];

if($_SERVER['REQUEST_METHOD']=='POST' && ISSET($_POST["submit"])){

$fname  = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pwd   = $_POST['password_1'];

$sql="UPDATE users SET
    user_fname = '$fname',
	user_lname = '$lname',
    user_email  = '$email',
    user_password = '$pwd'
    WHERE user_id ='$id'";
$insert=$conn->query($sql);
if($insert){

	 header("Location: user.php");
}
}
?>
	<?php include('errors.php'); ?>
  <?php 
    $sql1 =  "SELECT * FROM users WHERE user_id='$id'";
    $result = $conn->query($sql1);
    while($row=$result->fetch_assoc()){



     ?>	
	<form method="post" action="">
		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="fname" value="<?php echo $row['user_fname']; ?>" required>
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="lname" value="<?php echo $row['user_lname']; ?>" required>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $row['user_email']; ?>" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" value="<?php echo $row['user_password']; ?>" min="8" required>
		</div>
		
		<div class="input-group">
			<button type="submit" class="btn" name="submit">Done</button>
		</div>	
	</form>
</body>
</html>