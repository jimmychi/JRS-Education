<?php
session_start();
error_reporting(E_ALL^ E_WARNING);
include 'functions.php';
if(!isset($_SESSION['admin'])){
	header("Location: /");
}
$query = "select * from users where admin = 'no'";
$result = mysql_query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administration</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">		
	<script src="js/functions.js"></script>
</head>
<body>
	<?php include "header.php" ?>
	<div style="clear:both"></div>
	<div id="page">
		<br />
		<form name="search-form" id="search-form" method="POST">
		<span style="font-size:16px;">Search by name:</span>&nbsp;<input type="text" id="search" name="search" size="20" class="text-input" />&nbsp;<input type="submit" value=">" id="searchBtn" name="searchBtn" />
		</form>		
		<div id="searchResult" style=""></div>

		<div class="middleLine"></div>
		<div style="clear:both"></div>
		<h2>Applicants</h2>
		<div id="sortDiv" style="font-size:14px">
			<form name="dateForm" id="dateForm" method="POST" action="create-excel.php">
			<span style="font-weight:bold">Date range:</span><br />
			All: <input type="radio" name="dateRange" id="dateRange" value="all" checked="checked" />&nbsp;&nbsp;&nbsp;&nbsp;
			Today: <input type="radio" name="dateRange" id="dateRange" value="today" />&nbsp;&nbsp;&nbsp;&nbsp;
			Past 7 Days: <input type="radio" name="dateRange" id="dateRange" value="week" />&nbsp;&nbsp;&nbsp;&nbsp;
			Past Month: <input type="radio" name="dateRange" id="dateRange" value="month" />
			<br /><br />
			<a href="" id="excelClick" target="_blank" >Download Excel ></a>&nbsp;&nbsp;<a href="cms.php" target="_blank">CMS</a>
			</form>			
		</div>
		<div id="userDiv">
			<table cellpadding="2" cellspacing="0" border="1">
				<tr valign="top" bgcolor="#0D3F6A" class="headerRow">				
					<td width="20" style="text-align:center">#</td>
					<td width="100">First name</td>
					<td width="80">Middle</td>				
					<td width="100">Last name</td>
					<td width="150">Address 1</td>
					<td width="70">Address 2</td>				
					<td width="200">City</td>
					<td width="50">State</td>
					<td width="50">Zip</td>				
					<td width="100">Country</td>
					<td width="80">Phone</td>				
					<td width="200">Email</td>				
					<td width="170" align="center">Document status</td>				
					<td width="100" align="center">Date applied</td>				
				</tr>		
				<?php while($row = mysql_fetch_array($result)){ ?>
				<tr valign="top">				
					<td style="text-align:center"><?php echo $row['id'] ?></td>
					<td><?php echo $row['fname'] ?></td>
					<td><?php echo $row['mname'] ?></td>				
					<td><?php echo $row['lname'] ?></td>
					<td><?php echo $row['address1'] ?></td>
					<td><?php echo $row['address2'] ?></td>				
					<td><?php echo $row['city'] ?></td>
					<td><?php echo $row['state'] ?></td>
					<td><?php echo $row['zip'] ?></td>				
					<td><?php echo $row['country'] ?></td>
					<td><?php echo $row['phone'] ?></td>				
					<td><?php echo $row['email'] ?></td>				
					<td align="center"><?php checkDocumentStatus($row['id']); ?></td>
					<td align="center"><?php echo $row['date'] ?></td>								
				</tr>
			<?php } ?>
			</table>
		</div>			
	</div>
	<br /><br />
	<?php include "footer2.php" ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>		
