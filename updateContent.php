<?php
include 'db.php';

$pagename = isset($_POST['pagename']) ? $_POST['pagename'] : "";
$content = isset($_POST['content']) ? $_POST['content'] : "";

$sql = "UPDATE page SET content='" . $content . "' WHERE pagename='" . $pagename . "'";
$result = mysql_query($sql, $con);

if($result != 1){
	$resultArray = array("status" => "bad");
}else{
	$resultArray = array("status" => "good");
}
	
echo json_encode($resultArray);
mysql_close($con);

?>