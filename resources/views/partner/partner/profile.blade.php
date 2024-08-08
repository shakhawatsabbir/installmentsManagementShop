@extends('partner.master')
@section('content')
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Partner</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Profile</li>
                        <li class="breadcrumb-item active" aria-current="page"> আইডি :-  {{$partner->partner_id}}</li>
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
                            <h4 class="mb-1">{{$partner->name}}</h4>
                            <p class="mb-0 text-secondary">{{$partner->upazila}}, {{$partner->zila}}</p>
                            <div class="mt-4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mx-auto">
                <div class="card shadow-sm border-0 overflow-hidden">
                    <div class="card-body">
                        <h4>পাটনার তথ্য</h4>
                        <hr/>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">মোবাইলঃ- {{$partner->name}}</li>
                            <li class="list-group-item">পোস্ট-অফিসঃ- {{$partner->post_office}}</li>
                            <li class="list-group-item">উপজেলাঃ- {{$partner->upazila}}</li>
                            <li class="list-group-item">জেলাঃ- {{$partner->zila}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->


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
                            <th>কিস্তি জমা</th>
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
