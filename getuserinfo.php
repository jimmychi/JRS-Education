<?php
include("../db.php");

if(isset($_SESSION['id'])){
	$sql = "SELECT * from documents where id=" . $_SESSION['id'];
	$sql2 = "SELECT * from users where id=" . $_SESSION['id'];
	
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_row($result);

	$result2 = mysql_query($sql2, $con);
	$row2 = mysql_fetch_row($result2);
	
	//Print out the user's info
	echo $row2[1] . " " . $row2[3];
	
	
}	
// 
?>