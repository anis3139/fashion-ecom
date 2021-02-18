@php
    $promoteCategory = App\category::where('status', 1)->get();
    $promoteSubCategory = App\subCategory::where('status', 1)->get();
    $allcategory = App\category::all();
@endphp


<!-- slider_sidbaar start -->
<section id="slider_sidbar " class="padding_0 container">
    <div class="slider_sidbar">
        <div class="row">
            <div class="col-md-2 col-sm-12 col-xs-12  padding_0" id="sidebar_nav">
                <!-- start sidebar start -->

                <div id="wrapper">
                    <div id="holder">
                        {{-- toggoler nav --}}
                        <nav class="navbar navbar-expand-sm navbar-light ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2"
                                    aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            {{-- toggoler nav --}}
                            @foreach($allcategory->take(12) as $v_allcategory)
                                <div class="collapse navbar-collapse " id="navbar2">
                                    <div id="vfx">
                                        <ul class="using navbar-nav">
                                            <li class="pad nav-item" style="border-bottom: 1px solid #fff"
                                                id="hoverbtn1">
                                                <a href="{{ url('category') }}/{{ $v_allcategory->slug }}">
                                                    <span class="border-0">{{ $v_allcategory->category_name  }}</span>
                                                </a>
                                                <ul>
                                                    <div class="sub-wrapper-vfx">
                                                        <div class="sub-con">
                                                            <div class="sub-hol">
                                                                @foreach($v_allcategory->subCategory as $value)
                                                                    <div class="sub-l">
                                                                        <h3>
                                                                            <a href="{{ url('/category') }}/{{ $v_allcategory->slug }}/{{ $value->slug }}"
                                                                               id="hoverbtn1"
                                                                               class="text-white">{{ $value->subCategory_name, 10 }} </a>
                                                                        </h3>
                                                                        {{ $value->subCategory_des}}

                                                                        @foreach($value->thirdCategory as $my )
                                                                            <ul>
                                                                                <li class="nav-item"><a
                                                                                        href="{{ url('/category') }}/{{ $v_allcategory->slug }}/{{ $value->slug }}/{{ $my->slug }}">{{ $my->thirdCategoryName }}</a>
                                                                                </li>
                                                                            </ul>
                                                                        @endforeach
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </li>
                                                </ul>
                                    </div>
                                </div>
                        @endforeach


                        <!-- sub-end -->
                            <!-- sub menu -->
                            <div id="ghihosozza">
                                <ul class="using">
                                    <li class="pad" style="border-bottom: 1px solid #fff">
                                        <a href="{{ url('/allcategorynav') }}"><span
                                                onMouseOver="this.style.color='#333'"
                                                onMouseOut="this.style.color='#fff'">সকল শপিং ক্যাটাগরি <i
                                                    class="fas fa-angle-double-right"></i></span></a>
                                        <ul>
                                            </li>
                                        </ul>
                                </ul>
                            </div>
                            <!-- sub-end -->
                        </nav>
                    </div>
                </div>
            </div>
            <!-- start sidebar end -->

            <div class="col-md-10 col-sm-12 col-xs-12 padding_0" id="slider" style="background:#FFEFCF">
                <!-- slider start -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($allbanner as $key => $value)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($allbanner as $key => $v_value)
                            <div class="carousel-item{{ $key == 1 ? ' active' : '' }}">
                                <img class="d-block " src="{{ asset('upload/banner') }}/{{ $v_value->image }}"
                                     alt="First slide">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                <!-- pdocut slider start -->
                <div class="container-fluid padding-0" id="hot_deal">
                    <div class="row">
                        <div class="owl-carousel owl-theme">
                            @foreach($promotedProduct as $v_promotedProduct)
                                <div class="item">
                                    <div class="card" title="{{$v_promotedProduct->product_name}}">
                                        <a href="{{ url('prductView') }}/{{ $v_promotedProduct->slug }}">
                                            <img src="{{ asset('upload/product') }}/{{ $v_promotedProduct->image }}"
                                                 alt="card image" class="card-img-top">
                                            <div class="card-body text-center">
                                                <a href="{{ url('prductView') }}/{{ $v_promotedProduct->slug }}"><span
                                                        class="text-center font-weight-bold"> {{ str_limit($v_promotedProduct->product_name, 18) }}</span></a>
                                                <p class="card-text text-center font-weight-bold">
                                                    ৳ {{ $v_promotedProduct->price }}
                                                </p>
                                        </a>

                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Item slider end-->
            <!-- pdocut slider end -->
        </div>
    </div>
