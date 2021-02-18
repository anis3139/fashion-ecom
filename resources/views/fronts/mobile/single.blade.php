@extends('fronts.master')


@section('content')

<!-- product order header top -->
@push('css')
<style>

</style>
@endpush
{{-- <div class="container" id="product_location">
    <div class="row">
        <div class="col-md-7">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb font-weight-bold">
                    <li class="breadcrumb-item"><a href="#">Bed sheet </a></li>
                    <li class="breadcrumb-item "><a href="#">4 ps </a></li>
                    <li class="breadcrumb-item active" aria-current="page">3 ps</li>
                </ol>
            </nav>

        </div>
        <div class="col-md-5">

        </div>
    </div>

</div> --}}

<!-- product order header top -->

<!-- product image and title -->
<?php
$thirdCategory = $singleProduct->thirdCategory_id;
$thirdCategoryFirst = App\thirdCategory::findOrfail($thirdCategory);

?>
<!-- product page header -->
<div class="container" id="product_dec">
    <div class="row">
        <h4 class=" col-md-12 py-2 text-white">
           {{ $thirdCategoryFirst->thirdCategoryName }}
        </h4>
    </div>
</div>




<div class="container" id="product_zoom">
    <div class="row">
        <div class="col-md-6">
                 
                  <div class="exzoom" id="exzoom">
                    <!-- Images -->
                    <div class="exzoom_img_box">
                        
                      <ul class='exzoom_img_ul'>
                      @if($images)
               @foreach($images as $img)
                        <li>
                            <img src="{{ asset('upload/ami') }}/{{ $img }}" xoriginal="./images/three-pcs/threepic.jpg"/>
                        </li>
             @endforeach
                    @endif
                      </ul>
                    </div>
                    <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                    <div class="exzoom_nav"></div>
                    <!-- Nav Buttons -->
                    <p class="exzoom_btn">
                        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                    </p>
                  </div>
                  </div>
     
        <div class="col-md-6" id="order_content">
            <div class="row">
                <div class="col-md-12">
                    <h5> {{ $singleProduct->product_name }} </h5>
                    <h6> Product Price:৳  {{ $singleProduct->price }}</h6>
                    <p>Product Code : {{ $singleProduct->product_code }} </p>
                    
                   
                </div>
<?php
$productQuantity = $singleProduct->quantity;
$ami = 1;

if($productQuantity > 1){
    $ami = "ami boro";
}elseif($productQuantity < 1){
     $ami = "ami boro";
}else{
     $ami = "ami kew nah";
}

?>
        
            <form class="mt-5">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $singleProduct->id }}">
                    <input type="hidden" name="promote" value="{{ request()->reff }}">
               
                <div class="col-md-6">
                    @if($productQuantity > 0)
            <button class="itemDelete btn btn-danger" data-id="{{ $singleProduct->id }}">Add to cart </button>
 

            <a href="{{ url('/cart') }}" class="btn btn-warning" style="width: 231px; margin-top: 10px;">Order Now</a> <br>
                </div>
                @else
               <button class="btn btn-danger" ">Stoct Out</button> 
                @endif
               
                
                
                
                <?php
                $proID = $singleProduct->id;
                $productAttrExists = App\productAttr::where('product_id', $proID)->exists();
                $productAttr = App\productAttr::where('product_id', $proID)->get();

            ?>
                    
                        
            
        <div class="row">
                <div class="col-md-6 mt-5">
                   
                        @if(isset($productAttrExists))
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Select Size</label>
                                </div>

                                <select class="custom-select" id="productAttrValue">
                                        <option class="form-control" value="Select">Select</option>

                                        @foreach($productAttr as $v_productAttr)
                                        <option class="form-control" value="{{$v_productAttr->sizeName}}">{{$v_productAttr->sizeName}}</option>
                                        @endforeach
                                </select>
                              </div>
                              @endif
                </div>
            </form>
            <div class="col-md-6">
                    <div class="center">

                            <div class="input-group input-group-prepend" role="group" aria-label="Basic example" id="input_count">
                                <span class="input-group-btn">
                                    <button type="button" id="subtract" class="btn btn-danger btn-number">
                                        <span class="glyphicon glyphicon-minus">-</span>
                                    </button>
                                </span>
                                <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100" id="counter">
                                <span class="input-group-btn">
                                    <button type="button" id="add" class="btn btn-success btn-number">
                                        <span class="glyphicon glyphicon-plus">+</span>
                                    </button>
                                </span>
                            </div>
                            <p></p>
                        </div>
            </div>
          
        </div>
            
            

            </div>
            <div class="row" id="prodcut_p_contant">
                <div id="product_img">
                    <img src="{{asset('/')}}front/./images/call-now (1).gif" alt="">

                </div>
                <div id="contract">
                    <h4>01797587488</h4>
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
              
                <li class="fas fa-chevron-right">{!! $singleProduct->details !!}  </li>
              
            </ul>
        </div>
        <div class="col-md-6 padding_0" >
            <h4 class="bg-warning text-light py-2">
                <i class="fas fa-chart-bar" style="color: #fff"></i>
                <span class="a-icon-alt">5 stars</span>
                Review
            </h4>
            
            <div class="col-md-12" style="overflow: scroll;height: 300px;" >
                @auth
                <div class="widget-area no-padding blank">
                    <div class="status-upload">
                    <form action="{{url('/comments')}}" method="POST">
                        @csrf
                    <input type="hidden" name="userName" value="{{AUTH::user()->id}}">
                            <textarea placeholder="What are you doing right now?" name='des'></textarea>
                            
                            <button type="submit" class="btn btn-success green"> Comment</button>
                        </form>
                    </div><!-- Status Upload  -->
                </div><!-- Widget Area -->
            @endauth
            
                
                
                  
                <div id="commen col-md-12">

                
                      <div class="comment-post" style='display: inline-block;'>
                            @foreach($comment as $key => $value)

                            {{-- @foreach($ami as $key => $user)

                            @endforeach --}}
                            <div class="comment-user"><i class="fa fa-user"> </i></div>
                            <?php
                            $id =$value->userName;
                            $userName = App\User::where('id', $id)->first();
                            ?>
                         
                      
                        <p>
                         
                               @if(isset($userName))
                               {{$userName->name}}
                               @endif

                        </p>
                        <p>
                          {{ $value->des}}
                        </p>
                        @endforeach

                      </div>
                    </div>
                </div>
                
             
            
        </div>
    </div>
