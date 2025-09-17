-- SQL Script untuk Database E-Commerce

-- 1. Membuat Database
CREATE DATABASE ecommerce_db;
USE ecommerce_db;

-- 2. Membuat Tabel Products
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    deskripsi TEXT,
    stok INT NOT NULL
);

-- 3. Membuat Tabel Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL
);

-- 4. Membuat Tabel Orders
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    total INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-----------------------------------------------------
-- CRUD TABEL PRODUCTS
-----------------------------------------------------

-- CREATE
INSERT INTO products (nama_produk, harga, deskripsi, stok) VALUES
('Laptop Gaming', 12000000, 'Laptop performa tinggi untuk gaming', 5),
('Smartphone', 5000000, 'HP canggih dengan kamera bagus', 15),
('Kaos Polos', 75000, 'Kaos polos nyaman dipakai', 50);

-- READ
SELECT * FROM products;

-- UPDATE
UPDATE products SET harga = 11000000, stok = 3 WHERE id = 1;

-- DELETE
DELETE FROM products WHERE id = 3;

-----------------------------------------------------
-- CRUD TABEL USERS
-----------------------------------------------------

-- CREATE
INSERT INTO users (nama, email, password) VALUES
('Andi', 'andi@example.com', 'password123'),
('Budi', 'budi@example.com', 'qwerty'),
('Citra', 'citra@example.com', 'abc123');

-- READ
SELECT * FROM users;

-- UPDATE
UPDATE users SET password = 'newpassword456' WHERE id = 1;

-- DELETE
DELETE FROM users WHERE id = 3;

-----------------------------------------------------
-- CRUD TABEL ORDERS
-----------------------------------------------------

-- CREATE
INSERT INTO orders (user_id, product_id, quantity, total) VALUES
(1, 1, 1, 12000000), -- Andi pesan 1 Laptop Gaming
(2, 2, 2, 10000000); -- Budi pesan 2 Smartphone

-- READ (join untuk lihat pesanan lengkap)
SELECT o.order_id, u.nama AS nama_user, p.nama_produk, o.quantity, o.total
FROM orders o
JOIN users u ON o.user_id = u.id
JOIN products p ON o.product_id = p.id;

-- UPDATE
UPDATE orders SET quantity = 3, total = 15000000 WHERE order_id = 2;

-- DELETE
DELETE FROM orders WHERE order_id = 1;