</section>

{{-- end slider --}}
{{-- hot deal section --}}
<section id="hot_deal">
    <div class="container">
        <h3>
            <img src="https://static.ajkerdeal.com/images/deals/flash/hot-deal-logo.gif" width="20px">
            <a href="{{ route('hot.deal.products') }}" class="btn btn-sm btn-outline-danger float-right">SHOP MORE</a>
        </h3>
        <div class="row">
            <div class="owl-carousel owl-theme">
                @foreach($hot_deal as $hot_deals)
                    <div class="item">
                        <div class="card" title="{{$hot_deals->product_name}}">
                            <div class="card-body text-center">
                                <a href="{{ url('prductView') }}/{{ $hot_deals->slug }}">
                                    <img src="{{ asset('upload/product') }}/{{ $hot_deals->image }}" alt="card image" class="card-img-top">
                                </a>
                                <a href="{{ url('prductView') }}/{{ $hot_deals->slug }}">
                                    <span class="text-center font-weight-bold">
                                        {{ str_limit($hot_deals->product_name, 20) }}
                                    </span>
                                </a>
                                <p class="card-text text-center font-weight-bold">৳ {{ $hot_deals->offer_price }}</p>
                                <span id="off_price">Off {{($hot_deals->price)-($hot_deals->offer_price)}}৳</span>
                                {{--@if($hot_deals->quantity > 0)
                                    <span class="col-sm-6  col-xs-2 text-center" style="">
                                        <a href="{{ url('order-now') }}/{{ $hot_deals->id }}" class="text-decoration-none" style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                            Order Now
                                        </a>
                                    </span>
                                    <span onclick="ProductAddTwoCart(209)" data-id="{{ $hot_deals->id }}" class="addTocartItems product-fly  col-sm-6  col-xs-2 text-center">
                                        Add To Cart
                                    </span>
                                @else
                                    <span class=" product-fly  col-sm-6  col-xs-2 text-center">
                                        Stock Out
                                    </span>
                                @endif--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{--<div class="owl-carousel owl-theme">
                @foreach($hot_deal2 as $hot_deals)
                    <div class="item">
                        <div class="card" title="{{$hot_deals->product_name}}">
                            <div class="card-body text-center">
                                <a href="{{ url('prductView') }}/{{ $hot_deals->slug }}">
                                    <img src="{{ asset('upload/product') }}/{{ $hot_deals->image }}" alt="card image" class="card-img-top">
                                </a>
                                <a href="{{ url('prductView') }}/{{ $hot_deals->slug }}">
                                    <span class="text-center font-weight-bold">
                                        {{ str_limit($hot_deals->product_name, 18) }}
                                    </span>
                                </a>
                                <p class="card-text text-center font-weight-bold">৳ {{ $hot_deals->offer_price }}</p>
                                <span id="off_price">
                                    Off {{ ($hot_deals->price)-($hot_deals->offer_price) }}৳
                                </span>
                                --}}{{--@if($hot_deals->quantity > 0)
                                    <span class="col-sm-6  col-xs-2 text-center" style="">
                                      <a href="{{ url('order-now') }}/{{ $hot_deals->id }}" class="text-decoration-none" style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                          Order Now
                                      </a>
                                    </span>
                                    <span onclick="ProductAddTwoCart(209)" data-id="{{$hot_deals->id}}" class="addTocartItems product-fly col-sm-6 col-xs-2 text-center">
                                        Add To Cart
                                    </span>
                                @else
                                    <span class=" product-fly col-sm-6 col-xs-2 text-center">
                                        Stock Out
                                    </span>
                                @endif--}}{{--
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>--}}
        </div>
    </div>
</section>
{{-- hot deal section end--}}
