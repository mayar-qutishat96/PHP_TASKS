CREATE TABLE [User] (
    user_id INT IDENTITY(1,1) PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    user_mobile VARCHAR(20),
    user_email VARCHAR(255),
    user_address TEXT
);

CREATE TABLE Category (
    category_id INT IDENTITY(1,1) PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL,
    category_description TEXT
);

CREATE TABLE Item (
    item_id INT IDENTITY(1,1) PRIMARY KEY,
    item_description TEXT NOT NULL,
    item_image VARCHAR(255),
    item_total_number INT,
    category_id INT,Category
    FOREIGN KEY (category_id) REFERENCES Category(category_id)
);

CREATE TABLE [Order] (
    order_id INT IDENTITY(1,1) PRIMARY KEY,
    user_order_id INT,
    user_item_order_id INT,
    FOREIGN KEY (user_order_id) REFERENCES [User](user_id),
    FOREIGN KEY (user_item_order_id) REFERENCES Item(item_id)
);

CREATE TABLE ShoppingBasket (
    basket_id INT IDENTITY(1,1) PRIMARY KEY,
    user_id INT,
    item_id INT,
    quantity INT,
    FOREIGN KEY (user_id) REFERENCES [User](user_id),
    FOREIGN KEY (item_id) REFERENCES Item(item_id)
);
