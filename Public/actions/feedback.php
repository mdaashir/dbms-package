<?php

use Controllers\FeedbackController;

require '../../Controllers/FeedbackController.php';

$controller = new FeedbackController();
$controller->handleRequest();
