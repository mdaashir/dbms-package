<?php

use Controllers\UserController;

require '../../Controllers/UserController.php';

$controller = new UserController();
$controller->handleRequest();
