<?php

require '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;

// Load the environment variables from the .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$capsule = new Capsule;

//Configure the connection
$capsule->addConnection([
    'driver'    => getenv('DB_CONNECTION'),
    'host'      => getenv('DB_HOST'),
    'port'      => getenv('DB_PORT'),
    'database'  => getenv('DB_DATABASE'),
    'username'  => getenv('DB_USERNAME'),
    'password'  => getenv('DB_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'strict'    => false,
    'engine'    => null,
    'prefix'    => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
