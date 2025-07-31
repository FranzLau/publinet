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

-- 4 CUARTO : Agregar datos en tabla USUARIO
INSERT INTO usuario (id_rol,id_emp,nom_usuario,pass_usuario,estado_usuario,fecha_captura) VALUES ('1','1','fcruz','123456','1','2025-06-26');
