@extends('admin.master')
@section('title')
F-Star | Installment
@endsection
@section('content')

<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Installment</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Installment Customer</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$installmentCustomer->installment_customer_id}}</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <div >
                    <!-- <h5 class="mb-1">Tue, Apr 15, 2020, 8:44PM </h5> -->
                    <h5 class="mb-1">Customer Id : {{$installmentCustomer->installment_customer_id}}</h5>
                    <p class="mb-0">Sales No : {{$sales->id}}</p>
                </div>

                <div class="ms-auto">
                    <button type="button" class="btn btn-secondary"><i class="bi bi-printer-fill"></i> Print</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-2 ">
                <div class="col">
                    <div class="card border shadow-none radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-box bg-light-primary border-0">
                                    <i class="bi bi-person text-primary"></i>
                                </div>
                                <div class="info">
                                    <h6 class="mb-2">Customer</h6>
                                    <p class="mb-1"><strong>Name</strong> : {{$customer->name}}</p>
                                    <p class="mb-1"><strong>Username</strong> : {{$customer->user_name}}</p>
                                    <p class="mb-1"><strong>Mobile</strong> : {{$customer->mobile}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border shadow-none radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-box bg-light-success border-0">
                                    <i class="bi bi-truck text-success"></i>
                                </div>
                                <div class="info">
                                    <h6 class="mb-2">Sales info</h6>
                                    <p class="mb-1"><strong>Type</strong> : {{$sales->sales_type}}</p>
                                    <p class="mb-1"><strong>Sold By</strong> : {{$sales->reff_name}}</p>
                                    <p class="mb-1"><strong>Status</strong> : New</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

            <div class="row">
                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="card border shadow-none radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5> Installment Table</h5>

                            </div>
                            <div class="flex-shrink-0">
                                <div class="text-muted mb-4">
                                    Showing
                                    <span class="fw-semibold">
                                        @if($installments->currentPage() != $installments->lastPage())
                                        {{$installments->count()*$installments->currentPage()}}
                                        @else
                                        {{$installments->total()}}
                                        @endif
                                    </span>
                                    of
                                    <span class="fw-semibold">{{$installments->total()}}</span> Installment
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Amount</th>
                                            <th>Method</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($installments as $installment)
                                        <tr>
                                            <td>{{$installment->id}} </td>
                                            <td>{{$installment->instalment_amount}} </td>
                                            <td>{{$installment->method}} </td>
                                            <td>{{$installment->date}} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-12 mt-3 d-flex flex-row-reverse">
                                    <div class="dataTables_paginate ">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous ">
                                                <a href="{{$installments->previousPageUrl()}}" class="page-link">Prev</a>
                                            </li>
                                            <li class="paginate_button page-item next">
                                                <a href="{{$installments->nextPageUrl()}}" class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-xl-4">
                    <div class="card border shadow-none bg-light radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div>
                                    <h5 class="mb-0">Summary</h5>
                                </div>
                                <div class="ms-auto">
                                    <button type="button" class="btn alert-success radius-30 px-4">Installment</button>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Instalment Amount</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$installmentCustomer->instalment_amount}} Tk</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Total Instalment</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$installmentCustomer->total_instalment}} M</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Totla Instalment Amount</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$installmentCustomer->total_instalment_amount}} Tk</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Pay Instalment</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$installmentCustomer->pay_instalment}} M</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Total Instalment Deposit Amount</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$installmentCustomer->total_instalment_deposit_amount}} Tk</h5>
                                </div>
                            </div>


                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Due Instalment</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$installmentCustomer->due_instalment}} M</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Due Instalment Amount</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$installmentCustomer->due_instalment_amount}} Tk</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Instalment Deposited Date</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$installmentCustomer->instalment_deposited_date}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div><!--end row-->

        </div>
    </div>
</main>
<!--end page main-->

@endsection