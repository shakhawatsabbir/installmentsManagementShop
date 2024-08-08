@extends('admin.master')
@section('title')
F-Star | Sale
@endsection
@section('content')

<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Sales</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <div class="row g-3 align-items-center">
                <div class="col-12 col-lg-4 col-md-6 me-auto">
                    <!-- <h5 class="mb-1">Tue, Apr 15, 2020, 8:44PM </h5> -->
                    <h5 class="mb-1">{{$salesData->created_at->format('d-M-Y')}}</h5>
                    <p class="mb-0">Sales No : #{{$salesData->id}}</p>
                </div>
                <div class="col-12 col-lg-3 col-6 col-md-3">
                    <select class="form-select">
                        <option>Change Status</option>
                        <option>Awaiting Payment</option>
                        <option>Confirmed</option>
                        <option>Shipped</option>
                        <option>Delivered</option>
                    </select>
                </div>
                <div class="col-12 col-lg-3 col-6 col-md-3">
                    <button type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary"><i class="bi bi-printer-fill"></i> Print</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-3">
                <div class="col">
                    <div class="card border shadow-none radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-box bg-light-primary border-0">
                                    <i class="bi bi-person text-primary"></i>
                                </div>
                                <div class="info">
                                    <h6 class="mb-2">Customer</h6>
                                    <p class="mb-1"><strong>Name</strong> : {{$customer->name}}</p>
                                    <p class="mb-1"><strong>Username</strong> : {{$customer->user_name}}</p>
                                    <p class="mb-1"><strong>Mobile</strong> : {{$customer->mobile}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border shadow-none radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-box bg-light-success border-0">
                                    <i class="bi bi-truck text-success"></i>
                                </div>
                                <div class="info">
                                    <h6 class="mb-2">Sales info</h6>
                                    <p class="mb-1"><strong>Type</strong> : {{$salesData->sales_type}}</p>
                                    <p class="mb-1"><strong>Sold By</strong> : {{$salesData->reff_name}}</p>
                                    <p class="mb-1"><strong>Status</strong> : New</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border shadow-none radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-box bg-light-danger border-0">
                                    <i class="bi bi-geo-alt text-danger"></i>
                                </div>
                                <div class="info">
                                    <h6 class="mb-2">Address</h6>
                                    <p class="mb-1"><strong>Village</strong> : {{$customer->village}}</p>
                                    <p class="mb-1"><strong>Upazila</strong> : {{$customer->upazila}}</p>
                                    <p class="mb-1"><strong>District</strong> :  {{$customer->zila}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card border shadow-none radius-10">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Product Model</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($salesDetails as $sales)
                                        <tr>
                                            <td>
                                                <a class="d-flex align-items-center gap-2" href="javascript:;">
                                                    <P class="mb-0 product-title">{{$sales->product_id}}</P>
                                                </a>
                                            </td>
                                            <td>{{$sales->product_name}}</td>
                                            <td>{{$sales->product_model}}</td>
                                            <td>{{$sales->product_quantity}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card border shadow-none bg-light radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div>
                                    <h5 class="mb-0">Sales Summary</h5>
                                </div>
                                <div class="ms-auto">
                                    <button type="button" class="btn alert-success radius-30 px-4">Confirmed</button>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Total</p>
                                </div>
                                <div class="ms-auto"> 
                                    <h5 class="mb-0">{{$salesData->sales_amount}} Tk</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Pay</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$salesData->pay_amount}} Tk</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Due</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$salesData->due_amount}} Tk</h5>
                                </div>
                            </div>
                            @if($installment != null)
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Total Instalment</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$installment->total_instalment}} M</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Instalment Amount</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$installment->instalment_amount}} Tk</h5>
                                </div>
                            </div>
                            
                            
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Total Instalment Amount</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$installment->total_instalment_amount}} Tk</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <p class="mb-0">Instalment Sale Price</p>
                                </div>
                                <div class="ms-auto">
                                    <h5 class="mb-0">{{$instalmentSalePrice}} Tk</h5>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="card border shadow-none bg-warning radius-10">
                        <div class="card-body">
                            <h5>Payment info</h5>
                            <div class="d-flex align-items-center gap-3">
                                <div class="fs-1">
                                    <i class="bi bi-credit-card-2-back-fill"></i>
                                </div>
                                <div class="">
                                    <p class="mb-0 fs-6">{{$salesData->payment_type}} </p>
                                </div>
                            </div>
                            <p>Transation Id: #{{$transection->id}}</p>
                            <p>Pyment Transation Id: {{$salesData->payment_transaction_id}}  </p>
                        </div>
                    </div>


                </div>
            </div><!--end row-->

        </div>
    </div>
</main>
<!--end page main-->










@endsection