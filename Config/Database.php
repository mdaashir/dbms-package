<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;

// Load the environment variables from the .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$capsule = new Capsule;

//Configure the connection
$capsule->addConnection([
    'driver'    => $_SERVER['DB_CONNECTION'],
    'host'      => $_SERVER['DB_HOST'],
    'port'      => $_SERVER['DB_PORT'],
    'database'  => $_SERVER['DB_DATABASE'],
    'username'  => $_SERVER['DB_USERNAME'],
    'password'  => $_SERVER['DB_PASSWORD'],
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
