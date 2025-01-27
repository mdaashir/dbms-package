<?php

namespace Controllers;

require __DIR__ . '/../Config/Database.php';
require __DIR__ . '/../Services/BillService.php';

use Services\BillService;
use Exception;

class BillController
{
    public function handleRequest($req_action = null, $req_bill_number = null, $req_perPage = null, $req_data = [])
    {
        $action = $_POST['action'] ?? $req_action;
        $bill_number = $_POST['bill_number'] ?? $req_bill_number;
        $perPage = $_POST['perPage'] ?? $req_perPage;
        $data = $_POST ?? $req_data;

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
