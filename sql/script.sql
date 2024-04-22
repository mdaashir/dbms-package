-- Drop the table if it exists
DROP TABLE IF EXISTS sample_menu;

-- Create the table
CREATE TABLE sample_menu(
    id SERIAL PRIMARY KEY,
    food_items VARCHAR(30) NOT NULL,
    is_breakfast BOOLEAN DEFAULT FALSE,
    is_lunch BOOLEAN DEFAULT FALSE,
    is_dinner BOOLEAN DEFAULT FALSE,
    is_veg BOOLEAN DEFAULT FALSE NOT NULL,
	description VARCHAR(150) NOT NULL,
	price FLOAT DEFAULT 0 NOT NULL,
    picture text NOT NULL DEFAULT 'img/menu-1.png'
);

-- Import data from sample_menu.csv
-- Remove first line in sample_menu.csv before running  
COPY sample_menu(food_items, is_breakfast, is_lunch, is_dinner, is_veg, description, price) 
FROM 'path_to_your_csv/sample_menu.csv' DELIMITER ',' CSV HEADER;

-- Print all records in the table
SELECT * FROM sample_menu;

-- run this to enable extension
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
CREATE EXTENSION IF NOT EXISTS pgcrypto;

DROP TABLE IF EXISTS users;

-- Create the users table
CREATE TABLE users (
    user_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    user_name VARCHAR(30) NOT NULL UNIQUE,
    phone_number CHAR(10) NOT NULL DEFAULT '0000000000',
    email_id VARCHAR(30) NOT NULL DEFAULT 'name@email.com',
    password_hash VARCHAR(60) NOT NULL UNIQUE,
    role VARCHAR(5) NOT NULL DEFAULT 'user'
);

-- Trigger function to hash password
CREATE OR REPLACE FUNCTION hash_password()
RETURNS TRIGGER AS $$
BEGIN
    NEW.password_hash := crypt(NEW.password_hash, gen_salt('bf'));
    RETURN NEW;
END;
$$ 
LANGUAGE plpgsql;

-- Trigger call
CREATE TRIGGER password_trigger
BEFORE INSERT ON users
FOR EACH ROW
EXECUTE FUNCTION hash_password();

-- sample data
INSERT INTO users (user_name, phone_number, email_id, password_hash) 
VALUES ('user', '1234567890', 'user@gmail.com','user');
INSERT INTO users (user_name, phone_number, email_id, password_hash) 
VALUES ('pass', '0987654321', 'pass@gmail.com','pass');
INSERT INTO users (user_name, phone_number, email_id, password_hash, role) 
VALUES ('admin', '0000000000', 'admin@gmail.com','admin', 'admin');

select * from users;

-- cart table
CREATE TABLE cart(
	cart_id UUID,
    user_id UUID REFERENCES users(user_id),
	food_id SERIAL REFERENCES sample_menu(id),
	quantity INTEGER DEFAULT 1 NOT NULL,
	price FLOAT NOT NULL DEFAULT 0,
	date DATE DEFAULT CURRENT_DATE,
	time TIME DEFAULT CURRENT_TIME
);

-- Trigger function to calculate the price
CREATE OR REPLACE FUNCTION calculate_price()
RETURNS TRIGGER AS $$
BEGIN
    -- Calculate the price based on the food_item_id and quantity
    SELECT (price * NEW.quantity) INTO NEW.price
    FROM sample_menu
    WHERE id = NEW.food_id;
    
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- Trigger to calculate the price
CREATE TRIGGER calculate_price_trigger
BEFORE INSERT ON cart
FOR EACH ROW
EXECUTE FUNCTION calculate_price();

-- Trigger function to generate cart id
CREATE OR REPLACE FUNCTION before_insert_cart()
RETURNS TRIGGER AS $$
BEGIN
    NEW.cart_id := MD5(NEW.user_id || NEW.date::TEXT);
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

--Trigger to cart id
CREATE TRIGGER trigger_before_insert_cart
BEFORE INSERT ON cart
FOR EACH ROW
EXECUTE FUNCTION before_insert_cart();

-- sample data
INSERT INTO cart (user_id, food_id, quantity)
VALUES
    ('4fb66535-b174-47fc-8600-dcec26085afc', 1, 2),  
    ('4fb66535-b174-47fc-8600-dcec26085afc', 3, 1),  
    ('4fb66535-b174-47fc-8600-dcec26085afc', 2, 3); 

