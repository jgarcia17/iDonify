<?php
include "db_config.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];
$protect = md5($password_1);
//$protect = password_hash($pwd1, PASSWORD_BCRYPT);



if($password_1 != $password_2){
    echo"Confirm Password Doesn't Match";
}

$sql = "SELECT COUNT(email) as c FROM user WHERE email='$email'";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    $count = $row['c'];
}
if($count > 0){
    echo "Sorry! This Email already exists";
}else{
$sql = "INSERT INTO user(username,email,psw,password,user_type) VALUES('$username','$email','$password_1','$protect','0')";
$query = $con->query($sql);
if($query){
    header("Location:login.php");
}else{
    echo"Something went wrong";
}
}

?>