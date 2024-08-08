@extends('admin.master')
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
                        <li class="breadcrumb-item active" aria-current="page"> পার্টনার তৈরি</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            @if(session('massage'))
                                <div class="bg-light-success " >
                                    <h6 class="text-success  text-center py-3">
                                        {{session('massage')}}
                                    </h6>
                                </div>
                            @endif

                            <h6 class="mb-0 text-uppercase mt-2">রেজিস্ট্রেশন ফরম</h6>
                            <hr/>
                            <form class="row g-3" action="{{route('partnerCreate')}}" method="post">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">নাম</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">মোবাইল</label>
                                    <input type="number" name="mobile" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">গ্রাম</label>
                                    <input type="text" name="village" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">পোস্ট অফিস</label>
                                    <input type="text" name="pOffice" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">উপজেলা</label>
                                    <input type="text" name="upazila" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">জেলা</label>
                                    <input type="text" name="zila" class="form-control">
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">রেজিস্ট্রেশন</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->


        <!--end row-->
    </main>
@endsection
