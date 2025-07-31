-- 1 PRIMERO : Agregar datos en tabla CARGO
INSERT INTO cargo (nom_cargo) VALUES ('Gerente');
INSERT INTO cargo (nom_cargo) VALUES ('Administrador');
INSERT INTO cargo (nom_cargo) VALUES ('Contador');
INSERT INTO cargo (nom_cargo) VALUES ('Soporte');
INSERT INTO cargo (nom_cargo) VALUES ('Diseñador');
INSERT INTO cargo (nom_cargo) VALUES ('Vendedor');

-- 2 SEGUNDO :  Agregar datos en tabla EMPLEADO
INSERT INTO empleado (id_cargo,nom_emp,ape_emp,dni_emp,telefono_emp) VALUES ('4','Franz','Cruz Ucharico','70209626','+51 907555845');

-- 3 TERCERO : Agregar datos en Tabla ROL
INSERT INTO rol (nom_rol,desc_rol) VALUES ('Super Admin','Super Administrador del sistema');
INSERT INTO rol (nom_rol,desc_rol) VALUES ('Admin','Administrador del sistema');
INSERT INTO rol (nom_rol,desc_rol) VALUES ('Operador','Operador del sistema');

-- 4 CUARTO : Agregar datos en tabla USUARIO - pass: Tacna+2020
INSERT INTO usuario (id_rol,id_emp,nom_usuario,pass_usuario,estado_usuario,fecha_captura) VALUES ('1','1','fcruz','$2y$10$cKWCMb0hp4yx5HSaIDBUbejlXuHItUjfvIkLofUjL6Gw59zfY2inq','1','2025-06-26');

-- 5 : Listado de Categorias - Publigraff
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Sellos Automaticos de Bolsillo','Sellos Automaticos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Sellos Automaticos Nuevo Printer','Sellos Automaticos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Sellos Automaticos Nuevo Printer - Personalizable','Sellos Automaticos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Sellos Automaticos Cuadrados','Sellos Automaticos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Sellos Automaticos Rectangulares','Sellos Automaticos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Sellos Automaticos Redondos','Sellos Automaticos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Sellos Fechadores Automaticos','Sellos Automaticos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Sellos Fechadores Manuales','Sellos Automaticos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Sellos en Seco','Sellos Automaticos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Sellos etiquetados Textiles','Sellos Automaticos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Tampones Anatomicos','Tampones para sellos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Tampones de oficina','Tampones para Sellos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Tinta para Sellos Automatico','Tinta para Sellos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Titnas Especiales','Tinta para Sellos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Repuestos para Sellos Printer Line','Repuestos para sellos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Repuestos para Sellos Rectangulares','Repuestos para sellos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Repuestos para Sellos Redondos','Repuestos para sellos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Repuestos para Sellos Cuadrados','Repuestos para sellos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Repuestos para Sellos de Bolsillo','Repuestos para sellos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Repuesto para Fechadores','Repuestos para sellos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Polimeros','Polimero para hacer sello');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Lapiceros','Lapiceros de diferentes modelos');
INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('Bolsas','Bolsas de diferentes modelos');