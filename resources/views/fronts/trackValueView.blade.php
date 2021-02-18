@extends('fronts.master')


@section('content')



<div class=" register">
   <div class="row">
       
       <div class="col-md-8 offset-2 register-right" id="seller_it">

           
     <div class="container">
      @if(isset($getOrder))
        
      <h4 class="text-center"> User Order details </h4>
      <br>
      <br>
      <hr>
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>Order Tracking</th>
                  <th>Grand Total</th>
                  <th>Order Status</th>
              </tr>
          </thead>
          <tbody>
              @foreach($getOrder as $user)
              <tr>
                <td>
                    @if(empty($user->trackingProduct))
                      <p>Order Processing</p>
                    @else
                    {{$user->trackingProduct}}
                    @endif
                </td>
                <td>{{$user->grandTotal}}</td>
                <td>
                  @if($user->status == 1)
                  <span class="badge badge-primary"> Order Complete Order Pandding</span>
                  @elseif($user->status == 3)
                   <span class="badge badge-info">Order Comfram</span>
                  @else
                   <span class="badge badge-info">Order Panding</span>
                   @endif
                </td>
              </tr>
              @endforeach
          </tbody>
      </table>
      @endif
  </div>
                          
                          </div>
                        
                     
                       </div>

                   </div>
               </div>
             
           </div>
     

</div>


<div class="clear"></div>

@endsection
{{-- @section('js')
 <script>
  $(document).on('click', '#trackingProduct', function(){
     var trackingProductValue = $('#trackingProductValue').val();
     window.location.href="{{ url('/tracking-product-value') }}"+"/"+trackingProductValue;
// alert(trackingProductValue);
  }); 
 </script>
@endsection --}}


