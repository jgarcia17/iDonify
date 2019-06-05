<?php 
include "dbhandler.php";
$id =$_POST['id'];
$fname =$_POST['fname'];
$lname =$_POST['lname'];
$email =$_POST['email'];
$password_1 =$_POST['password_1'];
$pass = password_hash($password_1, PASSWORD_BCRYPT);

$sql="UPDATE users SET 
            user_fname = '$fname',
			user_lname = '$lname',
            user_email    = '$email',
            user_password ='$pass',
            WHERE user_id = '$id'";
$edit=$conn->query($sql);
header("location: user.php");


 ?>