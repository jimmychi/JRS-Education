<?php
session_start();
include 'db.php';

$id = isset($_POST['id']) ? mysql_real_escape_string($_POST['id']) : "";
$comments = isset($_POST['comments']) ? mysql_real_escape_string($_POST['comments']) : "";

$sql = "UPDATE documents SET comments='" . $comments . "' WHERE id=" . $id;
$result = mysql_query($sql, $con);
mysql_close($con);	

$userArray[0]['message'] = "good";
$userArray[0]['comments'] = $comments;

echo json_encode($userArray);
?>