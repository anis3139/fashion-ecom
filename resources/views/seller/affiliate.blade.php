@extends('seller.master')

@section('content')

        <!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form id="affiliateForm" method="POST">
            @csrf
         <div class="row">
            <div class="col-5">

              <?php
              $id = Auth::user()->id;
              $userName = App\seller_info::where('user_id', $id)->first();
              ?>
         <div class="form-group">
    <label for="formGroupExampleInput">Enter Affiliated Product</label>
    <input type="text" class="form-control" id="productLink" placeholder="Example input" value="">
  </div>
          </div>       
          <div class="col-5">
            <div class="form-group">
              <label for="formGroupExampleInput">Copy and Sells</label>
              <input type="text" name="affiliateLink" class="form-control" id="productAffiLink" placeholder="Example input">
            </div>
            <input type="hidden" id="amitumi" name="username" value="{{  $userName->userName }}">
          </div>
          <div class="col-2">
            <div class="form-group" style="margin-top: 30px;">
             <label for="formGroupExampleInput"></label>
            <button id="addAffilate" data-id="{{ $userName->userName }}" class="btn btn-primary">Submit</button>
            </div>
          </div>
         </div>
         </form>
        </div>
      </div>
    </div>
    <div class="col-md-12" style="margin-top:50px">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col" colspan="1">#</th>
                <th scope="col">Link</th>
                <th scope="col">Sales Count</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($getLinkAll as $key => $v_getLinkAll)
              <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $v_getLinkAll->affiliateLink }}</td>
                <td>{{ $v_getLinkAll->saleCount }}</td>
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
