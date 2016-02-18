<?php
session_start();
include 'db.php';

$docType = isset($_POST['docType']) ? mysql_real_escape_string($_POST['docType']) : "";
$status = isset($_POST['status']) ? mysql_real_escape_string($_POST['status']) : "";
$id = isset($_POST['id']) ? mysql_real_escape_string($_POST['id']) : "";
$comments = isset($_POST['comments']) ? mysql_real_escape_string($_POST['comments']) : "";

$sql = "UPDATE documents SET " . $docType . "=" . $status . " WHERE id=" . $id;
$result = mysql_query($sql, $con);
mysql_close($con);	

//Send email
/*
$to = "jimmychi213@yahoo.com";
$subject = "Test mail";
$message = "Hello";	
$from = "contact@hubei.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
*/

$userArray[0]['message'] = "good";
$userArray[0]['type'] = $docType;
$userArray[0]['status'] = $status;

echo json_encode($userArray);
?>