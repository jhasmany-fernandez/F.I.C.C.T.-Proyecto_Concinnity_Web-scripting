CREATE DATABASE CONCINNITY;
USE CONCINNITY;

CREATE TABLE PERSONAL(
	ID  INTEGER NOT NULL,
    CI INTEGER NOT NULL,
    NOMBRE VARCHAR (50) NOT NULL,
    SEXO CHAR NOT NULL,
    TELEFONO INTEGER NOT NULL,
    CORREO VARCHAR (25),
    DOMICILIO VARCHAR (60),
    PRIMARY KEY (ID)
);

insert into PERSONAL values(1,12820956, 'Carla Romina Cardozo Gallardo','F', 76521338,'Carla2Cardozo@gmail.com',null);
insert into PERSONAL values(2,15286978, 'Joaquin Torrez Mamani','M', 77859648,'JoaquinTorrz34@gmail.com',' Av. santos dumont');
SELECT *FROM PERSONAL;

CREATE TABLE ROL(
	ID INTEGER NOT NULL,
    NOMBRE VARCHAR (20) NOT NULL,
    PRIMARY KEY (ID)
);

insert into Rol values(1, 'Administrador');
insert into Rol values(2, 'Vendedor');
SELECT *FROM ROL;

CREATE TABLE USUARIO(
ID INTEGER NOT NULL,
NOMBRE_USUARIO VARCHAR (20),
CONTRASEÑA VARCHAR (20),
ID_ROL INTEGER NOT NULL,
ID_PERSONAL INTEGER NOT NULL,
PRIMARY KEY (ID),
FOREIGN KEY(ID_ROL) REFERENCES ROL(ID)
ON DELETE NO ACTION
ON UPDATE CASCADE,
FOREIGN KEY(ID_PERSONAL) REFERENCES PERSONAL(ID)
ON DELETE NO ACTION
ON UPDATE CASCADE
);

insert into Usuario values(1,'Carla C.G.','12820956',1,1) ;
insert into Usuario values(2,'Torrez','0000',2,2) ;
SELECT *FROM USUARIO;

CREATE TABLE BITACORA(
ID INTEGER NOT NULL,
ID_USUARIO INTEGER NOT NULL,
FECHA_HORA DATETIME NOT NULL,
ACCION VARCHAR (20),
PRIMARY  KEY (ID, ID_USUARIO),
FOREIGN KEY(ID_USUARIO) REFERENCES USUARIO(ID)
ON DELETE NO ACTION
ON UPDATE CASCADE
);

CREATE TABLE PROVEEDOR(
	ID INTEGER NOT NULL,
    NOMBRE VARCHAR  (50) NOT NULL,
    DIRECCION VARCHAR (60),
    TELEFONO INTEGER NOT NULL,
    CORREO VARCHAR (30) NOT NULL,
    PRIMARY KEY (ID)
);

insert into PROVEEDOR values(1,'SHEIN','China', 75456896, 'shain@gmail.com');
insert into PROVEEDOR values(2,'FASHION NOVA', 'EEUU', 69855221, 'fashionNova@gmail.com');
insert into PROVEEDOR values(3,'Lucrecia da Silva','Rio de Janeiro', 75456896, 'lucrecia2importa@gmail.com');
SELECT *FROM PROVEEDOR;


