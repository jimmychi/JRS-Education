<?php
session_start();
include 'functions.php';

$email = isset($_POST['email']) ? mysql_real_escape_string($_POST['email']) : "";
$sql = "SELECT password from users WHERE email='" . $email . "'";
$result = mysql_query($sql, $con);
$row = mysql_fetch_array($result);

if($row['password'] == ""){
	$userObjectArray[0]['status'] = "bad";
}else{	

	//Email password to user
	//$to = "jimmychi213@yahoo.com";
	$to = $row['password'];
	$subject = "JRS Education - Password request";
	$message = "Your password is:" . $row['password'];
	$from = "support@teachinginhubei.com";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);

	$userObjectArray[0]['status'] = "good";
}		
mysql_close($con);
echo json_encode($userObjectArray);

?>