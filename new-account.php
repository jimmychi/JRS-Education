<?php
session_start();
include("db.php");


$fname = isset($_POST['fname']) ? mysql_real_escape_string($_POST['fname']) : "";
$mname = isset($_POST['mname']) ? mysql_real_escape_string($_POST['mname']) : "";
$lname = isset($_POST['lname']) ? mysql_real_escape_string($_POST['lname']) : "";
$address1 = isset($_POST['address1']) ? mysql_real_escape_string($_POST['address1']) : "";
$address2 = isset($_POST['address2']) ? mysql_real_escape_string($_POST['address2']) : "";
$city = isset($_POST['city']) ? mysql_real_escape_string($_POST['city']) : "";
$state = isset($_POST['state']) ? mysql_real_escape_string($_POST['state']) : "";
$zip = isset($_POST['zip']) ? mysql_real_escape_string($_POST['zip']) : "";
$country = isset($_POST['country']) ? mysql_real_escape_string($_POST['country']) : "";
$phone = isset($_POST['phone']) ? mysql_real_escape_string($_POST['phone']) : "";
$how = isset($_POST['how']) ? mysql_real_escape_string($_POST['how']) : "";
$email = isset($_POST['email']) ? mysql_real_escape_string($_POST['email']) : "";
$password = isset($_POST['password']) ? mysql_real_escape_string($_POST['password']) : "";

//Check for duplicate email entries
$sqlCount = "SELECT COUNT(*) FROM users where email = '" . $email . "'";
$resultCount = mysql_query($sqlCount, $con);
$row3 = mysql_fetch_array($resultCount);

if($row3[0] > 0){
	$userObjectArray[0]['status'] = "duplicate";
	mysql_close($con);	
	echo json_encode($userObjectArray);
}else{

	//Create new user
	$sql = "INSERT INTO users (fname,mname,lname,address1,address2,city,state,zip,country,phone,how,email,password,admin,date) VALUES ('" . $fname . "','" . $mname . "','" . $lname . "','" . $address1 . "','" . $address2 . "','" . $city . "','" . $state . "','" . $zip . "','" . $country . "','" . $phone . "','" . $how . "','" . $email . "','" . $password . "','no','" . date("Y-m-d") . "')";
	$result = mysql_query($sql, $con);

	//Set Session vars
	$_SESSION['user'] = ucfirst($fname) . " " . ucfirst($lname);	
	
	//Get ID in documents table
	$sql2 = "SELECT id FROM users where email = '" . $email . "'";
	$result2 = mysql_query($sql2, $con);
	$row2 = mysql_fetch_array($result2);
	$_SESSION['id'] = $row2[0];
	
	//Create new entry in documents table
	$sqlInsert = "INSERT INTO documents (id,apform,photo,resume,certificate,recommendation,passport) VALUES (" .$row2[0] . ",0,0,0,0,0,0)";
	$resultInsert = mysql_query($sqlInsert, $con);
	
	mysql_close($con);	
	
	$userObjectArray[0]['status'] = "pass";
	echo json_encode($userObjectArray);
}
?>