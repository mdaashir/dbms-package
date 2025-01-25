<?php

namespace Controllers;

require __DIR__ . '/../Config/Database.php';
require __DIR__ . '/../Services/CartService.php';

use Services\CartService;
use Exception;

class CartController
{
    public function handleRequest(): void
    {
        $action = $_POST['action'] ?? null;
        $id = $_POST['id'] ?? null;
        $data = $_POST;

        try {
            switch ($action) {
                case 'create':
                    $cartId = CartService::createCart($data);
                    echo "Cart created successfully. Cart ID: $cartId";
                    break;
                case 'update':
                    CartService::updateCart($id, $data);
                    echo "Cart updated successfully.";
                    break;
                case 'delete':
                    CartService::deleteCart($id);
                    echo "Cart deleted successfully.";
                    break;
                case 'view':
                    $carts = CartService::getAllCarts();
                    echo json_encode($carts);
                    break;
                case 'show':
                    $cart = CartService::getCartById($id);
                    echo json_encode($cart);
                    break;
                default:
                    echo "Invalid action.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
