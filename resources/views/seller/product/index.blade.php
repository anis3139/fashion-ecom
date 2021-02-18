@extends('seller.master')
 @push('css')
  <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
  {{-- <link rel="stylesheet" href="{{asset('/')}}dashbord/adminlte.min.css"> --}}
 @endpush
@section('content')
<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> 
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
               <th scope="col">#</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Price</th>
          <th scope="col">Product Quantity</th>
          <th scope="col">Image</th>
          <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
              <tbody>
                @foreach($allproduct as $key=> $v_allproduct)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $v_allproduct->product_name }}</td>
                  <td>{{ $v_allproduct->price }}</td>
                  <td>{{ $v_allproduct->quantity }}</td>
                  <td> <img src="{{ asset('upload/product') }}/{{ $v_allproduct->image }}" alt="" width="80px" height="30px"></td>
                    <td>
              <a href="{{ url('sellerProductAttr') }}/{{ $v_allproduct->id }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>

              </a> 
             <a href="{{ url('sellerProductEdit') }}/{{ $v_allproduct->id }}" class="btn btn-primary"><i class="far fa-edit"></i>

              </a> 
               <button data-id="{{ $v_allproduct->id }}" class="itemDelete btn btn-danger"><i class="fas fa-trash-alt"></i>
              </button>
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
                url: "/sellerProductDelete/"+id,
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

