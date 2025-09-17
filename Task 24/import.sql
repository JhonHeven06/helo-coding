CREATE DATABASE IF NOT EXISTS product_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE product_db;

CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(191) NOT NULL,
  short_desc VARCHAR(255) DEFAULT NULL,
  long_desc TEXT DEFAULT NULL,
  price INT DEFAULT 0,
  image VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO products (name, short_desc, long_desc, price, image) VALUES
('Kopi Arabika 250g', 'Kopi bubuk premium', 'Kopi Arabika pilihan, dipanggang sedang, aroma kaya dan cocok untuk espresso atau seduhan manual.', 75000, NULL),
('Tas Kanvas', 'Tas kasual serbaguna', 'Tas kanvas ukuran sedang, tahan lama, cocok untuk kampus atau hangout.', 120000, NULL),
('Headphone Bluetooth', 'Headphone nirkabel nyaman', 'Headphone dengan noise isolation ringan, baterai tahan hingga 20 jam.', 350000, NULL);
