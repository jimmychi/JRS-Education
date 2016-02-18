<?php
session_start();
include("db.php");	

$id = mysql_real_escape_string($_GET['id']);
$queryString = "select * from documents where id = " . $id;
$result = mysql_query($queryString);
$row = mysql_fetch_array($result);

$queryString2 = "select * from users where id = " . $id;
$result2 = mysql_query($queryString2);
$row2 = mysql_fetch_array($result2);

$apform_name = isset($row['apform_name']) ? $row['apform_name'] : "";
$photo_name = isset($row['photo_name']) ? $row['photo_name'] : "";
$resume_name = isset($row['resume_name']) ? $row['resume_name'] : "";
$certificate_name = isset($row['certificate_name']) ? $row['certificate_name'] : "";
$recommendation_name = isset($row['recommendation_name']) ? $row['recommendation_name'] : "";
$passport_name = isset($row['passport_name']) ? $row['passport_name'] : "";

$apform_date = isset($row['apform_date']) ? $row['apform_date'] : "";
$photo_date = isset($row['photo_date']) ? $row['photo_date'] : "";
$resume_date = isset($row['resume_date']) ? $row['resume_date'] : "";
$certificate_date = isset($row['certificate_date']) ? $row['certificate_date'] : "";
$recommendation_date = isset($row['recommendation_date']) ? $row['recommendation_date'] : "";
$passport_date = isset($row['passport_date']) ? $row['passport_date'] : "";

$comments = isset($row['comments']) ? $row['comments'] : "";

//0 Not received
//1 Received
//2 Accepted
//3 Rejected

function status($var){
	if($var == 0){
		echo "<span style=\"color:red\">Not received</span>";
	}else if($var == 1){
		echo "<span style=\"color:#0D3F6A\">Being processed</span>";
	}else if($var == 2){
		echo "<span style=\"color:#33CC66\">Accepted</span>";
	}else{		
		echo "<span style=\"color:red\">Rejected</span>";
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Applicants documents</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
	a{
		text-decoration: none;
	}	
	#page{
		font-size: 13px;
	}
	.headerRow{
		color: #fff;
		font-weight: bold;
	}
	.headerRow td{
		border-right: 1px solid #333;
	}	
	#info{
		
		font-size: 18px;
		float: left;
		margin: 20px 0 10px 0;
		border: 0px solid;
	}
	#info div{
		font-size: 14px;
	}
	h2{
		margin: 5px 0 10px 0;
	}	
	#infoTable td{
		height: 18px;
		border-bottom: 1px solid #333;
		border-left: 1px solid #333;
		border-bottom: 1px solid #333;
	}
	#commentBox td{
		width: 640px;
		height: 100px;
		border: 1px solid #333;
	}
	select{
		font-size: 16px;
		height: 24px;
		border: 1px solid #666;
	}
	option{
		height: 24px;

	}
	textarea{
		width: 645px;
		height: 100px;
		border: 1px solid #666;
	}
	#footer div{
		height: 100px;
	}	
	
</style>
	
