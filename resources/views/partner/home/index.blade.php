@extends('partner.master')
@section('content')
    <main class="page-content">


        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Invest</p>
                                <h4 class="my-1">{{$totalInvest}} ৳</h4>
                                <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> 5% from last week</p>
                            </div>
                            <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i class="bi bi-basket2-fill"></i>
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
                                <h4 class="my-1">$24K</h4>
                                <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> 4.6 from last week</p>
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
                                <p class="mb-0 text-secondary">Active CNG</p>
                                <h4 class="my-1">5.8K</h4>
                                <p class="mb-0 font-13 text-danger"><i class="bi bi-caret-down-fill"></i> 2.7 from last week</p>
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
                                <h4 class="my-1">38.15%</h4>
                                <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> 12.2% from last week</p>
                            </div>
                            <div class="widget-icon-large bg-gradient-info text-white ms-auto"><i class="bi bi-bar-chart-line-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0"> গাড়ির টেবিল</h5>
                    <form class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                        <input class="form-control ps-5" type="text" placeholder="search">
                    </form>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>কাস্টোমার নাম </th>
                            <th>CNG ID</th>
                            <th>পুঁজি</th>
                            <th>কিস্তির পরিমান</th>
                            <th>মোট জমা</th>
                            <th>জমা কিস্তি</th>
                            <th>স্ট্যাটাস</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($myCng as $cng)
                            <tr>
                                <td><a href="{{route('customerProfile',['id'=>$cng->customer_id])}}" class="text-primary">{{$cng->customer->name}}</a></td>
                                <td>{{$cng->vehicle_id}}</td>
                                <td>{{$cng->due_amount}}</td>
                                <td>{{$cng->instalment_amount}}</td>
                                <td>{{$cng->total_instalment_deposit_amount}}</td>
                                <td>{{$cng->pay_instalment}}</td>
                                <td><span class="badge  {{$cng->status == 0 ? ' bg-danger' : 'bg-success'}}">{{$cng->status == 0 ? 'Closed' : 'Active'}} </span></td>
                                <td>
                                    <a href="{{route('cng',['id'=> $cng->vehicle_id])}}" class="btn btn-primary px-3 btn-sm"><i class="bi bi-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
