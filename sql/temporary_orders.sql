CREATE TABLE temporary_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    product_name VARCHAR(100),
    quantity INT,
    address TEXT,
    payment_method VARCHAR(50),
    delivery_date DATE,
    delivery_time TIME,
    order_status ENUM('pending', 'delivered') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
