@extends('admin.master')
@section('title')
F-Star | Sale
@endsection
@section('content')

<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Sales</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Progress One</li>
                    <li class="breadcrumb-item active" aria-current="page">Select Product</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 col-lg-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Select Product</h5>
                </div>
                <div class="card-body">
                    <div class="card  shadow-none bg-light border">

                        <div class="card-body ">
                        @if(session('massage'))
                        <div class="bg-light-danger ">
                            <h6 class="text-danger  text-center py-3">
                                {{session('massage')}}
                            </h6>
                        </div>
                        @endif
                            <form action="{{route('cartAdd')}}" class="row g-3" method="post">
                                @csrf
                                <input type="hidden" id="cartCount" value="{{$carts->count()}}">
                                <div class="col-lg-6 col-md-6 me-auto">
                                    <div class="ms-auto position-relative">
                                        <div class="position-absolute top-50 translate-middle-y px-3"><i class="bi bi-search"></i></div>
                                        <input type="text" id="product_id" name="product_id" class="form-control ps-5" value="CAPIPSC-">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 me-auto">
                                    <div class="ms-auto position-relative">
                                        <div class="position-absolute top-50 translate-middle-y search-icon px-2">Qty : </div>
                                        <input class="form-control ps-5" type="number" placeholder="Quantity" name="quantity" id="productQuantity">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" id="productName" name="product_name" class="form-control" readonly>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Model</label>
                                    <input type="text" id="productModel" name="product_model" class="form-control" readonly>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Buy Price </label>
                                    <input type="number" id="productPrice" name="product_price" class="form-control" readonly>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Available Qty (Psc) </label>
                                    <input type="number" id="productAvlQty" name="product_avlQty" class="form-control" readonly>
                                </div>
                                <div class="col-lg-12 col-12 col-md-12">
                                    <p class="text-danger d-none" id="qtyNotAvl">Your require quantity not Available or Blank</p>
                                    <button type="submit" class="btn btn-outline-primary  radius-30 form-control d-none disabled" id="submitButton"> Add</button>
                                </div>
                            </form>
                            <div class="table-responsive mt-3">
                                <table class="table align-middle table-striped">
                                    <tbody>
                                        @foreach($carts as $row)
                                        <tr>

                                            <td class="productlist">
                                                <div>
                                                    <p class="mb-0 product-title"> ID </p>
                                                    <p class="mb-0 product-title"><strong> {{ $row->id}} </strong> </p>
                                                </div>
                                            </td>

                                            <td class="productlist">
                                                <div>
                                                    <p class="mb-0 product-title"> Name </p>
                                                    <p class="mb-0 product-title"><strong> {{ $row->name}} </strong> </p>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <p class="mb-0 product-title">Buy Price </p>
                                                    <p class="mb-0 product-title"> <strong> {{ $row->price}}Tk </strong> </p>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <p class="mb-0 product-title">Qty </p>
                                                    <p class="mb-0 product-title"> <strong> {{ $row->qty}} Psc </strong> </p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3 fs-6">
                                                    <a href="{{route('cartProductDelet',['id'=>$row->rowId])}}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="nextBtn" class="d-none">
                                <a href="{{route('makeSaleCustomer')}}" class="btn btn-outline-secondary px-5 rounded-0 float-end mt-5">Next</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div><!--end row-->

</main>
<!--end page main-->








<!--start content-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        const cartCount = document.getElementById('cartCount').value;
        if (cartCount == 0) {
            $('#nextBtn').removeClass('d-block');
            $('#nextBtn').addClass('d-none');
        } else {
            $('#nextBtn').removeClass('d-none');
            $('#nextBtn').addClass('d-block');
        }
        

        $('#productQuantity').keyup(function() {
            
            const userQuantity = parseInt(document.getElementById('productQuantity').value, 10);
            const avaliableQuantity = parseInt(document.getElementById('productAvlQty').value, 10);
            if (avaliableQuantity > userQuantity || avaliableQuantity == userQuantity) {
                $('#submitButton').removeClass('disabled');
                $('#qtyNotAvl').addClass('d-none');
                $('#qtyNotAvl').removeClass('d-block');
            } else {
                $('#submitButton').addClass('disabled');
                $('#qtyNotAvl').removeClass('d-none');
                $('#qtyNotAvl').addClass('d-block');
            }
        })

        $('#product_id').keyup(function() {
            var productId = this.value;
            $.ajax({
                url: "{{url('/json/product/search')}}",
                type: 'post',
                dataType: 'json',
                data: {
                    product_id: productId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $.each(response.product, function(index, val) {

                        if (val.qty == 0) {
                            $('#submitButton').removeClass('d-block');
                            $('#submitButton').addClass('d-none');
                        } else {
                            $('#submitButton').removeClass('d-none');
                            $('#submitButton').addClass('d-block');
                        }
                        $('#productName').val(val.name)
                        $('#productModel').val(val.model)
                        $('#productPrice').val(val.buy_price)
                        $('#productAvlQty').val(val.qty)
                        var productQty = val.qty;
                    });
                }
            })
        });
    });
</script>



@endsection