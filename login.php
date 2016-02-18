<?php
session_start();
include("db.php");

$email = isset($_POST['email']) ? mysql_real_escape_string($_POST['email']) : "";
$s = isset($_GET['s']) ? mysql_real_escape_string($_GET['s']) : "";
$password = isset($_POST['password']) ? mysql_real_escape_string($_POST['password']) : "";

$sql = "SELECT * from users WHERE email = LOWER('" . $email . "') AND password = LOWER('" . $password . "')";
$result = mysql_query($sql, $con);
	
if(!$result){
	$userObjectArray[0]['status'] = "bad";
}else{	
	
	while($row = mysql_fetch_array($result)){

		$userObject = array(
			"status" => "pass",
			"id" => $row['id'],			
			"fname" => $row['fname'],
			"lname" => $row['lname'],
			"admin" => $row['admin']
		);
		$userObjectArray[] = $userObject;
	}
}		
mysql_close($con);
if($userObjectArray[0]['status'] == "pass"){
	$_SESSION['user'] = $userObjectArray[0]['fname'] . " " . $userObjectArray[0]['lname'];
	$_SESSION['id'] = $userObjectArray[0]['id'];
	if($userObjectArray[0]['admin'] == "yes"){
		$_SESSION['admin'] = "true";
	}
}else{

}

/* 
if($lumens != ""){
	$data = '{"message":"ok","lumens":"' . $lumens . '","maxclo":"' . $maxclo . '","model":"' . $model . '","brand":"' . $brand . '"}';
}else{
	$data = '{"message":"bad"}';
}*/	

echo json_encode($userObjectArray);


?>