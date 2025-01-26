<?php

namespace Services;

require __DIR__ . '/../Models/SampleMenu.php';
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

    public static function getAllSampleMenus($perPage = null)
    {
        if ($perPage) {
            return SampleMenu::paginate($perPage);
        }

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
        if(!$isUpdate) {
            if (empty($data['food_items']) || empty($data['description']) || empty($data['price'])) {
                throw new Exception("All fields are required.");
            }
        }

        if($data['picture'] === null || $data['picture'] === '') {
            unset($data['picture']);
        }

        if (!is_numeric($data['price']) || $data['price'] < 0) {
            throw new Exception("Invalid price.");
        }
    }
}
