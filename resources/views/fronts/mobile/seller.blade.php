@extends('fronts.master')


@section('content')



<div class=" register" id="seller_login">
   <div class="row">
       
       <div class="col-md-6 offset-3 register-right" id="seller_it">

          
          
           <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                   <h3 class="register-heading">Seller Register</h3>
                   <div class="row register-form">
                       <div class="col-md-12 col-sm-12">
                        <form>
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder=" Name *" value="" />
                           </div>
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="Enter your Email/number *" value="" />
                           </div>
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="Entur you websit link *" value="" />
                           </div>
                           
                           <div class="form-group">
                               <input type="password" class="form-control"  placeholder="Password *" value="" />
                           </div>
                           <div class="form-group">
                               <input type="password" class="form-control"  placeholder="Confirm Password *" value="" />
                           </div>
                     
                           <input type="submit" class="btnRegister"  value="Register"/>
                       </div>
                   </div>
               </div>
             
           </div>
       </div>
   </div>

</div>


<div class="clear"></div>

@endsection

