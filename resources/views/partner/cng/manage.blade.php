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
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0"> গাড়ির টেবিল</h5>
                    <br/>
                    <p class="text-success mt-2">{{session('massage')}}</p>
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
                            <th>মালিকের নাম </th>
                            <th>CNG ID</th>
                            <th>পুঁজি</th>
                            <th>কিস্তির পরিমান</th>
                            <th>মোট কিস্তি</th>
                            <th>মোট জমা</th>
                            <th>স্ট্যাটাস</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cngs as $cng)
                        <tr>
                            <td><a href="{{route('customerProfile',['id'=>$cng->customer_id])}}" class="text-primary">{{$cng->customer->name}}</a></td>
                            @if($cng->partner == !null)
                                <td><a href="" class="text-primary">{{ $cng->partner->name}}</a></td>
                            @else
                                <td><a href="{{route('addPartner',['id'=>$cng->cng_id])}}" class="badge btn-primary ">Make Owner</a></td>
                            @endif
                            <td><a href="" class="text-primary ">{{$cng->cng_id}}</a></td>
                            <td>{{$cng->due_amount}} ৳</td>
                            <td>{{$cng->instalment_amount}} ৳</td>
                            <td>{{$cng->total_instalment}}</td>
                            <td>25432653 ৳</td>
                            <td><span class="badge  {{$cng->status == 0 ? 'bg-danger' : 'bg-success '}}">{{$cng->status == 0 ? 'Closed' : 'Active'}}</span></td>
                            <td>
                                <a href="{{route('cng',['id'=> $cng->cng_id])}}" class="btn btn-primary px-3 btn-sm"><i class="bi bi-eye"></i></a>
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
