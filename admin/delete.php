<?php 
$id=$_GET['id'];
include "dbhandler.php";
$sql="DELETE FROM comments WHERE user_id='$id'";
$delete=$conn->query($sql);
header("location: user.php");



 ?>