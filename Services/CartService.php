<?php

namespace Services;

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
    public static function updateCart($id, $data)
    {
        self::validateCartData($data, true);

        try {
            $cart = Cart::findOrFail($id);
            $cart->update($data);
            return $cart;
        } catch (Exception $e) {
            throw new Exception("Error updating cart: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function deleteCart($id): void
    {
        try {
            $cart = Cart::findOrFail($id);
            $cart->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting cart: " . $e->getMessage());
        }
    }

    public static function getAllCarts()
    {
        return Cart::all();
    }

    /**
     * @throws Exception
     */
    public static function getCartById($id)
    {
        try {
            return Cart::find($id);
        } catch (Exception $e) {
            throw new Exception("Error fetching cart: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private static function validateCartData($data, $isUpdate = false): void
    {
        if (empty($data['user_id']) || empty($data['food_id']) || empty($data['quantity'])) {
            throw new Exception("All fields are required.");
        }

        if (!is_numeric($data['quantity']) || $data['quantity'] <= 0) {
            throw new Exception("Invalid quantity.");
        }
    }
}
