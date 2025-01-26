<?php

namespace Controllers;

require __DIR__ . '/../Config/Database.php';
require __DIR__ . '/../Services/SampleMenuService.php';

use Services\SampleMenuService;
use Exception;

class SampleMenuController
{
    public function handleRequest()
    {
        $action = $_POST['action'] ?? null;
        $id = $_POST['id'] ?? null;
        $perPage = $_POST['perPage'] ?? null;
        $data = $_POST;

        try {
            switch ($action) {
                case 'create':
                    $sampleMenu = SampleMenuService::createSampleMenu($data);
                    echo "Sample menu created successfully.";
                    return $sampleMenu;
                case 'update':
                    $sampleMenu = SampleMenuService::updateSampleMenu($id, $data);
                    echo "Sample menu updated successfully.";
                    return $sampleMenu;
                case 'delete':
                    SampleMenuService::deleteSampleMenu($id);
                    echo "Sample menu deleted successfully.";
                    break;
                case 'view':
                    return SampleMenuService::getAllSampleMenus($perPage);
                case 'show':
                    return SampleMenuService::getSampleMenuById($id);
                default:
                    echo "Invalid action.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
