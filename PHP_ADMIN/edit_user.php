<?php include('server.php'); 
include "header.php";

?>
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
	include "db_config.php";
    $id = $_GET['id'];

if($_SERVER['REQUEST_METHOD']=='POST' && ISSET($_POST["submit"])){

$user  = $_POST['username'];
$email = $_POST['email'];
$pwd   = $_POST['password_1'];

$sql="UPDATE user SET
    username = '$user',
    email  = '$email',
    psw = '$pwd',
    password = '$pwd'
    WHERE id ='$id'";
$insert=$con->query($sql);
if($insert){

	 header("Location:user.php");
}
}
?>
	<?php include('errors.php'); ?>
  <?php 
    $sql1 =  "SELECT * FROM user WHERE id='$id'";
    $result = $con->query($sql1);
    while($row=$result->fetch_assoc()){



     ?>	
	<form method="post" action="">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $row['username']; ?>" required>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $row['email']; ?>" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" value="<?php echo $row['psw']; } ?>" min="8" required>
		</div>
		
		<div class="input-group">
			<button type="submit" class="btn" name="submit">Done</button>
		</div>	
	</form>
</body>
</html>