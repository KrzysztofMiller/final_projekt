DROP DATABASE IF EXISTS voip;
CREATE DATABASE voip;

use voip;

CREATE TABLE customer (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  customer VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL,
  price DECIMAL(16,2) NOT NULL,
  quantity INT UNSIGNED NOT NULL,
  description TEXT,
  images_urls TEXT,
  group_id INT
);

