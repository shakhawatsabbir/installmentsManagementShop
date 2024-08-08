@extends('admin.master')
@section('title')
F-Star | Category
@endsection
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
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->


    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Product Category</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            @if(session('massage'))
                            <div class="bg-light-success ">
                                <h6 class="text-success  text-center py-3">
                                    {{session('massage')}}
                                </h6>
                            </div>
                            @endif

                            <form class="row g-3" action="{{route('category.store')}}" method="post">
                                @csrf
                                <div class="col-12 " id="vehicalIdInput">
                                    <label class="form-label fw-bold">Category Name </label>
                                    <input type="text" id="category" class="form-control" name="name">
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <div id="button">
                                            <button type="submit" class="btn btn-primary  form-control">কনফার্ম </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">

                            <div class="flex-shrink-0 mb-2">
                                <div class="text-muted">
                                    Showing
                                    <span class="fw-semibold">
                                        @if($categories->currentPage() != $categories->lastPage())
                                        {{$categories->count()*$categories->currentPage()}}
                                        @else
                                        {{$categories->total()}}
                                        @endif
                                    </span>
                                    of
                                    <span class="fw-semibold">{{$categories->total()}}</span> Category
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>

                                            <td><a href="{{route('customerVehicle',['id'=>$category->id])}}" class="text-primary ">{{$category->id}}</a></td>
                                            <td>{{$category->name}} </td>

                                            <td><span class="badge  {{$category->status == 1 ? 'bg-danger' : 'bg-success '}}">{{$category->status == 1 ? 'Closed' : 'Active'}}</span></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm modelButton" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$category->id}}" id="editModel">Edit</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <nav class="float-end mt-0" aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous ">
                                        <a href="{{$categories->previousPageUrl()}}" class="page-link">Previous</a>
                                    </li>
                                    <li class="paginate_button page-item next">
                                        <a href="{{$categories->nextPageUrl()}}" class="page-link">Next</a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div>

</main>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('category.update.model')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 " id="vehicalIdInput">
                        <label class="form-label fw-bold">Category Name </label>
                        <input type="text" id="categoryModelName" class="form-control" name="name">
                        <input type="hidden" id="categoryModelId" class="form-control" name="id">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary  ">Save changes </button>
                </div>

            </form>
        </div>
    </div>
</div>



<script src="{{asset('adminAsset')}}/assets/js/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#cng_id').keyup(function() {
            var cngId = this.value;
            $.ajax({
                url: "{{url('/json/cng/instalment')}}",
                type: 'post',
                dataType: 'json',
                data: {
                    cng_id: cngId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#notFound').removeClass('d-block');
                    $('#notFound').addClass('d-none');
                    $('#vehicalIdInput').addClass('d-none');


                    $.each(response.cng, function(index, val) {
                        $('#vehicaleDetail').append('<h5 class="border-bottom">গাড়ির তথ্য </h5>')
                        $('#vehicaleDetail').append('<p class="d-flex justify-content-between align-items-center"><strong>গাড়ির আইডি :- </strong> <span class="text_end"> <strong>' + val.vehicle_id + ' </strong></span></p>')

                    });


                },
                error: function(response) {

                    $('#notFound').removeClass('d-none');
                    $('#notFound').addClass('d-block');

                }
            })
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.modelButton').click(function() {
            var categoryId = $(this).data('id');

            $.ajax({
                url: "{{url('/json/product/category')}}",
                type: 'post',
                dataType: 'json',
                data: {
                    cat_id: categoryId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {

                    $('#categoryModelName').val(response.category.name)
                    $('#categoryModelId').val(response.category.id)

                },
                error: function(response) {

                }
            })

        });
    });
</script>

@endsection