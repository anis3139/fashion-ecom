@extends('fronts.master')


@section('content')



<div class=" register">
   <div class="row">
       
       <div class="col-md-6 offset-3 register-right" id="seller_it">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
       <form action="{{url ('/ucomplaint')}}" method="post">
        @csrf
           <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                   <h3 class="register-heading">মতামত/অভিযোগ</h3>
                   <div class="row register-form">
                       <div class="col-md-12 col-sm-12">
                        <form>
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder=" বুকিং কোড" name="code" />
                           </div>
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="নাম" name="name" />
                           </div>
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="ফোন নাম্বার" name="phone_nu" />
                           </div>
                           
                           <div class="form-group">
                               <input type="text" class="form-control"  placeholder="মতামত/অভিযোগ" name="complaint" />
                           </div>
                        
                     
                           <input type="submit" class="btnRegister"  value="সেভ করুন"/>
                       </div>
                   </div>
               </div>
             
           </div>
        </form>
       </div>
   </div>

</div>


<div class="clear"></div>

@endsection

