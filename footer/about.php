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
		<h1> About us </h1>
		<hr id="hr2">
		<div class="box">
			<h3 style="text-align:center;"> WELCOME TO GUILY PLEASURE</h3>
			<br><br><br>
			<p style="display:inline"><b>&nbsp;&nbsp;We feature handmade, artisan chocolates and gift baskets from independent chocolate shops across the USA. Our goal is to make unique chocolate’s available to gift buyers and chocolate lovers. We believe that the finest chocolate is found in small chocolate shops around the globe and celebrate the fact that every chef has a unique approach. Our vendors provide a product that is more fresh, more artistic, and less common than factory-made chocolate.</b> </p><br>
			<br><br><br>
			<p style="display:inline"><b>&nbsp;&nbsp;Supporting Small Businesses:</b> When customers order chocolate from us, they support a small American business. We are proud of the fact that we help to promote small companies in the USA and Canada.</p><br>
			<br><br><br>
			<b>&nbsp;&nbsp;Our Partners:</b> Our awesome chocolate shops enable us to offer a wide range of products: Dark chocolate, truffles, chocolate covered popcorn and many varieties in-between. We believe that there is something for everybody in our vast collection of gifts. With shipping locations that span the map, Chocolate.org is able to offer local delivery to most USA locations.<br>
			<button id="terms_more" class="buton" onclick="readMoreTerms(); return false;">Read more...</button>
			<span id="terms_content" style="display:none;">
			<br><br><br>
			<b>&nbsp;&nbsp;Our Employees:</b>Our company is made up of a small team of chocolate enthusiasts, marketing professionals, and customer support representatives based in Newport Beach, California. We focus on helping customers, finding exciting chocolate creations, and improving our operations to provide reliability to buyers and sellers. <br>
			<br><br><br>
			<b>&nbsp;&nbsp;Our Customer Service:</b> Happy customers are the foundation of our marketplace, and we strive to prove to that we are the trusted source for buying chocolate online. We are proud to focus on the customer while the chocolate chef focuses on fulfillment.

Chocolate.org is a member of the Better Business Bureau..<br>
			<br><br><br>
			<b>&nbsp;&nbsp;Shopping Features:</b> Chocolate.org caters to the gift buyer. We allow the customer to select a delivery date that fits his/her needs, ship to multiple recipients, and include a gift note.
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