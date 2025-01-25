<?php

namespace Controllers;

require __DIR__ . '/../config/database.php';
require __DIR__ . '/../services/SampleMenuService.php';

use Services\SampleMenuService;
use Exception;

class SampleMenuController
{
    public function handleRequest(): void
    {
        $action = $_POST['action'] ?? null;
        $id = $_POST['id'] ?? null;
        $data = $_POST;

        try {
            switch ($action) {
                case 'create':
                    $sampleMenuId = SampleMenuService::createSampleMenu($data);
                    echo "Sample menu created successfully. Sample Menu ID: $sampleMenuId";
                    break;
                case 'update':
                    SampleMenuService::updateSampleMenu($id, $data);
                    echo "Sample menu updated successfully.";
                    break;
                case 'delete':
                    SampleMenuService::deleteSampleMenu($id);
                    echo "Sample menu deleted successfully.";
                    break;
                case 'view':
                    $sampleMenus = SampleMenuService::getAllSampleMenus();
                    echo json_encode($sampleMenus);
                    break;
                case 'show':
                    $sampleMenu = SampleMenuService::getSampleMenuById($id);
                    echo json_encode($sampleMenu);
                    break;
                default:
                    echo "Invalid action.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
