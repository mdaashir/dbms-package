<?php

namespace App\Services;

use App\Models\Feedback;
use Exception;

class FeedbackService
{
    public static function addFeedback($data)
    {
        if (empty($data['user_name']) || empty($data['messages'])) {
            throw new Exception("Name and message are required.");
        }

        // Add feedback
        $feedback = Feedback::create($data);

        return $feedback->id;
    }

    public static function getAllFeedbacks()
    {
        return Feedback::all();
    }
}
