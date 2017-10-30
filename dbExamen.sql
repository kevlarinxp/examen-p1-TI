CREATE DATABASE TIExamen;
USE TIExamen;

CREATE TABLE usuarios (
  idUsuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  pass varchar(32) NOT NULL,
  nombre varchar(30) NOT NULL,
  apellidos varchar(50) NOT NULL,
  celular varchar(15) NOT NULL,
  direccion varchar(80) NOT NULL,
  twitter varchar(80) NULL,
  facebook varchar(80) NULL,
  gplus varchar(80) NULL,
  correo varchar(50) NOT NULL
);
