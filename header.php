<?php
error_reporting(E_ALL^ E_WARNING);
if ($_SERVER['HTTP_HOST'] == 'teachinginhubei.com'){
	$rootPath = '/';
}else{
	$rootPath = '/hubei/';
}
?>
	<div id="topheader">
		<div id="content">
			<div id="logo">	
				<a href="/" id="logo"><img src="images/jrs-logo.png" alt="JRS Education&ndash;Teaching abroad" border="0" /></a>
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
				<?php }?>				
			</div>
		</div>
	</div>	