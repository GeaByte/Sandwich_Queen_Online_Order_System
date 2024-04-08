USE sandwichQueen
-- users
INSERT INTO users (name, email, email_verified_at, password, created_at, updated_at, role, balance, phone, address) VALUES ('John Doe', 'admin@com', NOW(), '$2y$10$m3EUqH2kXZzV9hCpKAZxuugerdqph4Jnauzp3LDq5rA5Y5Ir.k/Ga', NOW(), NOW(), 'admin', 100, '123-123-12234', '123 street');

-- products
INSERT INTO products (name, description, image, category, price, created_at) VALUES ('Crispy Chicken Sandwich', 'Crispy Chicken Sandwich', '5.jpg', 'sandwich', '14.99', now());
INSERT INTO products (name, description, image, category, price, created_at) VALUES ('Grilled Chicken Sandwich', 'Grilled Chicken Sandwich', '6.jpg', 'sandwich', '13.99', now());
INSERT INTO products (name, description, image, category, price, created_at) VALUES ('Double Cheeseburger', 'Double Cheeseburger', '7.jpg', 'burger', '17.99', now());
INSERT INTO products (name, description, image, category, price, created_at) VALUES ('Caesar Salad', 'Caesar Salad', '8.jpg', 'salad', '12.99', now());
INSERT INTO products (name, description, image, category, price, created_at) VALUES ('Chicken Salad', 'Chicken Salad', '9.jpg', 'salad', '12.99', now());
INSERT INTO products (name, description, image, category, price, created_at) VALUES ('Fried Chicken', '8 pieces Fried Chicken', '10.jpg', 'side', '19.99', now());
INSERT INTO products (name, description, image, category, price, created_at) VALUES ('French Fries', 'French Fries', '11.jpg', 'side', '7.99', now());
INSERT INTO products (name, description, image, category, price, created_at) VALUES ('Beverage', 'Soda Drinks', '12.jpg', 'beverage', '3.99', now());
INSERT INTO products (name, description, image, category, price, created_at) VALUES ('Chicken Nuggets', '10 pieces Chicken Nuggets', '13.jpg', 'sandwich', '8.99', now());

-- carts
INSERT INTO `carts` (`id`, `productID`, `customerID`, `quantity`, `created_at`, `updated_at`) VALUES ('1', '1', '1', '2', '2024-04-06 18:41:17', '2024-04-06 18:41:17');