<?php 
session_start(); 
include 'functions.php';
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>JRS Education - Teaching abroad in Hubei, China - View my account</title>
	<meta name="keywords" content="teaching, teachers, Hubei, China, learning, teach abroad, education, high school, middle school, elementary school">
	<meta name="description" content="JRS Education offers teachers the oppurtunity to teach abroad in Hubei China"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/account.css">
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
				<li>
					<a href="#">CONTACT US</a>
					<!--ul><li><a href="article.html">Article</a></li></ul-->
				</li>
			</ul>
		</div>
	</div>
	<div id="page">
		<div id="body">
			<div id="breadcrumbs">
			<a href="">Home</a>&nbsp;&nbsp;>&nbsp;&nbsp;<b>Account</b>
			</div>
			<div style="clear:both"></div>			
			<div id="content">				
				<form name="search-form" id="search-form" method="POST">
				<h1 style="border-bottom:1px solid #CCCCCC">Account</h1>				
				<!--div id="topBanner" style="width:980px;height:184px;background-color:#0d3f6a;color:#fff;font-size:22px;font-weight:bold;margin-bottom:10px;">
					<img id="image2" src="images/hubei_mountains.jpg" border="0" alt="Hubei Mountains" style="float:left;margin-bottom:40px;" />
					<div style="float:left;margin:20px 0 0 20px;font-size:26px;height:20px;border:0px solid">
						JRS Educational Teaching Abroad Program
					</div>
					
					<div style="float:left;margin:20px 0 0 20px;font-size:18px;height:50px;border:0px solid #000;width:500px">
						Build your resume while making a difference teaching others about your own language and culture.
					</div>
				</div-->				
				<div style="clear:both"></div>
				<div id="loginDiv">
					<h3>Email</h3>				
					<input name="email" id="email" type="text" />
					<h3>Password</h3>										
					<input name="password" id="password" type="password">
					<br /><br />
					<input type="submit" value="Login" style="margin-left:55px;"/>
					<br /><br />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="password.php">Forgot password?</a>
					<br />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="sign-up.php">Create a new account</a>
					<div id="resultDiv"></div>								
				</div>				
				</form>				
			</div>
		</div>
		</div>
		<?php include "footer.php" ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>		
<script>
$(document).ready(function() {		
	
	$("#search-form").submit(function(e){	
		
		e.preventDefault();
		var email = $("#email").val();
		var password = $("#password").val();
		
		dataString = "email=" + email + "&password=" + password;
		//Validate
	
		$.ajax({
			type: "POST",
			url: "login.php",
			async: false,
			data: dataString,
			dataType: "json",
			success: function(userObjectArray){
				
				if(userObjectArray != null){
					if(userObjectArray[0].status == "pass"){
						$(location).attr('href',"/");
					}else{
						$("#resultDiv").html("Invalid login and password");
					}	
				}else{
					$("#resultDiv").html("Invalid login and password");
				}
				return false;
			}
		})							
	});
});
</script>
</body>
</html>