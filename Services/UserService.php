<?php

namespace App\Services;

use App\Models\User;
use Exception;

class UserService
{
    public static function createUser($data)
    {
        // Validate data
        if (empty($data['user_name']) || empty($data['email_id']) || empty($data['password'])) {
            throw new Exception("All fields are required.");
        }

        if (!filter_var($data['email_id'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address.");
        }

        // Check if email already exists
        if (User::where('email_id', $data['email_id'])->exists()) {
            throw new Exception("Email is already registered.");
        }

        // Create the user
        $user = User::create([
            'user_name' => $data['user_name'],
            'email_id' => $data['email_id'],
            'password_hash' => password_hash($data['password'], PASSWORD_BCRYPT),
            'role' => $data['role'] ?? 'customer',
        ]);

        return $user->id;
    }
}
