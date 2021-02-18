{{-- @extends('layouts.app') --}}

@extends('dashbord.master')

@section('title')
   | Add Banner
@endsection
@section('das_title')
    Add Banner
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
     <table class="table table-striped">
      <thead class="thead-dark ">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Title</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
        <tbody>
          @foreach($allbanner as $key=> $v_allbanner)
          <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>
              <img src="{{ asset('upload/banner') }}/{{ $v_allbanner->image }}" alt="" width="80px" height="30px">
           
            </td>
            <td>{{ $v_allbanner->title }}</td>
            <td>{{ $v_allbanner->status }}</td>
            <td>
              <button data-id="{{ $v_allbanner->id }}" class="itemDelete btn btn-danger">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-4">
      <div class="card">
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
        <div class="card-body">
             <form method="POST" action="{{ url('/bannerSave') }}" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
          <label for="exampleInputCates">Banner</label>
          <input type="file" name="image" class="form-control" id="exampleInputCates" aria-describedby="emailHelp" placeholder="Enter Banner name">
        </div>
        <div class="form-group">
          <label for="exampleInputSubCates">Banner Title</label>
          <input type="text" name="title" class="form-control" id="exampleInputSubCates" placeholder="Entry sub Banner">
        </div>
        <div class="form-group">
          <label for="exampleInputSubCates">Banner Link </label>
          <input type="text" name="link" class="form-control" id="exampleInputSubCates" placeholder="Entry Manu name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


  @push('js')
  <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>
    <script>
 $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   $('body').on('click', '#editCategory', function () {
    var id = $(this).data("id");
         $.get("categoryEdit/"+id, function (data) {
        // console.log(data)
         $('#category_id').val(data.id);
         $('#categoryName').val(data.category_name);
         // $('#productCategory').val(data.category_id);
         // $('#productPrice').val(data.product_price);
         // $('#productNumber').val(data.product_number);
      });
   }); 
});

  $('#editForm').on('submit', function(){
     
        var id = $('#category_id').val();
             $.ajax({
                    type:"PUT",
                    url:"/categoryUpdate/"+id,
                    data: $('#editForm').serialize(),
                    success: function (response) {
                      alert(response);
                     
                   //   $('#editModal').modal('hide');
                   // $('.table').load(location.href + ' .table');
                    },
                    error: function (error) {
                        console.log(error);
              
                    }
            });
   });
 </script>
   <script>

$( document ).ready(function() {

$(document).on('click', '.itemDelete', function(){
 // $(".itemDelete").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
         $.ajax(
            {
                url: "bannerDelete/"+id,
                type: 'GET',
                data: {
                    "id": id,
                    "_token": token,
                },
                  success: function (response) {
                    console.log(response);
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