@extends('fronts.master')
@section('content')



<div class="container" >
    <div class="row">
            <div class="card text-center offset-4  my-5" style="width: 25rem;" id="bikas_card">
                    <img src="{{asset('/')}}front/images/new_biksa.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      
                      <div class="card-desc">
                      <img src="{{asset('/')}}front/images/logo34.png" alt="">
                      </div>
                              <form action="{{ url('savePayment') }}" method="POST">
                                @csrf
                      <div class="bikas_account">
                          <p><strong>
                              Your bikas Account Number</strong></p>
                                <div class="form-group text-center" id="bcask_button">
                                <input type="text"
                                  class="form-control" name="trxID" id="" aria-describedby="helpId" placeholder="TrxID">
                                <small id="helpId" class="form-text ">By clicking Prosid you are agree to item and condiation</small>
                              </div>
                              <input type="hidden" name="invoice" value="{{ $invoice }}">
                      </div>
                      <div class="button-group">
                           <button class="btn btn-primary" type="submit">Procced</button>
                      </div>
                              </form>
                     
                    </div>
                  </div>
    </div>
</div>






@endsection









      
