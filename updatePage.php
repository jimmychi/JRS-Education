<?php
include 'db.php';

$pagename = isset($_POST['pagename']) ? $_POST['pagename'] : "";
$title = isset($_POST['title']) ? $_POST['title'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";
$keywords = isset($_POST['keywords']) ? $_POST['keywords'] : "";


$sql = "UPDATE page SET title='" . $title . "', description='" . $description . "', keywords='" . $keywords . "' WHERE pagename='" . $pagename . "'";
$result = mysql_query($sql, $con);

if($result != 1){
	$resultArray = array("status" => "bad");
}else{
	$resultArray = array("status" => "good");
}
	
echo json_encode($resultArray);
mysql_close($con);

?>