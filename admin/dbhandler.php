<?php
$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "test";
 
$conn = new mysqli($dbServer,$dbUser,$dbPass,$dbName);

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>