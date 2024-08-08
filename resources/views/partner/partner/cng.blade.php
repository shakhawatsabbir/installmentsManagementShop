@extends('partner.master')
@section('mStyle')
    .m-card{
    background-color: #ecf0f3;
    box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
    }
@endsection
@section('content')
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Partner</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('partnerHome')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">গাড়ি</li>

                        <li class="breadcrumb-item active" aria-current="page">{{$cng->vehicle_id}}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <!--end row-->
        <div class="row">

                <div class="col-xl-6 mx-auto">
                    <div class="card m-card  border-0  radius-15  border-start border-tiffany border-3">
                        <div class="card-body">
                            <h5>গাড়ির তথ্য</h5>
                            <hr/>
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item d-flex justify-content-between align-items-center"  style="background-color: #ecf0f3;">মালিক নামঃ- <span class="text-end">{{$cng->partner->name}}</span> </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #ecf0f3;">ক্রেতার নামঃ- <span class="text-end">{{$cng->customer->name}}</span>  </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #ecf0f3;">CNG আইডিঃ- <span class="text-end">{{$cng->vehicle_id}}</span> </li>
                            </ul>
                        </div>
                    </div>
                </div>



        </div>
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <h6 class="mb-0 text-uppercase">বিলিং তথ্য </h6>
                <hr/>
                <div class="card border-0  radius-15  border-start border-tiffany border-3">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">মোট টাকা   <span class=""><strong>{{$cng->due_amount}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">কিস্তির পরিমান	  <span class=""><strong>{{$cng->instalment_amount}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center"> মোট কিস্তি	 <span class=""><strong>{{$cng->total_instalment}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">জমা কিস্তি	 <span class=""><strong>{{$cng->pay_instalment}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">জমা টাকা   <span class=""><strong>{{$cng->total_instalment_deposit_amount}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">বকেয়া টাকা   <span class=""><strong>{{$cng->due_instalment_amount}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">বকেয়া কিস্তি  <span class=""><strong>{{$cng->due_instalment}}</strong></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mx-auto">
                <h6 class="mb-0 text-uppercase">গাড়ির তথ্য</h6>
                <hr/>
                <div class="card border-0  radius-15  border-start border-tiffany border-3">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center ">CNG আইডি :- 	<span class=""><strong>{{$cng->cng_id}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">তথ্য ১	<span class=""><strong>{{$cng->cng_detail_one}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">তথ্য ২	<span class=""><strong>{{$cng->cng_detail_two}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">তথ্য ৩	<span class=""><strong>{{$cng->cng_detail_three}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">তথ্য ৪	<span class=""><strong>{{$cng->cng_detail_four}}</strong></span>
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
                            <th>Status</th>
                            <th>Method</th>
                            <th>Date</th>
                            <!-- <th>Action</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($instalments as $instalment)
                            <tr>
                                <td>{{$instalment->cng_id}}</td>
                                <td>{{$instalment->customer_id}}</td>
                                <td>{{$instalment->instalment_amount}}</td>
                                <td><span class="badge rounded-pill alert-success">Paid</span></td>
                                <td>{{$instalment->method}}</td>
                                <td>{{$instalment->date}}</td>
                                <!-- <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                    </div>
                                </td> -->
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>
@endsection
