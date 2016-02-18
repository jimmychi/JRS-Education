<?php
header('Content-type: text/html; charset=utf-8');
if (($_SERVER['HTTP_HOST'] == 'teachinginhubei.com') || ($_SERVER['HTTP_HOST'] == 'www.teachinginhubei.com')){
	//Connect To Database
	$hostname="hubei.db.11218104.hostedresource.com";
	$username="hubei";
	$password="Hubei123!";
	$dbname="hubei";
}else{
	$hostname="localhost";
	$username="root";
	$password="abc1234";
	$dbname="new_schema";
}	
	$con = mysql_connect($hostname,$username, $password) or die ("<html>Unable to connect to database!</html>");
	mysql_select_db($dbname, $con);
?>	