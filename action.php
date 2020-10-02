<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["category"])){
	$category_query = "SELECT CAT_ID,CAT_TITLE FROM categories";
	$run_query = oci_parse($con,$category_query) ;
	oci_execute($run_query);
	$r=oci_commit($con);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
	
	while($row = oci_fetch_array($run_query)){
		$cid = oci_result($run_query,'CAT_ID');
		$cat_name = oci_result($run_query,'CAT_TITLE');

		echo 	"<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>";
		//"<li><option value='".oci_result($run_query,'CAT_ID')."'>".oci_result($run_query,'CAT_TITLE')."
		//</option></li>";
	}
	echo '</div';
}




if(isset($_POST["ing"])){
	$ing_query = "SELECT ING_ID,ING_TITLE FROM ingredients";
	$run_query = oci_parse($con,$ing_query);
	oci_execute($run_query);
	$r=oci_commit($con);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Ingredients</h4></a></li>
	";
	
	while($row = oci_fetch_array($run_query)){
		$bid =oci_result($run_query,'ING_ID');
		$ing_name = oci_result($run_query,'ING_TITLE');

		echo "<li><a href='#' class='ing' bid='$bid'>$ing_name</a></li>";
	}
	echo "</div>";
	
}


if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = oci_parse($con,$sql);
	oci_execute($run_query);
	$r=oci_commit($con);
	$count = oci_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$prod_query = "SELECT a.PROD_ID,a.PROD_TITLE,a.CATEGORIES_CAT_ID,a.PROD_PRICE,a.PROD_IMAGE,a.DESCRIBTION_DESC_ID,a.STOC,a.FABRICATION_DATE,a.EXPIRATION_DATE,b.DESC_TICLE 
	FROM PRODUCTS a,DESCRIBTION b 
	WHERE a.DESCRIBTION_DESC_ID=b.DESC_ID";

	$run_query = oci_parse($con,$prod_query);

	oci_execute($run_query);
	$r=oci_commit($con);

		while($row = oci_fetch_array($run_query))
		{

		$pro_id =oci_result($run_query,'PROD_ID');
		$pro_title = oci_result($run_query,'PROD_TITLE');
		$pro_cat   =  oci_result($run_query,'CATEGORIES_CAT_ID');
		$pro_price =oci_result($run_query,'PROD_PRICE');
		$pro_image = oci_result($run_query,'PROD_IMAGE');
		$pro_desc=oci_result($run_query,'DESC_TICLE');
		$pro_stoc=oci_result($run_query,'STOC');
		$pro_fab=oci_result($run_query,'FABRICATION_DATE');
		$pro_exp=oci_result($run_query,'EXPIRATION_DATE');
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'><img src='product_images/$pro_image' style='width:160px; height:250px;'/></div> 
									
								<div class='panel-title' style='color:black;'>  &nbsp; &nbsp;<b><u>Information:</b></u> </div>
								<div class='panel-body' style='color:black;'>&nbsp;<b>Description:</b></br>$pro_desc</br></br>
																			&nbsp;<b>Fabrication & expiration date:</b></br>$pro_fab -> $pro_exp</br></br>
																			&nbsp;<b>Stoc:</b></br>$pro_stoc

								 </div>
								
								
								<div class='panel-heading'>$$pro_price
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
		}
	

}





