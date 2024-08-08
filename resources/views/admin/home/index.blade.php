@extends('admin.master')
@section('title')
F-Star | Admin Dashboard
@endsection
@section('content')
<main class="page-content">
    <h6 class="mb-0 text-uppercase">Summary</h6>
    <hr>
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Sales</p>
                            <h4 class="my-1">{{$total_invest}}৳</h4>
                            <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> 0% from last week</p>
                        </div>
                        <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><a class="text-white" href="{{route('saleManage')}}"><i class="bi bi-basket2-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Profit</p>
                            <h4 class="my-1">00 ৳</h4>
                            <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> 00 from last week</p>
                        </div>
                        <div class="widget-icon-large bg-gradient-success text-white ms-auto"><i class="bi bi-currency-exchange"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Active Vahicle</p>
                            <h4 class="my-1"> 00</h4>
                            <p class="mb-0 font-13 text-danger"><i class="bi bi-caret-down-fill"></i> 00 from last week</p>
                        </div>
                        <div class="widget-icon-large bg-gradient-danger text-white ms-auto"><i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Active Invest</p>
                            <h4 class="my-1">00%</h4>
                            <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> 00% from last week</p>
                        </div>
                        <div class="widget-icon-large bg-gradient-info text-white ms-auto"><i class="bi bi-bar-chart-line-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
    <h6 class="mb-0 text-uppercase">Quick GO</h6>
    <hr>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">

        <div class="col">
            <div class="card radius-10 border-0 border-start border-success border-3">
                <a href="{{route('product.create')}} ">
                    <div class="card-body">

                        <div class="d-flex align-items-center">
                            <div class="">
                                <h4 class="mb-0 text-success">Product Add</h4>
                            </div>
                            <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 border-0 border-start border-info border-3">
                <a href="{{route('product.index')}}">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <h4 class="mb-0 text-info">Product Manage</h4>
                            </div>
                            <div class="ms-auto widget-icon bg-info text-white">
                                <i class="bi bi-receipt"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-pink border-3">
                <a href="{{route('makeSale')}}">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <h4 class="mb-0 text-pink">Sales Add</h4>
                            </div>
                            <div class="ms-auto widget-icon bg-pink text-white">
                                <i class="bi bi-receipt"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-orange border-3">
                <a href="{{route('saleManage')}}">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <h4 class="mb-0 text-orange">Sales Manage</h4>
                            </div>
                            <div class="ms-auto widget-icon bg-orange text-white">
                                <i class="bi bi-wallet-fill"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-pink border-3">
                <a href="{{route('makeInstallment')}}">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <h4 class="mb-0 text-pink">Instalment Pay</h4>
                            </div>
                            <div class="ms-auto widget-icon bg-pink text-white">
                                <i class="bi bi-pencil-fill"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-pink border-3">
                <a href="{{route('customer')}}">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <h4 class="mb-0 text-pink">Customer Manage</h4>
                            </div>
                            <div class="ms-auto widget-icon bg-pink text-white">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div><!--end row-->
    <h6 class="mb-0 text-uppercase">data table</h6>
    <hr>
    <div class="col-12 col-lg-6 col-xl-6 ">
        <div class="card radius-10">
            <div class="card-header bg-transparent">
                <div class="row g-3 align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Recent Sales</h5>
                    </div>
                    <div class="col d-flex">
                        <form class="ms-auto position-relative ">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                            <input class="form-control ps-5" type="text" placeholder="search">
                        </form>

                        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer ms-2">
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
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead class="table-light">
                            <tr>
                                <th>#ID</th>
                                <th>তারিখ</th>
                                <th>কাস্টোমার নাম</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lastfiveSales as $lastfiveSale)
                            <tr>
                                <td>#{{$lastfiveSale->id}}</td>
                                <td>{{$lastfiveSale->created_at}}</td>
                                <td>{{$lastfiveSale->customer->name}}</td>
                                <td class="text-center"> <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 mt-3 d-flex flex-row-reverse">
                        <div class="dataTables_paginate ">
                            <a href="" class="page-link btn btn-outline-primary btn-sm">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection