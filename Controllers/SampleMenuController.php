<?php

namespace Controllers;

require __DIR__ . '/../Config/Database.php';
require __DIR__ . '/../Services/SampleMenuService.php';

use Services\SampleMenuService;
use Exception;

class SampleMenuController
{
    public function handleRequest($req_action = null, $req_id = null, $req_perPage = null, $req_data = [])
    {
        $action = $_POST['action'] ?? $req_action;
        $id = $_POST['id'] ?? $req_id;
        $perPage = $_POST['perPage'] ?? $req_perPage;
        $data = $_POST ?? $req_data;

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
