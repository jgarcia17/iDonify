<?php 
$conn = mysqli_connect("localhost","root","","db_idonify");

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>