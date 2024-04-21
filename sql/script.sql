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
    password_hash VARCHAR(60) NOT NULL UNIQUE
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

select * from users;