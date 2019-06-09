<?php 
include "db_config.php";
$id =$_POST['id'];
$username =$_POST['username'];
$email =$_POST['email'];
$password_1 =$_POST['password_1'];
$password_1=md5($password_1);

$sql="UPDATE user SET 
            username = '$username',
            email    = '$email',
            psw      = '$password_1',
            password ='$password_1'
            WHERE id = '$id'";
$edit=$con->query($sql);
header("location:user.php");


 ?>