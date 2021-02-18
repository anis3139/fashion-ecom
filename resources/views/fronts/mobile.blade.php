<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Online Shopping BD: Buy fashion and lifestyle, clothing, mobile, electronics, home appliance & gadgets at best price online in Bangladesh with cash on delivery.">
    <meta name="subject" content="Best Online shop Bangladesh">
    <meta name="subject" content="Best Online shop Bangladesh">
<meta name="revised" content="Sunday, January 1th, 2018, 5:15 pm" />
<meta name="topic" content="">
<meta name="summary" content="">
<meta name="keywords" content="bed sheet,বেড সিট, bd online market, BD shop , ajkerdeal, ">
<meta name="Classification" content="Business">
<meta name="author" content="Md. Arifur Rahaman, admin@bdonlinemarket.com">
<meta name="reply-to" content="admin@bdonlinemarket.com">
<meta name="Md Sazzad Hossain" content="">
<meta name="url" content="http://www.bdonlinemarket.com">
<meta name="identifier-URL" content="http://www.bdonlinemarket.com">
<meta name="directory" content="submission">
<meta name="category" content="">
<meta name="coverage" content="Worldwide">
<meta name="distribution" content="Global">
<meta name="rating" content="General">
<meta name="revisit-after" content="7 days">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
    @php
    $logoImage = App\logo::latest()->take(1)->first();
    @endphp

<link rel="icon" href="{{asset('upload/logo')}}/{{ $logoImage->image }}" type="image/png" sizes="16x16">
    <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);

         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://unpkg.com/xzoom/dist/xzoom.css"> -->


    <link rel="stylesheet" href="{{asset('/')}}front/css/shop.css"  />

    <link rel="stylesheet"  href="{{asset('/')}}front/css/jquery-ui1.css">
    <link rel="stylesheet" href="{{asset('/')}}front/css/flexslider.css" />
    <link rel="stylesheet" href="{{asset('/')}}front/css/checkout.css">
    <link rel="stylesheet" href="{{asset('/')}}front/css/creditly.css">
    <link rel="stylesheet" href="{{asset('/')}}front/css/customer_register.css">

    <link rel="stylesheet" href="{{asset('/')}}front/css/easy-responsive-tabs.css">
    <link rel="stylesheet" href="{{asset('/')}}front/css/customer_das.css">


    <link rel="stylesheet" href="{{asset('/')}}front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('/')}}front/css/jquery.exzoom.css">
     <!-- <link rel="stylesheet" href="{{asset('/')}}front/css/animation.css"> -->


    <!--stylesheets-->
    <link rel="stylesheet"  href="{{asset('/')}}front/style.css">


    @yield('css')
  <title>Onlline Shop.com bd | Online Shop in Bangladesh</title>
</head>

