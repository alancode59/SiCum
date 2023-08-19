DROP DATABASE IF EXISTS si_cum; 
CREATE DATABASE IF NOT EXISTS si_cum DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

GRANT ALL PRIVILEGES ON si_cum.* to 'user'@'localhost' IDENTIFIED BY 'usergym123';

use si_cum;

CREATE TABLE roles(
    id_rol INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    estatus_rol int (11) DEFAULT 1 COMMENT'1.- Habilitado, 0.-Deshabilitado',
    rol varchar(50) not null
); 

---insert data
INSERT INTO roles values  (555, Null,'Administrador');
INSERT INTO roles values (444, Null,'Empleado');


CREATE TABLE empleados(
    id_empleado INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    estatus_empleado int(1) null DEFAULT 1 COMMENT '1.- Habilitado, 0.-Deshabilitado',
    nombre_empleado varchar(30) not null,
    ap_paterno_empleado varchar(30) null,
    ap_materno_empleado varchar(30) null,
    sexo_empleado int(1) not null COMMENT '1.- Femenino, 0.- Masculino',
    email_empleado varchar(30) not null, 
    password_empleado varchar(64) not null,
    imagen_empleado varchar(30) null DEFAULT null, 
    id_rol int(11) not null,
    foreign key (id_rol) references roles(id_rol) on delete cascade on update cascade
);

insert into empleados values(NULL, 1,'Ivan de Jesus', 'Ojeda', 'Reyes', 0,'Navas55@gmail.com', SHA2("navas123",0), null,444);

INSERT INTO empleados VALUES(NULL, 1,'Ana Karen', 'Ramirez', 'Arenas', 1, 'karen@gmail.com', SHA2("luna123",0), NULL, 555);

CREATE TABLE usuarios(
    id_usuario INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre_usuario varchar(30) not null,
    ap_paterno_usuario varchar(30) null,
    ap_materno_usuario varchar(30) null,
    sexo_usuario int(1) not null COMMENT '1.- Femenino, 0.- Masculino',
    email_usuario varchar(30) not null, 
    monto_pago_mensual decimal(10,2) not null, 
    fecha_inicio date not null, 
    fecha_de_pago date not null, 
    imagen_usuario varchar(30) null DEFAULT null
);

insert into usuarios values(NULL,'Alan Zaid', 'Hernandez', 'Cruz', 0,'Zaid@gmail.com', 350, '2022-12-15','2023-01-15',NULL);
