--drop table sample_menu;
--Run this script as user in restaurant database

-- CREATE SCRIPT
CREATE TABLE sample_menu(
    id SERIAL PRIMARY KEY NOT NULL,
    food_items VARCHAR(30) NOT NULL,
    is_breakfast BOOLEAN DEFAULT FALSE,
    is_lunch BOOLEAN DEFAULT FALSE,
    is_dinner BOOLEAN DEFAULT FALSE,
    is_veg BOOLEAN DEFAULT FALSE NOT NULL
);

-- IMPORT sample_menu.csv WITH DEfAULT VALUES

-- PRINT ALL
SELECT * FROM sample_menu;

