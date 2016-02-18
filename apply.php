<?php 
session_start(); 
include 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>JRS Education - Teaching abroad in Hubei, China - Apply to become an English teacher.</title>
	<meta name="keywords" content="teaching, teachers, Hubei, China, learning, teach abroad, education, high school, middle school, elementary school">
	<meta name="description" content="Apply now with JRS Education to each abroad in Hubei China"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/apply.css">
	<style>
	form { display: block; margin: 20px auto; background: #eee; border-radius: 10px; padding: 15px }
	#progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
	#bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
	#percent { position:absolute; display:inline-block; top:3px; left:48%; }
	a { text-decoration:none; )

	</style>	
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
				<li class="current">
					<a href="#">APPLY</a>
				</li>
				<li>
					<a href="contact.php">CONTACT US</a>
					<!--ul><li><a href="article.html">Article</a></li></ul-->
				</li>
			</ul>
		</div>
	</div>
	<div id="page">
		<div id="body">
			<div id="breadcrumbs">
			<a href="">Home</a>&nbsp;&nbsp;>&nbsp;&nbsp;<b>Apply</b>
			</div>
			<div style="clear:both"></div>		
			<div id="content">
				<h1>APPLY</h1>
				<div id="topBanner">
					<img id="image2" src="images/hubei_mountains.jpg" border="0" alt="Hubei Mountains" />
					<div style="float:left;margin:20px 0 0 20px;font-size:26px;height:20px;border:0px solid">
						Complete these easy steps to apply
					</div>
					
					<div style="float:left;margin:20px 0 0 20px;font-size:17px;font-weight:normal;height:50px;border:0px solid #000;width:690px">
						Are you interested in becoming a teacher in Hubei?
						<br />
						We're excited to help you in this process
						<br />
						Below is an outline on how to apply.
					</div>
				</div>
				<div style="clear:both"></div>
				<br /><br />				
				<div id="stepBorder">
					<div id="leftArrow" ><img src="images/left.png" border="0" alt="left arrow"></div>
					<div id="checklist">
						<div id="stepWrapper">
							<ul>
								<li class="step" id="step6">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="55"><b>Step 6:</b></td>
											<td>Apply for work visa</td>
										</tr>
									</table>	
								</li>
								<li class="step" id="step7">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="55"><b>Step 7:</b></td>
											<td>Arrange  travel & Airport Pickup</td>
										</tr>
									</table>				
								</li>								
								<li class="step" id="step1">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="55"><b>Step 1:</b></td>
											<td>Submit required materials</td>
										</tr>
									</table>				
								</li>
								<li class="step" id="step2">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="55"><b>Step 2:</b></td>
											<td>School detail considerations</td>
										</tr>
									</table>	
								</li>
								<li class="step" id="step3">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="55"><b>Step 3:</b></td>
											<td>Internet/Phone interview</td>
										</tr>
									</table>	
								</li>
								<li class="step" id="step4">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="55"><b>Step 4:</b></td>
											<td>Sign of contract</td>
										</tr>
									</table>				
								</li>
								<li class="step" id="step5">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="52"><b>Step 5:</b></td>
											<td>Working permit and visa invitation letter</td>
										</tr>
									</table>	
								</li>
								<li class="step" id="step6b">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="55"><b>Step 6:</b></td>
											<td>Apply for work visa</td>
										</tr>
									</table>	
								</li>
								<li class="step" id="step7b">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="55"><b>Step 7:</b></td>
											<td>Arrange  travel & Airport Pickup</td>
										</tr>
									</table>				
								</li>	
								<li class="step" id="step1b">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="55"><b>Step 1:</b></td>
											<td>Submit required materials</td>
										</tr>
									</table>				
								</li>
								<li class="step" id="step2b">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="55"><b>Step 2:</b></td>
											<td>School detail considerations</td>
										</tr>
									</table>	
								</li>
								<li class="step" id="step3b">
									<table cellpadding="0" cellspacing="0" border="0">
										<tr valign="top">
											<td width="55"><b>Step 3:</b></td>
											<td>Internet/Phone interview</td>
										</tr>
									</table>	
								</li>								
							</ul>
					</div>				
				</div>	
				<div id="rightArrow" ><img src="images/right.png" border="0" alt="right arrow"></div>
			</div>			
				<div id="procedure">
					<span>Apply in 7 steps</span>
					<br />
					<div class="middleLine" style="margin:10px 0 10px 0;"></div>
					<table cellpadding="0" cellspacing="0" border="0">		
						<tr valign="top">
							<td width="65" height="30">Step 1.</td>
							<td width="275" height="30">Submit required materials</td>
						</tr>
						<tr valign="top">	
							<td width="65" height="30">Step 2.</td>
							<td width="275" height="30">School detail consideration</td>
						</tr>
						<tr valign="top">	
							<td width="65" height="30">Step 3.</td>
							<td width="275" height="30">Internet/Phone interview</td>
						</tr>
						<tr valign="top">	
							<td width="65" height="30">Step 4.</td>
							<td width="275" height="30">Sign of contract</td>
						</tr>
						<tr valign="top">	
							<td width="65" height="40">Step 5.</td>
							<td width="275" height="40">Obtaining a working permit and visa invitation letter</td>
						</tr>
						<tr valign="top">	
							<td width="65" height="30">Step 6.</td>
							<td width="275" height="30">Apply for work visa</td>
						</tr>
						<tr valign="top">	
							<td width="65" height="40">Step 7.</td>
							<td width="275" height="40">Travel and pick up arrangements</td>
						</tr>
						<?php if(!isset($_SESSION['id'])){ ?>
						<tr valign="top">							
							<td colspan="2" height="40">							
								You must first login to your account before submitting any materials.
								<br /><br />
								<a href="account.php">Login to my account <img src="images/triangle.png" alt="Login" border="0" style="margin-left:2px;"></a>
							</td>
						</tr>
						<?php } ?>
					</table>	
				</div>
				<div id="content1" class="content">
					<h3>1. Submit required materials</h3>               
					<img src="images/notepad.jpg" alt="Apply with required materials" border="0">										
					<div id="apply_list">
						<h3>Application deadlines:</h3>
						<b>2014 Spring Semester</b> January 25<sup>th.</sup>, 2014<br />
						<b>2014 Fall Semester</b> July 25<sup>th.</sup>, 2014<br />
						Note: The entire process takes around 30 days to complete<br /><br />
						The first step in applying is submitting the required documents.
						<br />
						These include your <a href="JRS_edu_application_form.docx">Application Form</a>, Photo, Resume, Certificate, Recommendation, and Passport.
						<br /><br />
						<span>Submit your documents below:</span>
						<br />
						<?php if(!isset($_SESSION['id'])){ ?>
							You must login to your account before submitting any materials.
						<?php }else{ ?>
						
						
				<div id="theForm">
						<form action="uploader.php" id="FileUploader" enctype="multipart/form-data" method="post" >
						<!--label id="typeLabel">Document Type:</label-->
		<select name="type" id="type">
			<option value="" selected disabled>Document Type:</</option>
			<option value="apform"> AP Form</option>
			<option value="photo"> Photo</option>
			<option value="resume"> Resume</option>
			<option value="certificate"> Certificate</option>
			<option value="recommendation"> Recommendation</option>
			<option value="passport"> Passport</option>
		</select>
			<div style="clear:both"></div>
							<!--label id="mTitle">Title
							<span class="small">Title of the File</span>
							</label>
							<input type="text" name="mName" id="mName" /-->
							<div style="clear:both"></div>
							<!--label>File<br />
							<span class="small">Choose a File</span>
							</label-->
							<input type="file" name="mFile" id="mFile" />
							<div style="clear:both"></div>
							<button type="submit" class="red-button" id="uploadButton">Submit document</button>
							<br />
							<div id="output"></div>
							<div class="spacer"></div>
						</form>
				</div>
					<div style="clear:both"></div>
						
						
							<!--iframe src="form.php" scrolling="no" width="250" height="160" border="0"></iframe>
							<br />
							<div id="rightDiv">
							
							</div-->						
						<?php } ?>
						<div id="bottomContent">
							Once all the materials have been received, we will notify the applicant within 5 working days whether they are accepted or denied.
							<br />
							We recommend submitting all the required materials together but if you are unable to obtain them then we can start the process just by receiving our application with your resume and recent photo.
							<br />
							<br />
							<i>Note:
							<br />
							Only your most recent document upload will be saved.<br />Your application will not be processed and moved on to Step 2 until all the materials have been received.</i>
						</div>			
					</div>
				</div>
				<div id="content2" class="content">		
					<h3>2. School detail consideration</h3>               
					<img src="images/school.jpg" alt="Hubei school" border="0">					
					<ul id="apply_list">
						<li>Based upon the applicant's background, job details of schools will be sent out within two weeks for your consideration.</li>
					</ul>
				</div>
				<div id="content3" class="content">		
					<h3>3. Internet/Phone interview</h3>               
					<img src="images/interview.jpg" alt="Phone interview" border="0">					
					<ul id="apply_list">
						<li>Once the applicant chooses the school and would like to consider the position, we will arrange an internet or phone interview within two weeks.</li>
					</ul>		
				</div>
				<div id="content4" class="content">		
					<h3>4. Sign of contract</h3>               
					<img src="images/contract.jpg" alt="Sign of contract" border="0">					
					<ul id="apply_list">
						<li>Once the applicant passes the interview, we will send over the school contract. We will also recommend other schools if you do not get the contract or if you decide to refuse the offer.</li>
					</ul>
				</div>
				<div id="content5" class="content">							
					<h3>5. Obtaining working permit and visa invitation letter</h3>               
					<img src="images/school_contract.jpg" alt="Working permit and visa invitation letter" border="0">					
					<ul id="apply_list">
						<li>Once the applicant passes the interview, we will send over the school contract. We will also recommend other schools if you do not get the contract or if you decide to refuse the offer.</li>
					</ul>
				</div>
				<div id="content6" class="content">							
					<h3>6. Apply for work visa</h3>               
					<img src="images/visa.jpg" alt="Apply for work visa" border="0">					
					<ul id="apply_list">
						<li>You will receive in the mail the original working permit and visa invitation letter. We will guide you how to apply for your work visa.</li>
					</ul>
				</div>
				<div id="content7" class="content">							
					<h3>7. Travel and pickup arrangements</h3>               
					<img src="images/airplane.jpg" alt="Arrange travel and airport pickup" border="0">					
					<ul id="apply_list">
						<li>One of our agents will contact you regarding your itinerary.  Airport departure time and information, along with details on how you will be picked up when arriving in China will be coordinated before your flight.</li>
					</ul>				 											
			</div>			
		</div>		
		</div>
		</div>
		<?php include "footer.php" ?>
<!--script src="http://malsup.github.com/jquery.form.js"></script-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>	
<script>
$(function() {
    $('#FileUploader').on('submit', function(e)
    {		
        $('#uploadButton').attr('disabled', 'false'); // disable upload button
        //show uploading message
        $("#output").html('<div style="padding:10px"><img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Uploading...</span></div>');
        $(this).ajaxSubmit({
        target: '#output',
        success:  afterSuccess //call function after success
        });
		return false;
    });
});

function afterSuccess()
{
    $('#FileUploader').resetForm();  // reset form
    $('#uploadButton').removeAttr('disabled'); //enable submit button
}
	$("#stepWrapper ul").css("left","-406px");

	$("#step1").click(function(){
		$("#content1").css("display","block");
		$(".content").not("#content1").css("display","none");
	});
	$("#step2").click(function(){
		$("#content2").css("display","block");
		$(".content").not("#content2").css("display","none");
	});
	$("#step3").click(function(){
		$("#content3").css("display","block");
		$(".content").not("#content3").css("display","none");
	});
	$("#step4").click(function(){
		$("#content4").css("display","block");
		$(".content").not("#content4").css("display","none");
	});
	$("#step5").click(function(){
		$("#content5").css("display","block");
		$(".content").not("#content5").css("display","none");
	});
	$("#step6").click(function(){
		$("#content6").css("display","block");
		$(".content").not("#content6").css("display","none");
	});
	$("#step7").click(function(){
		$("#content7").css("display","block");
		$(".content").not("#content7").css("display","none");
	});
	$("#step6b").click(function(){
		$("#content6").css("display","block");
		$(".content").not("#content6").css("display","none");
	});
	$("#step7b").click(function(){
		$("#content7").css("display","block");
		$(".content").not("#content7").css("display","none");
	});
	$("#step1b").click(function(){
		$("#content1").css("display","block");
		$(".content").not("#content1").css("display","none");
	});
	$("#step2b").click(function(){
		$("#content2").css("display","block");
		$(".content").not("#content2").css("display","none");
	});
	$("#step3b").click(function(){
		$("#content3").css("display","block");
		$(".content").not("#content3").css("display","none");
	});
		
	$("#leftArrow").click(function(){
		if($("#stepWrapper ul").position().left < -406){
			$("#stepWrapper ul").animate({left:"+=203px"});
		}	
	});
	
	$("#rightArrow").click(function(){

		if($("#stepWrapper ul").position().left == -1827){
			$("#stepWrapper ul").css("left","-406px");
		}	
		if($("#stepWrapper ul").position().left > -1827){
			$("#stepWrapper ul").animate({left:"-=203px"});
		}
	});

</script>				
</body>
</html>