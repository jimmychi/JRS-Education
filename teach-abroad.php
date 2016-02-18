<?php 
session_start(); 
$pagename = 'teach-abroad';
include 'functions.php';
include 'loadPageData.php';
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $resultArray['title']; ?></title>
	<meta name="keywords" content="<?php echo $resultArray['keywords']; ?>">
	<meta name="description" content="<?php echo $resultArray['description']; ?>"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/teachabroad.css">	
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
				<li class="current">
					<a href="#">TEACH ABROAD</a>
				</li>
				<li>
					<a href="apply.php">APPLY</a>
				</li>
				<li>
					<a href="contact.php">CONTACT US</a>
				</li>
			</ul>
		</div>
	</div>
	<div style="clear:both"></div>
	<?php echo $resultArray['content']; ?>
	<!--div id="page">
		<div id="body">
			<div id="breadcrumbs">
			<a href="">Home</a>&nbsp;&nbsp;>&nbsp;&nbsp;<b>Teach Abroad</b>
			</div>
			<div style="clear:both"></div>		
			<div id="content">
				<h1>TEACH ABROAD</h1>	
				<div id="topBanner">
					<img id="image2" src="images/hubei_mountains.jpg" border="0" alt="Hubei mountains" style="float:left" />
					<div style="float:left;margin:20px 0 0 20px;font-size:26px;height:20px;border:0px solid">
						Become an English teacher
					</div>
					
					<div style="float:left;margin:20px 0 0 20px;font-size:17px;font-weight:normal;height:50px;border:0px solid #000;width:500px">
						Build your resume while making a difference teaching others about your own language and culture.
					</div>
				</div>		
				<div style="clear:both"></div>
				<br /><br />
				<h3>School levels</h3>
				<div style="clear:both"></div>
				<div class="contentLeft">
					<img src="images/preschool.jpg" border="0" alt="Hubei elementary school" />
				</div>
				<div class="contentRight">
					We offer many different levels of teaching in different schools and colleges in Hubie including Kindergarten, Primary School, High School and College.<br />
					We also offer language training programs to teach students English.<br />
				</div>	
				<div style="clear:both"></div>
				<div class="middleLine"></div>
				<div style="clear:both"></div>
				<h3>Teaching hours</h3>				
				<div style="clear:both"></div>
				<div class="contentLeft">
					<img src="images/clock.jpg" border="0" alt="Clock" />
				</div>
				<div class="contentRight">
					There are 16-24 teaching hours per week. Monday through Friday.
					<br />
					There are 45 minutes per teaching hour.
				</div>	
				<div style="clear:both"></div>
				<div class="middleLine"></div>
				<div style="clear:both"></div>				
				<h3>Eligibility</h3>
				<div style="clear:both"></div>
				<div class="contentLeft">
					<img src="images/eligible.jpg" border="0" alt="Eligibility" />
				</div>
				<div class="contentRight">
					Bachelor degrees with a ESL/TEFL/TESOL certificate or 2 years teaching experience.
					<br />
					Native English language fluency.
					<br />
					USA, British, Canadian, Australian, Ireland, or New Zealand citizenship.				
					<br />
					Between the ages of 20 - 50.		
				</div>	
				<div style="clear:both"></div>
				<div class="middleLine"></div>
				<div style="clear:both"></div>				
				<h3>Program duration</h3>
				<div style="clear:both"></div>
				<div class="contentLeft">
					<img src="images/calendar.jpg" border="0" alt="Academic calendar" />
				</div>
				<div class="contentRight">
					Chinese Academic Year: contract length of 1 school year with the option to extend.
					<br />
					<span style="font-style:italic">Fall school year:</span> September 1st - June 30th of next year.
					<br />
					<span style="font-style:italic">Spring school year:</span> February 1st - January 30th  of next year.								
				</div>	
				<div style="clear:both"></div>
				<div class="middleLine"></div>
				<div style="clear:both"></div>					
			</div>
		</div>
		</div-->
		<?php include "footer.php" ?>		
</body>
</html>