<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){

$dtype=$_POST['dtype'];

$quantity=$_POST['quantity'];
$date=$_POST['date'];
$description=$_POST['description'];
$email=$_POST['email'];
$con=new mysqli("localhost","root","","db_idonify");
$sql="INSERT INTO donations VALUES(NULL,'$dtype','$quantity','$date','$description','$email')";
$insert=$con->query($sql);
if($insert){

	echo "Data inserted successfully";
}




}

 ?>