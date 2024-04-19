CREATE TABLE sample(
	id SERIAL PRIMARY KEY NOT NULL,
	name VARCHAR(50) NOT NULL,
	created_at TIMESTAMP,
	created_by TEXT,
	modified_at TIMESTAMP DEFAULT NOW(),
	modified_by TEXT
);

CREATE TABLE sample_log (
	id SERIAL PRIMARY KEY NOT NULL,
	table_name TEXT NOT NULL,
	table_id TEXT NOT NULL,
	description TEXT NOT NULL,
	created_at TIMESTAMP DEFAULT NOW(),
	created_by TEXT
);

CREATE OR REPLACE FUNCTION sample_trig_func()
RETURNS TRIGGER AS $BODY$
DECLARE
	user TEXT;
BEGIN
	SELECT USER INTO user FROM USER;
	IF (TG_OP = 'INSERT') THEN
		NEW.created_at := NOW();
		NEW.created_by := user;
		NEW.modified_by := user;
	ELSIF (TG_OP = 'UPDATE') THEN
		NEW.modified_at := NOW();
		NEW.modified_by := user;
	END IF;
RETURN NEW;
END $BODY$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sample_log_func()
RETURNS TRIGGER AS $BODY$
DECLARE
	user TEXT;
	description TEXT;
	id INT;
	return RECORD;
BEGIN
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
	RAISE NOTICE 'TRIGER called on % - Log: %', TG_TABLE_NAME, description;
	INSERT INTO sample_log(table_name, table_id, description, created_at, created_by)
	VALUES (TG_TABLE_NAME, id, description, NOW(), user);
RETURN return;
END $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER sample_trig
BEFORE INSERT OR UPDATE
ON sample
FOR EACH ROW
EXECUTE PROCEDURE sample_trig_func();

CREATE TRIGGER sample_log_trig
AFTER INSERT OR UPDATE OR DELETE
ON sample
FOR EACH ROW
EXECUTE PROCEDURE sample_log_func();

INSERT INTO sample (name) VALUES ('Aashir');
INSERT INTO sample (name) VALUES ('Anfas');
INSERT INTO sample (name) VALUES ('Shifa');
INSERT INTO sample (name) VALUES ('Siraj');

UPDATE sample SET name = 'Aashir' WHERE id = 1;
UPDATE sample SET name = 'Anfas' WHERE id = 2;
UPDATE sample SET name = 'Shifa' WHERE id = 3;
UPDATE sample SET name = 'Siraj' WHERE id = 4;

SELECT * FROM sample;
SELECT * FROM sample_log;