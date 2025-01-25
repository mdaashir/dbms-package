<?php

namespace Services;

use Models\Bill;
use Models\Cart;
use Exception;

class BillService
{
    /**
     * @throws Exception
     */
    public static function generateBill($cartId, $userId)
    {
        $cart = Cart::find($cartId);
        if (!$cart || $cart->user_id != $userId) {
            throw new Exception("Cart not found or does not belong to the user.");
        }

        // Create bill
        $bill = Bill::create([
            'cart_id' => $cartId,
            'user_id' => $userId,
            'total_price' => $cart->price,
            'date' => now(),
            'by_user' => $userId,
        ]);

        return $bill->id;
    }

    public static function getUserBills($userId)
    {
        return Bill::where('user_id', $userId)->get();
    }
}
