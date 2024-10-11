INSERT INTO completed_orders (customer_name, product_name, quantity, address, payment_method, delivery_date, delivery_time)
SELECT customer_name, product_name, quantity, address, payment_method, delivery_date, delivery_time
FROM temporary_orders WHERE id = ?;

DELETE FROM temporary_orders WHERE id = ?;
