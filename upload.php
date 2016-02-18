<?php
session_start();
include("db.php");
error_reporting(0);

$type = mysql_real_escape_string($_POST['type']);
if($_FILES["myfile"]['name'] != "")
{	
	//Move the uploaded file to uploads folder. 0 Not Received, 1 Received
	$newDir = "uploads/" . $_SESSION['id'] . "/" . $type . "/";
	//If directory doesn't exist add, else delete
	if(is_dir($newDir)){
		array_map('unlink', glob($newDir . "*"));	
	}else{
		mkdir($newDir, 0777, true);			
	}
	move_uploaded_file($_FILES["myfile"]["tmp_name"], $newDir . $_FILES["myfile"]["name"]);							
	//echo $_FILES["myfile"]["name"] . " successfully uploaded.";
		
	//Update status
	if($type == 'apform'){	
		$sql = "UPDATE documents SET apform=1,apform_name='" . $_FILES["myfile"]["name"] . "',apform_date='" . date("Y-m-d") ."' WHERE id=" . $_SESSION['id'];
	}else if($type == 'photo'){
		$sql = "UPDATE documents SET photo=1,photo_name='" . $_FILES["myfile"]["name"] . "',photo_date='" . date("Y-m-d") ."' WHERE id=" . $_SESSION['id'];
	}else if($type == 'resume'){
		$sql = "UPDATE documents SET resume=1,resume_name='" . $_FILES["myfile"]["name"] . "',resume_date='" . date("Y-m-d") ."' WHERE id=" . $_SESSION['id'];
	}else if($type == 'certificate'){
		$sql = "UPDATE documents SET certificate=1,certificate_name='" . $_FILES["myfile"]["name"] . "',certificate_date='" . date("Y-m-d") ."' WHERE id=" . $_SESSION['id'];
	}else if($type == 'recommendation'){
		$sql = "UPDATE documents SET recommendation=1,recommendation_name='" . $_FILES["myfile"]["name"] . "',recommendation_date='" . date("Y-m-d") ."' WHERE id=" . $_SESSION['id'];
	}else if($type == 'passport'){
		$sql = "UPDATE documents SET passport=1,passport_name='" . $_FILES["myfile"]["name"] . "',passport_date='" . date("Y-m-d") ."' WHERE id=" . $_SESSION['id'];
	}	

	$result = mysql_query($sql, $con);
	 die("<script>location.href = 'form.php'</script>");

}else{
	header('Location:form.php?success=0');
}
?>