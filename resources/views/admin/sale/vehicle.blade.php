@extends('admin.master')
@section('title')
    F-Star | Customer Profile
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
                        <li class="breadcrumb-item active" aria-current="page"> Vehicle</li>
                        <li class="breadcrumb-item active" aria-current="page"> {{$vehicle->vehicle_id}}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card shadow-sm border-0 overflow-hidden">
                    <div class="card-body">
                        <div class="profile-avatar text-center">
                            <img src="{{asset('adminAsset')}}/assets/images/avatars/avatar-1.png" class="rounded-circle shadow" width="120" height="120" alt="">
                        </div>
                        <div class="text-center mt-4">
                            <h4 class="mb-1">{{$customer->name}}</h4>
                            <p class="mb-0 text-secondary">NID:- {{$customer->nid}}</p>
                            <div class="mt-4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mx-auto">
                <div class="card shadow-sm border-0 overflow-hidden">
                    <div class="card-body">
                        <h4>কাস্টোমার তথ্য</h4>
                        <hr/>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">মোবাইলঃ- {{$customer->mobile}}</li>
                            <li class="list-group-item">পোস্ট-অফিসঃ- {{$customer->post_office}}</li>
                            <li class="list-group-item">উপজেলাঃ- {{$customer->upazila}}</li>
                            <li class="list-group-item">জেলাঃ- {{$customer->zila}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="mb-0 text-uppercase">বিলিং তথ্য</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">মোট টাকা<span class="fw-bold"> {{$vehicle->total_instalment_amount}} টাকা</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center"> মোট কিস্তি <span class="fw-bold"> {{$vehicle->total_instalment}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">কিস্তির পরিমান <span class="fw-bold"> {{$vehicle->instalment_amount}} টাকা</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">জমা কিস্তি <span class="fw-bold"> {{$vehicle->pay_instalment}} </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">জমা কিস্তি পরিমান<span class="fw-bold"> {{$vehicle->total_instalment_deposit_amount}} টাকা</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">বকেয়া কিস্তি <span class="fw-bold"> {{$vehicle->due_instalment}} </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">বকেয়া টাকা <span class="fw-bold"> {{$vehicle->due_instalment_amount}} টাকা</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="mb-0 text-uppercase">গাড়ির তথ্য</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">তথ্য ১	<span class="badge bg-primary rounded-pill">xdfsdfg</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">তথ্য ২	<span class="badge bg-success rounded-pill">2dgzgz</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">তথ্য ৩	<span class="badge bg-danger rounded-pill">8zdgzdsg</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">তথ্য ৪	<span class="badge bg-orange rounded-pill">1zdfgzgg0</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>



        </div>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0 text-uppercase">কিস্তি জমার তথ্য </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>#ID</th>
                            <th>Customer Name</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($instalments as $instalment)
                            <tr>
                                <td>#{{$instalment->id}}</td>
                                <td>{{$customer->name}}</td>
                                <td>৳{{$instalment->instalment_amount}}</td>
                                <td>{{$instalment->method}}</td>
                                <td>{{$instalment->date}}</td>
                                <td><span class="badge rounded-pill alert-danger">Failed</span></td>
                            </tr>
                      @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>
@endsection
