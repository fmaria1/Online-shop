create or replace trigger stoc_tr
before insert on orders
for each row
declare
 new_stoc products.stoc%type;
 p_stoc products.stoc%type;
begin

	select stoc into p_stoc
	from products
	where prod_id=:new.PRODUCT_ID;
--scadem stocul
	if :new.p_status = 'completed' then
		update products
		set stoc= p_stoc-:new.QTY
		where prod_id=:new.PRODUCT_ID;
	end if;

end stoc_tr;