<body>
    <!-- header top start -->
   <section id="header_top" >
        <div class="header_t" class="container padding_0">
            <div class="row">
                <div class="col-md-12 col-sm-4 mt-2 col-xs-4 text-center">
                    <i  class="fas fa-phone-square-alt" style="color:#fff ; font-size:12px"></i>
                    {{-- <i class="fas fa-phone-rotary" style="color:#fff ; font-size:12px"></i>
                    <i class="fas fa-phone-square-alt"></i> --}}
                    <span style="color:#fff;font-size: 12px;">হটলাইন নাম্বার  :</span>
                    <span style="color: #fffcfb;font-size: 12px; padding-left:5px">
                         01783283536
                    </span>



                </div>

            </div>
        </div>
    </section>


    <!-- header top end -->


    <!-- header middle start -->

    <section id="header_middle">
        <div class="header_m container" >
            <div class="row">
                <div class="col-md-1 col-sm-1 col-sm-1 " id="header_nav">
                        <nav class="navbar navbar-light navbar-md">
                                <button class="navbar-toggler" type="button" data-toggle="modal" data-target="#exampleModalLong" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                  <span class="navbar-toggler-icon"></span>
                                </button>
                              </nav>

                              <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">ক্যাটাগরি</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                                <div id="wrapper2">
                                                        <div id="holder2">
                                                        {{-- toggoler nav --}}
                                                        <nav class="navbar  ">
                                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
                                                            <span class="navbar-toggler-icon"></span>
                                                            </button>

                                                {{-- toggoler nav --}}
                                                    @foreach($allcategory->take(12) as $v_allcategory)
                                            <div class="" id="navbar2">

                                                                <div id="vfx1">

                                                            <ul class="using navbar-nav">

                                                        <li class="pad nav-item" style="border-bottom: 1px solid #fff" id="hoverbtn1"><a href="{{url('single-category')}}/{{$v_allcategory->slug}}" ><span >{{ $v_allcategory->category_name  }}</span></a>
                                                                <ul>
                                                                <div class="sub-wrapper-vfx2">
                                                                    <div class="sub-con1">
                                                                                <div class="sub-hol2">
                                                                            @foreach($v_allcategory->subCategory as $value)
                                                                                    <div class="sub-l">
                                                                                    <h3><a href="{{ url('/sub-category') }}/{{ $value->slug }}"  id="hoverbtn1" class="text-white">{{ $value->subCategory_name, 10 }} </a></h3>
                                                                                {{ $value->subCategory_des}}

                                                                                    @foreach($value->thirdCategory as $my )
                                                                                        <ul>
                                                                <li class="nav-item"><a href="{{ url('/sub-category-last') }}/{{ $my->slug }}">{{ $my->thirdCategoryName }}</a></li>
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
                                                            <a href="{{ url('/allcategorynav') }}"><span onMouseOver="this.style.color='#333'"
                                                                onMouseOut="this.style.color='#fff'">সকল শপিং ক্যাটাগরি <i class="fas fa-angle-double-right"></i></span></a>
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
                                        </div>

                                      </div>
                                    </div>
                                  </div>





                <div class="col-lg-2  col-md-2 col-sm-2 col-sm-2 " id="logo">

                        @php
                        $logoImage = App\logo::latest()->take(1)->first();
                        @endphp
                             <a href="{{url('/')}}">
                        <img src="{{asset('upload/logo')}}/{{ $logoImage->image }}" alt="" width="100%" height="45">
                    </a>
                </div>
                <div class="col-md-6 col-sm-3  col-xs-3" id="serch_box">


                 @include('fronts.incl.search')



                </div>
            </div>


            <div class="col-md-3 col-sm-2 col-xs-2" id="list_img">

                            <div class="order_taken">
                            <a style="    background: #f58c00;color: #fff;font-weight: bold;
                            padding: 11px 8px;
                            border-radius: 6px;
                            font-size: 13px;" href="{{url('trackorder')}}" title="Track Your Order" class="font-color1">
                                        Track Your Order
                                  </a>
                        </div>

                {{-- <div class="order_taken">
                        <a style="background: #f58c00;color: #fff;font-weight: bold;    padding: 11px 3px;border-radius: 6px;" href="{{url('/trackorder')}}" title="Track Your Order" class="font-color1">
                                Track Your Order
                          </a>
                </div>  --}}

                <div class="user_login">
                    <nav class="navbar navbar-expand-md navbar-light navbar-right">



                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav  navbar-right">





                        @if (Route::has('login'))

                            @auth

                            @if(Auth::user()->roll_id == 3)
                            <li class="nav-item dropdown " >
                                <a class="nav-link dropdown-toggle" href="{{url('customer_login')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user-alt"></i>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('customer-dashboard') }}" class="text-left">
                                           <i class="fa fa-user" aria-hidden="true"></i> My Profile
                                        </a>

                                          <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                             <i class="fas fa-sign-out-alt"></i> SignOut</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </li>

                                @elseif(Auth::user()->roll_id == 1)
                                <li class="nav-item dropdown" style="border:none;">
                                <a class="nav-link" href="{{url('/dashboard')}}">
                                        <i class="fas fa-user-alt"></i>
                                        <span class="bride">DashBoard</span>
                                    </a>
                                </li>

                                @elseif(Auth::user()->roll_id == 5)
                                 <li class="nav-item dropdown" style="border:none;">
                                <a class="nav-link" href="{{url('/seller-dashboard')}}">
                                        <i class="fas fa-user-alt"></i>
                                        <span class="bride">DashBoard</span>
                                    </a>
                                </li>
                                @endif
                                @endauth
                                 @guest
                                 <li class="nav-item dropdown" style="border:none;">
                                <a class="nav-link dropdown-toggle" href="{{url('customer_login')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user-alt"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <form>

                                            <input type="text" placeholder="ইমেইল অ্যাড্রেস" class="form-control">
                                            <input type="text" placeholder="পাসওয়ার্ড" class="form-control">
                                            <br>
                                            <center>
                                                <input type="submit" value="লগইন করুন" class="btn btn-primary pt-2">

                                            </center>

                                        </form>
                                        <a class="dropdown-item" href="#" class="text-left">পাসওয়ার্ড ভুলে গেছেন?</a>
                                        <a class="dropdown-item" href="{{url('customer_login')}}">রেজিস্টার</a>
                                    <a class="dropdown-item" href="{{url('/refriend')}}">রিফান্ড পলিসি</a>
                                    <a class="dropdown-item" href="{{ url('/order_format')}}">অর্ডার দেয়ার নিয়ম</a>



                                </li>
                                 @endguest

                         @endif
                         <li class="nav-item">
                            <a class="nav-link" href="{{ url('/cart') }}"><i class="fas fa-cart-plus"></i><span class="badge badge-light"><span id="totalCartItems2">
                                {{ count((array) session('cart')) }}
                              </span></span></a>
                        </li>



                            </ul>


                        </div>
                    </nav>
                </div>








            </div>
        </div>
        </div>


    </section>
    <hr style="background:#70727375; margin:0px;">

    <hr style="background:#44C9F6; margin:0px;">

