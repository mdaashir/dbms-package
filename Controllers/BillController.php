<?php

namespace Controllers;

require __DIR__ . '/../Config/Database.php';
require __DIR__ . '/../Services/BillService.php';

use Services\BillService;
use Exception;

class BillController
{
    public function handleRequest()
    {
        $action = $_POST['action'] ?? null;
        $bill_number = $_POST['bill_number'] ?? null;
        $perPage = $_POST['perPage'] ?? null;
        $data = $_POST;

        try {
            switch ($action) {
                case 'create':
                    $bill = BillService::createBill($data);
                    echo "Bill created successfully.";
                    return $bill;
                case 'update':
                    $bill = BillService::updateBill($bill_number, $data);
                    echo "Bill updated successfully.";
                    return $bill;
                case 'delete':
                    BillService::deleteBill($bill_number);
                    echo "Bill deleted successfully.";
                    break;
                case 'view':
                    return BillService::getAllBills($perPage);
                case 'show':
                    return BillService::getBillByBillNumber($bill_number);
                default:
                    echo "Invalid action.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
