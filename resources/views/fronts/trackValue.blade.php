@extends('fronts.master')


@section('content')



<div class=" register">
   <div class="row">
       
       <div class="col-md-8 offset-2 register-right" id="seller_it">

          
          
           <div class="tab-content" id="myTabContent">
          
                    </div>
                    <div class="jumbotron">
                        @if($trackingOrder == '')
                        There Are No Data HEre Sorry !
                        @elseif($trackingOrder)
                     <strong> <h4>You Order Status <span class="badge badge-danger">{{ $trackingOrder->trackingProduct }}</span></h4></strong>
                        @endif

                          </div>
                        
                     
                       </div>

                   </div>
               </div>
             
           </div>
     

</div>


<div class="clear"></div>

@endsection
@section('js')

 <script>
  $(document).on('click', '#trackingProduct', function(){
     var trackingProductValue = $('#trackingProductValue').val();
     window.location.href="{{ url('/tracking-product-value') }}"+"/"+trackingProductValue;
// alert(trackingProductValue);
  }); 

 </script>
@endsection

