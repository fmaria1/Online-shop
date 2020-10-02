<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Bakery Store</title>
		<link rel="icon" href="imagini/652x450_104707-bomboane-cu-ciocolata-si-alune.jpg" sizes="16x16" type="image/gif"/>
	   <link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
	   
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php">
				<img src="imagini/GuiltyPleasure_LOGO.jpg" width="300" height="50" alt="GuiltyPleasure_LOGO.jpg"/> </a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="#varietati">Master Chocolatier Collection</a></li>
				<li><a href="#principal">Our Bakers</a></li>
				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3 col-xs-3">No</div>
									<div class="col-md-3 col-xs-3">Product Image</div>
									<div class="col-md-3 col-xs-3">Product Name</div>
									<div class="col-md-3 col-xs-3">Price in $.</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
						<li class="divider"></li>
						<li><a href="customer_order.php" style="text-decoration:none; color:blue;">Orders</a></li>
						
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
	</div>
	</div>
<section id="main">
		<br><br>
		<div class="text_box">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INDULGE IN CHOCOLATE<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-FROM THE WORLD’S FINEST COVERTURE TO BRANDS YOU KNOW AND LOVE…
		</div>
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>


<section id="varietati">
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
				<div id="get_category">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<div id="get_ing">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Ingredients</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
						<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="product_images/images.JPG"/>
								</div>
								<div class="panel-heading">$.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
					</div>
					<div class="panel-footer">&copy; 2016</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
	</section>
	<section id="principal">
	<section id="sectiunea1">
		<hr id="hr1"> 
		<h1> Our Bakers </h1>
		<hr id="hr2">
		<div class="box">
			<img class="imag" src="imagini/Australia-Winner-Daria-Nechiporenko-PP_0.jpg" alt="Australia-Winner-Daria-Nechiporenko-PP_0.jpg" width="150" height="210"/>
			<h3 style="text-align:center;"> DARIA NECHIPORENKO</h3>
			<p style="display:inline"><b>&nbsp;&nbsp;AUSTRALIAN WINNER</p><br>
			<p style="display:inline"><b>&nbsp;&nbsp;"In the future, finding the right flavours won’t be too difficult. The challenge lies in finding the right shapes and formats to put these flavours in."</p><br>
			<b>-Age: 38</b></br><b>-Nationality: Australian</b></br><b>-Pastry Chef at Prime restaurant, GPO</b></br>
			</span>
		</div>
	</section>
	
		<br><br>
	<section id="sectiunea2">
		<div class="box">
			<img class="imag" src="imagini/UK-Winner-Barry-Johnson-PP_0.jpg" alt="UK-Winner-Barry-Johnson-PP_0.jpg" width="150" height="210"/>
			<h3 style="text-align:center;"> BARRY JOHNSON</h3>
			<p style="display:inline"><b>&nbsp;&nbsp;UK AND IRISH WINNER</p><br>
			<p style="display:inline"><b>&nbsp;&nbsp;"My pastry was my strength piece for this whole competition. My techniques, and the use of non-dairy products and fresh flavours made my chocolate taste really come through."</p><br>
			
			<b>&nbsp;&nbsp;-Nationality: British<br>
			<b>&nbsp;&nbsp;-Lecturer at The National Bakery School, London South Bank University<br>
			<b>&nbsp;&nbsp;- Started his brand ‘The Cocoa Lab’ in 2016, specialising in expertly crafted chocolates<br>
			<b>&nbsp;&nbsp;- Winner of the 2014 UK Pastry Open ‘taste’</b> - Achieved the highest marks at the 2014 European Pastry Cup
			</span>
		
		</div>
	</section>
		<br><br>
	<section id="sectiunea3">
		<div class="box">
			<img class="imag" src="imagini/WCM-Korea-Winner-Eun-Hye-Kim-PP_0.jpg" alt="WCM-Korea-Winner-Eun-Hye-Kim-PP_0.jpg" width="150" height="210"/>
			<h3 style="text-align:center;"> EUN-HYE KIM</h3>
			<p style="display:inline"><b>&nbsp;&nbsp;THE KOREAN CHOCOLATE MASTER</p><br>
			<p style="display:inline"><b>&nbsp;&nbsp;"My pastry was my strength piece for this whole competition. My techniques, and the use of non-dairy products and fresh flavours made my chocolate taste really come through."</p><br>
			
			<b>&nbsp;&nbsp;-Age: 31<br>
			<b>&nbsp;&nbsp;-Nationality: Korean<br>
			<b>&nbsp;&nbsp;- Guylian Chocolate Café<br>
			<b>&nbsp;&nbsp; - Huntervalley Chocolate Festival: Chocolate showpiece Bronze</b></br> - IYCC: Chocolate showpiece Silver
			</span>
		</div>
	</section>
		<br><br>
	<section id=:"sectiunea4">
		<div class="box">
			<img class="imag" src="imagini/North-Africa-Winner-Yassine-Lamjarred-PP.jpg" alt="North-Africa-Winner-Yassine-Lamjarred-PP.jpg" width="150" height="210"/>
			<h3 style="text-align:center;"> YASSINE LAMJARRED</h3>
			<p style="display:inline"><b>&nbsp;&nbsp;THE MOROCCAN CHOCOLATE MASTER</p><br>
			<p style="display:inline"><b>&nbsp;&nbsp;"The competition’s theme was quite the challenge. You really need to free your imagination and break barriers to create your vision of the future. But I believe that passion and love for what you do will always be rewarded in the end." </p><br>
			
			<b>&nbsp;&nbsp;-Age: 26<br>
			<b>&nbsp;&nbsp;-Nationality: Moroccan<br>
			<b>&nbsp;&nbsp;- Pastry Chef<br>
			<b>&nbsp;&nbsp; - Pastry Chef</b> </br>
			</span>
		</div>
	</section>
		<br>
	
	</section>
</body>
<footer id="ff">
		  <div class="container">
			<div class="row">
			  <div class="col-lg-8 col-md-8 col-sm-12">
			  <h6 class="text-uppercase font-weight-bold">Additional Information</h6>
			  <p> We feature handmade, artisan chocolates and gift baskets from independent chocolate shops across the USA. Our goal is to make unique chocolate’s available to gift buyers and chocolate lovers. We believe that the finest chocolate is found in small chocolate shops around the globe and celebrate the fact that every chef has a unique approach. Our vendors provide a product that is more fresh, more artistic, and less common than factory-made chocolate.</p>
			  
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
			  <h6 class="text-uppercase font-weight-bold">Contact</h6>
			  <p>
					<span onclick="loadDoc('footer/about.php');">
							<a href="#">About Us</a></span>
					<br>
					<span onclick="loadDoc('footer/contact.php');">
							<a href="#">Contact Us</a></span>
					<br>
					<span onclick="loadDoc('footer/pol.php');">
							<a href="#">Privacy Policy</a></span>
					<br>
					<span onclick="loadDoc('footer/terms.php');">
							<a href="#">Terms of Use</a></span>
					<br>
			</div>
		  </div>
		  <div class="footer-copyright text-center">&copy; All you need is love...and some chocolate!</div>
		</footer>


</html>
</html>















































