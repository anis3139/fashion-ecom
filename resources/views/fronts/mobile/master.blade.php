<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Online Shopping BD: Buy fashion and lifestyle, clothing, mobile, electronics, home appliance & gadgets at best price online in Bangladesh with cash on delivery.">
    <meta name="subject" content="your website's subject">
    <meta name="subject" content="your website's subject">
<meta name="revised" content="Sunday, January 1th, 2018, 5:15 pm" />
<meta name="topic" content="">
<meta name="summary" content="">
<meta name="Classification" content="Business">
<meta name="author" content="Md Sazzad Hossain, info@ajkeronlineshop.com">
<meta name="reply-to" content="info@ajkeronlineshop.com">
<meta name="Md Sazzad Hossain" content="">
<meta name="url" content="http://www.onlineshop.com.bd">
<meta name="identifier-URL" content="http://www.onlineshop.com.bd">
<meta name="directory" content="submission">
<meta name="category" content="">
<meta name="coverage" content="Worldwide">
<meta name="distribution" content="Global">
<meta name="rating" content="General">
<meta name="revisit-after" content="7 days">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
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

<body style="max-width: 1024px;
width: 100%;
margin: auto;
background-color: #fff;
overflow: hidden;
height: auto;">
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
                                        <div class="modal-header" style="background:#fff">
                                          <h5 class="modal-title" id="exampleModalLongTitle">ক্যাটাগরি</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="text-dark">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">


                                            {{-- new havbar here  --}}

                                                @foreach($allcategory->take(12) as $v_allcategory)
                                                <p id="navId">
                                                <a id="modela_nav"  href="{{url('single-category')}}/{{$v_allcategory->slug}}"  aria-expanded="false" >
                                                    {{-- category  --}}
                                                    {{ $v_allcategory->category_name  }}
                                                </a>
                                                <span id="nav_collapsle">
                                            <button  data-toggle="collapse" href="#{{ $v_allcategory->slug }}" role="button"  aria-expanded="false" aria-controls="collapseExample">

                                                <i class="fas fa-plus"></i>
                                                    </button>
                                                </span>


                                                    </p>
                                                    {{-- sub category  --}}
                                                    @foreach($v_allcategory->subCategory as $value)
                                                    <div class="collapse" id="{{ $v_allcategory->slug }}">
                                                    <div class="card card-body" id="thirdbody">
                                                        <a href="{{ url('/sub-category') }}/{{ $value->slug }}" >
                                                        {{ $value->subCategory_name, 10 }}
                                                    </a>
                                                        <span is="thirdNave">
                                                            @foreach($value->thirdCategory as $my )
                                                            <button  data-toggle="collapse" href="#{{ $my->slug}}" role="button"  aria-expanded="false" aria-controls="collapseExample" >

                                                                <i id="thirdPluse" class="fas fa-plus"></i>
                                                                    </button>
                                                        </span>

                                                </div>
                                            </div>

                                                        <div class="collapse" id="{{ $my->slug}}">
                                                            <div class="card card-body">
                                                                <a href="{{ url('/sub-category-last') }}/{{ $my->slug }}" id="Thirdbutton">
                                                                    {{ $my->thirdCategoryName }}

                                                                    @endforeach
                                                           </a>
                                                            </div>
                                                            </div>




                                                    @endforeach
                                                    @endforeach
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
                                        <i class="fas fa-user-alt"></i> Login
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


    <!-- header middle start -->


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

	@yield('content')








<!-- product contant start -->
<!-- product-item-1-start -->







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

<footer id="footer" style="background: #232F3E; color:#fff" class="">


             {{-- Shuvo vai --}}
    <section id="mobilenav" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar nav">
                <ul class="d-flex">
                    <li class="nav-item  pr-5">
                            <a href="{{url('/')}}" class="nav-link"><i class="fas fa-home text-dark bg-light"></i></a>

                    </li>
                    <li class="nav-item pr-5" id="product_fly">
                   <a class="nav-link" href="{{url('/cart')}}"><i class="fas fa-cart-plus"></i><span class="badge badge-light"><span id="totalCartItems2">
                                {{ count((array) session('cart')) }}
                              </span></span></a>

                    </li>
                    <li class="nav-item pr-5">
                            <a href="{{url('customer_login')}}" class="nav-link"><i class="fas fa-user text-dark bg-light"></i></a>

                    </li>
                    <li class="nav-item pr-5">
                            <a href="#" type="button" data-toggle="modal" data-target="#exampleModalLong" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" class="nav-link"><i class="fas fa-bars text-dark bg-light"></i></a>

                    </li>
                </ul>

            </nav>
            </div>
        </div>
    </div>

</section>





        <div class="text-center">
            <p class="text-center"> © কপিরাইট-~Onlineshop.com.bd <?php echo date('Y') ;?></p>

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
                items: 2
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

