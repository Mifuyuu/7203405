-- สร้างฐานข้อมูล
CREATE DATABASE IF NOT EXISTS promptpay_qr CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE promptpay_qr;

-- สร้างตารางสำหรับเก็บประวัติ
CREATE TABLE IF NOT EXISTS history (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id VARCHAR(50) NOT NULL,
  target VARCHAR(100) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
