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
                        <li class="breadcrumb-item active" aria-current="page"> Profile</li>
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
                            <div class="mt-4"></div>
                        </div>
                       
                        <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">User Name:- <span class="fw-bold"> {{$customer->user_name}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">মোবাইলঃ- <span class="fw-bold"> {{$customer->mobile}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">এনআইডিঃ-<span class="fw-bold">  {{$customer->nid}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">গ্রামঃ-  <span class="fw-bold"> {{$customer->village}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">পোস্ট-অফিসঃ<span class="fw-bold">  {{$customer->post_office}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">উপজেলাঃ-  <span class="fw-bold"> {{$customer->upazila}} </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">জেলাঃ-<span class="fw-bold"> {{$customer->zila}}</span>
                                    </li>
                                </ul>
                    </div>
                </div>
            </div>
            
        </div>
        <!--end row-->
        <!-- <div class="row">
            <div class="col-xl-6 mx-auto">
                <h6 class="mb-0 text-uppercase">বিলিং তথ্য </h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">মোট টাকা<span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">কিস্তির পরিমান		<span class="badge bg-success rounded-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center"> মোট কিস্তি	 	<span class="badge bg-danger rounded-pill">8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">জমা কিস্তি	<span class="badge bg-orange rounded-pill">10</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">বকেয়া টাকা<span class="badge bg-purple rounded-pill">22</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">বকেয়া কিস্তি<span class="badge bg-purple rounded-pill">22</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mx-auto">
                <h6 class="mb-0 text-uppercase">গাড়ির তথ্য</h6>
                <hr/>
                <div class="card">
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
        <h6 class="mb-0 text-uppercase">কিস্তি জমার তথ্য </h6>
        <hr/>
        <div class="card">
            <div class="card-header py-3">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6 me-auto">
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                            <input class="form-control ps-5" type="text" placeholder="Search Payment">
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select">
                            <option>Status</option>
                            <option>Active</option>
                            <option>Disabled</option>
                            <option>Pending</option>
                            <option>Show All</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select">
                            <option>Show 10</option>
                            <option>Show 30</option>
                            <option>Show 50</option>
                        </select>
                    </div>
                </div>
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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>#8562</td>
                            <td>
                                dsgfsdfhg
                            </td>
                            <td>$854.00</td>
                            <td><span class="badge rounded-pill alert-success">Paid</span></td>
                            <td>Master Card</td>
                            <td>14 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#7568</td>
                            <td>
                                sdfhsdfh
                            </td>
                            <td>$653.00</td>
                            <td><span class="badge rounded-pill alert-success">Paid</span></td>
                            <td>Master Card</td>
                            <td>16 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#3265</td>
                            <td>dfghlkdjfgh</td>
                            <td>$152.00</td>
                            <td><span class="badge rounded-pill alert-danger">Failed</span></td>
                            <td>Master Card</td>
                            <td>18 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div> -->
    </main>
@endsection
