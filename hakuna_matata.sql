CREATE DATABASE HAKUNA_MATATA;

CREATE TABLE HAKUNA_MATATA.Cliente (
 ID_Cliente INT PRIMARY KEY NOT NULL,
 nombre VARCHAR(50), 
 apellidos VARCHAR(50),
 telefono VARCHAR(50),
 email VARCHAR(50),
 direccion VARCHAR(50),
 contraseña VARCHAR(60),
 rol VARCHAR(15) DEFAULT 'usuario',
 estado VARCHAR(20) DEFAULT 'activo'
 );
 
CREATE TABLE HAKUNA_MATATA.Empleados (
 ID_Empleados INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(50) , 
 apellidos VARCHAR(50),
 telefono VARCHAR(50),
 correo VARCHAR(50),
 direccion VARCHAR(50)
 );

 CREATE TABLE HAKUNA_MATATA.Servicios (
 ID_Servicios INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(50),
 descripcion TEXT,
 precio DECIMAL
 );

CREATE TABLE HAKUNA_MATATA.Mascota (
 ID_Mascota INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(50),
 raza VARCHAR(50),
 sexo VARCHAR(50),
 ID_Cliente INT,
 tamaño VARCHAR(50),
 FOREIGN KEY(ID_Cliente) REFERENCES Cliente(ID_Cliente)
 );
 
CREATE TABLE HAKUNA_MATATA.citas (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ID_Cliente INT,
ID_Mascota INT,
fecha DATE,
hora TIME,
ID_Servicio INT,
ID_Empleados INT,
creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
actualizado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY(ID_Cliente) REFERENCES Cliente(ID_Cliente),
FOREIGN KEY(ID_Mascota) REFERENCES Mascota(ID_Mascota),
FOREIGN KEY(ID_Servicio) REFERENCES Servicios(ID_Servicios),
FOREIGN KEY(ID_Empleados) REFERENCES Empleados(ID_Empleados)
);

DROP DATABASE hakuna_matata;
