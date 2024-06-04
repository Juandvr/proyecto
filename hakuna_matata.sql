CREATE DATABASE HAKUNA_MATATA;

CREATE TABLE HAKUNA_MATATA.Cliente (
 ID_Cliente INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(50) , 
 apellidos VARCHAR(50),
 telefono VARCHAR(50),
 email VARCHAR(50),
 direccion VARCHAR(50),
 contraseña VARCHAR(50)
 );
 
 CREATE TABLE HAKUNA_MATATA.Mascota (
 ID_Mascota INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(50) , 
 especie VARCHAR(50),
 raza VARCHAR(50),
 personalidad VARCHAR(100),
 Sexo VARCHAR(50),
 ID_Cliente INT,
 Tamaño VARCHAR(50),
 FOREIGN KEY(ID_Cliente) REFERENCES Cliente(ID_Cliente)
 );
 
CREATE TABLE HAKUNA_MATATA.Empleados (
 ID_Empleados INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(50) , 
 apellidos VARCHAR(50),
 telefono VARCHAR(50),
 correo VARCHAR(50),
 direccion VARCHAR(50)
 );
 
CREATE TABLE  HAKUNA_MATATA.Factura (
 ID_Factura INT AUTO_INCREMENT PRIMARY KEY,
 precio DECIMAL
 ); 

 CREATE TABLE HAKUNA_MATATA.Servicios (
 ID_Servicios INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(50) , 
 fecha DATE,
 ID_Mascota INT,
 ID_Empleados INT,
 ID_Factura INT,
 precio DECIMAL,
 FOREIGN KEY(ID_Mascota) REFERENCES Mascota(ID_Mascota),
 FOREIGN KEY(ID_Empleados) REFERENCES Empleados(ID_Empleados),
 FOREIGN KEY(ID_Factura) REFERENCES Factura(ID_Factura)
 );