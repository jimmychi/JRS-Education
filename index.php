<?php 
session_start();
$pagename = 'homepage';
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
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/gfdynamicfeedcontrol.css">
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script src="js/gfdynamicfeedcontrol.js" type="text/javascript"></script>
	<script src="js/analytics.js" type="text/javascript"></script>	
	<script type="text/javascript">
		function load() {
			var feed ="http://www.chinadaily.com.cn/rss/china_rss.xml";
			new GFdynamicFeedControl(feed, "feedControl");
		}
		google.load("feeds", "1");
		google.setOnLoadCallback(load);
	</script>	
</head>
<body>
	<div id="topheader">
		<div id="content">
			<div id="logo">	
				<img src="images/jrs-logo.png" alt="JRS Education&ndash;Teaching abroad" border="0" />
			</div>
			<div id="header_links">			
				<?php 
				if(isset($_SESSION['user'])){ 
					echo "Welcome " . ucfirst($_SESSION['user']); ?>				
					<br />
					<?php if(isset($_SESSION['admin'])){ ?>
						<a href="admin.php">Admin page</a> | <a href="logout.php?s=logout">Logout</a>		
					<?php }else{ ?>		
						<a href="apply.php">Apply Now</a> | <a href="logout.php?s=logout">Logout</a>		
					<?php } ?>
				<?php }else{ ?>
					<a href="account.php">Login to my account</a> | <a href="sign-up.php">Create a new account</a>		
				<?php } ?>
				</div>
		</div>
	</div>
	<div style="clear:both"></div>
	<div id="topmenu">
		<div id="header">
			<ul>
				<li class="current">
					<a href="#">HOME</a>
				</li>
				<li>
					<a href="about.php">ABOUT US</a>
				</li>
				<li>
					<a href="teach-abroad.php">TEACH ABROAD</a>
				</li>
				<li>
					<a href="apply.php">APPLY NOW</a>
				</li>
				<li>
					<a href="contact.php">CONTACT US</a>
					<!--ul><li><a href="article.html">Article</a></li></ul-->
				</li>
			</ul>
		</div>
	</div>
	<?php echo $resultArray['content']; ?>	
	<!--div id="page">
		<div id="body">
			<div class="header">
				<iframe src="images/index.html" style="width:980px;height:369px;max-width:100%;overflow:hidden;border:none;padding:0;margin:0 auto;display:block;" marginheight="0" marginwidth="0"></iframe>
				<ul>
					<li>
						<a href="index.html" class="figure"><img src="images/mission.jpg" alt="Image of Hubei, China"></a>
						<h3><a href="about.php">Our Mission <img src="images/triangle-white.png" align="absmiddle" border="0" alt="Arrow"></a></h3>
						<p>
							JRS Educational Teach Abroad Program recruits teachers to teach English in over 427 schools in Hubei, China. 
						</p>
					</li>
					<li>
						<a href="teach-abroad.php" class="figure"><img src="images/abroad.jpg" alt="Image of a teacher"></a>
						<h3><a href="teach-abroad.php">Teach abroad <img src="images/triangle-white.png" style="margin-top:-2px;" align="absmiddle" border="0" alt="Arrow"></a></h3>
						<p>
							We offer many benefits for English Teachers in our program. 
						</p>    
					</li>
					<li class="last">
						<a href="apply/" class="figure"><img src="images/apply.jpg" alt="Apply in 7 easy steps"></a>
						<h3><a href="apply.php">7 easy steps to apply <img src="images/triangle-white.png" border="0" align="absmiddle" alt="Arrow"></a></h3>
						<p style="width:173px;">
							Are you interested in becoming a teacher in Hubei?
							We're excited to help you in this process 
						</p>
					</li>
				</ul>
			</div>
			<div class="body">
				<h1 id="spotlight_header">Hubei Spotlight</h1>
				<div class="spotlight_image">
					<img src="images/spotlight-small.jpg" width="150" height="97" border="0" alt="Dancing image in Hubei, China" />				
				</div>	
				<div class="spotlight_content">
					Hubei is a wonderful place located in the central part of China. 	The name means "north of the lake", referring to its position north of Lake Dongting.
				</div>
				<div style="clear:both"></div>
				<div class="spotlight_image">
					<img src="images/teaching_abroad.jpg" width="150" height="97" border="0" alt="University in Hubei, China" />				
				</div>	
				<div class="spotlight_content">
					Teaching abroad is a great opportunity to learn a new culture while also gaining great experience.	
				</div>
			</div>
			<div id="news-div">
				<h1 id="spotlight_header">NEWS</h1>
				<div id="feedControl">Loading...</div>				
			</div>
			<div style="clear:both"></div>
		</div>
		<div class="footer">
			<div id="imageLeft" >
				<img src="images/scun.jpg" alt="South Central University for Nationalities" id="bottom-image" />
				South Central University for Nationalities
			</div>				
			<div>
				<h1>Why teach abroad with JRS Education?</h1>
				<ol>
					<li>			
						<span class="bullet">&bull;</span>&nbsp;Build your resume
					</li>
					<li>
						<span class="bullet">&bull;</span>&nbsp;Make a difference teaching others about your own language and culture
					</li>
					<li>
						<span class="bullet">&bull;</span>&nbsp;Experience a new culture and see the world
					</li>
					<li>
						<span class="bullet">&bull;</span>&nbsp;Become an active member of a foreign community
					</li>
					<li>
						<span class="bullet">&bull;</span>&nbsp;Establish new friendships and contacts (build your network)
					</li>
					<li>
						<span class="bullet">&bull;</span>&nbsp;Earn money to support expenses while living and traveling abroad
					</li>
					<li>
						<span class="bullet">&bull;</span>&nbsp;Learn a second or even third language
					</li>
					<li>
						<span class="bullet">&bull;</span>&nbsp;Teach and be taught
					</li>
				</ol>
			</div>
		</div>
	</div-->
		</div>
        <div style="clear:both"></div>
		<div id="footer">
			<div id="container">
				<div>
					<h1>ACCOUNT</h1>
					<ul>
						<?php if(isset($_SESSION['id'])){ ?>
						<li>
							<a href="apply.php">Apply for the program</a>
						</li>	
						<li>
							<a href="apply.php">Upload documents</a>
						</li>												
						<?php 
							//hasDocuments($con);
						}else { ?>
						<li>
							<a href="account.php">Login to my account</a>
						</li>
						<li>
							<a href="sign-up.php">Create a new account</a>
						</li>
						<?php } ?>						
						<li>
							<a href="JrsED_ap_form.pdf">Application form</a><br />
							<span id="siteseal"><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=wHuj1ExG30ljM60uHOkcTgNUyiggVbHtp8DhotCu3ivUieYLpwZ855"></script></span>
						</li>						
					</ul>
				</div>
				<div>
					<h1>About the Program</h1>
					<ul>
						<li>
							<a href="about.php">Our Mission</a>
						</li>
						<li>
							<a href="teach-abroad.php">Teaching abroad</a>
						</li>
					</ul>
				</div>
				<div>
					<h1>Contact</h1>
					<ul>
						<li>
							<a href="contact.php">Phone number & email</a>
						</li>
					</ul>
				</div>
				<div>
					<h1>&nbsp;</h1>	
					<div id="facebook">
						<a href="#" target="_blank" >JRS Education on Facebook</a><a href="#" target="_blank" ><img src="images/facebook.png" align="absmiddle" border="0" alt="Facebook"></a>					
					</div>
					<div class="twitter">			
						<a href="#" target="_blank" >JRS Educaton on Twitter</a><a href="#" target="_blank" ><img src="images/twitter.png" align="absmiddle" border="0" alt="Twitter" ></a>
					</div>	
					<div class="twitter">	
						<a href="sitemap.php">Site map</a>
					</div>
</div>
			</div>
			<p>
				JRS Education &copy; 2013  | All Rights Reserved &reg;
			</p>
		</div>	
</body>
</html>