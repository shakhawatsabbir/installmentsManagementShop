@extends('admin.master')
@section('title')
F-Star | CNG Manage
@endsection
@section('content')
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Sales</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> Sales Table</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row g-3 align-items-center">
                <div class="col">
                    <h5 class="mb-0">গাড়ির টেবিল</h5>
                </div>
                <div class="col d-flex  ms-auto">
                    <form class="d-flex  ">
                        <div class=" position-relative ">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                            <input class="form-control ps-5" type="text" placeholder="search">
                            
                        </div>
                        <a href="" class="btn btn-info ms-2 ">Search</a>

                    </form>

                    <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer ms-5">
                        <div class="dropdown">
                            <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-outline-info " href="#" data-bs-toggle="dropdown" aria-expanded="false">Filter</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Last 7 Day</a> </li>
                                <li><a class="dropdown-item" href="javascript:;">Last 15 Day</a> </li>
                                <li><a class="dropdown-item" href="javascript:;">Last Month</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Last Half-Year</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Last Year</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body">

            <div class="flex-shrink-0">
                <div class="text-muted">
                    Showing
                    <span class="fw-semibold">
                        @if($sales->currentPage() != $sales->lastPage())
                        {{$sales->count()*$sales->currentPage()}}
                        @else
                        {{$sales->total()}}
                        @endif
                    </span>
                    of
                    <span class="fw-semibold">{{$sales->total()}}</span> Sales
                </div>
            </div>
            <div class="table-responsive mt-3 ">
                <table id="example2" class="table table-striped table-bordered ">
                    <thead class="table-light">
                        <tr>
                            <th>আইডি</th>
                            <th>কাস্টোমার নাম </th>
                            <th>বিক্রয় মূল্য </th>
                            <th>পরিশোধ</th>
                            <th>বকেয়া টাকা</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sale)
                        <tr>
                            <td>{{$sale->id}}</td>
                            <td><a href="{{route('customerProfile',['id'=>$sale->customer_id])}}" class="text-primary">{{$sale->customer->name}}</a></td>
                            <td>{{$sale->sales_amount}} ৳</td>
                            <td>{{$sale->pay_amount}} ৳</td>
                            <td>{{$sale->due_amount}} ৳</td>

                            <td>
                                <a href="{{route('sales.details',['id'=>$sale->id])}}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye-fill"></i>Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-12 mt-3 d-flex flex-row-reverse">
                    <div class="dataTables_paginate ">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous ">
                                <a href="{{$sales->previousPageUrl()}}" class="page-link">Prev</a>
                            </li>


                            <li class="paginate_button page-item next">
                                <a href="{{$sales->nextPageUrl()}}" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection