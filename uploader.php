<?php
session_start();
date_default_timezone_set('America/Los_Angeles');
$UploadDirectory = 'uploads/'; //Upload Directory, ends with slash & make sure folder exist

// replace with your mysql database details
if (($_SERVER['HTTP_HOST'] == 'teachinginhubei.com') || ($_SERVER['HTTP_HOST'] == 'www.teachinginhubei.com')){
	$MySql_username     = "hubei"; //mysql username
	$MySql_password     = "Ef84fg!9"; //mysql password
	$MySql_hostname     = "hubei.db.11218104.hostedresource.com"; //hostname
	$MySql_databasename = 'hubei'; //databasename
}else{
	$MySql_username     = "root"; //mysql username
	$MySql_password     = "abc1234"; //mysql password
	$MySql_hostname     = "localhost"; //hostname
	$MySql_databasename = 'new_schema'; //databasename
}	

//connect & insert file record in database
$dbconn = mysql_connect($MySql_hostname, $MySql_username, $MySql_password)or die("Unable to connect to MySQL");
mysql_select_db($MySql_databasename,$dbconn);

$type = mysql_real_escape_string($_POST['type']);

if (!@file_exists($UploadDirectory)) {
    //destination folder does not exist
    die("Make sure Upload directory exist!");
}

if($_POST)
{
	/*
    if(!isset($_POST['mName']) || strlen($_POST['mName'])<1)
    {
        //required variables are empty
        //die("Please name the file!");
    }
	*/
    if(!isset($_FILES['mFile']))
    {
        //required variables are empty
        die("File is empty!");
    }


    if($_FILES['mFile']['error'])
    {
        //File upload error encountered
        die(upload_errors($_FILES['mFile']['error']));
    }

    $FileName           = strtolower($_FILES['mFile']['name']); //uploaded file name
    //$FileTitle          = mysql_real_escape_string($_POST['mName']); // file title
	$FileTitle          = $_FILES["myfile"]["name"]; // file title
    $ImageExt           = substr($FileName, strrpos($FileName, '.')); //file extension
    $FileType           = $_FILES['mFile']['type']; //file type
    $FileSize           = $_FILES['mFile']["size"]; //file size
    $RandNumber         = rand(0, 9999999999); //Random number to make each filename unique.
    $uploaded_date      = date("Y-m-d H:i:s");

    switch(strtolower($FileType))
    {
        //allowed file types
        case 'image/png': //png file
        case 'image/gif': //gif file
        case 'image/jpeg': //jpeg file
        case 'application/pdf': //PDF file
        case 'application/msword': //ms word file
        case 'application/vnd.ms-excel': //ms excel file
        case 'application/x-zip-compressed': //zip file
        case 'text/plain': //text file
        case 'text/html': //html file
            break;
        default:
            die('Unsupported File!'); //output error
    }


    //File Title will be used as new File name
    $NewFileName = preg_replace(array('/s/', '/.[.]+/', '/[^w_.-]/'), array('_', '.', ''), strtolower($FileTitle));
    $NewFileName = $NewFileName.'_'.$RandNumber.$ImageExt;
	
	//Move the uploaded file to uploads folder. 0 Not Received, 1 Received
	$UploadDirectory = "uploads/" . $_SESSION['id'] . "/" . $type . "/";

	//If directory doesn't exist add, else delete
	if(is_dir($UploadDirectory)){
		array_map('unlink', glob($UploadDirectory . "*"));	
	}else{
		mkdir($UploadDirectory, 0777, true);			
	}	
	
   //Rename and save uploded file to destination folder.
   if(move_uploaded_file($_FILES['mFile']["tmp_name"], $UploadDirectory . $NewFileName ))
   //if(move_uploaded_file($_FILES["mFile"]["tmp_name"], $UploadDirectory . $_FILES["myfile"]["name"]))
   {
        @mysql_query("INSERT INTO file_records (file_name, file_title, file_size, uploaded_date) VALUES ('$NewFileName', '$FileTitle',$FileSize,'$uploaded_date')");

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

		$result = mysql_query($sql, $dbconn);
	
        mysql_close($dbconn);
		die('File uploaded!'); //output error

   }else{
        die('error uploading File!');
   }
}

//function outputs upload error messages, http://www.php.net/manual/en/features.file-upload.errors.php#90522
function upload_errors($err_code) {
    switch ($err_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
?>