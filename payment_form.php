<?php
#this is Login form page , if user is already logged in then we will not allow user to access this page by executing isset($_SESSION["uid"])
#if below statment return true then we will send user to their profile.php page
if (isset($_SESSION["uid"])) {
	header("location:profile.php");
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
		<style></style>
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php">
				<img src="imagini/GuiltyPleasure_LOGO.jpg" width="300" height="50" alt="GuiltyPleasure_LOGO.jpg"/> </a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Master Chocolatier Collection</a></li>
				<li><a href="index.php">Our Bakers</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Payment Form</div>
					<div class="panel-body">
						<!--User Login Form-->
						<form action="payment_form.php">
							
							<p><br/></p>
							<h1>Your payment will be refunded! </h1>
                                      

							<div><a href="pay_success.php?register=1" type="submit" class="btn btn-success" style="float:right;"  Value="Send order!">Send order!</a></div>	
							<!--<input type="submit" class="btn btn-success"style="float:right;" Value="Send order!">-->

							<!--If user dont have an account then he/she will click on create account button-->
							<div><a href="pay_failed.php?register=1">Cancel order</a></div>						
						</form>
				</div>
				<div class="panel-footer"><div id="e_msg"></div></div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>
