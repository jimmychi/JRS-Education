<?php
session_start();

$old_user = $_SESSION['valid_user'];
unset($_SESSION['valid_user']);
session_destroy();

if(!empty($old_user)){
	header("Location: index.php");
}else{
	header("Location: index.php");
}	

?>