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
	<style>
		a{
			text-decoration: none;
		}
		a:hover{
			text-decoration: underline;
		}
		</style>
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
				<li>
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
		<div id="body">
			<div id="breadcrumbs">
			<a href="/">Home</a>&nbsp;&nbsp;>&nbsp;&nbsp;<b>Site map</b>
			</div>
			<div style="clear:both"></div>
			<div id="content">
				<h1>Site Map</h1>
				<p>
					<a href="teachinginhubei.com/">Home</a><br />
					<a href="teachinginhubei.com/about.php">About Us</a><br />
					<a href="teachinginhubei.com/teach-abroad.php">Teach abroad</a><br />
					<a href="teachinginhubei.com/apply.php">Apply</a><br />
					<a href="teachinginhubei.com/contact.php">Contact Us</a><br />
					<a href="teachinginhubei.com/account.php">Account</a><br />
					<a href="teachinginhubei.com/sign-up.php">Sign Up</a><br />
				</p>
				<div class="middleLine"></div>
			</div>
		</div>
		</div>
		<br /><br />
		<?php include "footer.php" ?>
</body>
</html>