-- Enable necessary extensions
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
CREATE EXTENSION IF NOT EXISTS pgcrypto;

-- Drop the sample_menu table if it exists
DROP TABLE IF EXISTS sample_menu;

-- Create the sample_menu table
CREATE TABLE sample_menu (
    id SERIAL PRIMARY KEY,
    food_items VARCHAR(30) NOT NULL,
    is_breakfast BOOLEAN DEFAULT FALSE,
    is_lunch BOOLEAN DEFAULT FALSE,
    is_dinner BOOLEAN DEFAULT FALSE,
    is_veg BOOLEAN DEFAULT FALSE NOT NULL,
    description VARCHAR(150) NOT NULL DEFAULT 'Delicious food item',
    price FLOAT DEFAULT 0 NOT NULL CHECK (price >= 0),
    picture TEXT NOT NULL DEFAULT 'img/menu-1.png'
);

-- Import data from sample_menu.csv
-- Replace '/path/to/your/file/sample_menu.csv' with the actual file path
\COPY sample_menu(food_items, is_breakfast, is_lunch, is_dinner, is_veg, description, price) FROM '../dataset/sample_menu.csv' DELIMITER ',' CSV HEADER;

-- Drop the users table if it exists
DROP TABLE IF EXISTS users;

-- Create the users table
CREATE TABLE users (
    user_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    user_name VARCHAR(30) NOT NULL UNIQUE,
    phone_number CHAR(10) NOT NULL DEFAULT '0000000000',
    email_id VARCHAR(50) NOT NULL UNIQUE,
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
$$ LANGUAGE plpgsql;

-- Trigger to hash password
CREATE TRIGGER password_trigger
BEFORE INSERT ON users
FOR EACH ROW
EXECUTE FUNCTION hash_password();

-- Sample data for users
INSERT INTO users (user_name, phone_number, email_id, password_hash)
VALUES ('user', '1234567890', 'user@gmail.com', 'user');
INSERT INTO users (user_name, phone_number, email_id, password_hash)
VALUES ('pass', '0987654321', 'pass@gmail.com', 'pass');
INSERT INTO users (user_name, phone_number, email_id, password_hash, role)
VALUES ('admin', '0000000000', 'admin@gmail.com', 'admin', 'admin');

-- Drop the cart table if it exists
DROP TABLE IF EXISTS cart;

-- Create the cart table
CREATE TABLE cart (
    cart_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    user_id UUID NOT NULL REFERENCES users(user_id),
    food_id INTEGER NOT NULL REFERENCES sample_menu(id),
    quantity INTEGER DEFAULT 1 NOT NULL CHECK (quantity > 0),
    price FLOAT NOT NULL DEFAULT 0 CHECK (price >= 0),
    date DATE DEFAULT CURRENT_DATE,
    time TIME DEFAULT CURRENT_TIME
);

-- Trigger function to calculate price
CREATE OR REPLACE FUNCTION calculate_price()
RETURNS TRIGGER AS $$
BEGIN
    SELECT (price * NEW.quantity) INTO NEW.price
    FROM sample_menu
    WHERE id = NEW.food_id;

    IF NOT FOUND THEN
        RAISE EXCEPTION 'Food ID % does not exist', NEW.food_id;
    END IF;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- Trigger to calculate price for cart
CREATE TRIGGER calculate_price_trigger
BEFORE INSERT ON cart
FOR EACH ROW
EXECUTE FUNCTION calculate_price();

-- Sequence for bill number generation
CREATE SEQUENCE IF NOT EXISTS bill_number_seq START 104;

-- Function to generate bill number
CREATE OR REPLACE FUNCTION generate_bill_number()
RETURNS VARCHAR AS $$
DECLARE
    next_val INT;
BEGIN
    SELECT nextval('bill_number_seq') INTO next_val;
    RETURN 'b' || next_val;
END;
$$ LANGUAGE plpgsql;

-- Drop the bill table if it exists
DROP TABLE IF EXISTS bill;

-- Create the bill table
CREATE TABLE bill (
    bill_number VARCHAR(8) PRIMARY KEY DEFAULT generate_bill_number(),
    cart_id UUID NOT NULL REFERENCES cart(cart_id),
    user_id UUID NOT NULL REFERENCES users(user_id),
    total_price FLOAT NOT NULL DEFAULT 0 CHECK (total_price >= 0),
    date DATE DEFAULT CURRENT_DATE,
    by_user VARCHAR(30) NOT NULL REFERENCES users(user_name)
);

-- Trigger function to calculate bill
CREATE OR REPLACE FUNCTION calculate_bill()
RETURNS TRIGGER AS $$
BEGIN
    SELECT SUM(price) INTO NEW.total_price
    FROM cart
    WHERE cart.user_id = NEW.user_id AND cart.date = NEW.date;

    IF NOT FOUND THEN
        RAISE EXCEPTION 'No cart found for user ID %', NEW.user_id;
    END IF;

    SELECT user_name INTO NEW.by_user
    FROM users
    WHERE users.user_id = NEW.user_id;

    SELECT cart_id INTO NEW.cart_id
    FROM cart
    WHERE cart.user_id = NEW.user_id AND cart.date = NEW.date LIMIT 1;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- Trigger to calculate bill
CREATE TRIGGER trigger_bill
BEFORE INSERT ON bill
FOR EACH ROW
EXECUTE FUNCTION calculate_bill();

-- Drop the feedback table if it exists
DROP TABLE IF EXISTS feedback;

-- Create the feedback table
CREATE TABLE feedback (
    user_name VARCHAR(30) NOT NULL,
    email_id VARCHAR(50) NOT NULL UNIQUE,
    profession VARCHAR(50),
    messages VARCHAR(150),
    picture TEXT DEFAULT 'img/user.png',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data for feedback
INSERT INTO feedback (user_name, email_id, profession, messages, picture)
VALUES
    ('John Doe', 'testimonal1@gmail.com', 'Food Critic', 'Foodzy is amazing! Their quality of service and food is unmatched. Highly recommended!', 'img/testimonial-1.jpg'),
    ('Jane Smith', 'testimonal2@gmail.com', 'Business Owner', 'Ive been ordering from Foodzy for years now, and they never disappoint. Great service and delicious food!', 'img/testimonial-2.jpg'),
    ('David Johnson', 'testimonal3@gmail.com', 'Event Planner', 'The team at Foodzy always goes above and beyond to make sure their customers are satisfied. Keep up the great work!', 'img/testimonial-3.jpg'),
    ('Emily Davis', 'testimonal4@gmail.com', 'Food Blogger', 'Foodzy has been my go-to restaurant for every occasion. Their attention to detail and flavor is unmatched!', 'img/testimonial-4.jpg');

-- Procedures for updating the menu
CREATE OR REPLACE PROCEDURE update_menu(IN food_id INTEGER, IN food_price FLOAT)
AS $$
BEGIN
    UPDATE sample_menu SET price = food_price WHERE id = food_id;
    IF NOT FOUND THEN
        RAISE EXCEPTION 'Menu item with ID % not found', food_id;
    END IF;
END;
$$ LANGUAGE plpgsql;

-- Procedures for deleting a menu item
CREATE OR REPLACE PROCEDURE delete_menu(IN food_id INTEGER)
AS $$
BEGIN
    DELETE FROM sample_menu WHERE id = food_id;
    IF NOT FOUND THEN
        RAISE EXCEPTION 'Menu item with ID % not found', food_id;
    END IF;
END;
$$ LANGUAGE plpgsql;

-- Procedures for inserting a new menu item
CREATE OR REPLACE PROCEDURE insert_menu(
    IN food_name VARCHAR(30), IN breakfast BOOLEAN, IN lunch BOOLEAN, IN dinner BOOLEAN,
    IN veg BOOLEAN, IN descp VARCHAR(150), IN food_price FLOAT
)
AS $$
BEGIN
    INSERT INTO sample_menu (food_items, is_breakfast, is_lunch, is_dinner, is_veg, description, price)
    VALUES (food_name, breakfast, lunch, dinner, veg, descp, food_price);
END;
$$ LANGUAGE plpgsql;

-- Query to check table connectivity
SELECT DISTINCT users.user_name
FROM bill
JOIN cart ON bill.cart_id = cart.cart_id
JOIN users ON cart.user_id = users.user_id;

-- Cleanup for testing
-- TRUNCATE TABLE cart, bill, feedback, users, sample_menu RESTART IDENTITY CASCADE;

-- Select all data from the sample_menu table
SELECT * FROM sample_menu;

-- Select all data from the users table
SELECT * FROM users;

-- Select all data from the cart table
SELECT * FROM cart;

-- Select all data from the bill table
SELECT * FROM bill;

-- Select all data from the feedback table
SELECT * FROM feedback;
