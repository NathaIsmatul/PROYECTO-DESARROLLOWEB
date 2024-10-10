USE ROGIL
GO

-----CREACION DE TABLAS CON PK

CREATE TABLE TIENDA (
    CODIGO_TIENDA int NOT NULL IDENTITY(1,1) PRIMARY KEY,
    NOMBRE_TIENDA varchar(255) NOT NULL,
    DIRECCION varchar(255) NOT NULL
);

CREATE TABLE PRODUCTOS (
    CODIGO_PRODUCTO int NOT NULL IDENTITY (1,1) PRIMARY KEY,
    NOMBRE_PRODUCTO varchar (255) NOT NULL,
    ID_FABRICANTE int NOT NULL,
    FECH_VENCIMIENTO datetime NOT NULL,
    PRECIO numeric(19,4),
    STOCK numeric(19,4),
    ID_TIENDA
);

CREATE TABLE PROVEEDORES (
    CODIGO_PROVEEDOR int NOT NULL IDENTITY (1,1) PRIMARY KEY,
    NOMBRE_PROVEEDOR varchar(255) NOT NULL
);

CREATE TABLE KARDEX (
    CODIGO_KARDEX int NOT NULL IDENTITY (1,1) PRIMARY KEY,
    ID_PRODUCTO int NOT NULL,
    TIPO_TRANSACCION varchar (255),
    CANTIDAD int NOT NULL,
    FECHA datetime NOT NULL
);

CREATE TABLE LIQUIDACION (
    CODIGO_LIQUIDACION int NOT NULL IDENTITY (1,1) PRIMARY KEY,
    ID_PRODUCTO int NOT NULL,
    CANTIDAD int NOT NULL,
    FECH_LIQUIDACION datetime NOT NULL,
    ID_PROVEEDOR int NOT NULL 
);

----------------Llaves Foraneasq