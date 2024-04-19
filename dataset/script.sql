-- Drop the table if it exists
DROP TABLE IF EXISTS sample_menu;

-- Create the table
CREATE TABLE sample_menu(
    id SERIAL PRIMARY KEY,
    food_items VARCHAR(30) NOT NULL,
    is_breakfast BOOLEAN DEFAULT FALSE,
    is_lunch BOOLEAN DEFAULT FALSE,
    is_dinner BOOLEAN DEFAULT FALSE,
    is_veg BOOLEAN DEFAULT FALSE NOT NULL
);

-- Import data from sample_menu.csv
COPY sample_menu(food_items, is_breakfast, is_lunch, is_dinner, is_veg) 
FROM 'path_to_your_csv/sample_menu.csv' DELIMITER ',' CSV HEADER;

-- Print all records in the table
SELECT * FROM sample_menu;

-- Procedure to print all items to console
CREATE OR REPLACE PROCEDURE display()
LANGUAGE plpgsql
AS $$
DECLARE
    rec RECORD;
    cur CURSOR FOR SELECT * FROM sample_menu;
BEGIN
    OPEN cur;
    FETCH cur INTO rec;
    IF NOT FOUND THEN
        RAISE EXCEPTION 'No records found in the table';
    END IF;
    LOOP
        EXIT WHEN NOT FOUND;
        RAISE NOTICE 'id: %, food_item: %, is_breakfast: %, is_lunch: %, is_dinner: %, is_veg: %', rec.id, rec.food_items, rec.is_breakfast, rec.is_lunch, rec.is_dinner, rec.is_veg;
        FETCH cur INTO rec;
    END LOOP;
    CLOSE cur;
EXCEPTION
    WHEN OTHERS THEN
        RAISE NOTICE 'Exception: %', SQLERRM;
END;
$$;

CALL display();