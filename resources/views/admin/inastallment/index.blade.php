@extends('admin.master')
@section('title')
    F-Star | Instalment Pay
@endsection
@section('content')
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Installment</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">কিস্তি জমা </li>
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
                            <h6 class="mb-0 text-uppercase">কিস্তি জামা</h6>
                            <hr/>
                            <form class="row g-3" action="{{route('makeInstallmentSave')}}" method="post">
                                @csrf
                                <div class="col-12 " id="vehicalIdInput">
                                    <label class="form-label fw-bold">ইন্সটলমেন্ট আইডি </label>
                                    <input type="text" id="installment_customer_id" class="form-control" value="CAPIPSCICI-">
                                </div>
                                <div class="col-12 col-xl-6 d-none " id="instalmentAmountDiv">
                                    <label class="form-label fw-bold">কিস্তির পরিমান (টাকা) </label>
                                    <input type="number" name="amount" class="form-control" required>
                                    <div id="cngId"></div>
                                    <div id="customerId"></div>
                                </div>
                                <div class="col-12  col-xl-6  d-none" id="processDiv">
                                    <label class="form-label fw-bold">মাধ্যম </label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="flexSwitchCheckDefault" name="method" value="Cash" required>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Cash</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="flexSwitchCheckDefault" name="method"  value="Bkash" required>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Bkash</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="flexSwitchCheckDefault" name="method"  value="Nagad" required>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Nagad</label>
                                    </div>
                                    <div class="form-check form-check-inline  d-none">
                                        <input class="form-check-input" type="radio" id="flexSwitchCheckDefault" name="method"  value="Bank" required>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Bank</label>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div  id="notFound" class="mt-3 text-center text-danger d-none" > কোন ইন্সটলমেন্টের তথ্য পাওয়া যায়নি</div> 
                                </div>
                                <div class="col-12 " id="installmentDetail">
                                    <div  id="cngTitle" class="mt-3"></div>
                                    <div  id="cngidV"></div>
                                    <div  id="cngInsAmount"></div>
                                    <div  id="cngPayIns"></div>
                                    <div  id="cngPayTotal"></div>
                                    <div  id="cngDueAmount" class="mb-3"></div>
                                </div>
                                
                                <div class="col-12 " id="buyerDetail">
                                    <div  id="cTitle" class="mt-3"></div>
                                    <div  id="cName"></div>
                                    <div  id="cMobile"></div>
                                    <div  id="cPostOffice"></div>
                                    <div  id="cUpazila"></div>
                                    <div  id="cZila" class="mb-3"></div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <div id="button"></div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#installment_customer_id').keyup(function(){
                var installmentCustomerId = this.value ;
                $.ajax({
                    url: "{{url('/json/instalment/search')}}",
                    type: 'post',
                    dataType: 'json',
                    data: { installmentCustomerId: installmentCustomerId,_token:"{{ csrf_token() }}"},
                    success:function(response){
                        console.log(response)
                            $('#notFound').removeClass('d-block');
                            $('#instalmentAmountDiv').removeClass('d-none');
                            $('#instalmentAmountDiv').addClass('d-block');
                            $('#processDiv').removeClass('d-none');
                            $('#processDiv').addClass('d-block');
                            $('#notFound').addClass('d-none');
                            $('#vehicalIdInput').addClass('d-none');


                            $.each(response.installment,function(index, val){
                                $('#installmentDetail').append('<h5 class="border-bottom">ইন্সটলমেন্ট তথ্য </h5>')
                                $('#installmentDetail').append('<p class="d-flex justify-content-between align-items-center"><strong>কিস্তি কাস্টমার আইডি :- </strong> <span class="text_end"> <strong>'+val.installment_customer_id+' </strong></span></p>' )
                                $('#installmentDetail').append('<input type="hidden" class="form-control" name="installment_customer_id" value="'+val.installment_customer_id+'"> ')
                                $('#installmentDetail').append('<p class="d-flex justify-content-between align-items-center"><strong>কিস্তির পরিমান :- </strong> <span class="text_end"> <strong>'+val.instalment_amount+' টাকা</strong></span></p>' )
                                $('#installmentDetail').append('<p class="d-flex justify-content-between align-items-center"><strong>জমা কিস্তি :- </strong> <span class="text_end"> <strong>'+val.pay_instalment+'টি </strong></span></p>' )
                                $('#installmentDetail').append('<p class="d-flex justify-content-between align-items-center"><strong>জমা টাকা :- </strong> <span class="text_end"> <strong>'+val.total_instalment_deposit_amount+' টাকা</strong></span></p>' )
                                $('#installmentDetail').append('<p class="d-flex justify-content-between align-items-center"><strong> বকেয়া টাকা :- </strong> <span class="text_end"> <strong>'+val.due_instalment_amount+' টাকা</strong></span></p>' )

                            });
                         
                            $.each(response.customer,function(index, val){

                                $('#cTitle').append('<h5 class="border-bottom">ক্রেতার তথ্য </h5>')
                                $('#customerId').append('<input type="hidden" class="form-control" name="customer_id" value="'+val.id+'"> ')
                                $('#cName').append('<p class="d-flex justify-content-between align-items-center"><strong>ক্রেতার নাম :- </strong> <span class="text_end"> <strong>'+val.name+' </strong></span></p>' )
                                $('#cMobile').append('<p class="d-flex justify-content-between align-items-center"><strong>মোবাইল নাম্বার :- </strong> <span class="text_end"> <strong>'+val.mobile+' </strong></span></p>' )
                                $('#button').append('<button type="submit" class="btn btn-primary  form-control">কনফার্ম </button>' )

                            });
                        
                    },
                    error: function(response){
                      
                        $('#notFound').removeClass('d-none');
                        $('#notFound').addClass('d-block');
                            
                    }
                })
            });
        });
    </script>
@endsection
