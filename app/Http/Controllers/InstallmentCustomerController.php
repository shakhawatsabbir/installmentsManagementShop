<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\InstallmentCustomer;
use App\Models\Instalment;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Transection;
use Carbon;
use Illuminate\Http\Request;

class InstallmentCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $instalment, $transection, $installmentCustomer;
    public function index()
    {
        return view('admin.inastallment.index');
    }
    /**
     * Search a installment the resource.
     */
    public function searchInstallment(Request $request)
    {
        $this->installmentCustomer = InstallmentCustomer::where('installment_customer_id',$request->installmentCustomerId)->first();

        $data['customer'] = Customer::where('id',$this->installmentCustomer->customer_id)->get();
        $data['installment']=InstallmentCustomer::where('id',$this->installmentCustomer->id)->get() ;
       
        return response()->json($data);
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
        $this->instalment = new Instalment();
        $this->instalment->customer_id = $request->customer_id;
        $this->instalment->installment_customer_id = $request->installment_customer_id;
        $this->instalment->instalment_amount = $request->amount;
        $this->instalment->method = $request->method;
        $this->instalment->date = Carbon\Carbon::now();
        $this->instalment->save();

        $this->installmentCustomer = InstallmentCustomer::where('installment_customer_id','=',$request->installment_customer_id)->first();
        $this->installmentCustomer->pay_instalment= $this->installmentCustomer->pay_instalment + 1;
        $this->installmentCustomer->total_instalment_deposit_amount = $this->installmentCustomer->total_instalment_deposit_amount + $request->amount;
        $this->installmentCustomer->due_instalment_amount = $this->installmentCustomer->due_instalment_amount - $request->amount;
        $this->installmentCustomer->due_instalment = $this->installmentCustomer->due_instalment - 1;
        if($this->installmentCustomer->due_instalment_amount <= 0)
        {
            $this->installmentCustomer->status = 1;
        }
        else{
            $this->installmentCustomer->status = 0;
        }
       
        $this->installmentCustomer->update();

        $this->transection = new Transection();
        $this->transection->customer_id = $request->customer_id;
        $this->transection->amount = $request->amount;
        $this->transection->note = "Instalment Pay";
        $this->transection->date = Carbon\Carbon::now();
        $this->transection->save();


        return back()->with('massage', 'Installment pay Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(InstallmentCustomer $installmentCustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstallmentCustomer $installmentCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstallmentCustomer $installmentCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstallmentCustomer $installmentCustomer)
    {
        //
    }
    public function instalmentCustomerManaage()
    {
        $this->product = Product::latest('id')->paginate(10);
        $this->installmentCustomer = InstallmentCustomer::latest('id')->paginate(10);
        return view('admin.inastallment.manage', [
            'products' => $this->product,
            'installmentCustomers'=>$this->installmentCustomer
        ]);
    }
    public function instalmentCustomerDetails($id)
    {
        $this->installmentCustomer = InstallmentCustomer::where('installment_customer_id',$id)->first();
        $this->customer = Customer::where('id',$this->installmentCustomer->customer_id)->first();
        $this->sales = Sales::where('id',$this->installmentCustomer->sales_id)->first();
        $this->installments = Instalment::where('installment_customer_id',$id)->latest('id')->paginate(5);

        return view('admin.inastallment.detail',[
            'installmentCustomer'=>$this->installmentCustomer,
            'customer'=> $this->customer ,
            'sales'=>$this->sales,
            'installments'=>$this->installments
        ]);
    }
    public function installmentPay($id)
    {
        $this->installmentCustomer = InstallmentCustomer::where('installment_customer_id',$id)->first();
        $this->customer = Customer::where('id',$this->installmentCustomer->customer_id)->first();
       
        return view('admin.inastallment.pay',[
            'installmentCustomer'=>$this->installmentCustomer,
            'customer'=> $this->customer 
        ]);
    }

    
}
