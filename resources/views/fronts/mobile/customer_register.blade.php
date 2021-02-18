@extends('fronts.master')


@section('content')



<div class="container mt-5" id="register">
   <div class="row">
      
<div class="col-md-6">
        <div class="container">
             
                <h6 class="text-center font-weight-bold py-2 text-success" style="background: #FFE7C7;"><i class="fas fa-user"></i> User Inpormation</h6>
 
                   <div id="user_from">
 
                   <?php

                   $total = 0;
                   ?>
                    @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach
                   <form action="{{ url('/quickOrderSave') }}" method="POST" >
                    @csrf
                         <div class="form-group">
                          <input type="text" class="form-control" name="name" placeholder="Type Your Name" required="">
                         </div>
                         <div class="form-group">
                          <input type="text" name="number" class="form-control" placeholder="Type Your Number *" value=""  required=""/>
                         </div>
                         <div class="form-group">
                          <input type="text" name="zila" class="form-control" placeholder="Type Your District *"  required=""/>
                         </div>
                         <div class="form-group">
                          <input type="text" name="address" class="form-control" placeholder="Type Your Address *" value="" required="" />
                         </div>
                         <input type="hidden" value="{{$total}}" name="grandTotalSave">
                        <input type="hidden"  name="month" value="{{ date('F') }}">
                        <input type="hidden"  name="year" value="{{ date('Y') }}">
                        <input type="hidden"  name="date" value="{{ date('Y-m-d') }}">
                         
                         <button type="submit" class="btn btn-block btn-small" style="background: #FF8E27;
                         color: #fff;">Confirm order</button>
                    </form>
             
          </div>
       </div>
</div>
                                   
       <div class="col-md-6 register-right" id="customer_id">
           @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

              @if (count($errors) > 0)
                 <div class = "alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                 </div>
              @endif
  
          
      
           <div class="tab-content" id="myTabContent">
              <h6 class="text-center font-weight-bold  py-2 text-success" style="background: #FFE7C7;">Registation/Login here...</h6>
              <p>
                  <a href="{{url('/login')}}" class="btn btn-primary"  >Login here...</a>
                  <button class="btn btn-primary " type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Register for order</button>
                 
                
                </p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                      <div class="card card-body">
                         <h6 class="text-center font-weight-bold  py-2 text-success" style="background: #FFE7C7;">Registation</h6>
                        <form action="{{ url('/customerSaveForm') }}" method="POST">
                     <div class=" register-form">
                            @csrf
                        
                          {{-- form start --}}
                          <div class="form-group">
                                  <input type="text" class="form-control" name="name" placeholder="Type Your Name">
                                </div>
                             <div class="form-group">
                                 <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                             </div>
                 
                      
                             <div class="form-group">
                                 <input type="email" name="email" class="form-control" placeholder="Type Your Email *" value="" />
                             </div> 
                             <div class="form-group">
                                 <input type="text" name="number" class="form-control" placeholder="Type Your Number *" value="" />
                             </div> 
                             <div class="form-group">
                                 <input type="text" name="address" class="form-control" placeholder="Type Your Address *" value="" />
                             </div>
                              <div class="form-group">
                                <label for="">Gender Select :</label>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" checked>
                                  <label class="form-check-label" for="exampleRadios1">
                                    Male
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                                  <label class="form-check-label" for="exampleRadios2">
                                    Female
                                  </label>
                                </div> 
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="other">
                                  <label class="form-check-label" for="exampleRadios2">
                                    Other
                                  </label>
                                </div>
                              </div>    
                             <button type="submit"  name="shipping_btn" value="shipping_btn" class="btn btn-block btn-small" style="background: #FF8E27;
                             color: #fff;" >Register </button>
                         
                     </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                      <div class="card card-body">
                          <h6 class="mt-2"></h6>If you hav a accoutn? <a href="{{url('/login')}}">Login here</a></h6>
                      </div>
                    </div>
                  </div>
                </div>
                   
               {{-- <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                   <h3  class="register-heading">Login
                   </h3>
                       @if($errors->all())
                                    <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                @endif
                      <form method="POST" action="{{ route('login') }}" class="form-horizontal m-t-20" id="loginform">
                         @csrf
                   <div class="row register-form">
                       <div class="col-md-9 offset-2">

                           <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg" name="email" placeholder="Email Address here" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                         <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-lg" name="password" value="12345678" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                           <input type="submit" class="btnRegister"  value="Login"/>
                       </div>
                   </div>
                      </form>
               </div> --}}

             
           </div>
       </div>
       <div class="col-md-12">
           
                    <div class="card mt-5">
                        <h5 class="text-center pt-1">Product Information</h5>
                        <div class="card-body">
                             <div class="table-responsive text-center">
                                    <table class="table table-striped table-hover table-sm">
                                      <thead >
                                        <tr>
                                          <th scope="col">Sl No:</th>
                                          <th scope="col">Product Name</th>
                                          <th scope="col">Image</th>
                                          <th scope="col">Price</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                 <?php
                                 $total = 0;
                                 $productCount = 1;
                                    ?>
                             @if(session('cart'))
                              @foreach(session('cart') as $id => $details)
                              <?php $total += $details['price'] * $details['quantity'] ?>
                                        <tr>
                                             <td>
                                                {{ $productCount++ }}
                                            </td>
                                            <td>
                                                {{ $details['name'] }}
                                            </td>
                                            <td>
                                                 <img src="{{ asset('upload/product') }}/{{  $details['image']}}" alt=" " class="img-responsive" width="80px" height="70px"></a>
                                            </td>
                                            <td>
                                                {{ $details['price'] }}
                                            </td>
                                        </tr>
                                @endforeach
                             @endif
                                      </tbody>
                                    </table>
                                </div> 
                        </div>
                    </div>
       </div>
   </div>

</div>


<div class="clear"></div>

@endsection

