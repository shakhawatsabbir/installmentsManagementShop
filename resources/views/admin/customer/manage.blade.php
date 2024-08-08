@extends('admin.master')
@section('title')
    F-Star | Customer Manage
@endsection
@section('content')
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Customer</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Customer Table</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0"> কাস্টোমার টেবিল</h5>
                   
                    <br/>
                    
                    <p class="text-success mt-2">{{session('massage')}}</p>
                    <form class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                        <input class="form-control ps-5" type="text" placeholder="search">
                    </form>
                    
                </div>
                <div class="flex-shrink-0"  >
                    <div class="text-muted">
                        Showing 
                        <span class="fw-semibold">
                            @if($customers->currentPage() != $customers->lastPage())
                                {{$customers->count()*$customers->currentPage()}}
                            @else
                                {{$customers->total()}}
                            @endif
                        </span> 
                            of 
                        <span class="fw-semibold">{{$customers->total()}}</span> Sales
                    </div>
                </div>
                <div class="table-responsive mt-3 ">
                    <table id="example2" class="table table-striped table-bordered " >
                        <thead class="table-light">
                        <tr>
                            <th>আইডি</th>
                            <th>কাস্টোমার নাম </th>
                            <th>User name </th>
                            <th>মোবাইল</th>
                            <th>Action</th> 
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->user_name}}</td>
                            <td>{{$customer->mobile}} </td>
                            <td>
                                <a href="{{route('customerProfile',['id'=>$customer->id])}}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye-fill"></i>Details</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 mt-3 d-flex flex-row-reverse">
                        <div class="dataTables_paginate " >
                            <ul class="pagination">
                                <li class="paginate_button page-item previous " >
                                    <a href="{{$customers->previousPageUrl()}}"  class="page-link">Prev</a>
                                </li>
                                
                                
                                <li class="paginate_button page-item next" >
                                    <a href="{{$customers->nextPageUrl()}}"  class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </main>
@endsection
