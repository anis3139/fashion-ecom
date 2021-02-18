
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
<form action="{{ url('productSave') }}" method="post" enctype="multipart/form-data">
  <div class="row">
  @csrf
    <div class="col-md-8">
        <div class="card">
          <div class="card-body">
             <div class="form-group">
    <label for="exampleFormControlTextarea1">Product Details :</label>
    <textarea class="form-control" name="details" id="exampleFormControlTextarea1" style="height:400px !important;" rows="3" placeholder="Write Something About This product.." required=""></textarea>
  </div>
          </div>
        </div>
     </div>
     <div class="col-md-4">
        <div class="card">
          <div class="card-body">
          

  
   <div class="form-group">
    <label for="category_id">Category :</label>
    <select class="form-control" name="category_id" id="category_id">
      <option>--Select Category--</option>
      @foreach($allcategory as $v_allcategory)
      <option value="{{ $v_allcategory->id }}">{{ $v_allcategory->category_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="subCategory_id">Sub Category :</label>
    <select class="form-control" name="subCategory_id" id="subCategory_id">
      <option>--Select SubCategory--</option>
    </select>
  </div>
  <div class="form-group">
    <label for="thirdCategory_id">SubCategory Category :</label>
    <select class="form-control" name="thirdCategory_id" id="thirdCategory_id">
      <option>--Select Sub Category Sub--</option>
   
    </select>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Product Name :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name" name="product_name">
  
  </div> 
   <div class="form-group">
    <label for="exampleInputEmail1">Product Price :</label>
    <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Price">
 
  </div> 
   <div class="form-group">
    <label for="exampleInputEmail1">Offer Price :</label>
    <input type="number" name="offer_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Offer Price">
 
  </div> 
   <div class="form-group">
    <label for="exampleInputEmail1">Product Code :</label>
    <input type="text" name="product_code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Code">
 
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Product Quantity :</label>
    <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Quantity">
 
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Product Image:</label>
    <input type="file" class="form-control" name="image">
  </div> 

  <div class="form-group">
    <label for="exampleFormControlFile1">Product Image Gallery:[<span class="badge badge-primary">Multiple Image</span>]</label>
    <input type="file" class="form-control" name="gallery[]" multiple="">
  </div> 

   <div class="form-group">
    <label for="exampleFormControlFile1">Promoted Product:</label>
    <div class="input-group">
      <div class="input-group-text">
        <input type="checkbox" name="status" value="1" aria-label="Checkbox for following text input">
      </div>
    </div>
  </div>
 
  <button type="submit" class="formsd btn btn-primary">Submit</button>

          </div>
        </div>
     </div>
   </div>
     </form>

</div>
  
    
  
 
  
@endsection
@push('js')
<script>
$(document).ready(function() {
    $('#category_id').change(function(){
      var category_id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
   $.ajax({
        type:'POST',
        url:'/categoryTosub',
        data: {category_id:category_id},
        success: function (data) {
          $('#subCategory_id').html(data);
        }
      });
    });
});

$(document).ready(function() {
    $('#subCategory_id').change(function(){
      var subCategory_id = $(this).val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
   $.ajax({
        type:'POST',
        url:'/subCategoryTothird',
        data: {subCategory_id:subCategory_id},
        success: function (data) {
          // alert(data);
          $('#thirdCategory_id').html(data);
        }
      });
    });
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
                url: "/thirdCategoryDelete/"+id,
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

  