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
		<h1> Contact Us </h1>
		<hr id="hr2">
		<div class="box">
			<img class="imag" src="imagini/phone-call-feature-red-890x506.jpg" alt="phone-call-feature-red-890x506.jpg" width="400" height="210"/>
			<h3 style="text-align:center;"> Have any questions or concerns?</h3>
			<p style="display:inline"><b>&nbsp;&nbsp;We’re here to help. Please fill out the form and our customer service team will be happy to provide assistance.:</b> </p><br>
			<p style="display:inline"><b>&nbsp;&nbsp;</b>We will respond during normal business hours (9:00AM to 3:00PM PST) in the order the inquiry is received. We are also available via phone for general inquiries during normal business hours at: +1 (949) 398-2206. </p><br>
			
		</div>
		
		
	</section>
	

	
	</section>
	<!-- Footer -->
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