if(isset($_POST["get_selected_Category"]) || isset($_POST["get_selected_Ingredient"]) || isset($_POST["search"])){
	if(isset($_POST["get_selected_Category"])){
		$id = $_POST["cat_id"];
		$sql="SELECT a.PROD_ID,a.PROD_TITLE,a.PROD_PRICE,a.PROD_IMAGE,a.STOC,a.FABRICATION_DATE,a.EXPIRATION_DATE,b.DESC_TICLE 
		FROM PRODUCTS a,DESCRIBTION b 
		WHERE a.CATEGORIES_CAT_ID = '$id' AND a.DESCRIBTION_DESC_ID=b.DESC_ID";		
		$run_query = oci_parse($con,$sql);
		oci_execute($run_query);
		$r=oci_commit($con);
		while($row = oci_fetch_array($run_query))
		{
			$pro_id =oci_result($run_query,'PROD_ID');
			$pro_title = oci_result($run_query,'PROD_TITLE');
			$pro_price =oci_result($run_query,'PROD_PRICE');
			$pro_image = oci_result($run_query,'PROD_IMAGE');
			$pro_stoc=oci_result($run_query,'STOC');
			$pro_fab=oci_result($run_query,'FABRICATION_DATE');
			$pro_exp=oci_result($run_query,'EXPIRATION_DATE');
			$pro_desc=oci_result($run_query,'DESC_TICLE');
	

				echo "
					<div class='col-md-4'>
								<div class='panel panel-info'>
									<div class='panel-heading'>$pro_title</div>
									<div class='panel-body'><img src='product_images/$pro_image' style='width:160px; height:250px;'/></div> 
										
									<div class='panel-title' style='color:black;'>  &nbsp; &nbsp;<b><u>Information:</b></u> </div>
									<div class='panel-body' style='color:black;'>&nbsp;<b>Description:</b></br>$pro_desc</br></br>
																				&nbsp;<b>Fabrication & expiration date:</b></br>$pro_fab -> $pro_exp</br></br>
																				&nbsp;<b>Stoc:</b></br>$pro_stoc
	
									 </div>
									
									
									<div class='panel-heading'>$$pro_price
										<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
									</div>
								</div>
							</div>	
				";
			}
	
	}else if(isset($_POST["get_selected_Ingredient"])){
		$id = $_POST["ing_id"];
		$sql = "SELECT a.PROD_ID,a.PROD_TITLE,a.PROD_PRICE,a.PROD_IMAGE,a.STOC,a.FABRICATION_DATE,a.EXPIRATION_DATE FROM PRODUCTS a
		join ing_id_fk b on (a.PROD_ID=b.PRODUCTS_PROD_ID)
		join ingredients c on (b.INGREDIENTS_ING_ID=c.ING_ID)
		 WHERE c.ING_ID = '$id'";

		$run_query = oci_parse($con,$sql);
		oci_execute($run_query);
		$r=oci_commit($con);
		while($row = oci_fetch_array($run_query))
		{

		$pro_id =oci_result($run_query,'PROD_ID');
		$pro_title = oci_result($run_query,'PROD_TITLE');
		$pro_price =oci_result($run_query,'PROD_PRICE');
		$pro_image = oci_result($run_query,'PROD_IMAGE');
		$pro_stoc=oci_result($run_query,'STOC');
		$pro_fab=oci_result($run_query,'FABRICATION_DATE');
		$pro_exp=oci_result($run_query,'EXPIRATION_DATE');

			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'><img src='product_images/$pro_image' style='width:160px; height:250px;'/></div> 
									
								<div class='panel-title' style='color:black;'>  &nbsp; &nbsp;<b><u>Information:</b></u> </div>
								<div class='panel-body' style='color:black;'>&nbsp;<b>Description:</b></br>Cake with some delicious ing</br></br>
																			&nbsp;<b>Fabrication & expiration date:</b></br>$pro_fab -> $pro_exp</br></br>
																			&nbsp;<b>Stoc:</b></br>$pro_stoc

									</div>
								
								
								<div class='panel-heading'>$$pro_price
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
		}

	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT a.PROD_ID,a.PROD_TITLE,a.PROD_PRICE,a.PROD_IMAGE,a.STOC,a.FABRICATION_DATE,a.EXPIRATION_DATE,b.DESC_TICLE 
		FROM PRODUCTS a,DESCRIBTION b 
		WHERE a.PROD_KEYWORDS LIKE '%$keyword%'AND a.DESCRIBTION_DESC_ID=b.DESC_ID";
		$run_query = oci_parse($con,$sql);
		oci_execute($run_query);
		$r=oci_commit($con);
		while($row = oci_fetch_array($run_query))
		{

		$pro_id =oci_result($run_query,'PROD_ID');
		$pro_title = oci_result($run_query,'PROD_TITLE');
		$pro_price =oci_result($run_query,'PROD_PRICE');
		$pro_image = oci_result($run_query,'PROD_IMAGE');
		$pro_stoc=oci_result($run_query,'STOC');
		$pro_fab=oci_result($run_query,'FABRICATION_DATE');
		$pro_exp=oci_result($run_query,'EXPIRATION_DATE');

			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'><img src='product_images/$pro_image' style='width:160px; height:250px;'/></div> 
									
								<div class='panel-title' style='color:black;'>  &nbsp; &nbsp;<b><u>Information:</b></u> </div>
								<div class='panel-body' style='color:black;'>&nbsp;<b>Description:</b></br>Cake with some delicious ing</br></br>
																			&nbsp;<b>Fabrication & expiration date:</b></br>$pro_fab -> $pro_exp</br></br>
																			&nbsp;<b>Stoc:</b></br>$pro_stoc

									</div>
								
								
								<div class='panel-heading'>$$pro_price
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
		}
	}
	

	
	}
	


	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE PRODUCTS_PROD_ID = '$p_id' AND USER_ID = '$user_id'";
		$run_query = oci_parse($con,$sql);
		oci_execute($run_query);
		$r=oci_commit($con);
		$count = oci_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";
		} else { 
			$sql="BEGIN
					CART_PACK.insert_product('".$p_id."','".$ip_add."','".$user_id."','1');
				  END;
				 ";
			/*$sql = "INSERT INTO `CART`
			(`PRODUCTS_PROD_ID`, `ip_add`, `USER_INFO_USER_IDD`, `QTY`) 
			
			VALUES ('$p_id','$ip_add','$user_id','1')";*/
			$run_query = oci_parse($con,$sql);
			oci_execute($run_query);
			$r=oci_commit($con);
			if($run_query){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT * FROM CART
			 WHERE ip_add = '$ip_add' AND PRODUCTS_PROD_ID = '$p_id' AND  USER_ID= -1";
			$run_query = oci_parse($con,$sql);
			oci_execute($run_query);
			if (oci_num_rows($run_query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql="BEGIN
					CART_PACK.insert_product('".$p_id."','".$ip_add."','-1','1');
				  END;
				 ";
			/*$sql = "INSERT INTO `CART`
			(`PRODUCTS_PROD_ID`, `ip_add`, `USER_INFO_USER_IDD`, `QTY`)
			VALUES ('$p_id','$ip_add','-1','1')";*/
			$run_query = oci_parse($con,$sql);
			oci_execute($run_query);
			$r=oci_commit($con);
			if($run_query){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully...!</b>
					</div>
				";
				exit();
			}			
		}	
	}
//Count User cart item
//if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	//if (isset($_SESSION["uid"])) {
	//	$sql = "SELECT * FROM cart WHERE user_id = $_SESSION[uid]";
		/*$sql = "DECLARE 
		count_item number;
		begin
		SELECT COUNT(*) 
		into count_item 
		FROM cart WHERE user_id = '$_SESSION[uid]';
		end;";*/
	//}else{
		//$sql = "SELECT * FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		/*$sql = "DECLARE
				count_item number;
				begin
				SELECT COUNT(*) into count_item 
				FROM cart
				 WHERE ip_add = '$ip_add' AND user_id < 0;
				end;";*/
	
	/*}	
	$query = oci_parse($con,$sql);
	oci_execute($query);
	$count_item=oci_num_rows($query);

	$row = oci_fetch_array($query);
	

	echo $row[$count_item];
	

	
	oci_free_statement($query);
	exit();
}*/
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.PROD_ID,a.PROD_TITLE,a.PROD_PRICE,a.PROD_IMAGE,b.CART_ID,b.QTY FROM products a,cart b 
		WHERE a.PROD_ID=b.PRODUCTS_PROD_ID AND b.USER_ID='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.PROD_ID,a.PROD_TITLE,a.PROD_PRICE,a.PROD_IMAGE,b.CART_ID,b.QTY FROM products a,cart b 
		WHERE a.PROD_ID=b.PRODUCTS_PROD_ID AND b.ip_add='$ip_add' AND b.USER_ID < 0";
	}
	//$sql="SELECT * FROM products a,cart b WHERE a.PROD_ID=b.PRODUCTS_PROD_ID ";
	$run_query = oci_parse($con,$sql);
	oci_execute($run_query);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		//if (oci_num_rows($run_query) > 0) {
			$n=0;
			while ($row=oci_fetch_array($run_query)) {
				$n++;
				$product_id =oci_result($run_query,'PROD_ID');
				$product_title = oci_result($run_query,'PROD_TITLE');
				$product_price =oci_result($run_query,'PROD_PRICE');
				$product_image = oci_result($run_query,'PROD_IMAGE');				
				$cart_item_id = oci_result($run_query,'CART_ID');
				$qty =  oci_result($run_query,'QTY');
				echo '
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3"><img class="img-responsive" src="product_images/'.$product_image.'" /></div>
						<div class="col-md-3">'.$product_title.'</div>
						<div class="col-md-3">$'.$product_price.'</div>
					</div>';
				
			}
			?>
				<a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		
	}
	if (isset($_POST["checkOutDetails"])) {
		//if (oci_num_rows($run_query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=oci_fetch_array($run_query)) {
					$n++;
					$product_id =oci_result($run_query,'PROD_ID');
					$product_title = oci_result($run_query,'PROD_TITLE');
					$product_price =oci_result($run_query,'PROD_PRICE');
					$product_image = oci_result($run_query,'PROD_IMAGE');				
					$cart_item_id = oci_result($run_query,'CART_ID');
					$qty =  oci_result($run_query,'QTY');

					echo 
						'<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$product_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="product_images/'.$product_image.'"></div>
								<div class="col-md-2">'.$product_title.'</div>
								<div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
							</div>';
				}
				

				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
				if (!isset($_SESSION["uid"])) {
					echo '<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Ready to Checkout" >
							</form>';
					
				}else if(isset($_SESSION["uid"])){
					//Paypal checkout form
				
						echo "</form>
							<form method='post' action='payment_form.php'>";		  
							$x=0;
							$sql = "SELECT a.PROD_ID,a.PROD_TITLE,a.PROD_PRICE,a.PROD_IMAGE,b.CART_ID,b.QTY 
							FROM products a,cart b WHERE a.PROD_ID=b.PRODUCTS_PROD_ID AND b.USER_ID='$_SESSION[uid]'";
							$query = oci_parse($con,$sql);
							oci_execute($query);
							while($row=oci_fetch_array($query)){
								$x++;
								echo  	
									'<input type="hidden" name="item_name_'.$x.'" value="'.oci_result($run_query,'PROD_TITLE').'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.oci_result($run_query,'PROD_PRICE').'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.oci_result($run_query,'QTY').'">';
								}
							  
							echo   
								'
									
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									<center><input type="submit"  name="send_order" class="btn btn-info btn-lg" value="Next step" >
							</form></center>';
				}
			}
	}
	
	


