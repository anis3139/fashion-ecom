@extends('seller.master')

@section('content')

        <!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" style="margin-top:50px">
      <div class="card">
        <div class="card-body">
          <div class="card-header text-center">
            <h4>Payment Information</h4>
          </div>
          <?php
          $userId = Auth::user()->id;
          $getUserName = App\seller_info::where('user_id', $userId)->first();
          $userName = $getUserName->userName;
          $payment_seller = App\paymentSeller::where('userName', $userName)->get();
          ?>
          <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col" colspan="1">#</th>
                <th scope="col">Date</th>
                <th scope="col">Month</th>
                <th scope="col">Amount</th>
                <th scope="col">Payment Type</th>
              </tr>
            </thead>
            <tbody>
              @foreach($payment_seller as $key=> $v_payment_seller)
                <tr>
                  <td>
                    {{ $key+1 }}
                  </td>
                  <td>
                    {{ $v_payment_seller->date }}
                  </td>
                  <td>
                    {{ $v_payment_seller->month }}
                  </td>
                  <td>
                    {{ $v_payment_seller->amount }}
                  </td> 
                  <td>
                    {{ $v_payment_seller->payment_type }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        <!-- /.container-fluid -->



    
@endsection

@push('js')

<script src="{{asset('/')}}dashbord/jquery.dataTables.js"></script>
<script src="{{asset('/')}}dashbord/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}dashbord/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/')}}dashbord/demo.js"></script>
<script src="{{asset('/')}}dashbord/editor.js"></script>
<!-- page script -->
<script>
      $(document).ready(function() {
       //  $("#addAffilate").click(function(e){
       //    e.preventDefault();
       //    $.ajaxSetup({
       //        headers: {
       //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       //        }
       //    });
       // var id = $(this).data("id");
       // var insertValue =   $('#productLink').val();
       // var getLink = insertValue+"?reff="+id;
       // var getInsertValue =   $('#productAffiLink').val(getLink);


    $('#affiliateForm').on('submit', function(e){
        e.preventDefault();
        var id = $("#amitumi").val();
          var insertValue =   $('#productLink').val();
       var getLink = insertValue+"?reff="+id;
       var getInsertValue =   $('#productAffiLink').val(getLink);
            $.ajax({
                    type:"POST",
                    url:"/affiliateSave",
                    data: $('#affiliateForm').serialize(),
                    success: function (response) {
                          alert(response);

                     // $('.table').load(location.href + ' .table');

                    },
                    error: function (error) {
                        console.log(error);

                    }
            });
    // });




        });
      });
    </script>

@endpush
