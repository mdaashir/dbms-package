<?php

namespace Services;

require __DIR__ . '/../Models/Cart.php';
use Models\Cart;
use Exception;

class CartService
{
    /**
     * @throws Exception
     */
    public static function createCart($data)
    {
        self::validateCartData($data);

        try {
            return Cart::create($data);
        } catch (Exception $e) {
            throw new Exception("Error creating cart: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function updateCart($cartId, $data)
    {
        self::validateCartData($data, true);

        try {
            $cart = Cart::findOrFail($cartId);
            $cart->update($data);
            return $cart;
        } catch (Exception $e) {
            throw new Exception("Error updating cart: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function deleteCart($cartId): void
    {
        try {
            $cart = Cart::findOrFail($cartId);
            $cart->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting cart: " . $e->getMessage());
        }
    }

    public static function getAllCarts($perPage = null)
    {
        if ($perPage) {
            return Cart::paginate($perPage);
        }

        return Cart::all();
    }

    /**
     * @throws Exception
     */
    public static function getCartByCartId($cartId)
    {
        try {
            return Cart::find($cartId);
        } catch (Exception $e) {
            throw new Exception("Error fetching cart: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private static function validateCartData($data, $isUpdate = false): void
    {
        if(!$isUpdate) {
            if (empty($data['user_id']) || empty($data['food_id']) || empty($data['quantity'])) {
                throw new Exception("All fields are required.");
            }
        }

        if (!is_numeric($data['quantity']) || $data['quantity'] <= 0) {
            throw new Exception("Invalid quantity.");
        }

        if (isset($data['date']) && !strtotime($data['date'])) {
            throw new Exception("Invalid date format.");
        }

        if(isset($data['time']) && !strtotime($data['time'])) {
            throw new Exception("Invalid time format.");
        }
    }
}
