<?php

use Controllers\CartController;

require __DIR__ . '/../../Controllers/CartController.php';

$controller = new CartController();
$controller->handleRequest();
