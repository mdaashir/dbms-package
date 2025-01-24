<?php
// Include Composer autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

// Load environment variables from the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../.env');
$dotenv->safeLoad();

// Establish the connection
$conn = pg_connect($_ENV['DATABASE_URL']);

if (!$conn) die("Couldn't connect to SQL server");
