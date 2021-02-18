@extends('fronts.master')


@section('content')
<!-- banner -->
<div class="inner_page-banner one-img">
</div>
<!--//banner -->

<!-- //short-->
<!--show Now-->
<section class="contact py-lg-4 py-md-3 py-sm-3 py-3" id="products">
   <div class="container py-lg-5 py-md-4 py-sm-4 py-3" id="product_cart">

      <h4 class="bg-warning">All Product</h4>
       <div class="row">

         <div class="left-ads-display col-lg-12" id="product_id">
         {{--   <div class="row">
               @foreach($allProduct-> take(30) as $v_allProduct)
               <a href="{{ url('prductView') }}/{{ $v_allProduct->slug }}">

               <div class=" col product-men women_two" title="{{$v_allProduct->product_name}}">
                  <div class="product-toys-info">
                     <div class="men-pro-item">
                        <div class="men-thumb-item">

                           <img src="{{ asset('upload/product') }}/{{  $v_allProduct->image }}" class="img-thumbnail " alt="">
                           <div class="men-cart-pro">
                              <div class="inner-men-cart-pro">
                                
                              </div>
                           </div>

                        </div>
                        <div class="item-info-product">
                           <div class="info-product-price">
                              <div class="grid_meta">
                                 <div class="grid-price mt-2">
                                    <span class="money text-center ">৳ {{  $v_allProduct->price }}</span>
                                 </div>
                                 <div class="product_price">
                                    <h4>
                                       <a href="{{ url('prductView') }}/{{ $v_allProduct->slug }}"> {{ str_limit($v_allProduct->product_name, 15)   }} </a>

                                    </h4>

                                 </div>

                              </div>
                             
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div> --}}
            <div class="row">
               @foreach($allProduct-> take(30) as $v_allProduct)
                           
               @if($v_allProduct->status == 1)
            <div class="card col-xs-2  " title="{{$v_allProduct->product_name}}">
                       <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect" style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">
                          
                       
                       <a href="{{ url('prductView') }}/{{ $v_allProduct->slug }}" style="display: block;padding: 0px;height: 160px;overflow: hidden;" class="img-hover col-sm-12 padding-zero" href="#" id="209">
                               <img class="img-responsive zoomEffect" style="margin: 0 auto;padding:5px;width: 178px;"  src="{{ asset('upload/product') }}/{{ $v_allProduct->image  }}">
                           </a>
   
   
                            <div class="col-sm-12 col-xs-12" style="padding:0;background: cornsilk;">
                                 <a href="{{ url('prductView') }}/{{ $v_allProduct->slug }}"> 
                           <span id="productName209" class="col-sm-12 text-center" style="padding: 2px;overflow: hidden;height: 20px;font-size: 12px;display: block;color:#525252;font-weight: bold;">
                                {{ str_limit( $v_allProduct->product_name, 20) }}</span>
                                </a>
   
                            <span id="productPrice209" class="col-sm-12  col-xs-12 text-center" style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold">
                                {{ $v_allProduct->offer_price }} <del style="color:red"> {{ $v_allProduct->price }}</del>                                             </span>
                            @if($v_allProduct->quantity > 0)
                             <span class="col-sm-6  col-xs-6 text-center" >
                         
                          
                              <a href="{{ url('order-now') }}/{{ $v_allProduct->id }}"  style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff;    width: 73px;">Order </a>
                               
                          
                           </span>
                           <input type="hidden" value="select" id="productAttrValue">
                            <span onclick="ProductAddTwoCart(209)" data-id="{{ $v_allProduct->id }}" class="itemDelete product-fly  col-sm-6  col-xs-6 text-center" >
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
</section>
<!-- //show Now-->


<!-- Page Praganation-->

   <div class="container " id="praganation">
      <div class="row">
         {{ $allProduct->links() }}
      </div>
   </div>



<!-- Page Praganation end-->

@push('js')
<script src="{{asset('/')}}dashbord/sweetalert2.js"></script>
<script>
$( document ).ready(function() {

  // $('#addForm').on('submit', function(e){
  //       e.preventDefault();
        $(document).on('click', '.itemDelete', function(e){
            e.preventDefault();
           
             var id = $(this).data("id");
             var productAttrValue = $("#productAttrValue").val();
             var token = $("meta[name='csrf-token']").attr("content");
            
             // alert(productAttrValue);
           $.ajax({
                            type:"GET",
                            url:"/cartSave"+"/"+id+"/"+productAttrValue,
                            data:{
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