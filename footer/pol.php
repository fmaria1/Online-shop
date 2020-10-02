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
		<h1> Privacy Policy </h1>
		<hr id="hr2">
		<div class="box">
			
			<h3 style="text-align:center;"> By visiting Guilty Pleasure, you are accepting the practices described in this Privacy Statement.</h3>
			<br><br><br>
			<p style="display:inline"><b>&nbsp;&nbsp;WHAT PERSONAL INFORMATION ABOUT CUSTOMERS DOES CHOCOLATE.ORG GATHER?:</b>For your long-term privacy and security of your credit card, we do not save credit card numbers after orders are complete.

We use other information that you provide for such purposes as responding to your requests, customizing future website enhancements for you, improving our products, and communicating with you. </p><br>
			<br><br><br>
			<p style="display:inline"><b>&nbsp;&nbsp;AUTOMATIC INFORMATION:</b>Like many other web sites, we use "cookies," and we obtain certain types of information when your Web browser accesses www.chocolate.org such as the referring page and your IP address </p><br>
			<button id="terms_more" class="buton" onclick="readMoreTerms(); return false;">Read more...</button>
			<span id="terms_content" style="display:none;">
			<br><br><br>
			<b>&nbsp;&nbsp;E-MAIL COMMUNICATIONS:</b> To help us improve the quality of our email content, we may receive a confirmation when you open e-mail from Chocolate.org if your computer supports such capabilities.

Emails sent for promotional purposes are sent ONLY to those users who opt-in to receive them. Every email for this purpose also contains a link to change your email preferences, and/or opt-out..<br>
			<br><br><br>
			<b>&nbsp;&nbsp;DOES CHOCOLATE.ORG SHARE THE INFORMATION IT RECEIVES?:</b>Information about our customers is an important part of our business, and we do not sell it to others. We share customer information only as described below. <br>
			<br><br><br>
			<b>&nbsp;&nbsp;AGENTS:</b> We employ other companies and individuals to perform functions on our behalf. Examples include fulfilling orders, delivering packages, sending postal mail and e-mail, providing marketing assistance, processing credit card payments, and providing customer service. They have access to personal information needed to perform their functions, but may not use it for other purposes.<br>
			<br><br><br>
			<b>&nbsp;&nbsp;BUSINESS TRANSFERS:</b> As we continue to develop our business, we may be acquired by or purchase other businesses. In such transactions, customer information generally is one of the transferred business assets but remains subject to the promises made in any pre-existing Privacy Notice (unless the customer consents otherwise).
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