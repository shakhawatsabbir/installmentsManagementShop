@extends('admin.master')
@section('title')
F-Star | Product Manage
@endsection
@section('content')
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> Product Table</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">

            <div class="d-flex align-items-center">
                <h5 class="mb-0"> Product Table</h5>
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
                        @if($products->currentPage() != $products->lastPage())
                        {{$products->count()*$products->currentPage()}}
                        @else
                        {{$products->total()}}
                        @endif
                    </span>
                    of
                    <span class="fw-semibold">{{$products->total()}}</span> Products
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
                <table class="table align-middle mb-0">
                    <thead class="table-light ">
                        <tr>
                            <th>Product Id </th>
                            <th>Name </th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Buy Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>

                            <td><a href="{{route('product.details',['id'=>$product->product_id])}}" class="text-primary ">{{$product->product_id}}</a></td>
                            <td>{{$product->name}} </td>
                            <td>{{$product->category->name}} </td>
                            <td>{{$product->qty}}</td>
                            <td>{{$product->buy_price}}</td>
                            <td><span class="badge  {{$product->status == 1 ? 'bg-danger' : 'bg-success '}}">{{$product->status == 1 ? 'Closed' : 'Active'}}</span></td>
                            <td>
                                <a href="{{route('productEdit',['id'=>$product->product_id])}}" class="btn btn-sm btn-outline-info px-4">Edit <i class="lni lni-arrow-right"></i></a>
                                <a href="{{route('product.details',['id'=>$product->product_id])}}" class="btn btn-sm btn-outline-info px-4">Details <i class="lni lni-eye"></i></a>
                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
                <div class="col-12 mt-3 d-flex flex-row-reverse">
                    <div class="dataTables_paginate ">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous ">
                                <a href="{{$products->previousPageUrl()}}" class="page-link">Prev</a>
                            </li>


                            <li class="paginate_button page-item next">
                                <a href="{{$products->nextPageUrl()}}" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection