<?php
$dbServer = "garciacomputercom.ipagemysql.com";
$dbUser = "idonifyadmin";
$dbPass = "Zxv12j45Mst";
$dbName = "db_idonify";
 
$conn = new mysqli($dbServer,$dbUser,$dbPass,$dbName);

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>