@extends('admin.master')
@section('title')
    F-Star | Product Details
@endsection
@section('content')
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a> </li>
                    <li class="breadcrumb-item active" aria-current="page"> Product</li>
                    <li class="breadcrumb-item active" aria-current="page"> {{$product->product_id}}</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="card">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center">
                    <h5 class="mb-2 mb-sm-0">Product Details</h5>
                    <div class="ms-auto">
                        <a href="{{route('productEdit',['id'=>$product->product_id])}}" class="btn btn-sm btn-outline-primary px-4">Edit</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body text-center">
                                <img src="{{asset('adminAsset')}}/assets/images/products/01.png" class="img-fluid mb-3" alt="" />
                                <h6 class="product-title">{{$product->name}}</h6>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Product Id<span class="fw-bold"> {{$product->product_id}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Name <span class="fw-bold"> {{$product->name}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Delar Name<span class="fw-bold"> {{$product->delar_name}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Category <span class="fw-bold"> {{$product->category->name}} </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Model<span class="fw-bold"> {{$product->model}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Quantity <span class="fw-bold"> {{$product->qty}} </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Buy Price<span class="fw-bold"> {{$product->buy_price}} Tk</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Status<span class="fw-bold"><span class="badge  {{$product->status == 1 ? 'bg-danger' : 'bg-success '}}">{{$product->status == 1 ? 'Closed' : 'Active'}}</span> </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Detail One<span class="fw-bold"> {{$product->detail_one}} </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Detail Two<span class="fw-bold"> {{$product->detail_two}} </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Detail Three<span class="fw-bold"> {{$product->detail_three}} </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Detail Four<span class="fw-bold"> {{$product->detail_four}} </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </div>
</main>
@endsection