CREATE TABLE NOTA_COMPRA(
	ID INTEGER NOT NULL,
    FECHA_HORA DATETIME NOT NULL,
    MONTO_TOTAL INTEGER NOT NULL,
	ID_USUARIO INTEGER NOT NULL,
	ID_PROVEEDOR INTEGER NOT NULL,
	PRIMARY KEY (ID),
	FOREIGN KEY(ID_USUARIO) REFERENCES USUARIO(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	FOREIGN KEY(ID_PROVEEDOR) REFERENCES PROVEEDOR(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
);

insert into NOTA_COMPRA values(1, '16:50:06 2021/7/15', 0,1,1);
insert into NOTA_COMPRA values(2, '16:30 2021/8/14', 0,1,3) ;
insert into NOTA_COMPRA values(3, '16:30 2021/9/25', 0,1,2) ;
SELECT *FROM NOTA_COMPRA;

CREATE TABLE CATEGORIA(
	ID INTEGER NOT NULL,
    NOMBRE VARCHAR (20) NOT NULL,
    PRIMARY KEY (ID)
);

insert into CATEGORIA values(1,'Vestido') ;
insert into CATEGORIA values(2,'Falda') ;
insert into CATEGORIA values(3,'Blusa') ;
insert into CATEGORIA values(4,'Short') ;
insert into CATEGORIA values(5,'Top') ;
insert into CATEGORIA values(6,'Enterizo') ;
insert into CATEGORIA values(7,'Blazer') ;
insert into CATEGORIA values(8,'Body') ;
insert into CATEGORIA values(9,'Pantalon') ;
insert into CATEGORIA values(10,'accesorios') ;
SELECT *FROM CATEGORIA;

CREATE TABLE MATERIAL(
	ID INTEGER NOT NULL,
    NOMBRE VARCHAR (20) NOT NULL,
    PRIMARY KEY (ID)
);

insert into MATERIAL values(1,'Algodon') ;
insert into MATERIAL values(2,'Cuero') ;
insert into MATERIAL values(3,'Satin') ;
insert into MATERIAL values(4,'Seda') ;
insert into MATERIAL values(5,'Jean') ;
SELECT *FROM MATERIAL;

CREATE TABLE MARCA(
	ID INTEGER NOT NULL,
    NOMBRE VARCHAR (20) NOT NULL,
    PRIMARY KEY (ID)
);

insert into MARCA values(1,'SHEIN') ;
insert into MARCA values(2,'FASHION NOVA') ;
insert into Marca values(3, 'COLORITTA') ;
SELECT *FROM MARCA;

CREATE TABLE PRODUCTO(
	ID INTEGER NOT NULL,
    NOMBRE VARCHAR(40) NOT NULL,
    OFERTA  DECIMAL NOT NULL,
    COSTO DECIMAL NOT NULL,
    PRECIO DECIMAL NOT NULL,
	DESCRIPCION VARCHAR (50) NOT NULL,
	ID_CATEGORIA INTEGER NOT NULL,
	ID_MATERIAL INTEGER NOT NULL,
	ID_MARCA INTEGER NOT NULL,
    PRIMARY KEY (ID),
	FOREIGN KEY(ID_CATEGORIA) REFERENCES CATEGORIA(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	FOREIGN KEY(ID_MATERIAL) REFERENCES MATERIAL(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	FOREIGN KEY(ID_MARCA) REFERENCES MARCA(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
);
--MODIFICAR DATOS
insert into producto values(1,'Cinturon', 100, 50, 0.30 ,10, 'cinturon negro de cuero', 7,10,2,1);
insert into producto values(2,'vestido otoñal', 200, 100, 0 ,5, 'vestido corto con estampado de hojas',1,1,1,3);
insert into producto values(3,'body casual', 140, 60,  0 ,1, 'body blanco con escote en V',4,8,1,2);
insert into producto values(4,'short', 190, 80, 0 ,10, 'short negro a rayas', 3,4,5,1);
insert into producto values(5,'falda de porrista ', 120, 50, 0.50 ,15, 'falda tableada color roja', 2,2,4,1);
SELECT *FROM PRODUCTO;

CREATE TABLE TALLA_STOCK_PRODUCTO
(
	ID_PRODUCTO INTEGER NOT NULL,
	TALLA VARCHAR(8) NOT NULL,
	STOCK INTEGER NOT NULL,
	PRIMARY KEY(ID_PRODUCTO, TALLA),
	FOREIGN KEY(ID_PRODUCTO) REFERENCES PRODUCTO(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
);

CREATE TABLE DETALLE_NOTACOMPRA(
    COSTO INTEGER NOT NULL,
    CANTIDAD INTEGER NOT NULL,
    IMPORTE INTEGER NOT NULL,
    ID_NOTACOMPRA INTEGER NOT NULL,
    ID_PRODUCTO INTEGER NOT NULL,
    PRIMARY KEY (ID_NOTACOMPRA, ID_PRODUCTO),
	FOREIGN KEY(ID_NOTACOMPRA) REFERENCES NOTA_COMPRA(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	FOREIGN KEY(ID_PRODUCTO) REFERENCES PRODUCTO(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
);

insert into DETALLE_NOTACOMPRA values(1,1,50,8,400);
insert into DETALLE_NOTACOMPRA values(1,2,100,8,800);
insert into DETALLE_NOTACOMPRA values(1,4,80,8,640);
insert into DETALLE_NOTACOMPRA values(2,3,60,180);
SELECT *FROM DETALLE_NOTACOMPRA;

CREATE TABLE NOTA_SALIDA(
	ID INTEGER NOT NULL,
    FECHA_HORA DATETIME NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE DETALLE_NOTASALIDA(
    CANTIDAD INTEGER NOT NULL,
    ID_NOTASALIDA INTEGER NOT NULL,
    ID_PRODUCTO INTEGER NOT NULL,
    PRIMARY KEY (ID_PRODUCTO, ID_NOTASALIDA),
	FOREIGN KEY(ID_PRODUCTO) REFERENCES PRODUCTO(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	FOREIGN KEY(ID_NOTASALIDA) REFERENCES NOTA_SALIDA(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
);

CREATE TABLE CLIENTE(
	ID INTEGER NOT NULL,
    NOMBRE VARCHAR (50) NOT NULL,
    TELEFONO INTEGER NOT NULL,
    CORREO VARCHAR (40),
    PRIMARY KEY (ID)
);

CREATE TABLE NOTA_VENTA(
	ID INTEGER NOT NULL,
    FECHA_HORA DATETIME NOT NULL,
    MONTO_TOTAL INTEGER NOT NULL,
    DESCUENTO INTEGER,
	ID_CLIENTE INTEGER NOT NULL,
    PRIMARY KEY (ID),
	FOREIGN KEY(ID_CLIENTE) REFERENCES CLIENTE(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
);

CREATE TABLE DETALLE_NOTAVENTA(
	CANTIDAD INTEGER NOT NULL,
    PRECIO INTEGER NOT NULL,
    TOTAL INTEGER NOT NULL,
    ID_NOTAVENTA INTEGER NOT NULL,
    ID_PRODUCTO INTEGER NOT NULL,	
    PRIMARY KEY (ID_NOTAVENTA, ID_PRODUCTO),
	FOREIGN KEY(ID_PRODUCTO) REFERENCES PRODUCTO(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	FOREIGN KEY(ID_NOTAVENTA) REFERENCES NOTA_VENTA(ID)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
);


