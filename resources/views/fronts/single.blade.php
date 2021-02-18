@extends('fronts.master')

@section('content')

    @push('css')

    @endpush

    <!-- product page header -->
    <div class="container" id="product_dec">
        <div class="row">
            <h6 class=" col-md-12 py-2 text-dark">
                <a href="{{ url('/') }}" class="text-decoration-none text-dark">Home</a>
                > <a href="{{ route('under.sub.cat', $singleProduct->category->slug) }}"
                     class="text-decoration-none text-dark">{{ $singleProduct->category->category_name }}</a>
                @if($singleProduct->subCategory->subCategory_name)
                    <a href="{{ route('second.category', [$singleProduct->category->slug, $singleProduct->subCategory->slug]) }}"
                       class="text-decoration-none text-dark">> {{ $singleProduct->subCategory->subCategory_name }}</a>
                @else
                @endif

                @if($singleProduct->thirdCategory->thirdCategoryName)
                    <a href="{{ route('third.category', [$singleProduct->category->slug, $singleProduct->subCategory->slug, $singleProduct->thirdCategory->slug]) }}"
                       class="text-decoration-none text-dark">> {{ $singleProduct->thirdCategory->thirdCategoryName }}</a>
                @else
                @endif
                > {{ $singleProduct->product_name }}
            </h6>
        </div>
    </div>

    <div class="container" id="order_Now">
        <div class="row">
            <div class="col-md-6 top-in-single">
                <div class=" single-top">
                    <ul id="etalage">
                        @if(isset($images))
                            @foreach($images as $img)
                                <li>
                                    <a href="optionallink.html">
                                        <img class="etalage_source_image img-responsive"
                                             src="{{ asset('upload/ami') }}/{{ $img }}"
                                             xoriginal="./images/three-pcs/threepic.jpg" alt="">
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>

                </div>
            </div>
            <div class="col-md-6 " id="product_View">
                <div class="single-para">
                    <h4>{{ $singleProduct->product_name }} </h4>
                    <div class="row">
                        <div class="col-md-7">
                            <p>Product Code: {{ $singleProduct->product_code }} </p>
                            <label class="add-to pt-4">
                                <span class="text-muted">Price: </span>
                                @if($singleProduct->offer_price)
                                    ৳{{ $singleProduct->offer_price }}
                                    <del style="color:black"> ৳{{ $singleProduct->price }}</del>
                                @else
                                    ৳{{ $singleProduct->price }}
                                @endif
                            </label>

                        </div>
                        <div class="col-md-5">
                            <div class="available row pl-3">

                                @php
                                    $sizes = $singleProduct->productAttributes;
                                @endphp

                                <div class="col-12">
                                    <div class="row">
                                        @if(count($sizes))
                                            <div class="col-md-6" id="product_title">
                                                <h6 class="p-0">Available Options:</h6>
                                                <ul>
                                                    <li>
                                                        Size:<select required
                                                                     style="font-size: 12px; font-family: 'Lobster', cursive; font-weight: bold;">
                                                            <option value="">Choose a Size</option>
                                                            @foreach ($sizes as $size)
                                                                <option
                                                                    value="{{ $size->id }}">{{ $size->sizeName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif

                                        @php
                                            $productQuantity = $singleProduct->quantity;
                                        @endphp

                                        <div class="">
                                            <form class="mt-0">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $singleProduct->id }}">
                                                <input type="hidden" name="promote" value="{{ request()->reff }}">

                                                @php
                                                    $proID = $singleProduct->id;
                                                    $productAttrExists = App\productAttr::where('product_id', $proID)->exists();
                                                    $productAttr = App\productAttr::where('product_id', $proID)->get();
                                                @endphp

                                                <div class="row">
                                                    @if($productQuantity > 0)
                                                        <button class="itemDelete cart btn btn-adn"
                                                                data-id="{{ $singleProduct->id }}">
                                                            Add to Cart
                                                        </button>
                                                        @if(Auth::check())
                                                            <a href="{{ url('order-now') }}/{{ $singleProduct->id }}"
                                                               class="cart2 ">Order Now</a>
                                                        @else
                                                            <a data-toggle="modal"
                                                               data-target="#orderNowSingleProductModal-{{ $singleProduct->id }}"
                                                               href="" class="cart2 ">Order Now</a>
                                                        @endif
                                                    @else
                                                        <button class="btn btn-danger">Stock Out</button>
                                                    @endif
                                                </div>
                                            </form>
                                            <!-- Order now single product modal -->
                                            @include('fronts.order_now_single_product_modal',[
                                                    'action' => url('/quickOrderSave'),
                                                    'id' => $singleProduct->id,
                                                    'offer_price' => $singleProduct->offer_price,
                                                    'price' => $singleProduct->price,
                                                 ])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--<div class="star-on">
                        <ul>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                        </ul>
                        <div class="review">
                            <a href="#"> 3 reviews </a>/
                            <a href="#"> Write a review</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>--}}


                    <div class="col-12" style="margin-left: -25px;">
                        <div class="row m-0" id="prodcut_p_contant">
                            <div id="product_img">
                                <img src="{{asset('/')}}front/./images/call-now (1).gif" alt="">
                            </div>
                            <div id="contract">
                                <h4>{{ isset($site_info->mobile_one) ? $site_info->mobile_one : '' }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product image and title end -->

    <!-- produt desctiption and review start -->
    <div class="container" id="product_dec">
        <div class="row">
            <div class="col-md-6 padding_0">
                <h4 class=" text-light py-2">
                    <i class="fas fa-chart-bar" style="color: #fff"></i>
                    Product Details
                </h4>
                <ul class="padding_0">
                    @foreach($singleProduct->productDetails as $pd)
                        <li><i class="fas fa-chevron-right"></i>{{ $pd->details }} </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6 padding_0">
                <h4 class="bg-warning text-light py-2">
                    <i class="fas fa-chart-bar" style="color: #fff"></i>
                    <span class="a-icon-alt">Product Review</span>
                </h4>

                <div class="col-md-12" style="overflow: scroll; height: 300px; padding: 0px 7px 0px 12px;">
                    <div class="row">
                        <div class="fb-comments" data-href="{{ Request::url() }}" data-width=""
                             data-numposts="8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- produt desctiption and review end -->
    <div class="container" id="product_dec">
        <div class="row">
            <div class="col-md-6 padding_0">
                <h4 class=" text-light py-2">
                    <i class="fa fa-bus" style="color: #fff"> </i>
                    Delivery and Payment
                </h4>
                <ul class="padding_0">
                    <h5> আপনি ঢাকা সিটির ভীতরে হলেঃ-</h5>
                    <li><i class="fas fa-chevron-right"></i>ক্যাশ অন ডেলিভারি/হ্যান্ড টু হ্যান্ড ডেলিভারি।</li>
                    <li><i class="fas fa-chevron-right"></i>ডেলিভারি চার্জ ৬০ টাকা।</li>
                    <li><i class="fas fa-chevron-right"></i>পণ্যের টাকা ডেলিভারি ম্যানের কাছে প্রদান করবেন।</li>
                    <li><i class="fas fa-chevron-right"></i>অর্ডার কনফার্ম করার ৪৮ ঘণ্টার ভিতর ডেলিভারি পাবেন।</li>
                    <li><i class="fas fa-chevron-right"></i>বিঃদ্রঃ- ছবি এবং বর্ণনার সাথে পণ্যের মিল থাকা সত্যেও
                        আপনি পণ্য গ্রহন করতে না চাইলে ডেলিভারি চার্জ ৬০ টাকা ডেলিভারি ম্যানকে প্রদান করতে বাধ্য থাকিবেন।
                    </li>
                </ul>
            </div>
            <div class="col-md-6 padding_0" id="review">
                <h4 class=" text-light py-2">
                    <i class="fas fa-chart-bar" style="color: #fff"></i>
                </h4>
                <ul class="padding_0 pl-3">
                    <h5>আপনি ঢাকা সিটির বাহিরে হলেঃ-</h5>
                    <li><i class="fas fa-chevron-right"></i>
                        কন্ডিশন বুকিং অন কুরিয়ার সার্ভিস (জননী কুরিয়ার অথবা এস এ পরিবহন কুরিয়ার সার্ভিস) এ নিতে হবে।
                    </li>
                    <li><i class="fas fa-chevron-right"></i>
                        কুরিয়ার সার্ভিস চার্জ ১০০ টাকা বিকাশে অগ্রিম প্রদান করতে হবে।
                    </li>
                    <li><i class="fas fa-chevron-right"></i>
                        পণ্যের টাকা ডেলিভারি ম্যানের কাছে প্রদান করবেন।
                    </li>
                    <li><i class="fas fa-chevron-right"></i>
                        কুরিয়ার চার্জ ১০০ টাকা বিকাশ করার পর ৪৮ ঘন্টার ভিতর কুরিয়ার
                        হতে পণ্য গ্রহন করতে হবে এবং পণ্যের টাকা কুরিয়ার অফিসে প্রদান করতে হবে।
                    </li>
                    <li><i class="fas fa-chevron-right"></i>বি ঃদ্রঃ- ছবি এবং বর্ণনার সাথে পণ্যের মিল থাকা সত্যেও আপনি
                        পণ্য গ্রহন করতে না চাইলে কুরিয়ার চার্জ ১০০ টাকা কুরিয়ার অফিসে প্রদান করে পণ্য আমাদের ঠিকানায়
                        রিটার্ন করবেন। আমরা প্রয়োজনীয় ব্যবস্থা নিব।
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <!-- relate product -->
    <div class="container" style="margin-bottom: 60px">
        <div class="row">
            <div class="col-md-12 padding_0 mt-3" id="product_items_1">
                <h4 class=" text-light py-2 mt-3">
                    Related Product
                </h4>
            </div>

            <div class="col-md-12 padding_0" id="product_items_1"
                 style="background-color: lightgrey; padding: 7px 7px 7px 10px;">
                @php
                    $cat_id = $singleProduct->category->id;
                    $randomProduct = App\product::where('category_id', $cat_id)->orderBy('updated_at', 'desc')->take(6)->get();
                @endphp

                <div class="container">
                    <div class="row">
                        @foreach($randomProduct as $v_randomProduct)
                            <div class="card col-xs-2">
                                <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect"
                                     style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">
                                    <a href="{{ url('prductView') }}/{{ $v_randomProduct->slug }}"
                                       style="display: block;padding: 0px;height: 140px;overflow: hidden;"
                                       class="img-hover col-sm-12 padding-zero" href="#" id="209">
                                        <img class="responsive zoomEffect"
                                             style="margin: 0 auto;padding:5px ;    width: 168px;"
                                             src="{{ asset('upload/product') }}/{{ $v_randomProduct->image  }}">
                                    </a>

                                    <div class="col-sm-12 col-xs-12" style="padding:0;background: cornsilk;">

                                        <span id="productName209" class="col-sm-12 text-center"
                                              style="padding: 2px;overflow: hidden;height: 20px;font-size: 12px;display: block;color:#525252;font-weight: bold;">
                                            {{ str_limit( $v_randomProduct->product_name, 20) }}
                                        </span>

                                        <span id="productPrice209" class="col-sm-12  col-xs-12 text-center"
                                              style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold"> ৳ {{ $v_randomProduct->price }}
                                            </span>

                                        <span class="col-sm-6  col-xs-2 text-center">
                                            @if(Auth::check())
                                                <a class="text-decoration-none" href="{{ url('order-now') }}/{{ $v_randomProduct->id }}"
                                                   style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                                  Order Now
                                               </a>
                                            @else
                                                <a class="text-decoration-none" data-toggle="modal" data-target="#orderNowSingleProductModal-{{ $v_randomProduct->id }}" href=""
                                                   style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                                  Order Now
                                               </a>
                                            @endif
                                        </span>

                                        <!-- Order now single product modal -->
                                        @include('fronts.order_now_single_product_modal',[
                                                'action' => url('/quickOrderSave'),
                                                'id' => $v_randomProduct->id,
                                                'offer_price' => $v_randomProduct->offer_price,
                                                'price' => $v_randomProduct->price,
                                             ])

                                        <span onclick="ProductAddTwoCart(209)" class="product-fly  col-sm-6  col-xs-2 text-center">
                                            Add To Cart
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 60px">
        <div class="row">
            <div class="col-md-12 padding_0 mt-3" id="product_items_1">
                <h4 class=" text-light py-2 mt-3">
                    Best Selling Product
                </h4>
            </div>

            <div class="col-md-12 padding_0" id="product_items_1"
                 style="background-color: lightgrey; padding: 7px 7px 7px 10px;">
                @php
                    $cat_id = $singleProduct->category->id;
                    $randomProduct = App\product::where('category_id', $cat_id)->inRandomOrder()->take(6)->get();
                @endphp

                <div class="container">
                    <div class="row">
                        @foreach($randomProduct as $v_randomProduct)
                            <div class="card col-xs-2  ">
                                <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect"
                                     style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">
                                    <a href="{{ url('prductView') }}/{{ $v_randomProduct->slug }}"
                                       style="display: block;padding: 0px;height: 160px;overflow: hidden;"
                                       class="img-hover col-sm-12 padding-zero" href="#" id="209">
                                        <img class="responsive zoomEffect"
                                             style="margin: 0 auto;padding:5px; width: 168px;"
                                             src="{{ asset('upload/product') }}/{{ $v_randomProduct->image  }}">
                                    </a>

                                    <div class="col-sm-12 col-xs-12" style="padding:0;background: cornsilk;">

                                        <span id="productName209" class="col-sm-12 text-center"
                                              style="padding: 2px;overflow: hidden;height: 20px;font-size: 12px;display: block;color:#525252;font-weight: bold;">
                                            {{ str_limit( $v_randomProduct->product_name, 20) }}
                                        </span>

                                        <span id="productPrice209" class="col-sm-12  col-xs-12 text-center" style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold">
                                            @if($v_randomProduct->offer_price)
                                                ৳{{ $v_randomProduct->offer_price }}
                                                <del style="color:red"> ৳{{ $v_randomProduct->price }}</del>
                                            @else
                                                ৳{{ $v_randomProduct->price }}
                                            @endif
                                        </span>

                                        <span class="col-sm-6  col-xs-2 text-center" style="padding: 0;display: block;height: 30px;line-height:28px;font-size: 12px;font-weight: bold;background: #ff6a00; float: right;">
                                            @if(Auth::check())
                                                <a class="text-decoration-none" href="{{ url('order-now') }}/{{ $v_randomProduct->id }}"
                                                   style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                                  Order Now
                                               </a>
                                            @else
                                                <a class="text-decoration-none" data-toggle="modal" data-target="#orderNowSingleProductModal-{{ $v_randomProduct->id }}" href=""
                                                   style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                                  Order Now
                                               </a>
                                            @endif
                                        </span>

                                        <!-- Order now single product modal -->
                                        @include('fronts.order_now_single_product_modal',[
                                                'action' => url('/quickOrderSave'),
                                                'id' => $v_randomProduct->id,
                                                'offer_price' => $v_randomProduct->offer_price,
                                                'price' => $v_randomProduct->price,
                                             ])

                                        <span onclick="ProductAddTwoCart(209)" class="product-fly  col-sm-6  col-xs-2 text-center">
                                            Add To Cart
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @push('js')
        <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>

        <script>
            var counter = 0
            $("#add").click(function () {
                counter = counter + 1;
                $("#counter").val(counter);
            });

            //Subtract
            $("#subtract").click(function () {
                counter = counter - 1;
                $("#counter").val(counter);
            });
        </script>

        <script>
            $(document).ready(function () {
                $(document).on('click', '.itemDelete', function (e) {
                    e.preventDefault();
                    var id = $(this).data("id");
                    var productAttrValue = $("#productAttrValue").val();
                    var token = $("meta[name='csrf-token']").attr("content");
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
                            alert("not Add Cart Successfully !")
                        }
                    });
                });
            });
        </script>

        <script type="text/javascript">

        </script>
    @endpush

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=561227764712417&autoLogAppEvents=1"></script>
@endsection
