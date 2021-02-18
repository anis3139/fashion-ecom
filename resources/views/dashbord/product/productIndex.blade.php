@extends('dashbord.master')

@section('title')
    | Products
@endsection

@section('das_title')
    All Products
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/editor.css">
    <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
@endpush

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Offer Price</th>
                        <th>Code</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allproduct as $key=> $v_allproduct)
                        <tr class="{{ ( $v_allproduct->quantity <= 3)?"bg-secondary":"" }}">
                            <td scope="row">{{ $key+1 }}</td>
                            <td scope="row">{{ $v_allproduct->product_name }}</td>
                            <td scope="row">৳{{ $v_allproduct->price }}</td>
                            <td scope="row">৳{{ $v_allproduct->offer_price }}</td>
                            <td scope="row">{{ $v_allproduct->product_code }}</td>
                            <td>
                                <img src="{{ asset('upload/product') }}/{{ $v_allproduct->image }}" alt="" width="64px">
                            </td>

                            @php
                                $productQuantity = $v_allproduct->quantity;
                                $ami = 1;
                            @endphp

                            <td>
                                {{$v_allproduct->quantity}}
                            </td>

                            <td>
                                <a href="{{ url('productAttr') }}/{{ $v_allproduct->id }}" class="btn btn-sm btn-info text-white" title="Add product size">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>

                                <a href="{{ route('edit.multiple.image', $v_allproduct->id) }}" class="btn btn-sm btn-success" title="Change images" target="_blank">
                                    <i class="fa fa-image"></i>
                                </a>

                                {{--<a href="{{ url('promoteProduct') }}/{{ $v_allproduct->id }}" class="btn btn-info"><i
                                        class="fa fa-thumbs-up" aria-hidden="true"></i></a>

                                <a href="{{ url('depromoteProduct') }}/{{ $v_allproduct->id }}" class="btn btn-info"><i
                                        class="fa fa-thumbs-down" aria-hidden="true"></i></a>--}}

                                <a href="{{ url('productEdit') }}/{{ $v_allproduct->id }}" class="btn btn-sm btn-primary" title="Edit product">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>

                                @if(Auth::user()->roll_id == 1)
                                    <button data-id="{{ $v_allproduct->id }}" class="itemDelete btn btn-sm btn-danger text-white" title="Delete product">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                @else
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('/')}}dashbord/jquery.dataTables.js"></script>
    <script src="{{asset('/')}}dashbord/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/')}}dashbord/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/')}}dashbord/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#txtEditor").Editor();
        });
    </script>
    <script src="{{asset('/')}}dashbord/editor.js"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>

    <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>
    <script>
        $(document).ready(function () {

            $(document).on('click', '.itemDelete', function () {
                // $(".itemDelete").click(function(){
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to be Deleted this product!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax(
                            {
                                url: "/productDelete/" + id,
                                type: 'GET',
                                data: {
                                    "id": id,
                                    "_token": token,
                                },
                                success: function (response) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                    $('.table').load(location.href + ' .table');
                                    // location.reload();

                                },
                                error: function (response) {
                                    Swal.fire(
                                        'oops..!',
                                        'Something want wrong !.',
                                        'info'
                                    )
                                }
                            });
                    }
                });
            });
        });
    </script>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush

