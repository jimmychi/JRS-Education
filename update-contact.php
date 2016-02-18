<?php
include("db.php");

$fname = isset($_POST['fname']) ? mysql_real_escape_string($_POST['fname']) : "";
$lname = isset($_POST['lname']) ? mysql_real_escape_string($_POST['lname']) : "";
$email = isset($_POST['email']) ? mysql_real_escape_string($_POST['email']) : "";
$phone = isset($_POST['phone']) ? mysql_real_escape_string($_POST['phone']) : "";

//Send email
$to = "jimmychi213@yahoo.com";
$subject = "Test mail";
$message = "Hello";
$from = "contact@hubei.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);


$userArray[0]['status'] = "sent";
mysql_close($con);	
echo json_encode($userArray);
?>