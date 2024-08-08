<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    private static $product;
    private static $sales, $lastId, $lastProductId, $string, $productId, $lastProduct;

    public static function saveProduct($request)
    {

        self::$lastProduct = Product::first();
        
        if(self::$lastProduct== null){
            self::$productId =  "CAPIPSC-AAAA1";
        }
        else{

            self::$lastProductId = Product::latest()->first()->product_id;
            self::$string = substr( self::$lastProductId , 8);


            $numbers = preg_replace('/[^0-9]/', '', self::$string);
            $letters = preg_replace('/[^a-zA-Z]/', '', self::$string);
              
            if($numbers == 9)
            {
                $letters++;
                $numbers= "0";
                self::$productId= "CAPIPSC-".$letters.$numbers;
            }else{
                $numbers++;
                self::$productId= "CAPIPSC-".$letters.$numbers;
            }
           
        }

        self::$product= new Product();
        self::$product->product_id =  self::$productId;
        self::$product->name = $request->name;
        self::$product->delar_id = $request->delar_name;
        self::$product->delar_name = $request->delar_name;
        self::$product->category_id = $request->category;
        self::$product->model = $request->model;
        self::$product->detail_one = $request->detail_one;
        self::$product->detail_two = $request->detail_two;
        self::$product->detail_three = $request->detail_three;
        self::$product->detail_four = $request->detail_four;
        self::$product->qty = $request->quantity;
        self::$product->buy_price = $request->buy_price;
        self::$product->image = $request->image;
        self::$product->save();

        return  self::$productId;

    }
    public static function updateProduct($request)
    {
        

        self::$product= Product::where('product_id', $request->product_id)->first();
        self::$product->name = $request->name;
        self::$product->delar_id = $request->delar_name;
        self::$product->delar_name = $request->delar_name;
        self::$product->category_id = $request->category;
        self::$product->model = $request->model;
        self::$product->detail_one = $request->detail_one;
        self::$product->detail_two = $request->detail_two;
        self::$product->detail_three = $request->detail_three;
        self::$product->detail_four = $request->detail_four;
        self::$product->qty = $request->quantity;
        self::$product->buy_price = $request->buy_price;
        self::$product->image = $request->image;
        self::$product->update();

        return  self::$productId;

    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
