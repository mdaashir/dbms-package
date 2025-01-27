<?php

namespace Controllers;

require __DIR__ . '/../Config/Database.php';
require __DIR__ . '/../Services/CartService.php';

use Services\CartService;
use Exception;

class CartController
{
    public function handleRequest($req_action = null, $req_cartId = null, $req_perPage = null, $req_data = [])
    {
        $action = $_POST['action'] ?? $req_action;
        $cartId = $_POST['cart_id'] ?? $req_cartId;
        $perPage = $_POST['perPage'] ?? $req_perPage;
        $data = $_POST ?? $req_data;

        try {
            switch ($action) {
                case 'create':
                    $cart = CartService::createCart($data);
                    echo "Cart created successfully.";
                    return $cart;
                case 'update':
                    $cart = CartService::updateCart($cartId, $data);
                    echo "Cart updated successfully.";
                    return $cart;
                case 'delete':
                    CartService::deleteCart($cartId);
                    echo "Cart deleted successfully.";
                    break;
                case 'view':
                    return CartService::getAllCarts($perPage);
                case 'show':
                    return CartService::getCartByCartId($cartId);
                default:
                    echo "Invalid action.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
