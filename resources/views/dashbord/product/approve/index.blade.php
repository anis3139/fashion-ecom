
@extends('dashbord.master')

@section('title')
   | All Category
@endsection
 @push('css')
 <link rel="stylesheet" href="{{asset('/')}}dashbord/editor.css">
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
        <table class="table table-striped">
      <thead class="thead-dark ">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Price</th>
          <th scope="col">Seller Name</th>
          <th scope="col">Product Image</th>
          <th scope="col">Quantity</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
        <tbody>
          @foreach($approveProduct as $key=> $v_allproduct)
          <tr>
            <th scope="row">{{ $key+1 }}</th>
            <th scope="row">{{ $v_allproduct->product_name }}</th>
            <th scope="row">{{ $v_allproduct->price }}</th>
            <th scope="row">{{ $v_allproduct->sellerName }}</th>
            <td>
              <img src="{{ asset('upload/product') }}/{{ $v_allproduct->image }}" alt="" width="80px" height="30px">
           
            </td>
            <td>{{ $v_allproduct->quantity }}</td>
 
            <td>
                 @if($v_allproduct->status == 0)  
                <form action="{{ url('/productapprove') }}" method="POST" style="display: inline-block;">
                          @csrf
                           <input type="hidden" name="status" value="1">
                           <input type="hidden" name="product_id" value="{{ $v_allproduct->id }}">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                        </button>
                    </form>
                @endif
          {{--     <a href="{{ url('productAttr') }}/{{ $v_allproduct->id }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
              </a> 
               <button data-id="{{ $v_allproduct->id }}" class="itemDelete btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
              </button> --}}
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
<script>
      $(document).ready(function() {
        $("#txtEditor").Editor();
      });
    </script>
<script src="{{asset('/')}}dashbord/editor.js"></script>


<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
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

  