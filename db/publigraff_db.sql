create database publigraff_db;
CREATE SCHEMA `publigraff` DEFAULT CHARACTER SET utf8 ;

use publigraff_db;

-- tabla ROL correcta
create table rol(
    id_rol int auto_increment,
    nom_rol varchar(50),
    desc_rol varchar(100),
    primary key(id_rol)
);

-- tabla USUARIO correcta
create table usuario(
    id_usuario int auto_increment,
    id_rol int not null,
    id_emp int not null,
    nom_usuario varchar(50),
    pass_usuario varchar(255),
    estado_usuario int,
    fecha_captura date,
    primary key(id_usuario)
);

-- tabla EMPLEADO correcta
create table empleado(
    id_emp int auto_increment,
    id_cargo int not null,
    nom_emp varchar(200),
    ape_emp varchar(200),
    dni_emp varchar(200),
    telefono_emp varchar(20),
    primary key(id_emp)
);

-- tabla CARGO correcta
create table cargo(
    id_cargo int auto_increment,
    nom_cargo varchar(200),
    primary key(id_cargo)
);

-- tabla CARGO correcta
create table categoria(
    id_categoria int auto_increment,
    nom_categoria varchar(150),
    desc_categoria varchar(200),
    primary key(id_categoria)
);

create table sede(
    id_sede int auto_increment,
    nom_sede varchar(50),
    direccion_sede varchar(200),
    ciudad_sede varchar(50),
    primary key(id_sede)
);

create table producto(
    id_prod int auto_increment,
    id_categoria int not null,
    nom_prod varchar(200),
    descripcion_prod TEXT,
    marca_prod varchar(50),
    modelo_prod varchar(50),
    stock_prod int,
    precio_equipo decimal(10,2) not null,
    precio_full decimal(10,2) not null,
    fecha_captura date,
    primary key(id_prod)
);

create table caja (
    id_caja int auto_increment,
    id_usuario int not null,
    fecha_apertura DATETIME,
    fecha_cierre DATETIME NULL,
    monto_inicial DECIMAL(10,2),
    monto_final DECIMAL(10,2) NULL,
    estado_caja varchar(10),
    primary key(id_caja)
);

CREATE TABLE imagen (
    id_imagen INT AUTO_INCREMENT PRIMARY KEY,
    nombre_imagen VARCHAR(500) NOT NULL,
    ruta_imagen VARCHAR(255) NOT NULL,
    fecha_subida DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tablas para el modulo de ventas
-- TABLA PARA VENTA
CREATE TABLE venta (
    id_venta INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_caja INT NOT NULL,
    fecha_venta DATETIME,
    total_venta DECIMAL(10,2),
    tipo_pago VARCHAR(50),
    abono_venta DECIMAL(10,2),
    saldo_venta DECIMAL(10,2),
    estado_venta VARCHAR(50),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_caja) REFERENCES caja(id_caja)
);

CREATE TABLE detalleventa (
    id_detalleventa INT AUTO_INCREMENT PRIMARY KEY,
    id_venta INT NOT NULL,
    id_prod INT NOT NULL,
    cantidad INT,
    precio_unitario DECIMAL(10,2),
    subtotal DECIMAL(10,2),
    FOREIGN KEY (id_venta) REFERENCES venta(id_venta),
    FOREIGN KEY (id_prod) REFERENCES producto(id_prod)
);

CREATE TABLE movimiento (
    id_movimiento INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_caja INT NOT NULL,
    fecha_movimiento DATETIME DEFAULT NOW(),
    tipo_movimiento VARCHAR(50),
    detalle_movimiento VARCHAR(200),
    monto_movimiento DECIMAL(10,2),
    tipo_pago VARCHAR(50),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_caja) REFERENCES caja(id_caja)
);