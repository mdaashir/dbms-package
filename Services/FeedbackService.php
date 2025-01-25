<?php

namespace Services;

use Models\Feedback;
use Exception;

class FeedbackService
{
    /**
     * @throws Exception
     */
    public static function createFeedback($data)
    {
        self::validateFeedbackData($data);

        try {
            return Feedback::create($data);
        } catch (Exception $e) {
            throw new Exception("Error creating feedback: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function updateFeedback($id, $data)
    {
        self::validateFeedbackData($data, true);

        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->update($data);
            return $feedback;
        } catch (Exception $e) {
            throw new Exception("Error updating feedback: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function deleteFeedback($id): void
    {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting feedback: " . $e->getMessage());
        }
    }

    public static function getAllFeedbacks()
    {
        return Feedback::all();
    }

    /**
     * @throws Exception
     */
    public static function getFeedbackById($id)
    {
        try {
            return Feedback::find($id);
        } catch (Exception $e) {
            throw new Exception("Error fetching feedback: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private static function validateFeedbackData($data, $isUpdate = false): void
    {
        if (empty($data['user_name']) || empty($data['email_id']) || empty($data['messages'])) {
            throw new Exception("All fields are required.");
        }

        if (!filter_var($data['email_id'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address.");
        }
    }
}
