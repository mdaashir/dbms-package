<?php

namespace Services;

require __DIR__ . '/../Models/Feedback.php';
use Models\Feedback;
use Exception;

class FeedbackService
{
    /**
     * Create Feedback
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
     * Update Feedback
     * @throws Exception
     */
    public static function updateFeedback($email_id, $data)
    {
        self::validateFeedbackData($data, true);

        try {
            $feedback = Feedback::where('email_id', $email_id)->firstOrFail();
            $feedback->update($data);
            return $feedback;
        } catch (Exception $e) {
            throw new Exception("Error updating feedback: " . $e->getMessage());
        }
    }

    /**
     * Delete Feedback
     * @throws Exception
     */
    public static function deleteFeedback($email_id): void
    {
        try {
            $feedback = Feedback::where('email_id', $email_id)->firstOrFail();
            $feedback->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting feedback: " . $e->getMessage());
        }
    }

    /**
     * Get All Feedbacks
     */
    public static function getAllFeedbacks($perPage = null)
    {
        if ($perPage) {
            return Feedback::paginate($perPage);
        }

        return Feedback::all();
    }

    /**
     * Get Feedback by Email ID
     * @throws Exception
     */
    public static function getFeedbackByEmail($email_id)
    {
        try {
            $feedback = Feedback::where('email_id', $email_id)->first();
            if ($feedback === null) {
                throw new Exception("Feedback with email ID $email_id not found.");
            }
            return $feedback;
        } catch (Exception $e) {
            throw new Exception("Error fetching feedback: " . $e->getMessage());
        }
    }

    /**
     * Validate Feedback Data
     * @throws Exception
     */
    private static function validateFeedbackData($data, $isUpdate = false): void
    {
        if (!$isUpdate) {
            if (empty($data['user_name']) || empty($data['email_id']) || empty($data['messages'])) {
                throw new Exception("All fields are required.");
            }
        }

        if (!filter_var($data['email_id'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address.");
        }
    }
}
