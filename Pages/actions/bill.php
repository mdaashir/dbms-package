<?php

use Controllers\BillController;

require __DIR__ . '/../../Controllers/BillController.php';

$controller = new BillController();
$controller->handleRequest();