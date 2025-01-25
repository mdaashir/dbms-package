<?php

namespace Services;

use Models\SampleMenu;
use Exception;

class SampleMenuService
{
    /**
     * @throws Exception
     */
    public static function createSampleMenu($data)
    {
        self::validateSampleMenuData($data);

        try {
            return SampleMenu::create($data);
        } catch (Exception $e) {
            throw new Exception("Error creating sample menu: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function updateSampleMenu($id, $data)
    {
        self::validateSampleMenuData($data, true);

        try {
            $sampleMenu = SampleMenu::findOrFail($id);
            $sampleMenu->update($data);
            return $sampleMenu;
        } catch (Exception $e) {
            throw new Exception("Error updating sample menu: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function deleteSampleMenu($id): void
    {
        try {
            $sampleMenu = SampleMenu::findOrFail($id);
            $sampleMenu->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting sample menu: " . $e->getMessage());
        }
    }

    public static function getAllSampleMenus()
    {
        return SampleMenu::all();
    }

    /**
     * @throws Exception
     */
    public static function getSampleMenuById($id)
    {
        try {
            return SampleMenu::find($id);
        } catch (Exception $e) {
            throw new Exception("Error fetching sample menu: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private static function validateSampleMenuData($data, $isUpdate = false): void
    {
        if (empty($data['food_items']) || empty($data['description']) || empty($data['price'])) {
            throw new Exception("All fields are required.");
        }

        if (!is_numeric($data['price']) || $data['price'] < 0) {
            throw new Exception("Invalid price.");
        }
    }
}
