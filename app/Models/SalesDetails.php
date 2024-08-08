<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    use HasFactory;

    public static $Detail,$product;
    public static  function Details($item,$sales_id)
    {
            self::$Detail = new SalesDetails();
            self::$Detail->sales_id = $sales_id;
            self::$Detail->product_id = $item->id;
            self::$Detail->product_name = $item->name;
            // self::$Detail->product_model = $item->model;
            self::$Detail->product_quantity = $item->qty;
            self::$Detail->save();

           self::$product = Product::where('product_id',$item->id)->first();
           self::$product->qty = self::$product->qty-$item->qty;
           self::$product->update();

            Cart::remove($item->rowId);
            
        
    }
}
