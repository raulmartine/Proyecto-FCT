CREATE TABLE usuarios(
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
PRIMARY KEY(username, fecha, servicio, peluquero),

FOREIGN KEY (peluquero) REFERENCES usuarios(username) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (servicio) REFERENCES servicios(codigo) ON DELETE CASCADE ON UPDATE CASCADE);

INSERT INTO usuarios VALUES('usuario1','usuario1', '123456789','registrado'),
                          ('usuario2','usuario2', '254383571','registrado'),
                          ('usuario3','usuario3', '','registrado'),
                          ('peluquero1','peluquero1', '482428722', 'peluquero'),
                          ('peluquero2','peluquero2', '159325353', 'peluquero'),
                          ('admin','admin', '999999999','admin');

INSERT INTO servicios VALUES ('CDPH','Corte de Pelo Hombre'),
                            ('CDPM', 'Corte de Pelo Mujer');