</div>

<!-- produt desctiption and review end -->

<!-- produt desctiption and review start -->

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
                <li><i class="fas fa-chevron-right"></i>বিঃদ্রঃ- ছবি এবং বর্ণনার সাথে পণ্যের মিল থাকা সত্যেও আপনি পণ্য গ্রহন করতে না চাইলে ডেলিভারি চার্জ ৬০ টাকা ডেলিভারি ম্যানকে প্রদান করতে বাধ্য থাকিবেন।</li>
            </ul>
        </div>
        <div class="col-md-6 padding_0" id="review">
            <h4 class=" text-light py-2">
                <i class="fas fa-chart-bar" style="color: #fff"></i>

            </h4>
            <ul class="padding_0">
                <h5> আপনি ঢাকা সিটির বাহিরে হলেঃ-</h5>
                <li><i class="fas fa-chevron-right"></i>কন্ডিশন বুকিং অন কুরিয়ার সার্ভিস (জননী কুরিয়ার অথবা এস এ পরিবহন কুরিয়ার সার্ভিস) এ নিতে হবে।</li>
                <li><i class="fas fa-chevron-right"></i>কুরিয়ার সার্ভিস চার্জ ১০০ টাকা বিকাশে অগ্রিম প্রদান করতে হবে।</li>
                <li><i class="fas fa-chevron-right"></i>পণ্যের টাকা ডেলিভারি ম্যানের কাছে প্রদান করবেন।</li>
                <li><i class="fas fa-chevron-right"></i>কুরিয়ার চার্জ ১০০ টাকা বিকাশ করার পর ৪৮ ঘন্টার ভিতর কুরিয়ার হতে পণ্য গ্রহন করতে হবে এবং পণ্যের টাকা কুরিয়ার অফিসে প্রদান করতে হবে।</li>
                <li><i class="fas fa-chevron-right"></i>বিঃদ্রঃ- ছবি এবং বর্ণনার সাথে পণ্যের মিল থাকা সত্যেও আপনি পণ্য গ্রহন করতে না চাইলে কুরিয়ার চার্জ ১০০ টাকা কুরিয়ার অফিসে প্রদান করে পণ্য আমাদের ঠিকানায় রিটার্ন করবেন। আমরা প্রয়োজনীয় ব্যবস্থা নিব।</li>

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
        <!-- product-item-2 -->
        <div class="col-md-12 padding_0" id="product_items_1">
 <?php
 $cat_third_id = $singleProduct->thirdCategory_id;
 $randomProduct = App\product::where('thirdCategory_id', $cat_third_id)->inRandomOrder()->take(6)->get();
 ?>

            <div class="container">
                <div class="row">
                    @foreach($randomProduct as $v_randomProduct)
                    
                    <div class="card col-xs-2  " style="padding: 5px;height:251px; width:178px;">
                        <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect" style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">
                           
                        
                        <a href="{{ url('prductView') }}/{{ $v_randomProduct->slug }}" style="display: block;padding: 0px;height: 160px;overflow: hidden;" class="img-hover col-sm-12 padding-zero" href="#" id="209">
                                <img class="responsive zoomEffect" style="margin: 0 auto;padding:5px ;    width: 168px;"  src="{{ asset('upload/product') }}/{{ $v_randomProduct->image  }}">
                            </a>
    
    
                             <div class="col-sm-12 col-xs-12" style="padding:0;background: cornsilk;">
                            <span id="productName209" class="col-sm-12 text-center" style="padding: 2px;overflow: hidden;height: 20px;font-size: 12px;display: block;color:#525252;font-weight: bold;"> {{ str_limit( $v_randomProduct->product_name, 20) }}</span>
    
                             <span id="productPrice209" class="col-sm-12  col-xs-12 text-center" style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold"> ৳ {{ $v_randomProduct->price }}                                             </span>
                            
                              <span class="col-sm-6  col-xs-2 text-center" style="padding: 0;display: block;height: 30px;line-height:28px;font-size: 12px;font-weight: bold;background: #ff6a00; float: right;">
                          
                           
                        
                              <a href="{{ url('prductView') }}/{{ $v_randomProduct->slug }}"  style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">View </a>
                           
                                
                           
                            </span>
                            
                             <span onclick="ProductAddTwoCart(209)" class="product-fly  col-sm-6  col-xs-2 text-center" style="cursor:pointer;padding: 0;display: block;height: 30px;line-height:28px;color: #fff;font-size: 12px;font-weight: bold;background: #FF9400;">
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
        <!-- product-item-2 -->
        <div class="col-md-12 padding_0" id="product_items_1">
 <?php
 $cat_third_id = $singleProduct->thirdCategory_id;
 $randomProduct = App\product::where('thirdCategory_id', $cat_third_id)->inRandomOrder()->take(6)->get();
 ?>

            <div class="container">
                <div class="row">
                    @foreach($randomProduct as $v_randomProduct)
                    
                    <div class="card col-xs-2  " style="padding: 5px;height:251px; width:178px;">
                        <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect" style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">
                           
                        
                        <a href="{{ url('prductView') }}/{{ $v_randomProduct->slug }}" style="display: block;padding: 0px;height: 160px;overflow: hidden;" class="img-hover col-sm-12 padding-zero" href="#" id="209">
                                <img class="responsive zoomEffect" style="margin: 0 auto;padding:5px ;    width: 168px;"  src="{{ asset('upload/product') }}/{{ $v_randomProduct->image  }}">
                            </a>
    
    
                             <div class="col-sm-12 col-xs-12" style="padding:0;background: cornsilk;">
                            <span id="productName209" class="col-sm-12 text-center" style="padding: 2px;overflow: hidden;height: 20px;font-size: 12px;display: block;color:#525252;font-weight: bold;"> {{ str_limit( $v_randomProduct->product_name, 20) }}</span>
    
                             <span id="productPrice209" class="col-sm-12  col-xs-12 text-center" style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold"> ৳ {{ $v_randomProduct->price }}                                            </span>
                            
                              <span class="col-sm-6  col-xs-2 text-center" style="padding: 0;display: block;height: 30px;line-height:28px;font-size: 12px;font-weight: bold;background: #ff6a00; float: right;">
                          
                           
                        
                              <a href="{{ url('prductView') }}/{{ $v_randomProduct->slug }}"  style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">View </a>
                           
                                
                           
                            </span>
                            
                             <span onclick="ProductAddTwoCart(209)" class="product-fly  col-sm-6  col-xs-2 text-center" style="cursor:pointer;padding: 0;display: block;height: 30px;line-height:28px;color: #fff;font-size: 12px;font-weight: bold;background: #FF9400;">
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
$("#add").click(function(){
  counter = counter + 1;
    $("#counter").val(counter);

});

