<?php
session_start();
$pagename = 'about';
include 'functions.php';
include 'loadPageData.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $resultArray['title']; ?></title>
	<meta name="keywords" content="<?php echo $resultArray['keywords']; ?>">
	<meta name="description" content="<?php echo $resultArray['description']; ?>"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/about.css">	
</head>
<body>
	<?php include "header.php" ?>
	<div style="clear:both"></div>
	<div id="topmenu">
		<div id="header">
			<ul>
				<li>
					<a href="/">HOME</a>
				</li>
				<li class="current">
					<a href="#">ABOUT US</a>
				</li>
				<li>
					<a href="teach-abroad.php">TEACH ABROAD</a>
				</li>
				<li>
					<a href="apply.php">APPLY</a>
				</li>
				<li>
					<a href="contact.php">CONTACT US</a>
					<!--ul><li><a href="article.html">Article</a></li></ul-->
				</li>
			</ul>
		</div>
	</div>
	<div id="page">
		<?php echo $resultArray['content']; ?>
		<!--div id="body">
			<div id="breadcrumbs">
			<a href="/">Home</a>&nbsp;&nbsp;>&nbsp;&nbsp;<b>About Us</b>
			</div>
			<div style="clear:both"></div>
			<div id="content">
				<h1>About US</h1>
				<div id="topBanner">
					<img id="image2" src="images/hubei_mountains.jpg" border="0" alt="Hubei mountains" />
					<div style="float:left;margin:20px 0 0 20px;font-size:26px;height:20px;border:0px solid">
						Make a difference teaching
					</div>
					
					<div style="float:left;margin:20px 0 0 20px;font-size:17px;font-weight:normal;height:50px;border:0px solid #000;width:500px">
						Build your resume while making a difference teaching others about your own language and culture.
					</div>
				</div>
				<div style="clear:both"></div>
				<br /><br />
				<div id="imageRight" style="float:right">
					<img src="images/dam.jpg" alt="Yangtze River Three Gorges" border="0" id="aboutImage">
					<br />
					Yangtze River Three Gorges
				</div>			
				<h3>Our Mission</h3>
				<p>
					JRS Educational Teach Abroad Program recruits English teachers and dispatches them to teach in over 427 Chinese schools in Hubei Province, China.
				</p>
				<p>
					We offer an unforgettable experience with rewards and valuable teaching experience with the stability of a safe, reliable employer committed to your professional development.
				</p>
				<p>
					We are not just looking for graduates with a TESOL or TEFL certification, we are also looking for graduates with 2 years experience.
				</p>
				<p>
					We want to assure our teachers that all of the schools have certificates of employing foreign teachers, issued by State Administration of Foreign Experts Affairs, the P.R of China (SAFEA).
				</p>				
				<div class="middleLine"></div>
				<img src="images/about2.jpg" alt="Our Mission" border="0" id="aboutImage2">
				<h3>Benefits of teaching abroad with (co. name) such as:</h3>
				<ul id="aboutList">
					<li><span class="bullet">&bull;</span>&nbsp;Build your resume</li>
					<li><span class="bullet">&bull;</span>&nbsp;Make a difference teaching others about your own language and culture</li>
					<li><span class="bullet">&bull;</span>&nbsp;Experience a new culture</li>
					<li><span class="bullet">&bull;</span>&nbsp;Become an active member of a foreign community</li>
					<li><span class="bullet">&bull;</span>&nbsp;Establish new friendships and contacts (build your network)</li>
					<li><span class="bullet">&bull;</span>&nbsp;Earn Money to support expenses while living and traveling abroad</li>
					<li><span class="bullet">&bull;</span>&nbsp;Learn a second or even third language</li>
					<li><span class="bullet">&bull;</span>&nbsp;Teach and be taught</li>
				</ul>			
			</div-->
		</div>
		</div>
		<br /><br />
		<?php include "footer.php" ?>
</body>
</html>