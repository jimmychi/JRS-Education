<?php
session_start();	
include 'functions.php';

$row = getUserInfo();
$row2 = getDocInfo($_SESSION['id']);

$apform_name = isset($row2['apform_name']) ? $row2['apform_name'] : "";
$photo_name = isset($row2['photo_name']) ? $row2['photo_name'] : "";
$resume_name = isset($row2['resume_name']) ? $row2['resume_name'] : "";
$certificate_name = isset($row2['certificate_name']) ? $row2['certificate_name'] : "";
$recommendation_name = isset($row2['recommendation_name']) ? $row2['recommendation_name'] : "";
$passport_name = isset($row2['passport_name']) ? $row2['passport_name'] : "";


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
</style>
	
</head>
<body>
	<?php include "header.php" ?>
	<div style="clear:both"></div>
	<div id="page">
		<div id="info">
		<?php 			
			if(isset($row2['mname'])){
				$name = $row['fname'] . " " . $row['mname'] . " " . $row['lname'];
			}else{
				$name = $row['fname'] . " " . $row['lname'];
			}			
			echo strtoupper($name);
		?>
			<br />
			<div>
				<?php echo ucfirst($row['address1']) . "<br />" . ucfirst($row['address2']) . "<br />" . ucfirst($row['city']) . ", " . $row['state'] . " " . $row['zip'] . "<br />" . $row['phone'] . "<br />" . $row['email'] ?>
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
				<td id="apdiv"><?php status($row2['apform']); ?></td>				
				<td><a href="apply/uploads/<?php echo $_SESSION['id'] . "/apform/" . $apform_name; ?>" target="_blank"><?php echo $apform_name ?></a></td>
				<td align="center" style="border-right: 1px solid #333;"><?php echo $row2['apform_date']; ?></td>	
			</tr>			
			<tr valign="top">
				<td>Photo</td>
				<td id="pdiv"><?php status($row2['photo']); ?></td>				
				<td><a href="apply/uploads/<?php echo $_SESSION['id'] . "/photo/" . $photo_name; ?>" target="_blank"><?php echo $photo_name ?></a></td>
				<td align="center" style="border-right: 1px solid #333;"><?php echo $row2['photo_date']; ?></td>	
			</tr>			
			<tr valign="top">
				<td>Resume</td>
				<td id="resumediv"><?php status($row2['resume']); ?></td>				
				<td><a href="apply/uploads/<?php echo $_SESSION['id'] . "/resume/" . $resume_name; ?>" target="_blank"><?php echo $resume_name ?></a></td>			
				<td align="center" style="border-right: 1px solid #333;"><?php echo $row2['resume_date']; ?></td>	
			</tr>			
			<tr valign="top">
				<td>Certificate</td>
				<td id="certdiv"><?php status($row2['certificate']); ?></td>				
				<td><a href="apply/uploads/<?php echo $_SESSION['id'] . "/certificate/" . $certificate_name; ?>" target="_blank"><?php echo $certificate_name ?></a></td>		
				<td align="center" style="border-right: 1px solid #333;"><?php echo $row2['certificate_date']; ?></td>	
			</tr>			
			<tr valign="top">
				<td>Recommendation</td>
				<td id="recdiv"><?php status($row2['recommendation']); ?></td>
				<td><a href="apply/uploads/<?php echo $_SESSION['id'] . "/recommendation/" . $recommendation_name; ?>" target="_blank"><?php echo $recommendation_name ?></a></td>		
				<td align="center" style="border-right: 1px solid #333;"><?php echo $row2['recommendation_date']; ?></td>	
			</tr>			
			<tr valign="top">
				<td>Passport</td>
				<td id="passdiv"><?php status($row2['passport']); ?></td>
				<td><a href="apply/uploads/<?php echo $_SESSION['id'] . "/passport/" . $passport_name; ?>" target="_blank"><?php echo $passport_name ?></a></td>		
				<td align="center" style="border-right: 1px solid #333;"><?php echo $row2['passport_date']; ?></td>	
			</tr>
		</table>
		<br />		
		<table cellpadding="2" cellspacing="0" border="0">
			<tr valign="top" bgcolor="#0D3F6A" class="headerRow">
				<td width="640">Comments</td>
			</tr>
			<tr valign="top" id="commentBox">
				<td width="640" height="100" id="commentsTop" style="border:1px solid;">
					<?php echo $row2['comments'] ?>				
				</td>
			</tr>			
		</table>		
		<br />
		<a href="apply.php">Back</a>
	</div>
	<br />
	<br />
	<?php include "footer.php" ?>
</body>
</html>