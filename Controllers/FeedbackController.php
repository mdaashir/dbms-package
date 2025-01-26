<?php

namespace Controllers;

require __DIR__ . '/../Config/Database.php';
require __DIR__ . '/../Services/FeedbackService.php';

use Services\FeedbackService;
use Exception;

class FeedbackController
{
    public function handleRequest()
    {
        $action = $_POST['action'] ?? null;
        $email_id = $_POST['email_id'] ?? null;
        $perPage = $_POST['perPage'] ?? null;
        $data = $_POST;

        try {
            switch ($action) {
                case 'create':
                    $feedback = FeedbackService::createFeedback($data);
                    echo "Feedback created successfully.";
                    return $feedback;
                case 'update':
                    $feedback = FeedbackService::updateFeedback($email_id, $data);
                    echo "Feedback updated successfully.";
                    return $feedback;
                case 'delete':
                    FeedbackService::deleteFeedback($email_id);
                    echo "Feedback deleted successfully.";
                    break;
                case 'view':
                    return FeedbackService::getAllFeedbacks($perPage);
                case 'show':
                    return FeedbackService::getFeedbackByEmail($email_id);
                default:
                    echo "Invalid action.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
