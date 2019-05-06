<?php
require "header.php"; 
require_once("dbhandler.php");
if(isset($_POST['submit'])){
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$email 	= $_POST['email'];
		$pwd1 = $_POST['pwd1'];
		$pwd2 = $_POST['pwd2'];
		$userRole = "user";
		
		//$options = array("cost"=>4);
		//$hashPassword = password_hash($pwd1,PASSWORD_BCRYPT,$options);
		//$options = array("cost"=>11);
		$hashpwd = password_hash($pwd1,PASSWORD_BCRYPT);
		$sql = "insert into users (user_fname, user_lname,user_email, user_password, user_role) 
		value('".$firstName."', '".$lastName."', '".$email."','".$hashpwd."','".$userRole."')";
		$result = mysqli_query($conn, $sql);
		if($result)
		{
			echo "Registration successfully";
		}
	}
?>

<div>
<h1>Registration</h1>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="fname" value="" placeholder="First Name">
	<input type="text" name="lname" value="" placeholder="Last Name">
	<input type="text" name="email" value="" placeholder="Email">
	<input type="password" name="pwd1" value="" placeholder="Password">
	<input type="password" name="pwd2" value="" placeholder="Confirm Password">
	<button type="submit" name="submit">Submit</submit>
</form>
</div>

<div>
	<li><a href="login.php">Login</a></li>
</div>

<?php
	require "footer.php";
?>