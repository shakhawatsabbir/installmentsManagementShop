<?php

namespace App\Http\Controllers;

use App\Models\SalesDetails;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SalesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public $salesDetail;

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($sales_id)
    {
        
        foreach (Cart::instance('cart')->content() as $item)
        {
            $this->salesDetail = new SalesDetails();
            $this->salesDetail->order_id = $sales_id;
            $this->salesDetail->product_id = $item->id;
            $this->salesDetail->product_name = $item->name;
            // $this->salesDetail->product_model = $item->model;
            $this->salesDetail->product_quantity = $item->qty;
            $this->salesDetail->save();
            Cart::remove($item->rowId);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesDetails $salesDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesDetails $salesDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesDetails $salesDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesDetails $salesDetails)
    {
        //
    }
}
