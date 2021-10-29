-- Actualiza el stock, por cada inserción que se haga en el detalle de la nota de compra
CREATE TRIGGER CANTIDAD_DECOMPRA_AL_STOCK
ON DETALLE_NOTACOMPRA
AFTER INSERT
AS
	DECLARE @cant INT,
			@stock INT,
			@id_producto INT,
			@id_talla INT
	SELECT  @id_producto=ID_PRODUCTO, @id_talla=ID_TALLA, @cant=CANTIDAD FROM INSERTED
	SELECT @stock=STOCK FROM PRODUCTO_TALLA WHERE @id_producto=ID_PRODUCTO AND @id_talla=ID_TALLA
	SET @stock=@stock+@cant
	UPDATE PRODUCTO_TALLA SET STOCK=@stock WHERE ID_PRODUCTO=@id_producto AND ID_TALLA=@id_talla

SELECT *FROM DETALLE_NOTACOMPRA;
INSERT INTO DETALLE_NOTACOMPRA VALUES(6,1,7,50,8,400);
SELECT *FROM PRODUCTO_TALLA

-- Actualiza el stock, por cada inserción que se haga en el detalle de la nota de venta
CREATE TRIGGER ACTUALIZAR_MONTO_TOTAL
ON DETALLE_NOTAVENTA
AFTER INSERT
AS
	DECLARE @total DECIMAL(8,2),
			@monto_pago DECIMAL(8,2),
			@descuento DECIMAL(3,2),
			@monto_total DECIMAL(8,2),
			@nvta INT
	SELECT @nvta=ID_NOTAVENTA, @total=TOTAL FROM INSERTED
	SELECT @monto_pago=MONTO_PAGO, @descuento=DESCUENTO FROM NOTA_VENTA WHERE ID=@nvta
	SET @monto_total= @monto_pago-@monto_pago*@descuento
	UPDATE NOTA_VENTA SET MONTO_TOTAL=@monto_total WHERE ID=@nvta

INSERT INTO DETALLE_NOTAVENTA VALUES(1,1,7,70,1,70);
INSERT INTO DETALLE_NOTAVENTA VALUES(1,2,1,200,1,200);


SELECT *FROM DETALLE_NOTAVENTA;
SELECT *FROM NOTA_VENTA;


-- Actualiza el stock, por cada inserción que se haga en el detalle de la nota de salida
CREATE TRIGGER ACTUALIZAR_MONTO_TOTAL_SALIDA
ON DETALLE_NOTASALIDA
AFTER INSERT
AS
	DECLARE @cant INT,
			@stock INT,
			@id_producto INT,
			@id_talla INT
	SELECT  @id_producto=ID_PRODUCTO, @id_talla=ID_TALLA, @cant=CANTIDAD FROM INSERTED
	SELECT @stock=STOCK FROM PRODUCTO_TALLA WHERE @id_producto=ID_PRODUCTO AND @id_talla=ID_TALLA
	if (@stock-@cant<0)
	    BEGIN
            ROLLBACK;
        end
	ELSE
	    BEGIN
            SET @stock=@stock-@cant
	        UPDATE PRODUCTO_TALLA SET STOCK=@stock WHERE ID_PRODUCTO=@id_producto AND ID_TALLA=@id_talla
        end


INSERT INTO DETALLE_NOTASALIDA VALUES(1,2,2,7);

SELECT *FROM DETALLE_NOTASALIDA;
SELECT *FROM PRODUCTO_TALLA;
