<?php 
$id=$_GET['id'];
include "db_config.php";
$sql="DELETE FROM user WHERE id='$id'";
$delete=$con->query($sql);
header("location:user.php");

include "header.php";

 ?>