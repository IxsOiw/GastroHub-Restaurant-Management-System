CREATE DATABASE IF NOT EXISTS bistro;
use bistro
;

CREATE TABLE food_category (
    food_category_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE reservation_status (
    reservation_status_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE order_status (
    order_status_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE customer (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100)
);

CREATE TABLE waiter (
    waiter_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE restaurant_table (
    table_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE food (
    food_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    food_category_id INT,
    image VARCHAR(255),
    available TINYINT DEFAULT 1,
    FOREIGN KEY (food_category_id) REFERENCES food_category(food_category_id)
);

CREATE TABLE reservation (
    reservation_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT NOT NULL,
    table_id INT NOT NULL,
    reservation_status_id INT DEFAULT 1,
    date DATE NOT NULL,
    time TIME NOT NULL,
    number_of_guests INT NOT NULL,
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customer(customer_id),
    FOREIGN KEY (table_id) REFERENCES restaurant_table(table_id),
    FOREIGN KEY (reservation_status_id) REFERENCES reservation_status(reservation_status_id)
);

CREATE TABLE reservation_food (
    reservation_food_id INT PRIMARY KEY AUTO_INCREMENT,
    reservation_id INT NOT NULL,
    food_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    price_at_order_time DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (reservation_id) REFERENCES reservation(reservation_id),
    FOREIGN KEY (food_id) REFERENCES food(food_id)
);

CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    waiter_id INT,
    table_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customer(customer_id),
    FOREIGN KEY (waiter_id) REFERENCES waiter(waiter_id),
    FOREIGN KEY (table_id) REFERENCES restaurant_table(table_id)
);

CREATE TABLE order_food (
    order_food_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    food_id INT NOT NULL,
    quantity INT NOT NULL,
    price_at_order_time DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (food_id) REFERENCES food(food_id)
);

CREATE TABLE order_status_history (
    order_status_history_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    order_status_id INT NOT NULL,
    changed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (order_status_id) REFERENCES order_status(order_status_id)
);

CREATE TABLE message (
    message_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    is_read TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default data
INSERT INTO reservation_status (name) VALUES ('Nová'), ('Potvrdená'), ('Zrušená');
INSERT INTO order_status (name) VALUES ('Prijatá'), ('Pripravuje sa'), ('Doručená'), ('Zrušená');
INSERT INTO food_category (name) VALUES ('Coffee'), ('Breakfast'), ('Lunch'), ('Dinner'), ('Drinks'), ('Desserts');
