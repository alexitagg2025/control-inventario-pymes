CREATE DATABASE InventarioPyMES;
GO

USE InventarioPyMES;
GO

CREATE TABLE Usuarios (
    id_usuario INT PRIMARY KEY IDENTITY(1,1),
    nombre VARCHAR(100),
    correo VARCHAR(100),
    password VARCHAR(255)
);

CREATE TABLE Productos (
    id_producto INT PRIMARY KEY IDENTITY(1,1),
    nombre VARCHAR(100),
    descripcion VARCHAR(255),
    precio DECIMAL(10,2),
    stock INT
);

INSERT INTO Usuarios(nombre, correo, password)
VALUES
('Administrador', 'admin@empresa.com', '12345');

INSERT INTO Productos(nombre, descripcion, precio, stock)
VALUES
('Laptop', 'Equipo de cómputo', 12000, 10),
('Mouse', 'Mouse inalámbrico', 250, 25);

SELECT * FROM Usuarios;
SELECT * FROM Productos;