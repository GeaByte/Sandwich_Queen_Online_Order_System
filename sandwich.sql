USE sandwichQueen
-- users
INSERT INTO users (name, email, email_verified_at, password, created_at, updated_at, role, balance, phone, address) VALUES ('John Doe', 'admin@com', NOW(), '$2y$10$m3EUqH2kXZzV9hCpKAZxuugerdqph4Jnauzp3LDq5rA5Y5Ir.k/Ga', NOW(), NOW(), 'admin', 100, '123-123-12234', '123 street');
-- products
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'TV', 'Best TV', 'game.png', '1000', '2021-10-01
00:00:00', '2021-10-01 00:00:00');
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'iPhone', 'Best iPhone', 'safe.png', '999', '2021-10-
01 00:00:00', '2021-10-01 00:00:00');
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'Chromecast', 'Best Chromecast', 'submarine.png',
'30', '2021-10-01 00:00:00', '2021-10-01 00:00:00');
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'Glasses', 'Best Glasses', 'game.png', '100', '2021-
10-01 00:00:00', '2021-10-01 00:00:00');
-- carts
INSERT INTO `carts` (`id`, `productID`, `customerID`, `quantity`, `created_at`, `updated_at`) VALUES ('1', '1', '1', '2', '2024-04-06 18:41:17', '2024-04-06 18:41:17');