//Subtract
$("#subtract").click(function(){
  counter = counter - 1;
  $("#counter").val(counter);
});


// // Reset
// $("#reset").click(function(){
//   counter = 0;
//   $("#counter").text(counter);
// });


</script>
<script>
$( document ).ready(function() {

  // $('#addForm').on('submit', function(e){
  //       e.preventDefault();
        $(document).on('click', '.itemDelete', function(e){
            e.preventDefault();
           
             var id = $(this).data("id");
             var productAttrValue = $("#productAttrValue").val();
             var token = $("meta[name='csrf-token']").attr("content");
           $.ajax({
                            type:"GET",
                            url:"/cartSave"+"/"+id+"/"+productAttrValue,
                            data:{
                                    "id": id,
                                    "_token": token,
                                },
                            success: function (response) {

                                Swal.fire({
                                  position: 'center',
                                  type: 'success',
                                  title: 'Product Add To Cart Successfully !',
                                  showConfirmButton: false,
                                  timer: 1500
                                })
                             
                               // alert(response)
                               // console.log(response);
                            },
                            error: function (error) {
                                console.log(error);
                              alert("not Add Cart Successfully !")
                            }
                    });


        });
         
    }); 


</script>

<script type="text/javascript">
  
</script>


@endpush

@endsection
