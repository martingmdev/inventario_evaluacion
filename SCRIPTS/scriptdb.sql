CREATE DATABASE sistema_inventario;

USE sistema_inventario;

-- Crear tabla de roles
CREATE TABLE roles (
    idRol INT(2) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- Insertar roles
INSERT INTO roles (nombre) VALUES ('Administrador'), ('Almacenista');

-- Crear tabla de usuarios
CREATE TABLE usuarios (
    idUsuario INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(50) NOT NULL,
    contrasena VARCHAR(25) NOT NULL,
    idRol INT(2),
    estatus INT(1) DEFAULT 1,
    FOREIGN KEY (idRol) REFERENCES roles(idRol)
);

-- Crear tabla de productos
CREATE TABLE productos (
    idProducto INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    cantidad INT(6) DEFAULT 0,
    estatus INT(1) DEFAULT 1
);

-- Crear tabla de histórico de movimientos
CREATE TABLE historico_movimientos (
    idMovimiento INT(6) AUTO_INCREMENT PRIMARY KEY,
    idProducto INT(6),
    tipo ENUM('entrada', 'salida'),
    cantidad INT(6) NOT NULL,
    idUsuario INT(6),
    fechaHora DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idProducto) REFERENCES productos(idProducto),
    FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);

-- Crear tabla de entradas
CREATE TABLE entradas (
    idEntrada INT(6) AUTO_INCREMENT PRIMARY KEY,
    idProducto INT(6),
    cantidad INT(6) NOT NULL,
    idUsuario INT(6),
    fechaHora DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idProducto) REFERENCES productos(idProducto),
    FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);

-- Crear tabla de salidas
CREATE TABLE salidas (
    idSalida INT(6) AUTO_INCREMENT PRIMARY KEY,
    idProducto INT(6),
    cantidad INT(6) NOT NULL,
    idUsuario INT(6),
    fechaHora DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idProducto) REFERENCES productos(idProducto),
    FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);


-- Insertar usuarios
INSERT INTO usuarios (nombre, correo, contrasena, idRol, estatus) VALUES 
('Admin User', 'admin@example.com', 'admin123', 1, 1),
('Storekeeper User', 'storekeeper@example.com', 'store123', 2, 1);