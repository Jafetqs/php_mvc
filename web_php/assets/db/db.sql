CREATE DATABASE bienes_raices;
USE bienes_raices;


CREATE TABLE props (
  id_inmueble int NOT NULL AUTO_INCREMENT,
  id_usuario int NOT NULL,
  nombre varchar(255) NOT NULL,
  provincia varchar(255) NOT NULL,
  direccion varchar(255) NOT NULL,
  precio decimal(10,2) NOT NULL,
  numero_cuartos int NOT NULL,
  numero_bannos int NOT NULL,
  espacios_cochera int NOT NULL,
  estado varchar(255) NOT NULL DEFAULT 'En Venta',
  img1 varchar(255) NOT NULL,
  img2 varchar(255) DEFAULT NULL,
  img3 varchar(255)  DEFAULT NULL,
  PRIMARY KEY (id_inmueble),
  KEY id_usuario (id_usuario)
);




CREATE TABLE usrs (
  id_usuario int NOT NULL AUTO_INCREMENT,
  cedula varchar(20) NOT NULL,
  nombre varchar(30) NOT NULL,
  correo varchar(30) NOT NULL,
  telefono varchar(12) DEFAULT NULL,
  celular varchar(12) DEFAULT NULL,
  contrasenna varchar(30)  NOT NULL,
  nacimiento date NOT NULL,
  foto varchar(50) DEFAULT NULL,
  rol enum('cliente','administrador') NOT NULL DEFAULT 'cliente',
  PRIMARY KEY (id_usuario),
  UNIQUE KEY uq_email (cedula)
);
INSERT INTO usrs (id_usuario, cedula, nombre, correo, telefono, celular, contrasenna, nacimiento, foto, rol) VALUES
(1, '211111111', 'administrador', 'admin@br.net', '-', '-', 'admin', '2000-01-01', 'assets/img/foto.jpg', 'administrador');


