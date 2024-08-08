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
                    <li class="breadcrumb-item active" aria-current="page">Progress Two</li>
                    <li class="breadcrumb-item active" aria-current="page">Complete Details</li>
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
                        <h5 class="mb-2 mb-sm-0">Complete Details</h5>
                        <div class="ms-auto">
                            <a href="{{route('makeSale')}}" class="btn btn-outline-secondary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @if(session('massage'))
                    <div class="bg-light-success ">
                        <h6 class="text-success  text-center py-3">
                            {{session('massage')}}
                        </h6>
                    </div>
                    @endif
                    <form class="" action="{{route('addSales')}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-lg-8">
                                <div class="col-12 ">
                                    <div class="card shadow-none bg-light border">
                                        <div class="card-body row g-3">
                                            <div class="col-12">
                                                <label class="form-label">ক্রেতার নাম</label>
                                                <input type="text" class="form-control" name="name" placeholder="ক্রেতার নাম">
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <label class="form-label">মোবাইল</label>
                                                <input type="number" class="form-control" name="mobile" placeholder="মোবাইল">
                                            </div>
                                            <div class="col-12  col-md-6 col-lg-6">
                                                <label class="form-label">এনআইডি</label>
                                                <input type="number" class="form-control" name="nid" placeholder="এনআইডি">
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <label class="form-label">গ্রাম</label>
                                                <input type="text" class="form-control" name="village" placeholder="গ্রাম">
                                            </div>

                                            <div class="col-12 col-md-3 col-lg-3">
                                                <label class="form-label">পোস্ট অফিস</label>
                                                <input class="form-control" type="text" name="pOffice" placeholder="পোস্ট অফিস">
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <label class="form-label">উপজেলা</label>
                                                <input type="text" class="form-control" name="upazila" placeholder="উপজেলা">
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <label class="form-label">জেলা</label>
                                                <input type="text" class="form-control" name="zila" placeholder="জেলা">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card shadow-none bg-light border">
                                        <div class="card-body">
                                            <div class="table-responsive my-2">
                                                <table class="table align-middle table-striped">
                                                    <thead>
                                                        <h5>Selected Product</h5>
                                                    </thead>
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
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12 col-md-4 col-lg-4">
                                                <label class="form-label">বিক্রয় টাকা </label>
                                                <input type="number" id="sales_amount" name="sales_amount" class="form-control">
                                            </div>
                                            <div class="col-12 col-md-4 col-lg-4">
                                                <label class="form-label">নগত প্রদান</label>
                                                <input type="number" id="cash_pay" name="pay_amount" class="form-control">
                                            </div>


                                            <div class="col-12 col-md-4 col-lg-4">
                                                <label class="form-label">বকেয়া টাকা</label>
                                                <input type="number" id="due_amount" name="due_amount" class="form-control" readonly>
                                            </div>


                                            <div class="col-12 col-md-6 col-lg-12">
                                                <label class="form-label">পেমেন্ট সিস্টেম</label>
                                                <select class="form-select mb-3" name="payment_type" id="payment_type">
                                                    <option value="Cash">Cash</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Nagad">Nagad</option>
                                                    <option value="Bank">Bank</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <label class="form-label">Transation_id</label>
                                                <input type="number" id="payment_transaction" name="payment_transaction_id" class="form-control" value="Transation Id">
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <label class="form-label">পার্সেন্ট (%) </label>
                                                <input type="number" id="parsent" name="parsent" class="form-control" value="25">
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-4">
                                                <label class="form-label">কিস্তি</label>
                                                <input type="number" name="total_instalment" id="total_instalment" class="form-control">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">কিস্তির পরিমান(টাকা)</label>
                                                <input type="number" name="instalment_amount" id="instalment_amount" class="form-control" readonly>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">সর্বমোট কিস্তির পরিমান</label>
                                                <input type="number" name="total_instalment_amount" id="total_instalment_amount" class="form-control" readonly>
                                            </div>
                                            <div class="col-12 ">
                                                <label class="form-label"> কিস্তি জমার তারিখ </label>
                                                <input type="date" name="instalment_deposited_date" class="form-control">
                                            </div>


                                            <div class="col-12 col-md-12">
                                                <label class="form-label">Sold By</label>
                                                <input type="text" name="reff_name" class="form-control">
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">কনফার্ম</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end row-->
                            </div>
                        </div>
                    </form>
                </div>

            </div><!--end row-->
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

<script type="text/javascript">
    $(document).ready(function() {
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

                        $('#productName').val(val.name)
                        $('#productModel').val(val.model)
                        $('#productPrice').val(val.buy_price)
                        $('#productAvlQty').val(val.qty + ' Psc')
                    });
                }
            })
        });
    });
</script>



@endsection