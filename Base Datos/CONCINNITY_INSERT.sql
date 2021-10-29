USE CONCINNITY;

--------------------------PERSONAL--------------------------
insert into PERSONAL values(1,12820956, 'Carla Romina Cardozo Gallardo','F', 76521338,'Carla2Cardozo@gmail.com',null);
insert into PERSONAL values(2,15286978, 'Joaquin Torrez Mamani','M', 77859648,'JoaquinTorrz34@gmail.com',' Av. santos dumont');
insert into PERSONAL values(3,33456321, 'Luciana Barroso','F', 78645192,'Luciana_work@gmail.com',null);
insert into PERSONAL values(4,45678904, 'Hugo Torrez Mamani','M', 77569845,'Garciahugo@gmail.com','Plan 3000');

--------------------------ROL--------------------------
insert into Rol values('ADM', 'Administrador');
insert into Rol values('VEN', 'Vendedor');

--------------------------USUARIO--------------------------
insert into Usuario values(1,'Carla C.G.','12820956','ADM',1);
insert into Usuario values(2,'Torrez','torre*z','VEN',2);
insert into USUARIO values(3,'lucianita.','78645192','VEN',3);
insert into USUARIO values(4,'Hugo Torr3z','benny34','VEN',4);

--------------------------PROVEEDOR--------------------------
insert into PROVEEDOR values(1,'SHEIN','China', 75456896, 'shain@gmail.com');
insert into PROVEEDOR values(2,'FASHION NOVA', 'EEUU', 69855221, 'fashionNova@gmail.com');
insert into PROVEEDOR values(3,'Lucrecia da Silva','Rio de Janeiro', 75456896, 'lucrecia2importa@gmail.com');

--------------------------NOTA_COMPRA--------------------------
insert into NOTA_COMPRA values(1, '2021/7/15 16:50:06 ', 2540,1,1);
insert into NOTA_COMPRA values(2, '2021/8/14 16:30:10 ', 900,1,3) ;
insert into NOTA_COMPRA values(3, '2021/9/25 6:30:35 ', 600,1,2) ;
insert into NOTA_COMPRA values(4, '2021/9/25 20:30:00', 870,1,1) ;
insert into NOTA_COMPRA values(5, '2021/10/14 11:00:00', 1800,1,1) ;
insert into NOTA_COMPRA values(6, '2021/10/25 8:30:00', 1420,1,2) ;

--------------------------CATEGORIA--------------------------
insert into CATEGORIA values(1,'Vestido') ;
insert into CATEGORIA values(2,'Falda') ;
insert into CATEGORIA values(3,'Blusa') ;
insert into CATEGORIA values(4,'Short') ;
insert into CATEGORIA values(5,'Top') ;
insert into CATEGORIA values(6,'Enterizo') ;
insert into CATEGORIA values(7,'Blazer') ;
insert into CATEGORIA values(8,'Body') ;
insert into CATEGORIA values(9,'Pantalon') ;
insert into CATEGORIA values(10,'Accesorios') ;

--------------------------MATERIAL--------------------------
insert into MATERIAL values(1,'Algodon');
insert into MATERIAL values(2,'Cuero');
insert into MATERIAL values(3,'Satin');
insert into MATERIAL values(4,'Seda');
insert into MATERIAL values(5,'Jean');

--------------------------MARCA--------------------------
insert into MARCA values(1,'SHEIN');
insert into MARCA values(2,'FASHION NOVA');
insert into Marca values(3, 'COLORITTA');

--------------------------TALLA--------------------------
INSERT INTO TALLA VALUES(1,'XS');
INSERT INTO TALLA VALUES(2,'S');
INSERT INTO TALLA VALUES(3,'M');
INSERT INTO TALLA VALUES(4,'L');
INSERT INTO TALLA VALUES(5,'XL');
INSERT INTO TALLA VALUES(6,'XXL');
INSERT INTO TALLA VALUES(7,'UNITALLA');

--------------------------PRODUCTO--------------------------
insert into producto values(1,'Cinturon', 100, 50, 0.30, 'cinturon negro de cuero', 10,2,1);
insert into producto values(2,'Vestido otoñal', 200, 100, null, 'vestido corto con estampado de hojas',1,1,3);
insert into producto values(3,'Body casual', 140, 60,  null, 'body blanco con escote en V',8,1,2);
insert into producto values(4,'Short', 190, 80, null, 'short negro a rayas',4,5,1);
insert into producto values(5,'Falda de porrista ', 120, 50, 0.50,'falda tableada color roja',2,4,1);
insert into producto values(6,'Falda Coreana',80, 40, null, 'falda a cuadross rojo y negro', 2,2,1);
insert into producto values(7,'Vestido Vintage', 200, 90, null, 'Vestido largo, color crema, sin mangas', 1,3,2);
insert into producto values(8,'Camisa Riele', 100, 50, null, 'camisa blanca de tres botones y manga larga', 3,4,3);
insert into producto values(9,'Pantalos mom', 210, 80, 0.10, 'Pantalon jim, color claro, a la cintura', 9,5,2);
insert into producto values(10,'Falda Zarbe', 80, 50, null, 'falda negra ', 2,2,2);
insert into producto values(11,'Mono corto cati',150, 60, null, 'enterizo rojo, hasta las rodillas', 6,1,3);
insert into producto values(12,'Top Edel', 70, 30, 0.20, 'top  azul claro con cuello en v', 5,3,1);

