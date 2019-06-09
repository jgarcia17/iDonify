<?php 
$id = $_GET['id'];
include "db_config.php";


    $sql = "DELETE FROM donations WHERE donation_id='$id'";
	$query  = $con->query($sql);


header("location:donor.php");



 ?>