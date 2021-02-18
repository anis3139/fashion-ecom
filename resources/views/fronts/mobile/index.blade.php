@extends('fronts.mobile.master')


@section('content')




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
                 {{-- mobile category start--}}
         <section class="container" id="mobile_category">
             <div class="row" id="joncates_hed">
                 <div class="text-left">
                        <a href="#" class="text-left "> জনপ্রিয় ক্যাটাগরি</a> 

                 </div>
                 <div class="text-right pulll-right">
                        <a href="{{url('mobile_subcategory')}}" class=" "> সকল  ক্যাটাগরি</a>

                 </div>
            </div>
             <div class="row" id="joncates_main">
                 <?php 

$allCategory = App\category::all();
 ?>
                    @foreach($allCategory as $vCategory)
                    
                <ul class="d-flex">
                     <li>
                         <a href="{{url('single-category')}}/{{$vCategory->slug}}">
                              <img src="{{asset('upload/category')}}/{{$vCategory->image}}" alt="Winter Collection" > 
                              <p class= "text-center">    {{$vCategory->category_name}}</p>
                               
                               
                             
                            </a>
                     

                     </li>
                 </ul>
                 @endforeach
              
          
              
             
           
        </div>
    </section>
                 {{-- mobile category end --}}


<!-- product-item-1-start -->

<div class="container padding_0" id="product_item" style="margin-top: 30px">
 


    

        <div class="col-md-12 col-sm-12" id="product_items">
            <div class="container padding_0">
  
                    {{-- new card --}}
                          <?php 
                    $getProduct = App\product::where('status', 1)->latest()->take(20)->get();
                 ?>
                    <div class="row product-list">
                            @if(count($getProduct)>0)        
                        @foreach($getProduct as $v_categoryProduct)
                               @if($v_categoryProduct->status == 1)
                        <div class="card col-xs-2 product-box">
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
                                      <span class="col-sm-6  col-xs-2 text-center" style="">
                                  
                                   
                                
                                      <a href="{{ url('order-now') }}/{{ $v_categoryProduct->id }}"  style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                          Order
                                       </a>
        
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
                           @endif

            </div>
            </div>
        </div>
    </div>



<section>
    <div class="text-cente">
        
        <div class="text-center my-3">
                <img src="https://www.himelshop.com/image/down-arrow.gif" alt="">
        </div>
         @if(count($getProduct)>0)
    <p class="loadMoreBtn text-center mt-4 mb-5">
<button class="load-more btn btn-danger" data-totalResult="{{ App\product::count() }}">Load More</button>
    </p>
    @endif
        

        </div>
</section>


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



    

 @endsection
 @section('js')

 <script type="text/javascript">
    var main_site="{{ url('/mobile') }}";
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".load-more").on('click',function(){
            var _totalCurrentResult=$(".product-box").length;
            // Ajax Reuqest
            $.ajax({
                url:main_site+'/load-more-data',
                type:'get',
                dataType:'json',
                data:{
                    skip:_totalCurrentResult
                },
                beforeSend:function(){
                    $(".load-more").html('Loading...');
                },
                success:function(response){
                    var _html='';
                    var image="{{ asset('imgs') }}/";
                    $.each(response,function(index,value){
                        // _html+='<div class="col-sm-4 mb-3 product-box">';
                        //     _html+='<img src="'+image+value.image+'" class="card-img-top" alt="'+value.title+'" />';
                        //     _html+='<div class="card">';
                        //         _html+='<div class="card-body">';
                        //             _html+='<h5 class="card-title">'+value.id+'. '+value.title+'</h5>';
                        //             _html+='<p class="card-text">'+value.summer+'</p>';
                        //             _html+='Price: <span class="badge badge-secondary">'+value.price+'</span>';
                        //         _html+='</div>';
                        //     _html+='</div>';
                        // _html+='</div>';

var imageLink = value.image;
var title = value.product_name;
var finalTitle = title.substring(0,20);
console.log(value);

 _html+=`<div class="card col-xs-2 product-box">
                                <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect" style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">
                                   
                                
                                <a href="{{ url('prductView') }}/`+title+`" title="`+value.product_name+`" style="display: block;padding: 0px;height: 160px;overflow: hidden;" class="img-hover col-sm-12 padding-zero" href="#" id="209">
                                        <img class="responsive zoomEffect" style="margin: 0 auto;margin: 0 auto;    width: 205px;"  src="{{ asset('upload/product') }}/`+imageLink+`">
                                    </a>
            
            
                                     <div class="col-sm-12 col-xs-12" style="padding:0;background: cornsilk;">
                                         <a href="{{ url('prductView') }}/`+value.slug+`"> 
                                    <span id="productName209" class="col-sm-12 text-center" style="padding: 2px;overflow: hidden;height: 20px;font-size: 12px;display: block;color:#525252;font-weight: bold;">
                                         `+finalTitle+`
                                         </span>
                                             </a>
                                     <span id="productPrice209" class="col-sm-12  col-xs-12 text-center" style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold">
                                     ৳`+value.price+`  <del style="color:red"> `+value.offer_price+`</del>                                             </span>
                                     @if($v_categoryProduct->quantity > 0)
                                      <span class="col-sm-6  col-xs-2 text-center" style="">
                                  
                                   
                                
                                      <a href="{{ url('order-now') }}/`+value.id+`"  style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                          Order
                                       </a>
        
                                    </span>
                                   
                                     <span onclick="ProductAddTwoCart(209)" data-id="`+value.id+`"  class="addTocartItems product-fly  col-sm-6  col-xs-2 text-center" >
                                Add To Cart
                                    </span> 
                                    @else
                                    <span class=" product-fly  col-sm-6  col-xs-2 text-center" >
                                Stock Out
                                    </span>
                                    @endif
                                    
                                        </div>
                                    
                                    
                                </div>
                            </div>`;

                    });
                    $(".product-list").append(_html);
                    // Change Load More When No Further result
                    var _totalCurrentResult=$(".product-box").length;
                    var _totalResult=parseInt($(".load-more").attr('data-totalResult'));
                    console.log(_totalCurrentResult);
                    console.log(_totalResult);
                    if(_totalCurrentResult==_totalResult){
                        $(".load-more").remove();
                    }else{
                        $(".load-more").html('Load More');
                    }
                }
            });
        });
    });
</script>
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
 @endsection