--------------------------PRODUCTO_TALLA--------------------------
INSERT INTO PRODUCTO_TALLA VALUES(1,7,8);
INSERT INTO PRODUCTO_TALLA VALUES(2,1,8);
INSERT INTO PRODUCTO_TALLA VALUES(2,2,7);
INSERT INTO PRODUCTO_TALLA VALUES(3,3,10);
INSERT INTO PRODUCTO_TALLA VALUES(3,4,10);
INSERT INTO PRODUCTO_TALLA VALUES(4,5,4);
INSERT INTO PRODUCTO_TALLA VALUES(4,4,4);
INSERT INTO PRODUCTO_TALLA VALUES(5,2,6);
INSERT INTO PRODUCTO_TALLA VALUES(5,3,0);
INSERT INTO PRODUCTO_TALLA VALUES(6,2,8);
INSERT INTO PRODUCTO_TALLA VALUES(7,3,10);
INSERT INTO PRODUCTO_TALLA VALUES(8,5,6);
INSERT INTO PRODUCTO_TALLA VALUES(8,4,6);
INSERT INTO PRODUCTO_TALLA VALUES(9,2,7);
INSERT INTO PRODUCTO_TALLA VALUES(9,3,7);
INSERT INTO PRODUCTO_TALLA VALUES(10,3,6);
INSERT INTO PRODUCTO_TALLA VALUES(10,2,5);
INSERT INTO PRODUCTO_TALLA VALUES(11,3,5);
INSERT INTO PRODUCTO_TALLA VALUES(12,2,10);

DELETE FROM PRODUCTO_TALLA;
DELETE FROM TALLA;

--------------------------DETALLE_NOTACOMPRA--------------------------
insert into DETALLE_NOTACOMPRA values(1,1,7,50,8,400);
insert into DETALLE_NOTACOMPRA values(1,2,1,100,8,800);
insert into DETALLE_NOTACOMPRA values(1,2,2,100,7,700);
insert into DETALLE_NOTACOMPRA values(1,4,5,80,4,320);
insert into DETALLE_NOTACOMPRA values(1,4,4,80,4,320);
insert into DETALLE_NOTACOMPRA values(2,3,3,60,10,600);
insert into DETALLE_NOTACOMPRA values(2,5,2,50,6,300);
insert into DETALLE_NOTACOMPRA values(3,3,4,60,10,600);
insert into DETALLE_NOTACOMPRA values(4,6,2,40,8,320);
insert into DETALLE_NOTACOMPRA values(4,10,3,50,6,300);
insert into DETALLE_NOTACOMPRA values(4,10,2,50,5,250);
insert into DETALLE_NOTACOMPRA values(5,7,3,90,10,900);
insert into DETALLE_NOTACOMPRA values(5,8,5,50,6,300);
insert into DETALLE_NOTACOMPRA values(5,8,4,50,6,300);
insert into DETALLE_NOTACOMPRA values(5,12,2,30,10,300);
insert into DETALLE_NOTACOMPRA values(6,11,3,60,5,300);
insert into DETALLE_NOTACOMPRA values(6,9,2,80,7,560);
insert into DETALLE_NOTACOMPRA values(6,9,3,80,7,560);

--------------------------NOTA_SALIDA--------------------------
INSERT INTO NOTA_SALIDA VALUES(1,'2021/8/6 13:30:06');
INSERT INTO NOTA_SALIDA VALUES(2,'2021/10/14 08:30:25');


--------------------------DETALLE_NOTASALIDA--------------------------
INSERT INTO DETALLE_NOTASALIDA VALUES(1,3,3,1);
INSERT INTO DETALLE_NOTASALIDA VALUES(1,1,7,2);
INSERT INTO DETALLE_NOTASALIDA VALUES(2,5,2,1);

--------------------------CLIENTE--------------------------
INSERT INTO CLIENTE VALUES(1,'Melody Seña',77652189,'titoChumacero@gmail.com');
INSERT INTO CLIENTE VALUES(2,'Tatiana Torrez',75895621,'TaatianaTorrez@gmail.com');
INSERT INTO CLIENTE VALUES(3,'Yuliana Rodriguez',77895621,'YulianaRodriguez@gmail.com');
INSERT INTO CLIENTE VALUES(4,'Juliana Gomez',76589128,null);
INSERT INTO CLIENTE VALUES(5,'Samuel Vedia',78956328,'SamuelVedia@gmail.com');

--------------------------NOTA_VENTA--------------------------
INSERT INTO NOTA_VENTA VALUES(1,'2021/12/15 10:20:06',270,0,270,1,2);
INSERT INTO NOTA_VENTA VALUES(2,'2021/12/16 16:40',710,0.1,639,2,2);
INSERT INTO NOTA_VENTA VALUES(3,'2021/12/25 11:25',140,0,140,4,2);
INSERT INTO NOTA_VENTA VALUES(4,'2021/10/20 16:50:09',330,0.1,297,3,2);
INSERT INTO NOTA_VENTA VALUES(5,'2021/10/20 14:20',180,0,180,5,2);

--------------------------DETALLE_NOTAVENTA--------------------------
insert into DETALLE_NOTAVENTA values(1,1,7,70,1,70);
insert into DETALLE_NOTAVENTA values(1,2,1,200,1,200);
insert into DETALLE_NOTAVENTA values(2,4,5,190,2,380);
insert into DETALLE_NOTAVENTA values(2,5,2,60,1,60);
insert into DETALLE_NOTAVENTA values(2,1,7,70,3,210);
insert into DETALLE_NOTAVENTA values(3,3,4,140,1,140);
insert into DETALLE_NOTAVENTA values(4,4,4,190,1,190);
insert into DETALLE_NOTAVENTA values(4,3,4,140,1,140);
insert into DETALLE_NOTAVENTA values(5,5,2,60,3,180);