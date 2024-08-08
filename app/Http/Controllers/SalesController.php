<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\InstallmentCustomer;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesDetails;
use App\Models\Transection;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public $vehicle, $customer, $sales, $salesDetails, $customerVehicle, $cart, $instalmentSalePrice, $installment, $transection, $saveinstalment;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->cart = Cart::instance('cart')->content();
        return view(
            'admin.sale.index',
            [
                'carts' => $this->cart
            ]
        );
    }
    public function customarDetail()
    {
        $this->cart = Cart::instance('cart')->content();
        return view(
            'admin.sale.customer-detail',
            [
                'carts' => $this->cart
            ]
        );
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->customer = Customer::saveCustomer($request);
        $this->total_product_buy_price =  Cart::instance('cart')->subtotal();
        $this->profit = $request->pay_amount - $this->total_product_buy_price;
        $this->sales = Sales::saveSales($request, $this->customer->id, $this->profit);
        
        foreach (Cart::instance('cart')->content() as $item) {
            $this->salesDetails = SalesDetails::Details($item, $this->sales->id);
        }

        if ($request->due_amount > 0) {
            $this->saveinstalment = InstallmentCustomer::saveinstalment($request, $this->customer->id,  $this->sales->id);
        }
        $this->transection = Transection::salesTransaction($request, $this->customer->id,   $this->sales->id);
        return redirect(
            route('order.complete', ['customer_id' => $this->customer->id])
        );
    }

    /**
     * Display the Order complete resource.
     */
    public function orderComplete($customer_id)
    {
        $this->customer = Customer::find($customer_id);
        $this->transection = Transection::where('customer_id', $customer_id)->latest()->first();
        $this->sales = Sales::where('customer_id', $customer_id)->latest()->first();
        $this->salesDetails = SalesDetails::where('sales_id', $this->sales->id)->get();
        $this->installment = InstallmentCustomer::where('customer_id', $customer_id)->latest()->first();
        if ($this->installment != null) {
            $this->instalmentSalePrice = $this->sales->due_amount / 100 * $this->installment->parsent / 12 * $this->installment->total_instalment + $this->sales->sales_amount;
        } else {
            $this->instalmentSalePrice = 0;
        }
        return View('admin.sale.order_complete', [
            'salesDetails' => $this->salesDetails,
            'customer' => $this->customer,
            'salesData' => $this->sales,
            'instalmentSalePrice' => $this->instalmentSalePrice,
            'installment' => $this->installment,
            'transection' => $this->transection
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function salesManage()
    {
        $this->sales = Sales::latest('id')->paginate(10);
        $this->salesDetails = SalesDetails::get();
        return view('admin.sale.manage', [
            'sales' => $this->sales,
            'salesDetails' => $this->salesDetails
        ]);
    }


    public function salesDetails($sales_id)
    {
        $this->sales = Sales::find($sales_id);
        $this->customer = Customer::find($this->sales->customer_id);
        $this->salesDetails = SalesDetails::where('sales_id', $this->sales->id)->get();
        $this->transection = Transection::where('customer_id', $this->customer->id)->latest()->first();
        $this->installment = InstallmentCustomer::where('sales_id', $sales_id)->latest()->first();
        $this->instalmentSalePrice = $this->sales->due_amount / 100 * $this->installment->parsent / 12 * $this->installment->total_instalment + $this->sales->sales_amount;
        return View('admin.sale.order_complete', [
            'salesDetails' => $this->salesDetails,
            'customer' => $this->customer,
            'salesData' => $this->sales,
            'instalmentSalePrice' => $this->instalmentSalePrice,
            'installment' => $this->installment,
            'transection' => $this->transection
        ]);
    }
}
