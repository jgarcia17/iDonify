<?php
$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "db_idonify";
 
$conn = new mysqli($dbServer,$dbUser,$dbPass,$dbName);

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>