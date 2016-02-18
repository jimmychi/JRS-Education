<?php
session_start();
include("db.php");

if(isset($_SESSION['id'])){
	$sql = "SELECT * from documents where id=" . $_SESSION['id'];
	$sql2 = "SELECT * from users where id=" . $_SESSION['id'];
	
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_row($result);

	$result2 = mysql_query($sql2, $con);
	$row2 = mysql_fetch_row($result2);
	
}	

//$row[0] id
//$row[1] apform
//$row[2] photo
//$row[3] resume
//$row[4] certificate
//$row[5] recommendation
//$row[6] passport

//0 Not received
//1 Received
//2 Accepted
//3 Denied
?>
<html>
<body style="margin:0;">
<head>
<script>

</script>
<style>
body{
	font-family: Arial;
	font-size: 14px;
}
.received{
	color: #0D3F6A;
	font-style: italic;
}
.accepted{
	color: #458B00;
	font-style: italic;
}
.notreceived{
	color: #FF0000;
	font-style: italic;
}
#mainDiv{
	float:left;
	border:0px solid;
	width: 250px;
}
#rightDiv{
	float:right;
	text-align: left;
	border:1px solid;
	width:350px;
}
#rightDiv table{
	font-size: 14px;
}
.status{
	text-align: center;
}
#resultDiv{
	float: left;
	margin: -7px 0 0 4px;
	color: #FF9900;
	font-family: Arial;
}
#type{
	margin-top: 5px;
	font-size: 16px;
	height: 25px;
	border: 1px solid #ccc;
}
form{
	float: left;
}
option{
	height: 25px;
}
#myfile{
	width: 75px;
}
@media screen and (-webkit-min-device-pixel-ratio:0) { 
	#myfile{
		width: 84px;
	}
}
</style>
</head>
<div id="mainDiv">
	<form id="myForm" action="upload.php" method="post" enctype="multipart/form-data">
		Select the document type:
		<br />
		<select name="type" id="type">
			<option value="" selected disabled></option>
			<option value="apform"> AP Form</option>
			<option value="photo"> Photo</option>
			<option value="resume"> Resume</option>
			<option value="certificate"> Certificate</option>
			<option value="recommendation"> Recommendation</option>
			<option value="passport"> Passport</option>
		</select>	
		<br />	
		<br />
		<input type="file" size="60" id="myfile" name="myfile">
		<br /><br />
		<input type="submit" id="submitBtn" value="Upload Document">
	</form>
	<div id="resultDiv">
		
	</div>
	<!--div id="rightDiv">
		Document status
	</div-->		
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(function() {
	//$("#resultDiv").html("");
	$("#myfile").text("Press");

	$("#submitBtn").click(function(e){	
		e.preventDefault();	
		//$("#resultDiv").html("");
		if($("#myfile").val() == ""){
			$("#resultDiv").html("Please select a file");
			return false;
		}else{
			$("#resultDiv").html("Uploading file...");	
			setTimeout(function(){
				$("#myForm").submit();
			},1000);	
		}	
	});	
});	
</script>
</body>					
</html>