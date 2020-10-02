<?php session_start();?>
<html>
<head>
	<title>Choco Loco</title>
	<link rel="icon" href="imagini/652x450_104707-bomboane-cu-ciocolata-si-alune.jpg" sizes="16x16" type="image/gif"/>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<header>
	<nav>
		&nbsp;
		<a href="index.php">
		<img src="imagini/GuiltyPleasure_LOGO.jpg" width="300" height="50" alt="GuiltyPleasure_LOGO.jpg"/> </a>
		<div class="navbar" style="display:inline;">
			<ul>
				<li> <a href="#varietati"> Master Chocolatier Collection </a></li>
				<li> <a href="#principal"> Our Bakers </a></li>
				<li> <a href="cart.php"> <?php echo $_SESSION['utilizator'];?>'s Shopping cart </a></li>
			</ul>
			
			<?php if(isset($_SESSION['utilizator'])){
					echo "&nbsp;";?>
					<button id="logIn" class="log" onclick="loadDoc('php/logout.php');">Log Out </button><?php
				}
				else{
					?>
			<button id="logIn" class="log" onclick="loadDoc('login.php');">Log In </button>
			<?php	
			}
				?>
		</div>
	</nav>
	</header>
	<br><br><br>
	<section id="content">
	
	
	<br><br><br><br><br>
	
	
	
	
	

	
	
	<section id="principal">
	
		
		
		
		<hr id="hr1"> 
		<h1>Terms & Conditions</h1>
		<hr id="hr2">
		<div class="box">
			<h3 style="text-align:center;"> Welcome to Guilty Pleasure. Guilty Pleasure provides services to you subject to the following terms and conditions. If you visit www.guiltypleasure.com, shop for or purchase goods or services at Guilty Pleasure, you accept these conditions.</h3>
			<br><br><br>
			
			<p style="display:inline"><b>&nbsp;&nbsp;1. PRIVACY:</b> Please review our Privacy Statement, which also governs your visit to Chocolate.org, to understand our privacy practices. The link to the privacy policy page is available at the bottom of every page.p><br>
			<br><br><br>
			<p style="display:inline"><b>&nbsp;&nbsp;2. PRODUCT CONTENTS:</b> All information and representations described or relating to the ingredients and contents of products have been supplied solely by the vendor who creates the product. Chocolate.org makes no warranties or representations that such information is complete or correct. Customers should rely solely on the ingredients listed on the product packaging. All questions or concerns about ingredients will be directed to the vendor.</p><br>
			<button id="terms_more" class="buton" onclick="readMoreTerms(); return false;">Read more...</button>
			<span id="terms_content" style="display:none;">
			<br><br><br>
			<b>&nbsp;&nbsp;3. EMAIL AND NEWSLETTERS:</b> If you have signed up for our newsletters you will begin to receive email updates from us. You will have the choice to stop receiving such emails. Chocolate.org respects your privacy and will not share your personal information with any third party advertisers without your consent. For more information please read our privacy policy. You can opt out of receiving emails by visiting the link provided at the top of every email received.<br>
			<br><br><br>
			<b>&nbsp;&nbsp;4. ELECTRONIC COMMUNICATIONS</b>When you visit Chocolate.org or send e-mails to us, you are communicating with us electronically. You consent to receive communications from us electronically. We will communicate with you by e-mail or by posting notices on this site. You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.<br>
			<br><br><br>
			<b>&nbsp;&nbsp;5. COPYRIGHT:</b> All content included on this site, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of Chocolate.org, LLC or its content suppliers and protected by United States and international copyright laws. The compilation of all content on this site is the exclusive property of Chocolate.org and protected by U.S. and international copyright laws. All software used on this site is the property of Chocolate.org or its software suppliers and protected by United States and international copyright laws<br>
			<br><br><br>
			<b>&nbsp;&nbsp;6.SITE POLICIES, MODIFICATION, AND SEVERABILITY:</b> Please review our other policies, such as our Privacy Statement, posted on this site. These policies also govern your visit to Chocolate.org. We reserve the right to make changes to our site, policies, and these Conditions of Use at any time. If any of these conditions shall be deemed invalid, void, or for any reason unenforceable, that condition shall be deemed severable and shall not affect the validity and enforceability of any remaining condition.
			</span>
			<button id="terms_less" class="buton" style="display:none;" onclick="readLessTerms(); return false;">Read less...</button>
		</div>
		
	</section>
	

	
	</section>
	<!-- Footer -->
<footer id="ff">
	<hr>
	<br><b>Help</b>
	<br>
	<span onclick="loadDoc('footer/about.php');">
			<a href="#"><b>About Us</b></a></span>
	<br>
	<span onclick="loadDoc('footer/contact.php');">
			<a href="#"><b>Contact Us</b></a></span>
	<br>
	<span onclick="loadDoc('footer/pol.php');">
			<a href="#"><b>Privacy Policy</b></a></span>
	<br>
	<span onclick="loadDoc('footer/terms.php');">
			<a href="#"><b>Terms of Use</a></span>
	<br>&copy; <b>All you need is love...and some chocolate!</b>
	</footer>
</body>
</html>