@extends('dashbord.master')

@section('title')
    | Product
@endsection

@section('das_title')
    Edit Product
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
    <link href="{{asset('/')}}dashbord/editor.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('/')}}dashbord/editor.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('productUpdate', $singleProduct->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-8">

                                    {{-- <textarea name="bodrrry" id=""></textarea>  --}}
                                    <div class="form-group">
                                        {{--<label for="exampleFormControlTextarea1">Product Details : </label>
                                        <textarea name="details" class="form-control" id="summernote" cols="30"
                                                  rows="10" placeholder="Write Something About This product.."
                                                  required="">
                                          {{ $singleProduct->details }}
                                        </textarea>--}}

                                        <table class="table table-bordered" id="dynamic_field">
                                            @foreach($singleProduct->productDetails as $pd)
                                                <tr>
                                                    <td>
                                                        {{--<input id="product-details-{{ $pd->id }}" type="text" placeholder="Write details"
                                                               class="form-control name_list" value="{{ $pd->details }}">--}}
                                                        <textarea id="product-details-{{ $pd->id }}" placeholder="Write details" class="form-control name_list" cols="30" rows="2">{{ $pd->details }}</textarea>
                                                    </td>
                                                    <td>
                                                        <button onclick="productDetailsEdit({{ $pd->id }})" type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                                                        <button onclick="productDetailsDelete({{ $pd->id }})" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2">
                                                    <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="category_id">Category :</label>
                                                <select class="form-control" name="category_id" id="category_id">
                                                    <option>--Select Category--</option>
                                                    @foreach($allcategory as $v_allcategory)
                                                        <option
                                                            {{$singleProduct->category_id == $v_allcategory->id ? 'selected' : '' }}
                                                            value="{{ $v_allcategory->id }}">
                                                            {{ $v_allcategory->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="subCategory_id">Sub Category :</label>
                                                <select class="form-control" name="subCategory_id" id="subCategory_id">
                                                    <option>--Select SubCategory--</option>
                                                    @foreach($allsubCategory as $v_allthirdCategory)
                                                        <option
                                                            {{$singleProduct->sub_category_id == $v_allthirdCategory->id ? 'selected' : '' }}
                                                            value="{{ $v_allthirdCategory->id }}">
                                                            {{ $v_allthirdCategory->subCategory_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="thirdCategory_id">SubCategory Category :</label>
                                                <select class="form-control" name="thirdCategory_id"
                                                        id="thirdCategory_id">

                                                    @foreach($allthirdCategory as $v_allthirdCategory)
                                                        <option
                                                            {{$singleProduct->thirdCategory_id == $v_allthirdCategory->id ? 'selected' : '' }}
                                                            value="{{ $v_allthirdCategory->id }}">
                                                            {{ $v_allthirdCategory->thirdCategoryName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Name :</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                       aria-describedby="emailHelp"
                                                       value="{{ $singleProduct->product_name }}" name="product_name">

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Price :</label>
                                                <input type="number" name="price" class="form-control"
                                                       id="exampleInputEmail1" aria-describedby="emailHelp"
                                                       value="{{ $singleProduct->price }}">

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">offer Price :</label>
                                                <input type="number" name="offer_price" class="form-control"
                                                       id="exampleInputEmail1" aria-describedby="emailHelp"
                                                       value="{{ $singleProduct->offer_price }}">

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Code :</label>
                                                <input type="text" name="product_code" class="form-control"
                                                       id="exampleInputEmail1" aria-describedby="emailHelp"
                                                       value="{{ $singleProduct->product_code}}">

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Quantity :</label>
                                                <input type="number" name="quantity" class="form-control"
                                                       id="exampleInputEmail1" aria-describedby="emailHelp"
                                                       value="{{ $singleProduct->quantity }}">

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Offer Product :</label>
                                                <input type="number" name="hot_deal" class="form-control"
                                                       id="exampleInputEmail1" aria-describedby="emailHelp"
                                                       value="{{ $singleProduct->hot_deal }}">

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Product Image:</label>
                                                <input type="file" class="form-control" name="image"
                                                       value="{{ $singleProduct->image }}">
                                            </div>

                                            <div class="form-row">
                                                <div class="col-6 mb-3">
                                                    <label for="exampleFormControlFile1">Hot Deal:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <input type="hidden" name="hot_deal" value="0">
                                                            <input type="checkbox" name="hot_deal" value="1" {{ $singleProduct->hot_deal ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="formsd btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
    <script src="{{asset('/')}}dashbord/editor.js"></script>
    <!-- page script -->
    <script>

        $(document).ready(function () {
            $("#txtEditor").Editor();

        });
    </script>
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






    <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>
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
                    url: '/categorySellerTosub',
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
                    url: '/subCategorySellerTothird',
                    data: {subCategory_id: subCategory_id},
                    success: function (data) {
                        // alert(data);
                        $('#thirdCategory_id').html(data);
                    }
                });
            });
        });
    </script>

    <!-- multiple description edit -->
    <script type="text/javascript">
        $(document).ready(function () {
            var postURL = "<?php echo url('productUpdate'); ?>";
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

        function productDetailsEdit(product_details_id) {
            var product_details = $('#product-details-'+product_details_id).val()
            if(product_details.length){
                $.ajax({
                    type: "POST",
                    url: '{{ url('product-details-update') }}/'+product_details_id,
                    data: { _token: '{{ csrf_token() }}', details: product_details },
                    success: function (data) {
                        alert(product_details + " \n" +'is updated successfully');
                    },
                });
            }else{
                alert('Please fill up the details field first');
            }
        }

        function productDetailsDelete(product_details_id) {
            if(confirm('Are you sure want to delete this details')){
                $.ajax({
                    type: "POST",
                    url: '{{ url('product-details-delete') }}/'+product_details_id,
                    data: { _token: '{{ csrf_token() }}' },
                    success: function (data) {
                        location.reload()
                    },
                });
            }
        }
    </script>
@endpush

