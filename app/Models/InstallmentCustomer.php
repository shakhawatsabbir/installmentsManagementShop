<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentCustomer extends Model
{
    use HasFactory;


    private static $instalment, $lastId, $lastVehicleId, $string, $vehicleId, $lastVehicle, $lastInstallmentCustomer, $installment_customer_id;

    public static function saveinstalment($request, $customer_id, $sales_id)
    {
        self::$lastInstallmentCustomer = InstallmentCustomer::first();

        if (self::$lastInstallmentCustomer == null) {
            self::$installment_customer_id =  "CAPIPSCICI-AAAA1";
        } else {

            self::$lastInstallmentCustomer = InstallmentCustomer::latest()->first()->installment_customer_id;
            self::$string = substr(self::$lastInstallmentCustomer, 11);


            $numbers = preg_replace('/[^0-9]/', '', self::$string);
            $letters = preg_replace('/[^a-zA-Z]/', '', self::$string);

            if ($numbers == 9) {
                $letters++;
                $numbers = "0";
                self::$installment_customer_id = "CAPIPSCICI-" . $letters . $numbers;
            } else {
                $numbers++;
                self::$installment_customer_id = "CAPIPSCICI-" . $letters . $numbers;
            }
        }
        self::$instalment = new InstallmentCustomer();
        self::$instalment->installment_customer_id = self::$installment_customer_id;
        self::$instalment->customer_id = $customer_id;
        self::$instalment->sales_id = $sales_id;
        self::$instalment->parsent = $request->parsent;
        self::$instalment->total_instalment = $request->total_instalment;
        self::$instalment->instalment_amount = $request->instalment_amount;
        self::$instalment->total_instalment_amount = $request->total_instalment_amount;
        self::$instalment->due_instalment_amount = $request->total_instalment_amount;
        self::$instalment->due_instalment = $request->total_instalment;
        self::$instalment->instalment_deposited_date = $request->instalment_deposited_date;
        self::$instalment->save();
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
