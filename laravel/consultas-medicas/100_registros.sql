INSERT INTO pacientes 
(tipoDocumento, dni, nombre, apellido, fechaNacimiento, genero, telefono, email, direccion, estado, created_at, updated_at)
VALUES
('CC', '1000000001', 'Juan', 'Pérez', '1990-05-12', 'M', '3000000001', 'juan1@example.com', 'Calle 1 #1-01', 'activo', NOW(), NOW()),
('CC', '1000000002', 'María', 'Gómez', '1988-03-22', 'F', '3000000002', 'maria2@example.com', 'Calle 2 #2-02', 'inactivo', NOW(), NOW()),
('CC', '1000000003', 'Carlos', 'Ramírez', '1995-07-10', 'M', '3000000003', 'carlos3@example.com', 'Calle 3 #3-03', 'activo', NOW(), NOW()),
('TI', '1000000004', 'Ana', 'Martínez', '2000-11-05', 'F', '3000000004', 'ana4@example.com', 'Calle 4 #4-04', 'activo', NOW(), NOW()),
('CC', '1000000005', 'Pedro', 'López', '1982-01-15', 'M', '3000000005', 'pedro5@example.com', 'Calle 5 #5-05', 'inactivo', NOW(), NOW()),
('CC', '1000000006', 'Laura', 'Hernández', '1998-08-30', 'F', '3000000006', 'laura6@example.com', 'Calle 6 #6-06', 'activo', NOW(), NOW()),
('CC', '1000000007', 'Andrés', 'Castro', '1992-09-19', 'M', '3000000007', 'andres7@example.com', 'Calle 7 #7-07', 'activo', NOW(), NOW()),
('TI', '1000000008', 'Sofía', 'Rojas', '2003-12-25', 'F', '3000000008', 'sofia8@example.com', 'Calle 8 #8-08', 'inactivo', NOW(), NOW()),
('CC', '1000000009', 'David', 'Jiménez', '1987-06-17', 'M', '3000000009', 'david9@example.com', 'Calle 9 #9-09', 'activo', NOW(), NOW()),
('CC', '1000000010', 'Valentina', 'Moreno', '1993-10-28', 'F', '3000000010', 'valentina10@example.com', 'Calle 10 #10-10', 'activo', NOW(), NOW());