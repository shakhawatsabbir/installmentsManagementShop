<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon;

class Transection extends Model
{
    use HasFactory;

    private static $transection;
    public static function salesTransaction($request, $customer_id,$sales_id)
    {
        self::$transection = new Transection();
        self::$transection->customer_id =$customer_id;
        self::$transection->amount = $request->pay_amount;
        self::$transection->note = "New Sales";
        self::$transection->date = Carbon\Carbon::now();
        self::$transection->save();
    }
}
