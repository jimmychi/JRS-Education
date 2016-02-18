<?php 
session_start(); 
include 'functions.php';
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>JRS Education - Teaching abroad in Hubei, China - Contact us</title>
	<meta name="keywords" content="teaching, teachers, Hubei, China, learning, teach abroad, education, high school, middle school, elementary school">
	<meta name="description" content="Contact JRS Education for the oppurtunity to teach abroad in Hubei China"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">	
</head>
<body>
	<?php include "header.php" ?>
	<div id="topmenu">
		<div id="header">
			<ul>
				<li>
					<a href="/">HOME</a>
				</li>
				<li>
					<a href="about.php">ABOUT US</a>
				</li>
				<li>
					<a href="teach-abroad.php">TEACH ABROAD</a>
				</li>
				<li>
					<a href="apply.php">APPLY</a>
				</li>
				<li class="current">
					<a href="#">CONTACT US</a>
					<!--ul><li><a href="article.html">Article</a></li></ul-->
				</li>
			</ul>
		</div>
	</div>
	<div id="page">
		<div id="body">
			<div id="breadcrumbs">
			<a href="">Home</a>&nbsp;&nbsp;>&nbsp;&nbsp;<b>Contact Us</b>
			</div>
			<div style="clear:both"></div>			
			<div id="content">
				<form name="myForm" id="myForm">
				<h1>CONTACT US</h1>	
				<div id="topBanner" >
					<img id="image2" src="images/hubei_mountains.jpg" border="0" alt="Hubei mountains" />
					<div style="float:left;margin:20px 0 0 20px;font-size:26px;height:20px;border:0px solid">
						JRS Educational Teaching Abroad Program
					</div>					
					<div style="float:left;margin:20px 0 0 20px;font-size:17px;font-weight:normal;height:50px;border:0px solid #000;width:500px">
						Build your resume while making a difference teaching others about your own language and culture.
					</div>
				</div>
				<br /><br />
				<h3>Leave your information and we'll get back to you.</h3>
				<br />
				<form name="myForm" id="myForm">
				<table cellpadding="0" cellspacing="0" border="0" id="page-table">
					<tr valign="top">
						<td height="75">
							First Name<sup>*</sup><br />
							<input type="text" name="fname" class="text-input" id="fname" />
							<br />
							<div id="fname_result" class="result" /></div>
						</td>	
						<td height="75">
							Middle Name<sup>&nbsp;</sup><br />
							<input name="mname" id="mname" class="text-input" />
						</td>	
						<td height="75">
							Last Name<sup>*</sup><br />
							<input name="lname" id="lname" class="text-input" />
							<div id="lname_result" class="result"></div>
						</td>	
					</tr>
					<tr valign="top">					
						<td height="75">
							Phone number<sup>&nbsp;</sup><br />
							<input name="phone" id="phone" class="text-input" />
						</td>	
						<td height="75">
							Email<sup>*</sup><br />
							<input name="email" id="email" class="text-input" />
							<div id="email_result" class="result"></div>
						</td>	
					</tr>			
					<tr valign="bottom" height="50">
						<td>
							<input type="submit" value="Submit" id="submitBtn" name="submitBtn" />
						</td>
					</tr>
					</form>
				</table>
				<div class="middleLine"></div>				
				<h3>Call or email us</h3>
				<p>
					Tel: 213-820-4947
					<br />
					Fax: 213-402-3663 
					<br />
					439 S. St. Andrews Place, Suite 20<br />
					Los Angeles, CA 90020-4320 USA<br />
					<a href="mailto:reggieglobal@yahoo.com?Subject=Teaching%20In%20Hubei" target="_top">reggieglobal@yahoo.com</a>
				</p>
			</div>
		</div>
		</div>
		<?php include "footer.php" ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>		
<script>
$(document).ready(function() {		
	function validate(){
		var hasErrors = false;
		if($("#fname").val() == ""){
			hasErrors = true
			$("#fname_result").html("Required");
		}	
		if($("#lname").val() == ""){
			hasErrors = true
			$("#lname_result").html("Required");
		}	
		if($("#email").val() == ""){
			hasErrors = true
			$("#email_result").html("Required");
		}	
		if(hasErrors) 
			return false;
		else
			return true;
		
	}

	$("#myForm").submit(function(e){	

		e.preventDefault();
		dataString = "fname=" + $("#fname").val() + "&lname=" + $("#lname").val() + "&phone=" + $("#phone").val() + "&email=" + $("#email").val();
		//Validate
		if(validate()){
			$.ajax({
				type: "POST",
				url: "update-contact.php",
				async: false,
				data: dataString,
				dataType: "json",
				success: function(userArray){					
					if(userArray == "sent"){
						$("#resultDiv").html("Thank you for your information. Someone will be in touch shortly.");
					}
				}
			})							
		}	
	});	
});
</script>		
</body>
</html>