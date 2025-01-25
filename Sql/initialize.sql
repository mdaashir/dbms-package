-- Create the role (user) with a strong password and necessary privileges
CREATE ROLE user WITH
    LOGIN
    NOSUPERUSER
    INHERIT
    CREATEDB
    NOCREATEROLE
    NOREPLICATION
    NOBYPASSRLS
    ENCRYPTED PASSWORD 'user';

-- Create the database
CREATE DATABASE restaurant
    WITH
    OWNER = user
    ENCODING = 'UTF8'
    LC_COLLATE = 'C.UTF-8'
    LC_CTYPE = 'C.UTF-8'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;

-- Grant privileges to the user on the database
GRANT ALL PRIVILEGES ON DATABASE restaurant TO user;
