<?php

namespace App\Services;

use App\Models\SampleMenu;
use Exception;

class MenuService
{
    public static function createFoodItem($data)
    {
        // Validate data
        if (empty($data['food_items']) || empty($data['price'])) {
            throw new Exception("Food name and price are required.");
        }

        if (!is_numeric($data['price']) || $data['price'] <= 0) {
            throw new Exception("Invalid price.");
        }

        // Create food item
        $foodItem = SampleMenu::create($data);

        return $foodItem->id;
    }

    public static function getAllFoodItems()
    {
        return SampleMenu::all();
    }
}
