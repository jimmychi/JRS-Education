<?php
session_start();
if (($_SERVER['HTTP_HOST'] == 'teachinginhubei.com') || ($_SERVER['HTTP_HOST'] == 'www.teachinginhubei.com')){
	//Connect To Database
	$hostname="hubei.db.11218104.hostedresource.com";
	$username="hubei";
	$password="Ef84fg!9";
	$dbname="hubei";
}else{
	$hostname="localhost";
	$username="root";
	$password="abc1234";
	$dbname="new_schema";
}	
$con = mysql_connect($hostname,$username, $password) or die ("<html>Unable to connect to database!</html>");
mysql_select_db($dbname, $con);
	
date_default_timezone_set('America/Los_Angeles');
$dateStr = isset($_POST['dateRange']) ? mysql_real_escape_string($_POST['dateRange']) : "";

//Get date format
if($dateStr == "today"){
	$dateStr = date("Y-m-d");
	$sql = "SELECT u.*, d.* from users u INNER JOIN documents d ON u.id=d.id WHERE u.date='" . $dateStr . "'";
}else if($dateStr == "all"){	
	$sql = "SELECT u.*, d.* from users u INNER JOIN documents d ON u.id=d.id";
}else if($dateStr == "week"){
	$dateStr = date("Y-m-d");
	$weekLater = date("Y-m-d",strtotime("-1 week"));
	$sql = "SELECT u.*, d.* from users u INNER JOIN documents d ON u.id=d.id WHERE u.date BETWEEN '" . $weekLater . "' AND '" . $dateStr . "'";
}else if($dateStr == "month"){
	$dateStr = date("Y-m-d");
	$weekLater = date("Y-m-d",strtotime("-1 month"));
	$sql = "SELECT u.*, d.* from users u INNER JOIN documents d ON u.id=d.id WHERE u.date BETWEEN '" . $weekLater . "' AND '" . $dateStr . "'";
}


$result = mysql_query($sql, $con);

if(!$result){
	$userObjectArray[0]['status'] = "bad";
}else{	
	//filename for download
	$filename = "website_data_" . date('Ymd') . ".xls";

	//header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=excelfile.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	$first = true;
	while($row = mysql_fetch_array($result)){
		if($first == true){
			echo "ID\t" . "First name\t" . "Middle\t" . "Last name\t" . "Address1\t" . "Address2\t" . "City\t" . "State\t" . "Zip\t" . "County\t" . "Phone\t" . "Email" . "Date applied" . "\r\n";
			$first = false;
		}
		echo $row['id'] . "\t" . $row['fname'] . "\t" . $row['mname'] . "\t" . $row['lname'] . "\t" . $row['address1'] . "\t" . $row['address2'] . "\t" . $row['city'] . "\t" . $row['state'] . "\t" . $row['zip'] . "\t" . $row['country'] . "\t" . $row['phone'] . "\t" . $row['email'] . "\t" . $row['date'] . "\r\n";
		//array_walk($row, 'cleanData');
	}	
	exit;
}		
?>