@push('js')
<script>
     $(document).on('click', '.filterSfearch', function(){
    // var id = $(this).data("id");


    // var categoryID = $('#categoryID').val();
    // var subCategoryId = $('#subCategoryId').val();
    // var price = $('#price').val();

    // window.location.href = "{{url('filter')}}"+"/"+categoryID+"/"+subCategoryId+"/"+price;

 });
</script>
@endpush





{{-- side baar start --}}




			 <!-- slider_sidbaar start -->
             <section id="slider_sidbar " class="padding_0 container">
                <div class="slider_sidbar">
                    <div class="row">


                    <div class="col-md-12 col-sm-10 col-xs-12 padding_0" id="slider" style="background:#FFEFCF">
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
                <img class="d-block " src="{{ asset('upload/banner') }}/{{ $v_value->image }}" alt="First slide">
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



                                <div class="owl-carousel owl-theme" >
                                @foreach($promotedProduct as $v_promotedProduct)

                                    <div class="item">

                                        <div class="card" title="{{$v_promotedProduct->product_name}}">
                                            <a href="{{ url('prductView') }}/{{ $v_promotedProduct->slug }}" >
                                            <img src="{{ asset('upload/product') }}/{{ $v_promotedProduct->image }}" alt="card image" class="card-img-top">
                                        <div class="card-body text-center">
                                                <a href="{{ url('prductView') }}/{{ $v_promotedProduct->slug }}"><span class="text-center font-weight-bold"> {{ str_limit($v_promotedProduct->product_name, 15) }}</span></a>
                                                <p class="card-text text-center font-weight-bold">৳ {{ $v_promotedProduct->price }}
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
                         <h3><img src="https://static.ajkerdeal.com/images/deals/flash/hot-deal-logo.gif" alt=""></h3>
                            <div class="row">



                                    <div class="owl-carousel owl-theme" >
                                    @foreach($hot_deal as $hot_deals)
                                        <div class="item">
                                            <div class="card" title="{{$hot_deals->product_name}}">
                                                <a href="{{ url('prductView') }}/{{ $hot_deals->slug }}">

                                                <img src="{{ asset('upload/product') }}/{{ $hot_deals->image }}" alt="card image" class="card-img-top">
                                            <div class="card-body text-center">
                                                    <a href="{{ url('prductView') }}/{{ $hot_deals->slug }}"><span class="text-center font-weight-bold"> {{ str_limit($hot_deals->product_name, 10) }}</span></a>
                                                    <p class="card-text text-center font-weight-bold">৳ {{ $hot_deals->offer_price }}
                                                    </p>
                                                    <span id="off_price">Off
                                                        {{
                                                            ($hot_deals->price)-($hot_deals->offer_price)
                                                        }}৳
                                                    </span>

                                                    </a>

                                                </div>
                                            </div>

                                        </div>

                                    @endforeach
                                    </div>
                                    <div class="owl-carousel owl-theme" >
                                        @foreach($hot_deal2 as $hot_deals)
                                            <div class="item">
                                            <div class="card" title="{{$hot_deals->product_name}}">
                                                    <a href="{{ url('prductView') }}/{{ $hot_deals->slug }}" >

                                                    <img src="{{ asset('upload/product') }}/{{ $hot_deals->image }}" alt="card image" class="card-img-top">
                                                <div class="card-body text-center">
                                                        <a href="{{ url('prductView') }}/{{ $hot_deals->slug }}"><span class="text-center font-weight-bold"> {{ str_limit($hot_deals->product_name, 10) }}</span></a>
                                                        <p class="card-text text-center font-weight-bold">৳ {{ $hot_deals->offer_price }}
                                                        </p>
                                                        <span id="off_price">Off
                                                            {{
                                                                ($hot_deals->price)-($hot_deals->offer_price)
                                                            }}৳
                                                        </span>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>

                             </div>
                     </div>

                 </section>
                 {{-- hot deal section end--}}



