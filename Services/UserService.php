<?php

namespace Services;

require __DIR__ . '/../Models/User.php';
use Models\User;
use Exception;

class UserService
{
    /**
     * @throws Exception
     */
    public static function createUser($data)
    {
        self::validateUserData($data);

        $data['password_hash'] = password_hash($data['password'], PASSWORD_BCRYPT);

        try {
            $user = User::create($data);
            return $user->id;
        } catch (Exception $e) {
            throw new Exception("Error creating user: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function updateUser($id, $data)
    {
        self::validateUserData($data, true);

        try {
            $user = User::findOrFail($id);
            $user->update($data);
            return $user;
        } catch (Exception $e) {
            throw new Exception("Error updating user: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function deleteUser($id): void
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting user: " . $e->getMessage());
        }
    }

    public static function getAllUsers()
    {
        return User::all();
    }

    /**
     * @throws Exception
     */
    public static function getUserById($id)
    {
        try {
            return User::find($id);
        } catch (Exception $e) {
            throw new Exception("Error fetching user: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private static function validateUserData($data, $isUpdate = false): void
    {
        if (empty($data['user_name']) || empty($data['email_id']) || (!$isUpdate && empty($data['password']))) {
            throw new Exception("All fields are required.");
        }

        if (!filter_var($data['email_id'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address.");
        }

        if (!$isUpdate && User::where('email_id', $data['email_id'])->exists()) {
            throw new Exception("Email is already registered.");
        }
    }
}
