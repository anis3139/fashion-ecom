
@extends('dashbord.master')

@section('title')
   | All Category
@endsection
 @push('css')
  <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
  {{-- <link rel="stylesheet" href="{{asset('/')}}dashbord/adminlte.min.css"> --}}
 @endpush

@section('content')
   <!-- Left side column. contains the logo and sidebar -->
   @section('das_title')

@endsection
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
<div class="container" id="order_list">
<div class="row">
  <div class="col-12">
    <div class="card">
            
            <div class="card-body">
              <div class="card-header">
              <h4 class="card-title text-center">{{ $date }} Sells Information</h4>
            </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
               <th scope="col">#</th>
          <th scope="col">Invoice Name</th>
          <th scope="col">Grand Total</th>
          <th scope="col">Payment Type</th>
          <th scope="col">Payment Status</th>
                </tr>
                </thead>
              <tbody>
                   @foreach($singleDaySell as $key=> $v_singleDaySell)
           <tr>
             <td>{{ $key+1 }}</td>
             <td>{{ $v_singleDaySell->invoice }}</td>
             <td>{{ $v_singleDaySell->grandTotal }}</td>
             <td>
                 @if($v_singleDaySell->payment == 1)
               <h5><span class="badge badge-primary">Cash On Delivery</span></h5>
              @elseif($v_singleDaySell->payment == 2)
               <span class="badge badge-primary">Pay with Bkash</span>
              
              @endif
             </td>
             <td>  @if($v_singleDaySell->status == 1)
               <h5><span class="badge badge-primary">Payment Complate</span></h5>
              @elseif($v_singleDaySell->status == 0)
               <h5><span class="badge badge-danger">Pandding</span></h5>
              
              @endif</td>
           </tr>
           @endforeach
              </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
  </div>
</div>
</div>

  
    
  
 
  
@endsection
@push('js')

<script src="{{asset('/')}}dashbord/jquery.dataTables.js"></script>
<script src="{{asset('/')}}dashbord/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}dashbord/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/')}}dashbord/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script>
   $('.datepicker').datepicker({
    format: 'yyyy/mm/dd',
    startDate: '-3d'
});
    </script>





  <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>
<script>
$( document ).ready(function() {

$(document).on('click', '.itemDelete', function(){
 // $(".itemDelete").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");

Swal.fire({
  title: 'Are you sure?',
  text: "You want to be Deleted this product!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
         $.ajax(
            {
                url: "/productDelete/"+id,
                type: 'GET',
                data: {
                    "id": id,
                    "_token": token,
                },
                  success: function (response) {
                           Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                            )
               $('.table').load(location.href + ' .table');
                // location.reload();

                    },
                    error: function (response) {
                      Swal.fire(
                              'oops..!',
                              'Something want wrong !.',
                              'info'
                            )
                    }
            });
         }
      });
    });
});

</script>
@endpush

  