<?php
session_start();
include 'functions.php';

date_default_timezone_set('America/Los_Angeles');
$dateStr = isset($_POST['dateRange']) ? mysql_real_escape_string($_POST['dateRange']) : "";

//Get date format
if($dateStr == "today"){
	$dateStr = date("Y-m-d");
	$sql = "SELECT u.*, d.* from users u INNER JOIN documents d ON u.id=d.id WHERE u.date='" . $dateStr . "'" . " AND u.admin = 'no'";
}else if($dateStr == "all"){	
	$sql = "SELECT u.*, d.* from users u INNER JOIN documents d ON u.id=d.id" . " AND u.admin = 'no'";
}else if($dateStr == "week"){
	$dateStr = date("Y-m-d");
	$weekLater = date("Y-m-d",strtotime("-1 week"));
	$sql = "SELECT u.*, d.* from users u INNER JOIN documents d ON u.id=d.id WHERE u.date BETWEEN '" . $weekLater . "' AND '" . $dateStr . "'" . " AND u.admin = 'no'";
}else if($dateStr == "month"){
	$dateStr = date("Y-m-d");
	$weekLater = date("Y-m-d",strtotime("-1 month"));
	$sql = "SELECT u.*, d.* from users u INNER JOIN documents d ON u.id=d.id WHERE u.date BETWEEN '" . $weekLater . "' AND '" . $dateStr . "'" . " AND u.admin = 'no'";
}


$result = mysql_query($sql, $con);

if(!$result){
	$userObjectArray[0]['status'] = "bad";
}else{	
	while($row = mysql_fetch_array($result)){
		
		//Returns 0 for no documents, 1 for Pending, 2 for Documents Accepted
		$docStatus = adminDocumentStatus($row['id']);
		
	
		$userObject = array(
			"id" => $row['id'],			
			"fname" => $row['fname'],
			"mname" => $row['mname'],
			"lname" => $row['lname'],
			"address1" => $row['address1'],
			"address2" => $row['address2'],
			"city" => $row['city'],
			"state" => $row['state'],			
			"zip" => $row['zip'],						
			"country" => $row['country'],
			"phone" => $row['phone'],
			"email" => $row['email'],
			"date" => $row['date'],
			"apform" => $row['apform'],
			"photo" => $row['photo'],
			"resume" => $row['resume'],
			"certificate" => $row['certificate'],
			"recommendation" => $row['recommendation'],
			"passort" => $row['passort'],
			"apform" => $row['apform'],
			"apform" => $row['passort'],
			"photo" => $row['photo'],
			"resume" => $row['resume'],
			"certificate" => $row['certificate'],
			"recommendation" => $row['recommendation'],
			"passport" => $row['passport'],
			"status" => $docStatus,
			//"apform_name" => $row['apform_name'],
			//"photo_name" => $row['photo_name'],
			//"resume_name" => $row['resume_name'],
			//"certificate_name" => $row['certificate_name'],
			//"recommendation_name" => $row['recommendation_name'],
			//"passport_name" => $row['passport_name'],
			"apform_date" => $row['apform_date'],
			"photo_date" => $row['photo_date'],
			"resume_date" => $row['resume_date'],			
			"certificate_date" => $row['certificate_date'],
			"recommendation_date" => $row['recommendation_date'],
			"passport_date" => $row['passport_date'],			
			"comments" => $row['comments']
			);
		$userObjectArray[] = $userObject;
				
	}
}		

mysql_close($con);
echo json_encode($userObjectArray);


?>