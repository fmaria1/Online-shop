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
			table tr td {padding:10px;}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="index.php">
				<img src="imagini/GuiltyPleasure_LOGO.jpg" width="300" height="50" alt="GuiltyPleasure_LOGO.jpg"/> </a>
			</div>
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
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Customer Order details</h1>
						<hr/>
						<?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];
							$orders_list = "SELECT o.order_id,o.USER_INFO_USER_ID,o.product_id,o.qty,o.trx_id,o.p_status,p.prod_title,p.prod_price,p.prod_image 
							FROM orders o,products p WHERE o.USER_INFO_USER_ID='$user_id' AND o.product_id=p.prod_id and o.p_status='completed'" ;
							$query = oci_parse($con,$orders_list);
							oci_execute($query);
							$r=oci_commit($con);

								while ($row=oci_fetch_array($query)) 
								{
									$prod_title=oci_result($query,'PROD_TITLE');
									$prod_price=oci_result($query,'PROD_PRICE');
									$prod_img=oci_result($query,'PROD_IMAGE');
									$prod_qty=oci_result($query,'QTY');
									$prod_trx=oci_result($query,'TRX_ID');
									?>
										<div class="row" >
											
											<div class="col-md-6" >
												<table >
													<tr><td>Product Name</td><td><b><?php echo $row["PROD_TITLE"]; ?></b> </td></tr>
													<tr><td>Product Image</td><td><b><img  src="product_images/<?php echo $row['PROD_IMAGE']; ?>" class="img-responsive img-thumbnail"/></b> </td></tr>
													<tr><td>Product Price</td><td><b><?php echo "$ ".$row["PROD_PRICE"]; ?></b></td></tr>
													<tr><td>Quantity</td><td><b><?php echo $row["QTY"]; ?></b></td></tr>
													<tr><td>Transaction Id</td><td><b><?php echo $row["TRX_ID"]; ?></b></td></tr>
												</table>
											</div>
										</div>
									<?php
								}
							
						?>
						
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
















































