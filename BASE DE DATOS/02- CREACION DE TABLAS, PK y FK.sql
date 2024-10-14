USE ROGIL
GO

-----CREACION DE TABLAS CON PK
--Tabla de Creacion de usuario de empleados

CREATE TABLE USUARIOS (
CODIGO_USUARIO int NOT NULL IDENTITY (1, 1) PRIMARY KEY,
USUARIO varchar(255) NOT NULL,
CLAVE varchar(255) NOT NULL,
NOMBRE_USUARIO varchar(255) NOT NULL,
FECHA_REGISTRO datetime NOT NULL,
ID_PERFIL int NOT NULL
);  

---- TABLA PERFIL USUARIO
CREATE TABLE PERFIL (
CODIGO_PERFIL int NOT NULL IDENTITY (1,1) PRIMARY KEY,
DESCRIPCION varchar (50)
);
--------------------------------------------------------------

CREATE TABLE PROVEEDORES (
    CODIGO_PROVEEDOR int NOT NULL IDENTITY (1,1) PRIMARY KEY,
    NOMBRE_PROVEEDOR varchar(255) NOT NULL,
    TELEFONO varchar(50) NOT NULL,
    DIRECCION varchar(255)
);

CREATE TABLE TIPO_PRODUCTO (
    CODIGO_TPRODUCTO int NOT NULL IDENTITY(1,1) PRIMARY KEY,
    TIP varchar(255) NOT NULL,
    DESCRIPCION text
);

CREATE TABLE PRODUCTOS (
    CODIGO_PRODUCTO int NOT NULL IDENTITY (1,1) PRIMARY KEY,
    NOMBRE_PRODUCTO varchar (255) NOT NULL,
    DESCRIPCION text,
    ID_TIPO_PRODUCTO int NOT NULL,
    ID_PROVEEDOR int NOT NULL,
    FECH_VENCIMIENTO datetime NOT NULL,
    COSTO numeric(19,4) NOT NULL,  
    PRECIO_VENTA numeric(19,4),
    STOCK numeric(19,4),
    FOREIGN KEY (ID_TIPO_PRODUCTO) REFERENCES TIPO_PRODUCTO(CODIGO_TPRODUCTO),
    FOREIGN KEY (ID_PROVEEDOR) REFERENCES PROVEEDORES(CODIGO_PROVEEDOR)
);

CREATE TABLE COMPRAS(
    CODIGO_COMPRA int NOT NULL IDENTITY (1,1) PRIMARY KEY,
    ID_PROVEEDOR INT NOT NULL,
    FECHA datetime DEFAULT GETDATE(),
    TOTAL_FACTURA numeric(19,4)
    EMPLEADO_ENCARGADO int NOT NULL,
    FOREIGN KEY (ID_PROVEEDOR) REFERENCES PROVEEDORES(CODIGO_PROVEEDOR)
);

CREATE TABLE DETALLE_COMPRAS(
    CODIGO_DCOMPRA int NOT NULL IDENTITY (1,1) PRIMARY KEY,
    ID_COMPRA int NOT NULL,
    ID_PRODUCTO int NOT NULL,
    CANTIDAD int NOT NULL,
    COSTO int NOT NULL,
    SUBTOTAL numeric(19,4) AS (CANTIDAD*COSTO),
    FOREIGN KEY (ID_COMPRA) REFERENCES COMPRAS(CODIGO_COMPRA),
    FOREIGN KEY (ID_PRODUCTO) REFERENCES PRODUCTOS(CODIGO_PRODUCTO)
);

CREATE TABLE VENTA(
    CODIGO_VENTA int NOT NULL IDENTITY(1,1) PRIMARY KEY,
    FECHA datetime DEFAULT GETDATE(),
    TOTAL numeric(19,4),
    NOMBRE_CLIENTE VARCHAR(255) NOT NULL,
    TEL_CLIENTE VARCHAR(255) NOT NULL,
    DIREC_CLIENTE VARCHAR(255) NOT NULL,
    ID_EMPLEADO int NOT NULL,
    FOREIGN KEY (ID_EMPLEADO) REFERENCES USUARIO(CODIGO_USUARIO)
    );

   CREATE TABLE DETALLE_VENTA(
    CODIGO_DVENTA int NOT NULL IDENTITY (1,1) PRIMARY KEY,
    ID_VENTA int NOT NULL,
    ID_PRODUCTO int NOT NULL,
    CANTIDAD int NOT NULL,
    COSTO int NOT NULL,
    SUBTOTAL numeric(19,4) AS (CANTIDAD*COSTO),
    FOREIGN KEY (ID_VENTA) REFERENCES VENTA(CODIGO_VENTA),
    FOREIGN KEY (ID_PRODUCTO) REFERENCES PRODUCTOS(CODIGO_PRODUCTO)
); 

CREATE TABLE TIPO_MOVIMIENTO(
    ID_TIPO_MOVIMIENTO int NOT NULL IDENTITY(1,1) PRIMARY KEY,
    TIPO varchar(100)
);

CREATE TABLE KARDEX (
    CODIGO_KARDEX int NOT NULL IDENTITY (1,1) PRIMARY KEY,
    ID_PRODUCTO int NOT NULL,
    ID_MOVIMIENTO varchar (255),
    CANTIDAD int NOT NULL,
    FECHA datetime NOT NULL,
    COMENTARIO text
    FOREIGN KEY (ID_PRODUCTO) REFERENCES PRODUCTOS(CODIGO_PRODUCTO),
    FOREIGN KEY (ID_MOVIMIENTO) REFERENCES TIPO_MOVIMIENTO(ID_TIPO_MOVIMIENTO)
);

CREATE TABLE LOTES_INVENTARIO (
    CODIGO_REGISTRO int NOT NULL IDENTITY (1,1) PRIMARY KEY,
    ID_PRODUCTO int NOT NULL,
    FECHA_REGISTRO datetime NOT NULL,
    CANTIDAD int NOT NULL,
    ID_EMPLEADO int NOT NULL,
    DESCRIPCION Text,
    FOREIGN KEY (ID_PRODUCTO) REFERENCES PRODUCTOS(CODIGO_PRODUCTO),
    FOREIGN KEY (ID_EMPLEADO) REFERENCES USUARIO(CODIGO_USUARIO) 
);

