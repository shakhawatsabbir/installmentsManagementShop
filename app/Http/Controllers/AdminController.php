<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sales;
use Carbon\Carbon ;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $instalment, $vehicle, $transection, $total_invest, $lastfiveSales;
    public function index()
    {
        $this->total_invest = Sales::all()->sum("sales_amount");
         $this->lastfiveSales = Sales::orderBy('created_at', 'desc')->get();
        return view('admin.home.index', [
            'total_invest' => $this->total_invest,
            'lastfiveSales' => $this->lastfiveSales
        ]);
    }

    //    Dashboard product sorting function
    public function productSearchSort(Request $request)
    {
        if ($request->short == "Last 24 Hours") {
            $this->product = Product::where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())->orderBy('id', 'desc')->paginate(10);
        } elseif ($request->short == "Last 7 Days") {
            $this->product = Product::where('created_at', '>=', Carbon::now()->subDay(7)->toDateTimeString())->orderBy('id', 'desc')->paginate(10);
        } elseif ($request->short == "Last Month") {
            $this->product = Product::where('created_at', '>=', Carbon::now()->subDay(30)->toDateTimeString())->orderBy('id', 'desc')->paginate(10);
        } elseif ($request->short == "Last Year") {
            $this->product = Product::where('created_at', '>=', Carbon::now()->subDay(365)->toDateTimeString())->orderBy('id', 'desc')->paginate(10);
        } else {
            $this->product = Product::orderBy('id', 'desc')->paginate(10);
        }

        if ($this->product->count() == 0) {
            $this->massage = 'Sort By   \'' . $request->short . '\' not found';
        } else {
            $this->massage =  'Sort By   \'' . $request->short . '\' ';
        }

        $this->orders = order::orderBy('id', 'desc')->get();

        return view('admin.home.index', [
          
        ]);
    }
}
