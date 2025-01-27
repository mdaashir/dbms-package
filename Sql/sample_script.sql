-- Create the main table
CREATE TABLE sample (
	id SERIAL PRIMARY KEY NOT NULL,
	name VARCHAR(50) NOT NULL,
	created_at TIMESTAMP,
	created_by TEXT,
	modified_at TIMESTAMP DEFAULT NOW(),
	modified_by TEXT
);

-- Create the log table
CREATE TABLE sample_log (
	id SERIAL PRIMARY KEY NOT NULL,
	table_name TEXT NOT NULL,
	table_id INT NOT NULL,
	description TEXT NOT NULL,
	created_at TIMESTAMP DEFAULT NOW(),
	created_by TEXT
);

-- Trigger function to manage timestamps and created/modified by fields
CREATE OR REPLACE FUNCTION sample_trig_func()
RETURNS TRIGGER AS $BODY$
DECLARE
	current_user_name TEXT;
BEGIN
	current_user_name := COALESCE(SESSION_USER, 'default_user'); -- Fallback to 'default_user' if SESSION_USER is unavailable
	IF (TG_OP = 'INSERT') THEN
		NEW.created_at := NOW();
		NEW.created_by := current_user_name;
		NEW.modified_by := current_user_name;
	ELSIF (TG_OP = 'UPDATE') THEN
		NEW.modified_at := NOW();
		NEW.modified_by := current_user_name;
	END IF;
	RETURN NEW;
END $BODY$
LANGUAGE plpgsql;

-- Trigger function to log table actions
CREATE OR REPLACE FUNCTION sample_log_func()
RETURNS TRIGGER AS $BODY$
DECLARE
	current_user_name TEXT;
	description TEXT;
	id INT;
	return RECORD;
BEGIN
	current_user_name := COALESCE(SESSION_USER, 'default_user'); -- Fallback to 'default_user' if SESSION_USER is unavailable
	description := TG_TABLE_NAME || ' ';
	IF (TG_OP = 'INSERT') THEN
		id := NEW.id;
		description := description || 'added. Id: ' || id;
		return := NEW;
	ELSIF (TG_OP = 'UPDATE') THEN
		id := NEW.id;
		description := description || 'updated. Id: ' || id;
		return := NEW;
	ELSIF (TG_OP = 'DELETE') THEN
		id := OLD.id;
		description := description || 'deleted. Id: ' || id;
		return := OLD;
	END IF;
	RAISE NOTICE 'Trigger called on % - Log: %', TG_TABLE_NAME, description;
	INSERT INTO sample_log(table_name, table_id, description, created_at, created_by)
	VALUES (TG_TABLE_NAME, id, description, NOW(), current_user_name);
	RETURN return;
END $BODY$
LANGUAGE plpgsql;

-- Trigger for timestamps and user tracking
CREATE TRIGGER sample_trig
BEFORE INSERT OR UPDATE
ON sample
FOR EACH ROW
EXECUTE PROCEDURE sample_trig_func();

-- Trigger for logging actions
CREATE TRIGGER sample_log_trig
AFTER INSERT OR UPDATE OR DELETE
ON sample
FOR EACH ROW
EXECUTE PROCEDURE sample_log_func();

-- Insert sample data
INSERT INTO sample (name) VALUES ('Aashir');
INSERT INTO sample (name) VALUES ('Anfas');
INSERT INTO sample (name) VALUES ('Shifa');
INSERT INTO sample (name) VALUES ('Siraj');

-- Update sample data
UPDATE sample SET name = 'Aashir Updated' WHERE id = 1;
UPDATE sample SET name = 'Anfas Updated' WHERE id = 2;
UPDATE sample SET name = 'Shifa Updated' WHERE id = 3;
UPDATE sample SET name = 'Siraj Updated' WHERE id = 4;

-- Query the tables
SELECT * FROM sample;
SELECT * FROM sample_log;

-- Delete a record (to test DELETE logging)
DELETE FROM sample WHERE id = 4;
