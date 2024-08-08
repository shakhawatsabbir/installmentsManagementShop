@extends('admin.master')
@section('title')
F-Star | Installment Customer
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
                    <li class="breadcrumb-item active" aria-current="page"> Installment Customer</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="col-12 col-lg-6 col-xl-6 mx-auto">
    <div class="card">
        <div class="card-body">

            <div class="d-flex align-items-center">
                <h5 class="mb-0"> Installment Customer</h5>
                <br />

                <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>
            </div>
            <div class="flex-shrink-0">
                <div class="text-muted">
                    Showing
                    <span class="fw-semibold">
                        @if($installmentCustomers->currentPage() != $installmentCustomers->lastPage())
                        {{$installmentCustomers->count()*$installmentCustomers->currentPage()}}
                        @else
                        {{$installmentCustomers->total()}}
                        @endif
                    </span>
                    of
                    <span class="fw-semibold">{{$installmentCustomers->total()}}</span> Installment Customers
                </div>
            </div>
            @if(session('massage'))
            <div class="bg-light-success ">
                <h6 class="text-success  text-center py-3">
                    {{session('massage')}}
                </h6>
            </div>
            @endif
            <div class="table-responsive mt-3">
                <table class="table align-middle mb-0 ">
                    <thead class="table-light ">
                        <tr class="text-center">
                            <th>Installment Customer Id</th>
                            <th>Sales Id </th>
                            <th>Customer Id</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($installmentCustomers as $Customer)
                        <tr>

                            <td  class="text-center"><a href="{{route('product.details',['id'=>$Customer->installment_customer_id])}}" class="text-primary ">{{$Customer->installment_customer_id}}</a></td>
                            <td  class="text-center">{{$Customer->sales_id}} </td>
                            <td>{{$Customer->customer->name}} </td>
                            <td  class="text-center"><span class="badge  {{$Customer->status == 1 ? 'bg-danger' : 'bg-success '}}">{{$Customer->status == 1 ? 'Closed' : 'Active'}}</span></td>
                            <td  class="text-center">
                                <a href="{{route('installmentPay',['id'=>$Customer->installment_customer_id])}}" class="btn btn-sm btn-outline-info px-2 {{$Customer->status == 1 ? 'disabled' : ''}}" >Pay <i class="lni lni-arrow-right"></i></a>
                                <a href="{{route('instalment.customer.details',['id'=>$Customer->installment_customer_id])}}" class="btn btn-sm btn-outline-primary px-2">Details <i class="lni lni-eye"></i></a>
                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
                <div class="col-12 mt-3 d-flex flex-row-reverse">
                    <div class="dataTables_paginate ">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous ">
                                <a href="{{$installmentCustomers->previousPageUrl()}}" class="page-link">Prev</a>
                            </li>


                            <li class="paginate_button page-item next">
                                <a href="{{$installmentCustomers->nextPageUrl()}}" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
</main>
@endsection