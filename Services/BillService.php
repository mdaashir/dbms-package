<?php

namespace Services;

require __DIR__ . '/../Models/Bill.php';
use Models\Bill;
use Exception;

class BillService
{
    /**
     * @throws Exception
     */
    public static function createBill($data)
    {
        self::validateBillData($data);

        try {
            return Bill::create($data);
        } catch (Exception $e) {
            throw new Exception("Error creating bill: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function updateBill($id, $data)
    {
        self::validateBillData($data, true);

        try {
            $bill = Bill::findOrFail($id);
            $bill->update($data);
            return $bill;
        } catch (Exception $e) {
            throw new Exception("Error updating bill: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function deleteBill($id): void
    {
        try {
            $bill = Bill::findOrFail($id);
            $bill->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting bill: " . $e->getMessage());
        }
    }

    public static function getAllBills()
    {
        return Bill::all();
    }

    /**
     * @throws Exception
     */
    public static function getBillById($id)
    {
        try {
            return Bill::find($id);
        } catch (Exception $e) {
            throw new Exception("Error fetching bill: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private static function validateBillData($data, $isUpdate = false): void
    {
        if (empty($data['cart_id']) || empty($data['user_id']) || empty($data['total_price'])) {
            throw new Exception("All fields are required.");
        }

        if (!is_numeric($data['total_price']) || $data['total_price'] < 0) {
            throw new Exception("Invalid total price.");
        }
    }
}