</head>
<body>
	<?php include "header.php" ?>
	<div style="clear:both"></div>
	<div id="page">
		<div id="info">
		<?php 			
			if(isset($row2['mname'])){
				$name = $row2['fname'] . " " . $row2['mname'] . " " . $row2['lname'];
			}else{
				$name = $row2['fname'] . " " . $row2['lname'];
			}			
			echo strtoupper($name);
		?>
			<br />
			<div>
				<?php echo $row2['address1'] . "<br />" . $row2['address2'] . "<br />" . $row2['city'] . ", " . $row2['state'] . " " . $row2['zip'] . "<br />" . $row2['phone'] . "<br />" . $row2['email'] ?>
			</div>
		</div>
		<div style="clear:both"></div>
		<table cellpadding="2" cellspacing="0" border="0" id="infoTable">
			<tr valign="top" bgcolor="#0D3F6A" class="headerRow">
				<td width="120">Document</td>
				<td width="200">Status</td>
				<td width="200">File Name</td>
				<td width="100" align="center">Date received</td>				
			</tr>	
			<tr valign="top">
				<td>AP form</td>
				<td id="apdiv"><?php status($row['apform']); ?></td>				
				<td><a href="uploads/<?php echo $row2['id'] . "/apform/" . $apform_name; ?>" target="_blank"><?php echo $apform_name ?></a></td>
				<td align="center" style="border-right: 1px solid #333;"><?php echo $apform_date; ?></td>	
			</tr>			
			<tr valign="top">
				<td>Photo</td>
				<td id="photodiv"><?php status($row['photo']); ?></td>				
				<td><a href="uploads/<?php echo $row2['id'] . "/photo/" . $photo_name; ?>" target="_blank"><?php echo $photo_name ?></a></td>
				<td align="center" style="border-right: 1px solid #333;"><?php echo $photo_date; ?></td>	
			</tr>			
			<tr valign="top">
				<td>Resume</td>
				<td id="resumediv"><?php status($row['resume']); ?></td>				
				<td><a href="uploads/<?php echo $row2['id'] . "/resume/" . $resume_name; ?>" target="_blank"><?php echo $resume_name ?></a></td>			
				<td align="center" style="border-right: 1px solid #333;"><?php echo $resume_date; ?></td>	
			</tr>			
			<tr valign="top">
				<td>Certificate</td>
				<td id="certdiv"><?php status($row['certificate']); ?></td>				
				<td><a href="uploads/<?php echo $row2['id'] . "/certificate/" . $certificate_name; ?>" target="_blank"><?php echo $certificate_name ?></a></td>		
				<td align="center" style="border-right: 1px solid #333;"><?php echo $certificate_date; ?></td>	
			</tr>			
			<tr valign="top">
				<td>Recommendation</td>
				<td id="recdiv"><?php status($row['recommendation']); ?></td>
				<td><a href="uploads/<?php echo $row2['id'] . "/recommendation/" . $recommendation_name; ?>" target="_blank"><?php echo $recommendation_name ?></a></td>		
				<td align="center" style="border-right: 1px solid #333;"><?php echo $recommendation_date; ?></td>	
			</tr>			
			<tr valign="top">
				<td>Passport</td>
				<td id="passdiv"><?php status($row['passport']); ?></td>
				<td><a href="uploads/<?php echo $row2['id'] . "/passport/" . $passport_name; ?>" target="_blank"><?php echo $passport_name ?></a></td>		
				<td align="center" style="border-right: 1px solid #333;"><?php echo $passport_date; ?></td>	
			</tr>
		</table>
		<br />		
		<table cellpadding="2" cellspacing="0" border="0">
			<tr valign="top" bgcolor="#0D3F6A" class="headerRow">
				<td width="640">Comments</td>
			</tr>
			<tr valign="top" id="commentBox">
				<td width="640" height="300" id="commentsTop">
					<?php echo $comments;?>				
				</td>
			</tr>			
		</table>
		<div class="middleLine"></div>
		<h2>Status:</h2>	
		<form name="myForm" id="myForm" method="POST">
		<table cellpadding="2" cellspacing="0" border="0">
			<tr valign="top">
				<td>
					<select id="docType" name="docType">
						<option value="" disabled selected>Document type</option>
						<option value="apform">AP form</option>
						<option value="photo">Photo</option>
						<option value="resume">Resume</option>
						<option value="certificate">Certificate</option>
						<option value="recommendation">Recommendation</option>
						<option value="passport">Passport</option>
					</select>
				</td>
				<td width="20">&nbsp;</td>
				<td>
					<select id="status" name="status">
						<option value="0" disabled selected>Status</option>
						<option value="2">Accepted</option>
						<option value="3">Not accepted</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3"><br />
					<input type="submit" value="Update" />				
				</td>		
			</tr>
			<tr>
				<td height="15" colspan="3" id="errorDiv"></td>
			</tr>
		</table>
		<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
		</form>
		<form name="commentForm" id="commentForm" method="POST">
		<br /><br />		
		<h2>Comments:</h2>

		<textarea id="comments" name="comments"><?php echo $comments; ?></textarea>
		<br /><br />
		<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
		<input type="submit" value="Update" />
		</form>
	</div>
	<br />
	<br />
	<?php include "footer2.php" ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>		
<script>

$(function() {
	

	$("#myForm").submit(function(e){	

		e.preventDefault();

		//Validate
		if($("#docType").val() == null || $("#status").val() == null){
			$("#errorDiv").html("Please select a document type and status");
			return false;
		}else{
			dataString = "id=" + $("#id").val() + "&docType=" + $("#docType option:selected").val() + "&status=" + $("#status option:selected").val();
		
			$.ajax({
				type: "POST",
				url: "document_update.php",
				async: false,
				data: dataString,
				dataType: "json",
				success: function(userArray){	
					if(userArray[0]['type'] == "apform"){
						if(userArray[0]['status'] == 2){ $("#apdiv").html("<span style=\"color:#33CC66\">Accepted</span>"); }
						else{ $("#apdiv").html("<span style=\"color:red\">Rejected</span>"); }
					}else if(userArray[0]['type'] == "photo"){
						if(userArray[0]['status'] == 2){ $("#photodiv").html("<span style=\"color:#33CC66\">Accepted</span>"); }
						else{ $("#photodiv").html("<span style=\"color:red\">Rejected</span>"); }
					}else if(userArray[0]['type'] == "resume"){
						if(userArray[0]['status'] == 2){ $("#resumediv").html("<span style=\"color:#33CC66\">Accepted</span>"); }
						else{ $("#resumediv").html("<span style=\"color:red\">Rejected</span>"); }
					}else if(userArray[0]['type'] == "certificate"){
						if(userArray[0]['status'] == 2){ $("#certdiv").html("<span style=\"color:#33CC66\">Accepted</span>"); }
						else{ $("#certdiv").html("<span style=\"color:red\">Rejected</span>"); }
					}else if(userArray[0]['type'] == "recommendation"){
						if(userArray[0]['status'] == 2){ $("#recdiv").html("<span style=\"color:#33CC66\">Accepted</span>"); }
						else{ $("#recdiv").html("<span style=\"color:red\">Rejected</span>"); }
					}else if(userArray[0]['type'] == "passport"){
						if(userArray[0]['status'] == 2){ $("#passdiv").html("<span style=\"color:#33CC66\">Accepted</span>"); }
						else{ $("#passdiv").html("<span style=\"color:red\">Rejected</span>"); }
					}
				}
			})
		}		
	});
	$("#commentForm").submit(function(e){	
		e.preventDefault();
		dataString = "id=" + $("#id").val() + "&comments=" + $("#comments").val();

		$.ajax({
			type: "POST",
			url: "comment_update.php",
			async: false,
			data: dataString,
			dataType: "json",
			success: function(userArray){	
				$("#comments").val(userArray[0]['comments']);
				$("#commentsTop").html(userArray[0]['comments']);
			}
		})			
	});
});
</script>	
</body>
</html>