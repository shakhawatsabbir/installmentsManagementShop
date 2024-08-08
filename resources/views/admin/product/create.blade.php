@extends('admin.master')
@section('title')
F-Star | Product
@endsection
@push('ckeditor5')
    <script type="text/javascript" src="{{ URL::asset('adminAsset/assets/libs/ckeditor.js') }}"></script>
@endpush
@section('content')
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
           
               
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">New Product Add</h5>
                        <div class="ms-auto">
                            <a href="{{route('category.index')}}" class="btn btn-outline-secondary">Category Add</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @if(session('massage'))
                        <div class="bg-light-success ">
                            <h6 class="text-success  text-center py-3">
                                {{session('massage')}}
                            </h6>
                        </div>
                        @endif
                        <form class="row g-3" action="{{route('product.store')}}" method="post">
                            @csrf
                            <div class="col-12 col-lg-8">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Product Title</label>
                                                <input type="text" class="form-control" name="name" placeholder="Product Title">
                                            </div>
                                            <div class="col-12 ">
                                                <label class="form-label">Category</label>
                                                <select class="form-select" name="category">
                                                        <option selected>Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Details One</label>
                                                <input class="form-control" type="text" name="detail_one">
                                                <!-- <textarea  class=" form-control ckeditor-classic" name="long_description" rows="5"></textarea> -->
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Details Two</label>
                                                <input class="form-control" type="text" name="detail_two">
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Details Three</label>
                                                <input class="form-control" type="text" name="detail_three">
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Details Four</label>
                                                <input class="form-control" type="text" name="detail_four">
                                            </div>
                                          
                                            <div class="col-12">
                                                <label class="form-label">Images</label>
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            
                                        <div class="col-12 ">
                                                <label class="form-label">Buying Price</label>
                                                <input type="number" class="form-control" name="buy_price" placeholder="Buying Price">
                                            </div>
                                        <div class="col-12 ">
                                                <label class="form-label">Delar Name</label>
                                                <input type="text" class="form-control" name="delar_name" placeholder="Delar Name">
                                            </div>
                                            <div class="col-12 ">
                                                <label class="form-label">Model</label>
                                                <input type="text" class="form-control" name="model" placeholder="Model">
                                            </div>
                                            <div class="col-12 ">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" class="form-control" name="quantity" placeholder="Quantity">
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary form-control mt-4">Save</button>
                                            </div>

                                        </div><!--end row-->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--end row-->
                </div>
            </div>
        </div>
    </div><!--end row-->
</main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#cash_pay').keyup(function() {
            var cashPay = this.value;
            var salesAmount = document.getElementById('sales_amount').value;
            var dueAmount = salesAmount - cashPay;

            $('#due_amount').val(dueAmount)
            var totalInstalment = parseInt(document.getElementById('total_instalment').value, 10);
            var parsent = parseInt(document.getElementById('parsent').value, 10);
            var parsentInstalment = dueAmount / 100 * parsent / 12;
            var totalparsentInstalment = parsentInstalment * totalInstalment;
            var totalInstalmentAmount = Math.ceil(dueAmount + totalparsentInstalment);

            var instalmentAmount = Math.ceil(totalInstalmentAmount / totalInstalment);
            $('#total_instalment_amount').val(totalInstalmentAmount)
            $('#instalment_amount').val(instalmentAmount)
        });
        $('#total_instalment').keyup(function() {
            var totalInstalment = this.value;
            var dueAmount = parseInt(document.getElementById('due_amount').value, 10);
            var parsent = parseInt(document.getElementById('parsent').value, 10);
            var parsentInstalment = dueAmount / 100 * parsent / 12;
            var totalparsentInstalment = parsentInstalment * totalInstalment;
            var totalInstalmentAmount = Math.ceil(dueAmount + totalparsentInstalment);

            var instalmentAmount = Math.ceil(totalInstalmentAmount / totalInstalment);
            $('#total_instalment_amount').val(totalInstalmentAmount)
            $('#instalment_amount').val(instalmentAmount)
        });
    });
</script>
@endsection