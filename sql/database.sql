CREATE DATABASE IF NOT EXISTS angelpeluqueros;

USE angelpeluqueros;

CREATE TABLE peluqueros(
  username VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  telefono CHAR(9) NOT NULL,
  rol CHAR(5) NOT NULL,
PRIMARY KEY(username));

CREATE TABLE clientes(
  username VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  telefono CHAR(9) NOT NULL,
  rol CHAR(10) NOT NULL,
PRIMARY KEY(username));

CREATE TABLE servicios(
  codigo VARCHAR(4) NOT NULL,
  nombre VARCHAR(20) NOT NULL,
PRIMARY KEY(codigo));

CREATE TABLE citas (
  username VARCHAR(20) NOT NULL,
  fecha DATETIME NOT NULL,
  servicio CHAR(9) NOT NULL,
  peluquero VARCHAR(20) NOT NULL,
PRIMARY KEY(username, fecha),
FOREIGN KEY (peluquero) REFERENCES peluqueros(username) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (username) REFERENCES clientes (username) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (servicio) REFERENCES servicios (codigo) ON DELETE CASCADE ON UPDATE CASCADE);

