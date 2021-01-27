CREATE DATABASE GEMAS;
USE GEMAS;

CREATE TABLE USUARIO_GEMAS(
	EMAIL VARCHAR(50) NOT NULL,
    NOMBRE VARCHAR(50),
    APELLIDO_U VARCHAR(50),
    CODIGO VARCHAR(1), 
    COD_REVISOR INT(1)
);

CREATE TABLE revisores (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(45) DEFAULT NULL,
  apellido varchar(45) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

SELECT * FROM USUARIO_GEMAS;
SELECT * FROM REVISORES;
DROP TABLE USUARIO_GEMAS;
DROP TABLE REVISORES;

INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor1');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor2');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor3');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor4');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor5');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor6');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor7');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor8');

