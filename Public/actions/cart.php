<?php

use Controllers\CartController;

require '../../Controllers/CartController.php';

$controller = new CartController();
$controller->handleRequest();