<!-- product contant start -->
<!-- product-item-1-start -->
@foreach($promoteSubCategory as $v_promoteCategory)
<div class="container " id="product_item" style="margin-top: 30px">
    <div class="row">

        <?php
        $oneCategory = $v_promoteCategory->products;


    ?>



      <div class="clear"></div>
        <div class="col-md-10 col-sm-12" id="product_items">
            <div class="container padding_0">

                    {{-- new card --}}
                    <div class="row">
                        @foreach($oneCategory->take(10) as $v_categoryProduct)

                        @if($v_categoryProduct->status == 1)
                        <div class="card col-xs-2  " >
                                <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect" style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">


                                <a href="{{ url('prductView') }}/{{ $v_categoryProduct->slug }}" title="{{$v_categoryProduct->product_name}}" style="display: block;padding: 0px;height: 160px;overflow: hidden;" class="img-hover col-sm-12 padding-zero" href="#" id="209">
                                        <img class="responsive zoomEffect" style="margin: 0 auto;margin: 0 auto;    width: 205px;"  src="{{ asset('upload/product') }}/{{ $v_categoryProduct->image  }}">
                                    </a>


                                     <div class="col-sm-12 col-xs-12" style="padding:0;background: cornsilk;">
                                         <a href="{{ url('prductView') }}/{{ $v_categoryProduct->slug }}">
                                    <span id="productName209" class="col-sm-12 text-center" style="padding: 2px;overflow: hidden;height: 20px;font-size: 12px;display: block;color:#525252;font-weight: bold;">
                                         {{ str_limit( $v_categoryProduct->product_name, 20) }}
                                         </span>
                                             </a>
                                     <span id="productPrice209" class="col-sm-12  col-xs-12 text-center" style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold">৳{{ $v_categoryProduct->price }}   <del style="color:red"> {{ $v_categoryProduct->offer_price }}</del>                                             </span>
                                     @if($v_categoryProduct->quantity > 0)
                                      <span class="col-sm-6  col-xs-2 text-center" >



                                      <a href="{{ url('order-now') }}/{{ $v_categoryProduct->id }}"  style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">Order          </a>

                                    </span>

                                     <span onclick="ProductAddTwoCart(209)" data-id="{{$v_categoryProduct->id}}"  class="addTocartItems product-fly  col-sm-6  col-xs-2 text-center" >
                                Add To Cart
                                    </span>
                                    @else
                                    <span class=" product-fly  col-sm-6  col-xs-2 text-center" >
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
@endforeach


<!-- product-item-1-end-->
<div class="clear"></div>
<section id="footertext">
    <div class="container">
        <div class="row">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scel Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelLorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelLorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelLorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelLorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scel<span id="dots">...</span><span id="more">
                    <span>hello erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span> <br>
                    <span>hello erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span> <br>
                    <span>hello erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span> <br>
                    <span>hello erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span>
               </span></p>

                <button style="border: none;
                background: none;
                color: #1f1cc7;
                font-size: 13px;" onclick="myFunction()" id="myBtn">Read more</button>
        </div>
    </div>
