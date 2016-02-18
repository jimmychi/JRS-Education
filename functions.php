<?php	
include "db.php";
function cleanData(&$str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}  
function hasDocuments($con){

	$sql = "SELECT * from documents WHERE id =" . $_SESSION['id'];
	echo $sql;
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array($result);

	//If all documents are set to 0 then does not have documents
	if(($row['apform'] == 0) && ($row['photo'] == 0) && ($row['resume'] == 0) && ($row['certificate'] == 0) && ($row['recommendation'] == 0) && ($row['passport'] == 0)){
		return false;
	}else{	
		echo "<li><a href=\"document-status.php\">View document status</a></li>";
		return true;
	}
}	
function hasAllDocuments($con){

	$sql = "SELECT * from documents WHERE id =" . $_SESSION['id'];
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array($result);

	//If all documents are set to 0 then does not have documents
	if(($row['apform'] == 0) && ($row['photo'] == 0) && ($row['resume'] == 0) && ($row['certificate'] == 0) && ($row['recommendation'] == 0) && ($row['passport'] == 0)){
		return false;
	}else{	
		return true;
	}
}
function status($var){
	if($var == 0){
		echo "<span style=\"color:red\">Not received";
	}else if($var == 1){
		echo "<span style=\"color:#0D3F6A\">Being processed";
	}else if($var == 2){
		echo "<span style=\"color:green\">Accepted</span>";
	}else{		
		echo "<span style=\"color:red\">Rejected</span>";
	}	
}
function getDocInfo($id){
	$queryString = "select * from documents where id = " . $id;
	$result = mysql_query($queryString);
	$row = mysql_fetch_array($result);
	return $row;
}
function getUserInfo(){
	$query = "select * from users where id = " . $_SESSION['id'] . " AND admin <> 'yes'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	return $row;
}
function adminDocumentStatus($id){
	if(($row['apform'] == 0) && ($row['photo'] == 0) && ($row['resume'] == 0) && ($row['certificate'] == 0) && ($row['recommendation'] == 0) && ($row['passport'] == 0)){	
		//Received no documents
		return 0;		
	}
	if(($row['apform'] != 0) || ($row['photo'] != 0) || ($row['resume'] != 0) || ($row['certificate'] != 0) || ($row['recommendation'] != 0) || ($row['passport'] != 0)){
		if(($row['apform'] == 2) && ($row['photo'] == 2) && ($row['resume'] == 2) && ($row['certificate'] == 2) && ($row['recommendation'] == 2) && ($row['passport'] == 2)){			
			//Documents accepted
			return 2;
		}else{
			//Pending
			return 1;
		}
	}	
}
function checkDocumentStatus($id){
	$row = getDocInfo($id);
	if(($row['apform'] == 0) && ($row['photo'] == 0) && ($row['resume'] == 0) && ($row['certificate'] == 0) && ($row['recommendation'] == 0) && ($row['passport'] == 0)){
		echo "<a href=\"documents.php?id=" .  $id  . "\" target=\"_blank\">Received no documents</a>";
	}
	if(($row['apform'] != 0) || ($row['photo'] != 0) || ($row['resume'] != 0) || ($row['certificate'] != 0) || ($row['recommendation'] != 0) || ($row['passport'] != 0)){
		if(($row['apform'] == 2) && ($row['photo'] == 2) && ($row['resume'] == 2) && ($row['certificate'] == 2) && ($row['recommendation'] == 2) && ($row['passport'] == 2)){
			echo "<a href=\"documents.php?id=" .  $id  . "\" target=\"_blank\">Documents accepted</a>";
		}else{
			echo "<a href=\"documents.php?id=" .  $id  . "\" target=\"_blank\">Pending</a>";
		}
	}	
}


?>