<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    private static $customer;


    public static function saveCustomer($request)
    {
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->mobile = $request->mobile;
        self::$customer->nid = $request->nid;
        self::$customer->village = $request->village;
        self::$customer->post_office = $request->pOffice;
        self::$customer->upazila = $request->upazila;
        self::$customer->zila = $request->zila;
        self::$customer->user_name = $request->mobile;
        self::$customer->password = bcrypt($request->mobile);
        self::$customer->save();

        return self::$customer;
    }

}
