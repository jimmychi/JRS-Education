<?php
include 'db.php';

$pagename = isset($_POST['pagename']) ? mysql_real_escape_string($_POST['pagename']) : "";

//UPDATE
$sql = "SELECT * from apply";
$result = mysql_query($sql, $con);
$row = mysql_fetch_array($result);

if($row){
	$resultArray = array(
		"status" => "good",
		"step1" => $row["step1"],
		"step2" => $row["step2"],
		"step3" => $row["step3"],
		"step4" => $row["step4"],
		"step5" => $row["step5"],
		"step6" => $row["step6"],
		"step7" => $row["step7"]
	);	
}else{
	$resultArray = array("status" => "bad");	
}

echo json_encode($resultArray);
mysql_close($con);

?>