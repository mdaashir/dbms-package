<?php

namespace Controllers;

require __DIR__ . '/../Config/Database.php';
require __DIR__ . '/../Services/CartService.php';

use Services\BillService;
use Exception;

class BillController
{
    public function handleRequest(): void
    {
        $action = $_POST['action'] ?? null;
        $id = $_POST['id'] ?? null;
        $data = $_POST;

        try {
            switch ($action) {
                case 'create':
                    $billId = BillService::createBill($data);
                    echo "Bill created successfully. Bill ID: $billId";
                    break;
                case 'update':
                    BillService::updateBill($id, $data);
                    echo "Bill updated successfully.";
                    break;
                case 'delete':
                    BillService::deleteBill($id);
                    echo "Bill deleted successfully.";
                    break;
                case 'view':
                    $bills = BillService::getAllBills();
                    echo json_encode($bills);
                    break;
                case 'show':
                    $bill = BillService::getBillById($id);
                    echo json_encode($bill);
                    break;
                default:
                    echo "Invalid action.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}