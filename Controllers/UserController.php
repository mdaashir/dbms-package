<?php

namespace Controllers;

require __DIR__ . '/../Config/Database.php';
require __DIR__ . '/../Services/UserService.php';

use Services\UserService;
use Exception;

class UserController
{
    public function handleRequest($req_action = null, $req_id = null, $req_perPage = null, $req_data = [])
    {
        $action = $_POST['action'] ?? $req_action;
        $id = $_POST['id'] ?? $req_id;
        $perPage = $_POST['perPage'] ?? $req_perPage;
        $data = $_POST ?? $req_data;

        try {
            switch ($action) {
                case 'create':
                    $user = UserService::createUser($data);
                    echo "<script>alert('User created successfully');</script>";
                    return $user;
                case 'update':
                    $user = UserService::updateUser($id, $data);
                    echo "User updated successfully.";
                    return $user;
                case 'delete':
                    UserService::deleteUser($id);
                    echo "<script>alert('User deleted successfully');</script>";
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