select * from cart;

-- table for bill
CREATE TABLE bill(
    bill_number VARCHAR(8) PRIMARY KEY DEFAULT generate_bill_number(),
	cart_id UUID,
    user_id UUID REFERENCES users(user_id),
    total_price FLOAT NOT NULL DEFAULT 0,
    date DATE DEFAULT CURRENT_DATE,
    by_user VARCHAR(30) REFERENCES users(user_name)
);

-- sequence variable to create a billno
CREATE SEQUENCE bill_number_seq START 0104;

-- function to return billno
CREATE OR REPLACE FUNCTION generate_bill_number()
RETURNS VARCHAR AS $$
DECLARE
    next_val INT;
BEGIN
    SELECT nextval('bill_number_seq') INTO next_val;
    RETURN 'b' || next_val;
END;
$$ 
LANGUAGE plpgsql;

-- Trigger function to calculate the bill
CREATE OR REPLACE FUNCTION calculate_bill()
RETURNS TRIGGER AS $$
BEGIN
    SELECT SUM(price) INTO NEW.total_price
    FROM cart
    WHERE cart.user_id = NEW.user_id AND cart.date = NEW.date;

	SELECT role INTO NEW.by_user
    FROM users
    WHERE users.user_id = NEW.user_id;

	SELECT DISTINCT cart_id INTO NEW.cart_id
	FROM cart
	WHERE cart.user_id = NEW.user_id AND cart.date = NEW.date;
	
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

--Trigger to bill
CREATE TRIGGER trigger_bil
BEFORE INSERT ON bill
FOR EACH ROW
EXECUTE FUNCTION calculate_bill();

--sample data
INSERT INTO BILL(user_id) VALUES('4fb66535-b174-47fc-8600-dcec26085afc');

SELECT * FROM bill;

-- table for feedback
CREATE TABLE feedback(
    user_name VARCHAR(30) NOT NULL,
    email_id VARCHAR(30) NOT NULL,
	profession VARCHAR(50),
	messages VARCHAR(150),
    picture TEXT DEFAULT 'img/user.png'
);

-- sample data
INSERT INTO feedback VALUES ('John Doe','testimonal1@gmail.com','Food Critic','Foodzy is amazing! Their quality of service and food is unmatched. Highly recommended!','img/testimonial-1.jpg'),
('Jane Smith','testimonal2@gmail.com','Business Owner','Ive been ordering from Foodzy for years now, and they never disappoint. Great service and delicious food!','img/testimonial-2.jpg'),
('David Johnson','testimonal3@gmail.com','Event Planner','The team at Foodzy always goes above and beyond to make sure their customers are satisfied. Keep up the great work!','img/testimonial-3.jpg'),
('Emily Davis','testimonal4@gmail.com','Food Blogger','Foodzy has been my go-to restaurant for every occasion. Their attention to detail and flavor is unmatched!','img/testimonial-4.jpg');

SELECT * FROM feedback;

CREATE OR REPLACE PROCEDURE update_menu(IN food_id INTEGER,IN food_price FLOAT)
AS $$
BEGIN
	UPDATE sample_menu SET price = food_price WHERE id = food_id;
END;
$$LANGUAGE plpgsql;

CREATE OR REPLACE PROCEDURE delete_menu(IN food_id INTEGER)
AS $$
BEGIN
	DELETE FROM sample_menu WHERE id = food_id;
END;
$$LANGUAGE plpgsql;

CREATE OR REPLACE PROCEDURE insert_menu(IN food_name VARCHAR(30),IN breakfast BOOLEAN,IN lunch BOOLEAN,IN dinner BOOLEAN,IN veg BOOLEAN,IN descp VARCHAR(150),IN food_price FLOAT)
AS $$
BEGIN
	INSERT INTO sample_menu (food_items, is_breakfast, is_lunch, is_dinner, is_veg, description, price) VALUES (food_name, breakfast, lunch, dinner, veg, descp, food_price);
END;
$$LANGUAGE plpgsql;

-- Query to check table connectivity
SELECT DISTINCT user_name FROM bill,cart,users WHERE bill.cart_id = cart.cart_id AND cart.user_id = users.user_id;