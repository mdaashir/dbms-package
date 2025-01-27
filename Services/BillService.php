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
    public static function updateBill($bill_number, $data)
    {
        self::validateBillData($data, true);

        try {
            $bill = Bill::findOrFail($bill_number);
            $bill->update($data);
            return $bill;
        } catch (Exception $e) {
            throw new Exception("Error updating bill: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function deleteBill($bill_number): void
    {
        try {
            $bill = Bill::findOrFail($bill_number);
            $bill->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting bill: " . $e->getMessage());
        }
    }

    public static function getAllBills($perPage = null)
    {
        if ($perPage) {
            return Bill::paginate($perPage);
        }

        return Bill::all();
    }

    /**
     * @throws Exception
     */
    public static function getBillByBillNumber($bill_number)
    {
        try {
            return Bill::find($bill_number);
        } catch (Exception $e) {
            throw new Exception("Error fetching bill: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private static function validateBillData($data, $isUpdate = false): void
    {
        if (!$isUpdate) {
            if (empty($data['cart_id']) || empty($data['user_id'])) {
                throw new Exception("All fields (cart_id, user_id) are required.");
            }
        }

        if (isset($data['total_price']) && (!is_numeric($data['total_price']) || $data['total_price'] < 0)) {
            throw new Exception("Total price must be a positive number.");
        }

        if (isset($data['date']) && !strtotime($data['date'])) {
            throw new Exception("Invalid date format.");
        }
    }
}
