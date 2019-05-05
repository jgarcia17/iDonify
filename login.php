<?php 
require "header.php";
require_once("dbhandler.php");
if(isset($_POST['submit'])){
	$email = trim($_POST['email']);
	$password = trim($_POST['pwd']);
	
	$sql = "select * from users where user_email = '".$email."'";
	$rs = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($rs);
	
	if($numRows  == 1){
		$_SESSION['email'] = $email;
		
		$row = mysqli_fetch_assoc($rs);
		if(password_verify($password,$row['user_password'])){
			echo "Password verified";
			header('location: loggedin/user.php');
		}
		else{
			echo "Wrong Password";
		}
	}
	else{
		echo "No User found";
	}
}
?>

<div>
<h1>Login</h1>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="email" value="" placeholder="Email">
	<input type="password" name="pwd" value="" placeholder="Password">
	<button type="submit" name="submit">Login</submit>
</form>

</div>

<div>
	<li><a href="registration.php">Register</a></li>
</div>


<?php
	require "footer.php";
?>