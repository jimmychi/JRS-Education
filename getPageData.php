<?php
include 'db.php';

$pagename = isset($_POST['pagename']) ? mysql_real_escape_string($_POST['pagename']) : "";

//UPDATE
$sql = "SELECT * from page WHERE pagename='" . $pagename . "'";
$result = mysql_query($sql, $con);
$row = mysql_fetch_array($result);

if($row){
	$resultArray = array(
		"status" => "good",
		"pagename" => $row["pagename"],
		"title" => $row["title"],		
		"keywords" => $row["keywords"],
		"description" => $row["description"],
		"content" => $row["content"]
	);	
}else{
	$resultArray = array("status" => "bad");	
}

echo json_encode($resultArray);
mysql_close($con);

?>