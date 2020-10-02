<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

if (isset($_GET["st"])) {

	$trx_id = $_GET["tx"];
		$p_st = $_GET["st"];
		$amt = $_GET["amt"];
		$cc = $_GET["cc"];
		$cm_user_id = $_GET["cm"];
		$c_amt = $_COOKIE["ta"];
	if ($p_st == "Completed") {

		

		include_once("db.php");
		$sql = "SELECT p_id,qty FROM cart WHERE user_id = '$cm_user_id'";
		$query = oci_parse($con,$sql);
		oci_connect($query);
		if (oci_num_rows($query) > 0) {
			# code...
			while ($row=oci_fetch_array($query)) {
			$product_id[] = $row["p_id"];
			$qty[] = $row["qty"];
			}

			for ($i=0; $i < count($product_id); $i++) { 
				$sql ="BEGIN
							ORDER_PACK.insert_product('".$cm_user_id."','".$product_id[$i]."','".$qty[$i]."','".$trx_id."','".$p_st."');
						END;
						";
				//"INSERT INTO orders (user_id,product_id,qty,trx_id,p_status) VALUES ('$cm_user_id','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st')";
				$run_query = oci_parse($con,$sql);
				oci_connect($run_query);
				oci_commit($con);
			}

			$sql ="BEGIN
						CART_PACK.delete_cart_pr('".$cm_user_id."');
					END;
					";
			//"DELETE FROM cart WHERE user_id = '$cm_user_id'";
			$run_query = oci_parse($con,$sql);
			oci_connect($run_query);
			oci_commit($con);
			if ($run_query) {
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
											<h1>Thank you! </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your payment process is 
											successfully completed and your Transaction id is <b><?php echo $trx_id; ?></b><br/>
											you can continue your Shopping <br/></p>
											<a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php
			}
		}else{
			header("location:index.php");
		}
		
	}
}



?>

















































