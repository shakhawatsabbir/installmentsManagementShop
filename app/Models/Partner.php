<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    private static $partner;

    public static function savePartner($request)
    {
        self::$partner = new Partner();
        self::$partner->name = $request->name;
        self::$partner->mobile = $request->mobile;
        self::$partner->village = $request->village;
        self::$partner->post_office = $request->pOffice;
        self::$partner->upazila = $request->upazila;
        self::$partner->zila = $request->zila;
        self::$partner->partner_id = $request->mobile;
        self::$partner->password = bcrypt($request->mobile);
        self::$partner->save();

        return self::$partner;
    }
}