</section>




@section('js')
 <script>



    $( document ).ready(function() {
        $(document).on('click', '.addTocartItems', function(e){
            e.preventDefault();
             var id = $(this).data("id");
             var productAttrValue = "default";
             var token = $("meta[name='csrf-token']").attr("content");
           $.ajax({
                            type:"GET",
                            url:"/cartSave"+"/"+id+"/"+productAttrValue,
                            data:{
                                    "id": id,
                                    "_token": token,
                                },
                            success: function (response) {
                                console.log("doen");
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

<footer id="footer" style="background: #232F3E; color:#fff" class="padding_0">
    <div class="container padding_0">
        <div class="row">
            {{-- <div class="col-md-8 padding_0" id="footer_nav">
                <nav class="navbar padding_0">

                    <div class="container padding_0">
                        <div class="form-inline">


                        <li class=""><a href="{{url('/')}}"> আবেদীন বাজার</a></li>
                        <li><a href="{{url('/about')}}">আমাদের ঠিকানা </a></li>
                            <li><a href="{{url('/')}}">হোম</a></li>
                            <li><a href="#">অর্ডার দেয়ার নিয়ম</a></li>
                            <li><a href="#">সাইট ম্যাপ</a></li>
                            <li><a href="#">আমাদের পার্টনার </a></li>
                            <li><a href="#" style="border:none;">আবেদীন বাজার ব্লগ </a></li>


                        </div>

                    </div>
                    <hr style="background:#fff">
                    <div class="container padding_0">
                        <div class="form-inline">
                            <li class="#"><a href="#"> পেমেন্ট</a></li>


                            <li><a href="">পণ্য পরিবর্তন প্রক্রিয়া </a></li>
                            <li><a href="{{('/ucomplaint')}}">রিফান্ড পলিসি </a></li>
                            <li><a href="#" style="border:none;">পরামর্শ/অভিযোগ</a></li>


                        </div>
                        <hr style="background:#fff">

                        <div class="form-inline">
                            <li class="active"><a href="#"> পেমেন্ট মাধ্যম</a></li>
                            <li><a href="#"><img src="{{asset('/')}}front/./images/pay1.png" alt="pay image"> </a></li>
                            <li><a href="#"><img src="{{asset('/')}}front/./images/pay2.png" alt="pay image"> </a></li>
                            <li><a href="#"><img src="{{asset('/')}}front/./images/pay3.png" alt="pay image"> </a></li>
                            <li><a href="#"><img src="{{asset('/')}}front/./images/pay4.png" alt="pay image"> </a></li>
                            <li><a href="#"><img src="{{asset('/')}}front/./images/pay5.png" alt="pay image"> </a></li>
                            <li><a href="#"><img src="{{asset('/')}}front/./images/pay6.png" alt="pay image"> </a></li>
                            <li><a href="#"><img src="{{asset('/')}}front/./images/pay7.png" alt="pay image"> </a></li>


                        </div>
                    </div>
                </nav>
                <h6>আবেদীন বাজার এ্যাপ ডাউনলোড করুন, যেখানে আপনি কয়েকটি ক্লিকের মাধ্যমে
                    আপনার অর্ডার সম্পূর্ন করুন।</h6>
                    <a href="https://play.google.com/store/apps/details?id=abedin.bazar&hl=en" class="my-2">
                <img src="{{asset('/')}}front/./images/playstore.png" alt=""></a>



            </div> --}}
            {{-- <div class="col-md-4" id="footer_second">
                <h3>নিউজলেটার</h3>
                <p>প্রতিদিন ১০০০ এর বেশি পণ্য যুক্ত হচ্ছে। আবেদীন বাজার ডট কম-এ।
                    আমাদের নতুন পণ্যের আপডেট পেতে এখনই সাবস্ক্রাইব করুন।</p>

                <div class="input-group mb-3" id="footer_last">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text btn-danger" id="basic-addon2">সাবস্ক্রাইব</span>
                    </div>
                </div>

                <ul class="form-inline">
                    <li><a href="#"><img src="{{asset('/')}}front/./images/ficon1.png" width="25px" height="20px" alt=""> প্রশ্ন</a></li>
                    <li><a href="#"><img src="{{asset('/')}}front/./images/ficon2.png" width="25px" height="20px" alt="">মতামত</a></li>
                    <li><a href="#" style="border:none;"><img src="{{asset('/')}}front/./images/ficon3.png" width="25px" height="20px" alt="">অভিযোগ</a></li>
                </ul>




                <div id="social_icon">
                    <a href="https://www.facebook.com/jogoot.com.bd/ " class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-google"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-youtube"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-pinterest"></a>
                </div>

            </div> --}}
             {{-- Shuvo vai --}}
             <section id="mobilenav" class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar nav">
                <ul class="d-flex">
                    <li class="nav-item  pr-5">
                            <a href="{{url('/')}}" class="nav-link"><i class="fas fa-home text-light"></i></a>

                    </li>
                    <li class="nav-item pr-5">
                            <a href="" class="nav-link"><i class="fas fa-undo-alt text-light"></i></a>

                    </li>
                    <li class="nav-item pr-5">
                            <a href="" class="nav-link"><i class="fas fa-cart-arrow-down text-light"></i></a>

                    </li>
                    <li class="nav-item pr-5">
                            <a href="{{url('customer_login')}}" class="nav-link"><i class="fas fa-user text-light"></i></a>

                    </li>
                </ul>

            </nav>
            </div>
        </div>
    </div>

</section>
             <div class="col-md-3">
                    <h6 class="font-weight-bold text-uppercase mt-3 mb-4">Contact</h6>

                  <p>Call us 24/7</p>
                  <address>
                        98/2, Senpara, Porbata, Mirpur-10
                        jogoot.com@gmail.com

                  </address>
                  <div id="social_icon">
                        <a href="https://www.facebook.com/jogoot.com.bd/ " class="fab fa-facebook"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-google"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                        <a href="#" class="fab fa-youtube"></a>
                        <a href="#" class="fab fa-instagram"></a>

                    </div>

            </div>
            <div class="col-md-3">
                    <h6 class="font-weight-bold text-uppercase mt-3 mb-4">Company</h6>

                    <ul class="list-unstyled">
                      <li>
                      <a href="{{url('about')}}">About Us</a>
                      </li>
                      <li>
                      <a href="{{url('contract')}}">Contact</a>
                      </li>
                      <li>
                        <a href="#!">VFAQs</a>
                      </li>
                      <li>
                        <a href="#!">Policy</a>
                      </li>
                    </ul>
            </div>
            <div class="col-md-3">
                    <h6 class="font-weight-bold text-uppercase mt-3 mb-4">Quick Links</h6>

                    <ul class="list-unstyled">
                      <li>
                      <a href="{{'shop'}}">Shop</a>
                      </li>
                      <li>
                        <a href="#!">Affilate</a>
                      </li>
                      <li>
                        <a href="#!">ecome a Vendor

                                </a>
                      </li>
                      <li>
                        <a href="#!">
                                Carrer

                                </a>
                      </li>
                    </ul>
            </div>
            <div class="col-md-3">
                    <h6 class="font-weight-bold text-uppercase mt-3 mb-4">
                            User Area

                            </h6>

                    <ul class="list-unstyled">
                            <li>
                              <a href="#!">Become a Vendor
                                    </a>
                            </li>
                            <li>
                            <a href="{{url('cart')}}">Checkout</a>
                            </li>
                            <li>
                              <a href="{{url('login')}}">My account</a>
                            </li>
                            <li>
                            <a href="{{url('customer-dashboard')}}">My Orders</a>
                            </li>
                            <li>
                            <a href="{{url('trackorder')}}">Order Tracking</a>
                            </li>
                          </ul>
            </div>
        </div>
        <hr style="background:#fff">
        <p>© কপিরাইট-~Jogoot.com <?php echo date('Y') ;?></p>

    </div>



    <div class="container-fluid" id="eicon1" style="">
        <div class="row">
            <a href=" https://m.me/abedinbazar">
                <img src="{{asset('/')}}front/./images/Facebook_Messenger.png" alt="">


            </a>
        </div>

    </div>
<a href="#" id="toTop" style="display: inline;"><span id="toTopHover" style="opacity: 0;"></span>To Top</a>

<div class="container" id="product_fly">
    <div class="row">
            <div  class="cart_anchor">

           <a href="{{url('/cart')}}">

                    <span style="display: block; border: 1px solid darkorange;">
                        <center> <img src="https://www.himelshop.com/image/ecom-cart.gif"> </center>
                    </span>
                     <?php $total = 0



                    ?>
                     <span style="display: block; background: darkorange; color: #000;font-weight:bold;padding:2px;text-align:center">
                        <span id="totalCartItems2">
                          {{ count((array) session('cart')) }} Items
                        </span>
                    </span>

                        @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach


                        <span id="CartDetailsTotal" style="display: block; border: 1px solid darkorange;color:#000;font-size:14px;font-weight:bold;text-align:center">
                         {{$total}}   Tk.
                    </span>
                 </a>
                </div>
    </div>
</div>

<script>

        $('.zoomEffect').hover(function () {
            $(this).addClass('transition');
        }, function () {
            $(this).removeClass('transition');
        });

    </script>




</footer>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('/')}}front/js/jquery.exzoom.js"></script>

 <script>
     $(function(){

$("#exzoom").exzoom({
  // options here
  "autoPlay":false,

});

});

 </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

{{-- <script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script> --}}
<script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>


<!-- <script src="js/jquery-ui.js"></script> -->
<script>

         $(window).load(function () {
         	$("#slider-range").slider({
         		range: true,
         		min: 0,
         		max: 9000,
         		values: [50, 6000],
         		slide: function (event, ui) {
         			$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
         		}
         	});
         	$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

         });
      </script>
        <script>
                 $(document).ready(function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    // var id = $(this).data("id");
                         $.get("/", function (data) {

                      });

                 });

        </script>
        <script>
         $(document).ready(function () {
         	$('#horizontalTab').easyResponsiveTabs({
         		type: 'default', //Types: default, vertical, accordion
         		width: 'auto', //auto or any width like 600px
         		fit: true, // 100% fit in a container
         		closed: 'accordion', // Start closed if in accordion view
         		activate: function (event) { // Callback function if tab is switched
         			var $tab = $(this);
         			var $info = $('#tabInfo');
         			var $name = $('span', $info);
         			$name.text($tab.text());
         			$info.show();
         		}
         	});
         	$('#verticalTab').easyResponsiveTabs({
         		type: 'vertical',
         		width: 'auto',
         		fit: true
         	});
         });
      </script>

<script src="{{asset('/')}}front/js/move-top.js"></script>
<script src="{{asset('/')}}front/js/easing.js"></script>
<script src="{{asset('/')}}front/js/creditly.js"></script>
<script src="{{asset('/')}}front/js/fly.js"></script>

<script>
         $(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({
         			scrollTop: $(this.hash).offset().top
         		}, 90
         	});
         });
</script>
       <!-- here stars scrolling icon -->
       <script>
         $(document).ready(function () {

         	var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear'
         	};


         	$().UItoTop({
         		easingType: 'easeOutQuart'
         	});

         });
      </script>


      <script>
            function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
      </script>
      <!-- //here ends scrolling icon -->

<script src="{{asset('/')}}front/js/responsiveslides.min.js"></script>
<script src="{{asset('/')}}front/js/jquery.flexisel.js"></script>
<script src="{{asset('/')}}front/js/jquery.flexslider.js"></script>
<script src="{{asset('/')}}front/js/jquery.simpleLens.js"></script>
<script src="{{asset('/')}}front/js/minicart.js"></script>



<!-- <script src="{{asset('/')}}front/https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1"></script> -->
<script src="{{asset('/')}}front/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}front/js/main.js"></script>


<!-- new end -->




<script>
    $('.owl-carousel').owlCarousel({
        loop: true,

        autoplay: 500,

        nav: true,
        responsive: {
            0: {
                items: 5
            },
            600: {
                items: 6
            },

            1000: {
                items: 6
            }
        }
    })
</script>
@stack('js')
@yield('js')
</body>

</html>

