<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
          content="Online Shopping BD: Buy fashion and lifestyle, clothing, mobile, electronics, home appliance & gadgets at best price online in Bangladesh with cash on delivery.">
    <meta name="subject" content="Best Online shop Bangladesh">
    <meta name="subject" content="Best Online shop Bangladesh">
    <meta name="revised" content="Sunday, January 1th, 2018, 5:15 pm"/>
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


    <link rel="stylesheet" href="{{asset('/')}}front/css/shop.css"/>

    <link rel="stylesheet" href="{{asset('/')}}front/css/jquery-ui1.css">
    <link rel="stylesheet" href="{{asset('/')}}front/css/flexslider.css"/>
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
    <link rel="stylesheet" href="{{asset('/')}}front/style.css">


    @yield('css')
    <title>Online shop bd | Online Shop in Bangladesh</title>
</head>

<body>
<!-- header top start -->
<section id="header_top">
    <div class="header_t" class="container padding_0">
        <div class="row">
            <div class="col-md-4 col-sm-4 mt-2 col-xs-4">
                <i class="fas fa-phone-square-alt" style="color:#fff ; font-size:12px"></i>
                {{-- <i class="fas fa-phone-rotary" style="color:#fff ; font-size:12px"></i>
                <i class="fas fa-phone-square-alt"></i> --}}
                <span style="color:#fff;font-size: 12px;">Hotline :</span>
                <span style="color: #fffcfb;font-size: 12px; padding-left:5px">
                         01783283536
                    </span>


            </div>
            <div class="col-md-8 col-sm-4 col-xs-4">
                <nav class="navbar navbar-expand-md navbar-light navbar-right">

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  navbar-right">
                            {{-- <li class="nav-item ">
                            <a class="nav-link" href="{{url('/seller-login ')}}">আবেদীনবাজারে সেল করুন <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{('/ucomplaint')}}">পরামর্শ/অভিযোগ</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{url('/trackorder')}}">&nbsp;&nbsp;<font style='color:#febe10'>
                                        <img src="{{asset('/')}}front/images/topordertrack.png" alt="">
                                        ডেলিভারি ট্র্যাক করুন</font></a>
                            </li>  --}}


                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}"><i class="fas fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/contract')}}">How to Buy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/contract')}}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/shop')}}">Shop</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{('/ucomplaint')}}">Today Deals</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="https://www.facebook.com/bdonlinemarket.com.bd"><i
                                        class="fab fa-facebook-f"></i> Facebook</a>
                            </li>


                        </ul>
                        {{-- <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary bg-light text-dark">BNG</button>
                            <button type="button" class="btn btn-secondary">ENG
                            </button>
                        </div> --}}

                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>


<!-- header top end -->


<!-- header middle start -->

<section id="header_middle">
    <div class="header_m  padding_0 container">
        <div class="row">
            <div class="col-lg-2  col-md-2 col-sm-2 col-sm-3 " id="logo">

                @php
                    $logoImage = App\logo::latest()->take(1)->first();
                @endphp
                <a href="{{url('/')}}">
                    <img src="{{asset('upload/logo')}}/{{ $logoImage->image }}" alt="" width="100%" height="45">
                </a>
            </div>
            <div class="col-md-6 col-sm-6  col-xs-12" id="serch_box">


                @include('fronts.incl.search')


                {{-- <div id="popular_search">
                   <nav class="navbar navbar-expand-md navbar-light padding_0">

                   <a class="navbar-brand" href="#">জনপ্রিয় অনুসন্ধান</a>
                       <div class="collapse navbar-collapse" id="navbarNav">
                           <ul class="navbar-nav">
                           <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only"></span></a>
                           </li>
                           <li class="nav-item">
                           <a class="nav-link" href="{{url('/about')}}">About</a>
                           </li>




                           </ul>
                       </div>
                   </nav>

                   </div>  --}}
            </div>
        </div>


        <div class="col-md-3 col-sm-2 col-xs-12" id="list_img">
            {{-- <div class="call_numb">
                    <img src="{{asset('/')}}front/images/call-now (1).gif" alt="">
                        <p>Hotline Number</p>
                        <span>01783283536</span>
                    </div> --}}
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
                                        <li class="nav-item dropdown ">
                                            <a class="nav-link dropdown-toggle" href="{{url('customer_login')}}"
                                               id="navbarDropdown" role="button" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-user-alt"></i>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ url('customer-dashboard') }}"
                                                       class="text-left">
                                                        <i class="fa fa-user" aria-hidden="true"></i> My Profile
                                                    </a>

                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        <i class="fas fa-sign-out-alt"></i> SignOut</a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                          style="display: none;">
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
                                        <a class="nav-link dropdown-toggle" href="{{url('customer_login')}}"
                                           id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            <i class="fas fa-user-alt"></i> Login
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                            <form>

                                                <input type="text" placeholder="ইমেইল অ্যাড্রেস" class="form-control">
                                                <input type="text" placeholder="পাসওয়ার্ড" class="form-control">
                                                <br>
                                                <center>
                                                    <input type="submit" value="লগইন করুন" class="btn btn-warning btn-block pt-2">

                                                </center>

                                            </form>
                                            <a class="dropdown-item" href="#" class="text-left">পাসওয়ার্ড ভুলে
                                                গেছেন?</a>
                                            <a class="dropdown-item" href="{{url('customer_login')}}">রেজিস্টার</a>
                                            <a class="dropdown-item" href="{{url('/refriend')}}">রিফান্ড পলিসি</a>
                                            <a class="dropdown-item" href="{{ url('/order_format')}}">অর্ডার দেয়ার
                                                নিয়ম</a>


                                    </li>
                                @endguest

                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/cart') }}"><i class="fas fa-cart-plus"></i><span
                                        class="badge badge-light"><span id="totalCartItems2">
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
<!-- header middle end-->
{{-- <section id="header_top_bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-6">
                    <nav class="navbar navbar-expand-md navbar-light navbar-right">

                            <button class="navbar-toggler" type="button" data-toggle="collapse"  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav  navbar-right">
                                    <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/ ')}}">Home <span class="sr-only"></span></a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{('/ucomplaint')}}">Today Deals</a>
                                    </li>


                                    <li class="nav-item">
                                    <a class="nav-link" href="{{('/shop')}}">Shop</a>
                                    </li>






                                </ul>


                            </div>
                        </nav>
            </div>
            <div class="col-md-4">
                    <nav class="navbar navbar-expand-md navbar-light navbar-right">

                            <button class="navbar-toggler" type="button" data-toggle="collapse"  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav  navbar-right">

                                    <li class="nav-item">
                                    <a class="nav-link" href="{{url('/trackorder')}}">Track  Order</a>
                                    </li>

                                    <li class="nav-item ">
                                            <a class="nav-link" href="{{url('/seller-login ')}}">Sell Your Product
                                                <span class="sr-only"></span></a>
                                            </li>






                                </ul>


                            </div>
                        </nav>
            </div>
        </div>
    </div>

</section> --}}
<hr style="background:#44C9F6; margin:0px;">

@push('js')
    <script>
        $(document).on('click', '.filterSfearch', function () {
            // var id = $(this).data("id");


            // var categoryID = $('#categoryID').val();
            // var subCategoryId = $('#subCategoryId').val();
            // var price = $('#price').val();

            // window.location.href = "{{url('filter')}}"+"/"+categoryID+"/"+subCategoryId+"/"+price;

        });
    </script>
@endpush


