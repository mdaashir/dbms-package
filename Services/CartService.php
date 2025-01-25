<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\SampleMenu;
use Exception;

class CartService
{
    public static function addItem($userId, $foodId, $quantity)
    {
        // Validate data
        if ($quantity <= 0) {
            throw new Exception("Quantity must be greater than 0.");
        }

        $foodItem = SampleMenu::find($foodId);
        if (!$foodItem) {
            throw new Exception("Food item does not exist.");
        }

        // Calculate price
        $price = $foodItem->price * $quantity;

        // Add to cart
        $cart = Cart::create([
            'user_id' => $userId,
            'food_id' => $foodId,
            'quantity' => $quantity,
            'price' => $price,
        ]);

        return $cart->id;
    }

    public static function getUserCart($userId)
    {
        return Cart::where('user_id', $userId)->get();
    }
}
