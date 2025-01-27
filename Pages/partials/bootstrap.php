<?php

// Autoload Composer dependencies
require_once __DIR__ . '/../../vendor/autoload.php';

// Database configuration and initialization
require_once __DIR__ . '/../../config/database.php';

// Load Models
foreach (glob(__DIR__ . '/../../Models/*.php') as $modelFile) {
    require_once $modelFile;
}
