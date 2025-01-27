<?php

use Controllers\UserController;

require __DIR__ . '/../../Controllers/UserController.php';

$controller = new UserController();
$controller->handleRequest();
