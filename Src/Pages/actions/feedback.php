<?php

use Controllers\FeedbackController;

require __DIR__ . '/../../Controllers/FeedbackController.php';

$controller = new FeedbackController();
$controller->handleRequest();
