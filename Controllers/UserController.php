<?php

namespace Controllers;

require '../config/database.php';
use Services\UserService;
use Exception;

class UserController
{
    public function handleRequest(): void
    {
        $action = $_POST['action'] ?? null;
        $id = $_POST['id'] ?? null;
        $data = $_POST;

        try {
            switch ($action) {
                case 'create':
                    $userId = UserService::createUser($data);
                    echo "User created successfully. User ID: $userId";
                    break;
                case 'update':
                    UserService::updateUser($id, $data);
                    echo "User updated successfully.";
                    break;
                case 'delete':
                    UserService::deleteUser($id);
                    echo "User deleted successfully.";
                    break;
                case 'view':
                    $users = UserService::getAllUsers();
                    echo json_encode($users);
                    break;
                case 'show':
                    $user = UserService::getUserById($id);
                    echo json_encode($user);
                    break;
                default:
                    echo "Invalid action.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}