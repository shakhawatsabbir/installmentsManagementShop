@extends('admin.master')
@section('title')
F-Star | Instalment Pay
@endsection
@section('content')
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Installment</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">কিস্তি জমা </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-xl-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        @if(session('massage'))
                        <div class="bg-light-success ">
                            <h6 class="text-success  text-center py-3">
                                {{session('massage')}}
                            </h6>
                        </div>
                        @endif
                        <h6 class="mb-0 text-uppercase">কিস্তি জামা</h6>
                        <hr />
                        <form class="row g-3" action="{{route('makeInstallmentSave')}}" method="post">
                            @csrf
                            
                            <div class="col-12 " id="installmentDetail">
                            <p class="d-flex justify-content-between align-items-center"><strong>ক্রেতার নাম :- </strong> <span class="text_end"> <strong>{{$customer->name}} </strong></span></p>
                            <p class="d-flex justify-content-between align-items-center"><strong>মোবাইল নাম্বার :- </strong> <span class="text_end"> <strong>{{$customer->mobile}}  </strong></span></p>
                                <p class="d-flex justify-content-between align-items-center"><strong>কিস্তি কাস্টমার আইডি :- </strong> <span class="text_end"> <strong>{{$installmentCustomer->installment_customer_id}}</strong></span></p>
                                <p class="d-flex justify-content-between align-items-center"><strong>কিস্তির পরিমান :- </strong> <span class="text_end"> <strong>{{$installmentCustomer->instalment_amount}} টাকা</strong></span></p>
                                <p class="d-flex justify-content-between align-items-center"><strong>জমা কিস্তি :- </strong> <span class="text_end"> <strong>{{$installmentCustomer->pay_instalment}}টি </strong></span></p>
                                <p class="d-flex justify-content-between align-items-center"><strong>জমা টাকা :- </strong> <span class="text_end"> <strong>{{$installmentCustomer->total_instalment_deposit_amount}} টাকা</strong></span></p>
                                <p class="d-flex justify-content-between align-items-center"><strong> বকেয়া টাকা :- </strong> <span class="text_end"> <strong>{{$installmentCustomer->due_instalment_amount}} টাকা</strong></span></p>
                            </div>
                            <input type="hidden" class="form-control" name="installment_customer_id" value="{{$installmentCustomer->installment_customer_id}}">
                            <input type="hidden" class="form-control" name="customer_id" value="{{$customer->id}}">
                            <div class="col-12 col-xl-6  " id="instalmentAmountDiv">
                                <label class="form-label fw-bold">কিস্তির পরিমান (টাকা) </label>
                                <input type="number" name="amount" class="form-control" required>
                             
                            </div>
                            <div class="col-12  col-xl-6  " id="processDiv">
                                <label class="form-label fw-bold">মাধ্যম </label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="flexSwitchCheckDefault" name="method" value="Cash" required>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Cash</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="flexSwitchCheckDefault" name="method" value="Bkash" required>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Bkash</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="flexSwitchCheckDefault" name="method" value="Nagad" required>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Nagad</label>
                                </div>
                                <div class="form-check form-check-inline  ">
                                    <input class="form-check-input" type="radio" id="flexSwitchCheckDefault" name="method" value="Bank" required>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Bank</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <div>
                                        <button type="submit" class="btn btn-primary  form-control">কনফার্ম </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</main>

@endsection