<script>
$(document).ready(function() {		
	$("#search-form").submit(function(e){	

		e.preventDefault();
		$("#searchResult").html("");
			
		if($("#search").val() == ""){
			$("#searchResult").html("Please enter a user name");
		}else{
			var search = $("#search").val();
				
			dataString = "search=" + search;
			var resultStr = "";
			var i = 0;
			
			$.ajax({
				type: "POST",
				url: "search.php",
				async: false,
				data: dataString,
				dataType: "json",
				success: function(userObjectArray){				
					if(userObjectArray != null){
						resultStr += "<table cellpadding=\"2\" cellspacing=\"0\" border=\"1\" ><tr class=\"headerRow\" bgcolor=\"0D3F6A\" valign=\"top\"><td align=\"center\" width=\"20\">#</td><td width=\"100\">First name</td><td width=\"100\">Middle</td><td width=\"100\">Last name</td><td width=\"150\">Address 1</td><td width=\"70\">Address 2</td><td width=\"200\">City</td><td width=\"50\">State</td><td width=\"50\">Zip</td><td width=\"100\">Country</td><td width=\"80\">Phone</td><td width=\"200\">Email</td><td width=\"170\" align=\"center\">Document Status</td><td width=\"100\">Date</td>";
						while(userObjectArray[i] != null){
							resultStr += "<tr valign=\"top\"><td align=\"center\">" + i + "</td><td>" + userObjectArray[i].fname + "</td><td>" + userObjectArray[i].mname + "</td><td>" + userObjectArray[i].lname + "</td><td>" + userObjectArray[i].address1 + "</td><td>" + userObjectArray[i].address2 + "</td><td>" + userObjectArray[i].city + "</td><td>" + userObjectArray[i].state + "</td><td>" + userObjectArray[i].zip + "</td><td>" + userObjectArray[i].country + "</td><td>" + userObjectArray[i].phone + "</td><td>" + userObjectArray[i].email + "</td><td align=\"center\" id=\"documentStatus\">" + showStatus(userObjectArray[i].status,userObjectArray[i].id) + "</td><td>" + userObjectArray[i].date + "</td></tr>";
							i++;
						}
						resultStr += "</table>";
					}else{
						resultStr += "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr valign=\"top\"><td width=\"100%\">No results</td></tr></table>";
					}
					$("#searchResult").html(resultStr);		
				}
			})							
		}
	});
	$("input:radio[name=dateRange]").click(function(e){	
		$("#userDiv").html("");
			
		var dateRange = $(this).val();				
		var resultStr = "";
		var i = 0;
		dataString = "dateRange=" + dateRange;
			
		$.ajax({
			type: "POST",
			url: "sort.php",
			async: false,
			data: dataString,
			dataType: "json",
			success: function(userObjectArray){				
				if(userObjectArray != null){
					resultStr += "<table cellpadding=\"2\" cellspacing=\"0\" border=\"1\" ><tr class=\"headerRow\" bgcolor=\"0D3F6A\" valign=\"top\"><td align=\"center\" width=\"20\">#</td><td width=\"100\">First name</td><td width=\"100\">Middle</td><td width=\"100\">Last name</td><td width=\"150\">Address 1</td><td width=\"70\">Address 2</td><td width=\"200\">City</td><td width=\"50\">State</td><td width=\"50\">Zip</td><td width=\"100\">Country</td><td width=\"80\">Phone</td><td width=\"200\">Email</td><td width=\"170\" align=\"center\">Document Status</td><td width=\"100\">Date</td>";
					while(userObjectArray[i] != null){
						resultStr += "<tr valign=\"top\"><td align=\"center\">" + i + "</td><td>" + userObjectArray[i].fname + "</td><td>" + userObjectArray[i].mname + "</td><td>" + userObjectArray[i].lname + "</td><td>" + userObjectArray[i].address1 + "</td><td>" + userObjectArray[i].address2 + "</td><td>" + userObjectArray[i].city + "</td><td>" + userObjectArray[i].state + "</td><td>" + userObjectArray[i].zip + "</td><td>" + userObjectArray[i].country + "</td><td>" + userObjectArray[i].phone + "</td><td>" + userObjectArray[i].email + "</td><td align=\"center\" id=\"documentStatus\">" + showStatus(userObjectArray[i].status,userObjectArray[i].id) + "</td><td>" + userObjectArray[i].date + "</td></tr>";
						i++;
					}
					resultStr += "</table>";
				}else{
					resultStr += "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr valign=\"top\"><td width=\"100%\">No results</td></tr></table>";
				}
				$("#userDiv").html(resultStr);		
			}
		})	
	});		
	$("#excelClick").click(function(e){	
			e.preventDefault();
			$("#dateForm").submit();
	});	
});
</script>	
</body>
</html>