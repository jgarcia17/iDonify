<?php
include "db_config.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];
$protect = md5($password_1);

if($password_1 != $password_2){
    echo"Confirm Password Doesnt Match";
}

$sql = "SELECT COUNT(admin_email) as c FROM admin WHERE admin_email='$email'";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    $count = $row['c'];
}
if($count > 0){
    echo "Sorry!This Email already exists";
}else{
$sql = "INSERT INTO admin(admin_name,admin_email,psw,password,admin_type) VALUES('$username','$email','$password_1','$protect','0')";
$query = $con->query($sql);
if($query){
    header("Location:index.php");
}else{
    echo"something went wrong";
}
}

?>