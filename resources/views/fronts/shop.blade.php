@extends('fronts.master')

@section('title')
    {{ isset($title) ? $title : config('app.name') }}
@endsection

@section('content')
    <!-- banner -->
    <div class="inner_page-banner one-img">
    </div>
    <!--//banner -->

    <!-- //short-->
    <!--show Now-->
    <section class="contact py-lg-4 py-md-3 py-sm-3 py-3" id="products">
        <div class="container py-lg-5 py-md-4 py-sm-4 py-3" id="product_cart">
            <h4 class="bg-warning">{{ isset($category) ? $category->category_name : 'All Products' }}</h4>
            @if(isset($all_category_panel))
                <div class="card rounded-0">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2" style="border-right: 1px solid darkgray">
                                    <ul class="list-inline">
                                        <li class="list-inline-item text-primary text-bold">সাব ক্যাটাগরি</li>
                                    </ul>
                                </div>
                                <div class="col-md-10">
                                     <ul class="list-inline">
                                        @foreach($all_category_panel as $row)
                                            <li class="list-inline-item"><a
                                                    href="{{ url('/category') }}/{{ $row->category->slug }}/{{ $row->slug }}"
                                                    class="text-dark text-decoration-none">{{ $row->subCategory_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif(isset($all_sub_category_panel))
                <div class="card rounded-0">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2" style="border-right: 1px solid darkgray">
                                    <ul class="list-inline">
                                        <li class="list-inline-item text-danger">সাব ক্যাটাগরি</li>
                                    </ul>
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline">
                                        @foreach($all_sub_category_panel as $row)
                                            <li class="list-inline-item px
                                            -3"><a
                                                    href="{{ url('/category') }}/{{ $row->category->slug }}/{{ $row->subCategory->slug }}/{{ $row->slug }}"
                                                    class="text-dark text-decoration-none">{{ $row->thirdCategoryName }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            @endif
            <h5 class="text-dark py-3">
                {{ isset($category) ? $category->category_name : 'All Product' }} <small style="font-size: small">- <span class="text-danger">{{ count($count_product) }}</span> টি পণ্য পাওয়া গেছে</small>
                <!-- dropdown filter -->
                <div class="btn-group mr-4 float-right">
                    <button class="btn btn-outline-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter now</button>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" href="{{ Request::url() }}/?filter=নতুন">নতুন</a>
                        <a class="dropdown-item" href="{{ Request::url() }}/?filter=জনপ্রিয়">জনপ্রিয়</a>
                        <a class="dropdown-item" href="{{ Request::url() }}/?filter=দাম-সবচেয়ে-কম-থেকে-বেশী">দাম : সবচেয়ে কম থেকে বেশী</a>
                        <a class="dropdown-item" href="{{ Request::url() }}/?filter=দাম-সবচেয়ে-বেশী-থেকে-কম">দাম : সবচেয়ে বেশী থেকে কম</a>
                    </div>
                </div>
            </h5>

            <div class="row">
                <div class="left-ads-display col-lg-12" id="product_id">
                    <div class="row">
                        @foreach($allProduct->take(30) as $v_allProduct)
                            @if($v_allProduct->status == 1)
                                <div class="card col-xs-2 " title="{{$v_allProduct->product_name}}">
                                    <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect"
                                         style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">
                                        <a href="{{ url('prductView') }}/{{ $v_allProduct->slug }}"
                                           style="display: block;padding: 0px;height: 160px;overflow: hidden;"
                                           class="img-hover col-sm-12 padding-zero" href="#" id="209">
                                            <img class="img-responsive zoomEffect"
                                                 style="margin: 0 auto;padding:5px;width: 178px;"
                                                 src="{{ asset('upload/product') }}/{{ $v_allProduct->image  }}">
                                        </a>

                                        <div class="col-sm-12 col-xs-12" style="padding:0;background: cornsilk;">
                                            <a href="{{ url('prductView') }}/{{ $v_allProduct->slug }}">
                                               <span id="productName209" class="col-sm-12 text-center"
                                                     style="padding: 2px;overflow: hidden;height: 20px;font-size: 12px;display: block;color:#525252;font-weight: bold;">
                                                    {{ str_limit( $v_allProduct->product_name, 20) }}
                                               </span>
                                            </a>

                                            <span id="productPrice209" class="col-sm-12  col-xs-12 text-center" style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold">
                                                @if($v_allProduct->offer_price)
                                                    ৳{{ $v_allProduct->offer_price }}<del style="color:red"> ৳{{ $v_allProduct->price }}</del>
                                                @else
                                                    ৳{{ $v_allProduct->price }}
                                                @endif
                                            </span>
                                            @if($v_allProduct->quantity > 0)
                                                <span class="col-sm-6  col-xs-6 text-center">
                                                  @if(Auth::check())
                                                        <a class="text-decoration-none" href="{{ url('order-now') }}/{{ $v_allProduct->id }}" style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                                          Order Now
                                                       </a>
                                                    @else
                                                        <a class="text-decoration-none" data-toggle="modal" data-target="#orderNowSingleProductModal-{{ $v_allProduct->id }}" href="" style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                                            Order Now
                                                        </a>
                                                    @endif
                                                 </span>

                                                <!-- Order now single product modal -->
                                                @include('fronts.order_now_single_product_modal',[
                                                        'action' => url('/quickOrderSave'),
                                                        'id' => $v_allProduct->id,
                                                        'offer_price' => $v_allProduct->offer_price,
                                                        'price' => $v_allProduct->price,
                                                     ])

                                                <input type="hidden" value="select" id="productAttrValue">
                                                <span onclick="ProductAddTwoCart(209)" data-id="{{ $v_allProduct->id }}"
                                                      class="itemDelete product-fly  col-sm-6  col-xs-6 text-center">
                                                   Add To Cart
                                                </span>
                                            @else
                                                <span class=" product-fly  col-sm-6  col-xs-2 text-center">Stock Out</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //show Now-->


    <!-- Page Praganation-->
    <div class="container" id="praganation">
        <div class="row">
            {{ $allProduct->links() }}
        </div>
    </div>
    <!-- Page Praganation end-->


    <!--  Description start-->
    @if(isset($description_title))
        <div class="container" id="cat_descript">
            <h4 class="text-center bold" style="font-size: 36px;">{{ isset($description_title) ? $description_title : '' }}</h4>
            <p class="text-justify" style="font-size: 16px;
            line-height: 29px;">{{ isset($description) ? $description : '' }}</p>
        </div>
    @endif
    <!--   Description end-->



    @push('js')
        <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>
        <script>
            $(document).ready(function () {
                // $('#addForm').on('submit', function(e){
                //       e.preventDefault();
                $(document).on('click', '.itemDelete', function (e) {
                    e.preventDefault();

                    var id = $(this).data("id");
                    var productAttrValue = $("#productAttrValue").val();
                    var token = $("meta[name='csrf-token']").attr("content");

                    // alert(productAttrValue);
                    $.ajax({
                        type: "GET",
                        url: "/cartSave" + "/" + id + "/" + productAttrValue,
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function (response) {
                            location.reload();
                        },
                        error: function (error) {
                            console.log(error);
                            alert("not Add Cart Successfully !")
                        }
                    });
                });
            });
        </script>
    @endpush

@endsection
