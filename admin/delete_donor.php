<?php 
$id = $_GET['id'];
include "dbhandler.php";


    $sql = "DELETE FROM donations WHERE donation_id='$id'";
	$query  = $conn->query($sql);


header("location: donor.php");



 ?>