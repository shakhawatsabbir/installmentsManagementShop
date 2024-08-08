<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\InstallmentCustomer;
use App\Models\Instalment;
use App\Models\Sales;
use App\Models\SalesDetails;
use App\Models\Transection;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public $vehicle, $customer, $sales, $salesDetails, $customerVehicle, $cart, $instalmentSalePrice, $installment, $transection, $saveinstalment;
    public function index()
    {
        $this->customer = Customer::latest('id')->paginate(10);
        return view('admin.customer.manage',[
            'customers'=>$this->customer
        ]);
    }
 
    public function create(Request $request)
    {
        //
    }

   

    public function profile($id)
    {
        $this->customer = Customer::find($id);
        return view('admin.customer.profile', [
            'customer' => $this->customer,
            'customerVehicles' => $this->customerVehicle,
        ]);
    }

    public function customerVehicle($id)
    {
        $this->vehicle = Sales::where('vehicle_id', $id)->first();
        $this->customer = Customer::where('customer_id', $this->vehicle->customer_id)->first();
        $this->installment = Instalment::where('cng_id', $id)->get();
        return view('admin.sale.vehicle', [
            'vehicle' =>  $this->vehicle,
            'customer' => $this->customer,
            'instalments' => $this->installment
        ]);
    }
}
