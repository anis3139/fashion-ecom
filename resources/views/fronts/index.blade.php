@extends('fronts.master')

@section('content')

    <!-- side bar start -->
    @include('fronts.incl.nav')

    @foreach($category as $cat_row)
        @if($cat_row->products->count() > 0)
            <div class="container " id="product_item" style="margin-top: 30px">
                <div class="row">
                    <div class="col-md-2 col-sm-12 " id="product_menu">
                        <ul class="nav flex-column">
                            <!--FIRST CATEGORY-->

                            <li class="nav-item">
                                <a class="nav-link active" title="{{ $cat_row->category_name }}"
                                   href="{{ route('under.sub.cat', $cat_row->slug) }}">
                                    {{ $cat_row->category_name }}
                                </a>
                            </li>

                            <!--SECOND CATEGORY-->
                            @foreach($cat_row->subCategory as $sub_cat_row)
                                <li class="nav-item">
                                    <a class="nav-link" title="{{ $sub_cat_row->subCategory_name  }}"
                                       href="{{ route('second.category', [$sub_cat_row->category->slug, $sub_cat_row->slug]) }}">
                                        {{ $sub_cat_row->subCategory_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="clear"></div>
                    <div class="col-md-10 col-sm-12" id="product_items">
                        <div class="container padding_0">

                            {{-- new card --}}
                            <div class="row">
                                @foreach($cat_row->products->take(10) as $v_categoryProduct)

                                    @if($v_categoryProduct->status == 1)
                                        <div class="card col-xs-2  ">
                                            <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect"
                                                 style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">

                                                <a href="{{ url('prductView') }}/{{ $v_categoryProduct->slug }}"
                                                   title="{{$v_categoryProduct->product_name}}"
                                                   style="display: block;padding: 0px;height: 160px;overflow: hidden;"
                                                   class="img-hover col-sm-12 padding-zero" href="#" id="209">
                                                    <img class="responsive zoomEffect"
                                                         style="margin: 0 auto;margin: 0 auto;    width: 205px;"
                                                         src="{{ asset('upload/product') }}/{{ $v_categoryProduct->image  }}">
                                                </a>

                                                <div class="col-sm-12 col-xs-12"
                                                     style="padding:0;background: cornsilk;">
                                                    <a href="{{ url('prductView') }}/{{ $v_categoryProduct->slug }}">
                                                        <span id="productName209" class="col-sm-12 text-center"
                                                              style="padding: 2px;overflow: hidden;height: 33px;font-size: 12px;display: block;color:#525252;font-weight: bold;">
                                                             {{ str_limit( $v_categoryProduct->product_name, 38) }}
                                                        </span>
                                                    </a>
                                                    <span id="productPrice209" class="col-sm-12  col-xs-12 text-center"
                                                          style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold">
                                                        @if($v_categoryProduct->offer_price)
                                                            ৳{{ $v_categoryProduct->offer_price }}
                                                            <del style="color:red"> ৳{{ $v_categoryProduct->price }}</del>
                                                        @else
                                                            ৳{{ $v_categoryProduct->price }}
                                                        @endif
                                                    </span>
                                                    @if($v_categoryProduct->quantity > 0)
                                                        <span class="col-sm-6  col-xs-2 text-center" style="">
                                                            @if(Auth::check())
                                                                <a href="{{ url('order-now') }}/{{ $v_categoryProduct->id }}"
                                                                   style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                                                  Order Now
                                                               </a>
                                                            @else
                                                                <a data-toggle="modal" data-target="#orderNowModal-{{ $v_categoryProduct->id }}" href=""
                                                                   style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                                                  Order Now
                                                               </a>
                                                            @endif
                                                        </span>

                                                        <!-- Order now modal -->
                                                        @include('fronts.order_now_modal')

                                                        <span onclick="ProductAddTwoCart(209)"
                                                              data-id="{{$v_categoryProduct->id}}"
                                                              class="addTocartItems product-fly  col-sm-6  col-xs-2 text-center">
                                                            Add To Cart
                                                        </span>
                                                    @else
                                                        <span class="col-sm-6 col-xs-2 text-center text-white">
                                                            Stock Out
                                                        </span>
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
            </div>
        @endif
    @endforeach

    <div class="clear"></div>

    @if(isset($site_description))
        <div class="container" id="cat_descript">
            <p class="text-justify"
               style="font-size: 16px; line-height: 29px;">{!! $site_description->description !!}</p>
        </div>
    @endif

    {{--<section id="footertext">
        <div class="container">
            <div class="row">
                <p class="text-justify">
                    <em>
                        <span>
                            {!! str_limit($site_description->description, 1000) !!}
                        </span>
                        <span id="dots">...</span>
                        <span id="more">
                            <br><br>
                                Hello erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa.
                                Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at
                                libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer
                                fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.
                        </span>
                    </em>
                </p>
                <button class="blockquote-footer pl-0" style="border: none;
                background: none;
                color: #1f1cc7;
                font-size: 13px;" onclick="myFunction()" id="myBtn">Read more</button>
            </div>
        </div>
    </section>--}}
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.addTocartItems', function (e) {
                e.preventDefault();
                var id = $(this).data("id");
                var productAttrValue = "default";
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
                        alert("Something went wrong!")
                    }
                });
            });
        });
    </script>
@endsection

