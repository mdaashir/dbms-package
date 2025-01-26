<?php

namespace Controllers;

require __DIR__ . '/../Config/Database.php';
require __DIR__ . '/../Services/UserService.php';

use Services\UserService;
use Exception;

class UserController
{
    public function handleRequest()
    {
        $action = $_POST['action'] ?? null;
        $id = $_POST['id'] ?? null;
        $perPage = $_POST['perPage'] ?? null;
        $data = $_POST;

        try {
            switch ($action) {
                case 'create':
                    $user = UserService::createUser($data);
                    echo "User created successfully.";
                    return $user;
                case 'update':
                    $user = UserService::updateUser($id, $data);
                    echo "User updated successfully.";
                    return $user;
                case 'delete':
                    UserService::deleteUser($id);
                    echo "User deleted successfully.";
                    break;
                case 'view':
                    return UserService::getAllUsers($perPage);
                case 'show':
                    return UserService::getUserById($id);
                default:
                    echo "Invalid action.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
