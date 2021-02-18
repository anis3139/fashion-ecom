@extends('dashbord.master')

@section('title')
    | Products
@endsection

@section('das_title')
    Add Product
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/editor.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endpush

@section('content')
    <!-- Left side column. contains the logo and sidebar -->

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
    <div class="container" id="order_list">
        <form action="{{ url('productSave') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Product Details :</label>
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td>
                                            <textarea placeholder="Write details" name="details[]" class="form-control name_list" cols="30" rows="2" required></textarea>
                                        </td>
                                        <td>
                                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="category_id">Category:</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option>--Select category--</option>
                                    @foreach($allcategory as $v_allcategory)
                                        <option value="{{ $v_allcategory->id }}">{{ $v_allcategory->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subCategory_id">Sub category:</label>
                                <select class="form-control" name="subCategory_id" id="subCategory_id">
                                    <option value="">--Select sub category--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="thirdCategory_id">Third category:</label>
                                <select class="form-control" name="thirdCategory_id" id="thirdCategory_id">
                                    <option value="">--Select third category--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product name:</label>
                                <input type="text" class="form-control" placeholder="Product name" name="product_name" value="{{ old('product_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product price:</label>
                                <input type="text" name="price" class="form-control" placeholder="Product price" value="{{ old('price') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Offer price:</label>
                                <input type="text" name="offer_price" class="form-control" placeholder="Offer price" value="{{ old('offer_price') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product code:</label>
                                <input type="text" name="product_code" class="form-control" placeholder="Product code" value="{{ old('product_code') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product quantity:</label>
                                <input type="text" name="quantity" class="form-control" placeholder="Product quantity" value="{{ old('quantity') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Product image:</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Product Image Gallery:[<span
                                        class="badge badge-primary">Multiple Image</span>]</label>
                                <input type="file" class="form-control" name="gallery[]" multiple="" required>
                            </div>

                            <div class="form-row">
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlFile1">Hot Deal:</label>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="hot_deal" value="1" aria-label="Checkbox for following text input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlFile1">Promoted Product:</label>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="status" value="1"
                                                   aria-label="Checkbox for following text input">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="formsd btn btn-sm btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script>
        $(function () {
            $('#myTab li:last-child a').tab('show')
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                placeholder: 'Details..',
                tabsize: 2,
                height: 200
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#category_id').change(function () {
                var category_id = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/categoryTosub',
                    data: {category_id: category_id},
                    success: function (data) {
                        $('#subCategory_id').html(data);
                    }
                });
            });
        });

        $(document).ready(function () {
            $('#subCategory_id').change(function () {
                var subCategory_id = $(this).val();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/subCategoryTothird',
                    data: {subCategory_id: subCategory_id},
                    success: function (data) {
                        // alert(data);
                        $('#thirdCategory_id').html(data);
                    }
                });
            });
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
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax(
                            {
                                url: "/thirdCategoryDelete/" + id,
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

    <!-- multiple description add -->
    <script type="text/javascript">
        $(document).ready(function () {
            var postURL = "<?php echo url('productSave'); ?>";
            var i = 1;


            $('#add').click(function () {
                i++;
                $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><textarea name="details[]" placeholder="Write details" class="form-control name_list" cols="30" rows="2"></textarea></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });


            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#submit').click(function () {
                $.ajax({
                    url: postURL,
                    method: "POST",
                    data: $('#add_name').serialize(),
                    type: 'json',
                    success: function (data) {
                        if (data.error) {
                            printErrorMsg(data.error);
                        } else {
                            i = 1;
                            $('.dynamic-added').remove();
                            $('#add_name')[0].reset();
                            $(".print-success-msg").find("ul").html('');
                            $(".print-success-msg").css('display', 'block');
                            $(".print-error-msg").css('display', 'none');
                            $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                        }
                    }
                });
            });


            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $(".print-success-msg").css('display', 'none');
                $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    </script>
@endpush

