<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;


    private static $sales, $lastId, $lastVehicleId, $string, $vehicleId, $lastVehicle, $profit;

    public static function saveSales($request, $customer_id, $profit )
    {

        self::$sales = new Sales();
        self::$sales->customer_id = $customer_id;
        self::$sales->sales_amount = $request->sales_amount;
        if ($request->due_amount > 0) {
            self::$sales->sales_type = "Installment";
        } else {
            self::$sales->sales_type = "Cash";
            self::$sales->profit = $profit;
        }
        self::$sales->pay_amount = $request->pay_amount;
        self::$sales->due_amount = $request->due_amount;
        self::$sales->payment_type = $request->payment_type;
        if($request->payment_transaction_id == null)
        {
            self::$sales->payment_transaction_id = "Cash";
        }
        else{
            self::$sales->payment_transaction_id =  $request->payment_transaction_id;
        }
        self::$sales->reff_name = $request->reff_name;
        self::$sales->save();

        return self::$sales;
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'partner_id');
    }
   
}
