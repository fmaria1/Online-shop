<?php
include "db.php";

session_start();

#Login script is begin here
#If user given credential matches successfully with the data available in database then we will echo string login_success
#login_success string will go back to called Anonymous funtion $("#login").click() 
if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = $_POST["email"];
	$password = md5($_POST["password"]);
	$sql = "SELECT USER_ID,FIRST_NAME,LAST_NAME,EMAIL,PASSWORD,MOBILE,ADDRESS1,ADDRESS2 FROM user_info
	WHERE email = '$email' AND password = '$password'";
	$run_query = oci_parse($con,$sql);
	oci_execute($run_query);
	$row = oci_fetch_array($run_query);
	//if user record is available in database then $count will be equal to 1
	while($row!=false){
		$_SESSION["uid"] = oci_result($run_query,'USER_ID');
		$_SESSION["name"] = oci_result($run_query,'FIRST_NAME');
		$ip_add = getenv("REMOTE_ADDR");
		//we have created a cookie in login_form.php page so if that cookie is available means user is not login
			if (isset($_COOKIE["product_list"])) {
				$p_list = stripcslashes($_COOKIE["product_list"]);
				//here we are decoding stored json product list cookie to normal array
				$product_list = json_decode($p_list,true);
				for ($i=0; $i < count($product_list); $i++) { 
					//After getting user id from database here we are checking user cart item if there is already product is listed or not
					$verify_cart = "SELECT CART_ID FROM cart 
					WHERE user_id = '$_SESSION[uid]' AND PRODUCTS_PROD_ID = '.$product_list[$i]'";
					$result  = oci_parse($con,$verify_cart);
					oci_execute($result);
					$row = oci_fetch_array($result);
					if(oci_num_rows($result) < 1){
						//if user is adding first time product into cart we will update user_id into database table with valid id
						$update_cart ="BEGIN
										CART_PACK.update_cart('".$_SESSION[uid]."','".$ip_add."','-1');
										END;
										";

						//"UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add = '$ip_add' AND user_id = -1";
						$run_query = oci_parse($con,$update_cart);
						oci_execute($run_query);
						oci_commit($con);
					}else{
						//if already that product is available into database table we will delete that record
						$delete_existing_product = "BEGIN
														CART_PACK.delete_cart('-1','".$ip_add."','".$product_list[$i]."');
													END;
													";
						//"DELETE FROM cart WHERE user_id = -1 AND ip_add = '$ip_add' AND p_id = ".$product_list[$i];
						$run_query = oci_parse($con,$delete_existing_product);
						oci_execute($run_query);
						oci_commit($con);
					}
				}
				//here we are destroying user cookie
				setcookie("product_list","",strtotime("-1 day"),"/");
				//if user is logging from after cart page we will send cart_login
				echo "cart_login";
				exit();
				
			}
			//if user is login from page we will send login_success
			echo "login_success";
			exit();
		}
		//	echo "<span style='color:red;'>Please register before login..!</span>";
		//	exit();
		
	
}

?>