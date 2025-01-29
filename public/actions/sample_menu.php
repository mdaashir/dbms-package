<?php

use Controllers\SampleMenuController;

require __DIR__ . '/../../Controllers/SampleMenuController.php';

$controller = new SampleMenuController();
$controller->handleRequest();
?>
