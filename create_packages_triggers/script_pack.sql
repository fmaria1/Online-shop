CREATE OR REPLACE PACKAGE CART_PACK AS
	TYPE T_CURSOR is ref cursor;

	procedure insert_product(
						a_prod products.prod_id%type,
						a_ip cart.ip_add%type,
						a_user cart.user_id%type,
						a_qty cart.qty%type);

	function GET_COUNT(u_id cart.USER_ID%type) return number;
	function GET_COUNT_G(u_ip_add cart.ip_add%type) return number;
	procedure delete_product(a_id cart.PRODUCTS_PROD_ID%type,
						 u_id cart.USER_ID%type);
	procedure delete_product_g(a_id cart.PRODUCTS_PROD_ID%type,
						 u_id cart.ip_add%type);
	procedure update_product(a_qty cart.qty%type,
						a_id cart.PRODUCTS_PROD_ID%type,
						a_user cart.user_id%type);
	procedure update_product_g(a_qty cart.qty%type,
						a_id cart.PRODUCTS_PROD_ID%type,
						a_ip cart.ip_add%type);					
	procedure update_cart(a_user cart.user_id%type,
						a_ip cart.ip_add%type,
						a_old_id cart.user_id%type);
	procedure delete_cart(	a_user cart.user_id%type,
						a_ip cart.ip_add%type,
						a_id cart.PRODUCTS_PROD_ID%type);	
	procedure delete_cart_pr(a_user cart.user_id%type);
	
END CART_PACK;
/
CREATE OR REPLACE PACKAGE BODY CART_PACK AS


--242   
procedure insert_product(
						a_prod products.prod_id%type,
						a_ip cart.ip_add%type,
						a_user cart.user_id%type,
						a_qty cart.qty%type) as
		begin
			insert into cart(products_prod_id,ip_add,user_id,qty)
			values (a_prod,a_ip,a_user,a_qty);
			
END insert_product;
--257

--295
function GET_COUNT(u_id cart.USER_ID%type)
	return number as
nr_prod number;
begin
	SELECT COUNT(*) 
	into nr_prod 
	FROM CART 
	WHERE USER_ID = u_id;
	if nr_prod=0 then
            return 0;
        end if;
return nr_prod;
END GET_COUNT;

--298
function GET_COUNT_G(u_ip_add cart.ip_add%type)
	return number as
nr_prod number;
begin
	SELECT COUNT(*) 
	into nr_prod 
	FROM CART 
	WHERE ip_add = u_ip_add AND USER_ID < 0;
	if nr_prod=0 then
            return 0;
        end if;
return nr_prod;
END GET_COUNT_G;

--435
procedure delete_product(a_id cart.PRODUCTS_PROD_ID%type,
						 u_id cart.USER_ID%type) as
	begin
	DELETE FROM cart 
	WHERE PRODUCTS_PROD_ID = a_id AND USER_ID = u_id;
end delete_product;
--438
procedure delete_product_g(a_id cart.PRODUCTS_PROD_ID%type,
						 u_id cart.ip_add%type) as
	begin
	DELETE FROM cart 
	WHERE PRODUCTS_PROD_ID = a_id AND ip_add = u_id;
end delete_product_g;
--460
procedure update_product(a_qty cart.qty%type,
						a_id cart.PRODUCTS_PROD_ID%type,
						a_user cart.user_id%type) as
	begin
	UPDATE cart 
	SET qty=a_qty
	WHERE PRODUCTS_PROD_ID = a_id AND USER_ID = a_user;
end update_product;
--463
procedure update_product_g(a_qty cart.qty%type,
						a_id cart.PRODUCTS_PROD_ID%type,
						a_ip cart.ip_add%type) as
	begin
	UPDATE cart
	SET qty=a_qty
	WHERE PRODUCTS_PROD_ID = a_id AND ip_add = a_ip;
end update_product_g;
--32 din login
procedure update_cart(a_user cart.user_id%type,
						a_ip cart.ip_add%type,
						a_old_id cart.user_id%type) as
begin
	UPDATE cart 
	SET USER_ID = a_user 
	WHERE ip_add = a_ip AND USER_ID = a_old_id;
end update_cart;
--36 din login
procedure delete_cart(	a_user cart.user_id%type,
						a_ip cart.ip_add%type,
						a_id cart.PRODUCTS_PROD_ID%type) as
begin
	DELETE FROM cart 
	WHERE USER_ID = a_user AND ip_add = a_ip AND PRODUCTS_PROD_ID = a_id;
end delete_cart;

--36 din pay_succ
procedure delete_cart_pr(a_user cart.user_id%type) as
begin
	DELETE FROM cart
	WHERE USER_ID = a_user;
end delete_cart_pr;


END CART_PACK;








CREATE OR REPLACE PACKAGE USER_PACK AS
	TYPE T_CURSOR is ref cursor;

	 procedure INSERT_USER(a_id user_info.user_id%type, 
						a_first_name user_info.first_name%type,
						a_last_name user_info.last_name%type,
						a_email user_info.email%type,
						a_password user_info.password%type,
						a_phone_number user_info.mobile%type,
						a_add1 user_info.address1%type,
						a_add2 user_info.address2%type);
 END USER_PACK;
 /
 CREATE OR REPLACE PACKAGE BODY USER_PACK AS
 --113 in reg
 procedure INSERT_USER(a_id user_info.user_id%type, 
						a_first_name user_info.first_name%type,
						a_last_name user_info.last_name%type,
						a_email user_info.email%type,
						a_password user_info.password%type,
						a_phone_number user_info.mobile%type,
						a_add1 user_info.address1%type,
						a_add2 user_info.address2%type) AS
 
 begin
	INSERT INTO user_info (user_id,first_name,last_name,email,password,mobile,address1,address2) 
		VALUES (a_id,a_first_name,a_last_name,a_email,a_password,a_phone_number,a_add1,a_add2 );
		
 END INSERT_USER;
 
 END  USER_PACK;
 
 
 
 
 
 
 
 --32 din pay-succ
 
 CREATE OR REPLACE PACKAGE ORDER_PACK AS
 procedure insert_product(a_prod orders.PRODUCT_ID%type,
                            a_user orders.USER_INFO_USER_ID%TYPE,
                            a_qty orders.qty%type,
						   a_trx orders.trx_id%type,
							a_status orders.p_status%type) ;
 END  ORDER_PACK;
/
 CREATE OR REPLACE PACKAGE BODY ORDER_PACK AS

 procedure insert_product(a_prod orders.PRODUCT_ID%type,
                            a_user orders.USER_INFO_USER_ID%TYPE,
                            a_qty orders.qty%type,
						   a_trx orders.trx_id%type,
							a_status orders.p_status%type) as
		begin
			INSERT INTO orders (PRODUCT_ID,USER_INFO_USER_ID,QTY,TRX_ID,P_STATUS) 
			VALUES (a_prod,a_user,a_qty,a_trx,a_status);
					
END insert_product;
 
 END  ORDER_PACK;














