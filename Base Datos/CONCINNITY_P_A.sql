--Devuelve la cantidad vendida de un producto en especifico

CREATE PROCEDURE GetCantProducto(@id_producto integer)
AS
BEGIN
   declare @cant integer;
   select @cant = sum(CANTIDAD)
   from DETALLE_NOTAVENTA
   where ID_PRODUCTO=@id_producto
   print @cant;
END
GO

execute dbo.GetCantProducto 4;
--Devuelve la ganancia generada de un producto en especifico

CREATE PROCEDURE GetGantProducto(@id_product integer)
AS
BEGIN
   declare @gan DECIMAL(7,2);
   select @gan = isnull(sum(TOTAL),0)
   from DETALLE_NOTAVENTA
   where ID_PRODUCTO=@id_product
   print @gan;
END
GO

execute dbo.GetGantProducto 3;
