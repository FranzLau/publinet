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