//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql="BEGIN
				CART_PACK.delete_product('".$remove_id."','".$_SESSION[uid]."');
			END;
			";
		//$sql = "DELETE FROM cart WHERE PRODUCTS_PROD_ID = '$remove_id' AND USER_INFO_USER_ID = '$_SESSION[uid]'
	}else{
		$sql="BEGIN
				CART_PACK.delete_product_g('".$remove_id."','".$ip_add."');
			  END;
			  ";
		//$sql = "DELETE FROM cart WHERE PRODUCTS_PROD_ID = '$remove_id' AND ip_add = '$ip_add'
	}
	$run_query = oci_parse($con,$sql);
	oci_execute($run_query);
	$r=oci_commit($con);
	if($run_query){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "BEGIN
		CART_PACK.update_product('".$qty."','".$update_id."','".$_SESSION[uid]."');
		END;
		";
		//UPDATE cart SET qty='$qty' WHERE PRODUCTS_PROD_ID = '$update_id' AND USER_INFO_USER_ID = '$_SESSION[uid]'

		}else{
		$sql = "BEGIN
				CART_PACK.update_product_g('".$qty."','".$update_id."','".$ip_add."');
				END;
				";
		//$sql = "UPDATE cart SET qty='$qty' WHERE PRODUCTS_PROD_ID = '$update_id' AND ip_add = '$ip_add'

		}
		$run_query = oci_parse($con,$sql);
		oci_execute($run_query);
		$r=oci_commit($con);

		if($run_query){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}


oci_close($con);


?>






