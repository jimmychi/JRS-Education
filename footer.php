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
							<a href="teach-abroad.php">Teaching Abroad</a>
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