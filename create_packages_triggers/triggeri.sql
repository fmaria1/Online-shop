

CREATE OR REPLACE TRIGGER Trg_prod_BR 
    BEFORE INSERT OR UPDATE ON products 
    FOR EACH ROW 
BEGIN
	IF ( :new.expiration_date <= SYSDATE )
	THEN
	 RAISE_APPLICATION_ERROR( -20001,
	 	' You can not add expirated products!');
	 END IF;
END; 
/
CREATE OR REPLACE TRIGGER fabrication_date_tr 
    BEFORE INSERT OR UPDATE ON products 
    FOR EACH ROW 
BEGIN
	IF ( :new.fabrication_date > :new.expiration_date)
	THEN
	 RAISE_APPLICATION_ERROR( -20001,
	 	'Fabrication date must be less than expiration date!' );
	 END IF;
END; 
/

CREATE OR REPLACE TRIGGER verification_stoc
    BEFORE INSERT OR UPDATE ON cart 
    FOR EACH ROW 
declare
all_stoc products.stoc%type;
BEGIN
	SELECT STOC 
	INTO all_stoc
	from products
	where prod_id=:new.PRODUCTS_PROD_ID;
	
	IF ( :new.qty > all_stoc)
	THEN
	 RAISE_APPLICATION_ERROR( -20001,
	 	'The quantity must be less than or equal to the stock of the product' );
	 END IF;
END; 
/

