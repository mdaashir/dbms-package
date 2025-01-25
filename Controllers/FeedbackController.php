<?php

namespace Controllers;

require '../config/database.php';
use Services\FeedbackService;
use Exception;

class FeedbackController
{
    public function handleRequest(): void
    {
        $action = $_POST['action'] ?? null;
        $id = $_POST['id'] ?? null;
        $data = $_POST;

        try {
            switch ($action) {
                case 'create':
                    $feedbackId = FeedbackService::createFeedback($data);
                    echo "Feedback created successfully. Feedback ID: $feedbackId";
                    break;
                case 'update':
                    FeedbackService::updateFeedback($id, $data);
                    echo "Feedback updated successfully.";
                    break;
                case 'delete':
                    FeedbackService::deleteFeedback($id);
                    echo "Feedback deleted successfully.";
                    break;
                case 'view':
                    $feedbacks = FeedbackService::getAllFeedbacks();
                    echo json_encode($feedbacks);
                    break;
                case 'show':
                    $feedback = FeedbackService::getFeedbackById($id);
                    echo json_encode($feedback);
                    break;
                default:
                    echo "Invalid action.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
