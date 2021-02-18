
@extends('seller.master')
 @push('css')
  <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
  {{-- <link rel="stylesheet" href="{{asset('/')}}dashbord/adminlte.min.css"> --}}
 @endpush
@section('content')


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
    <div class="row">
      <div class="col-6">
        <button data-toggle="modal" data-target="#addproductattr" class="btn btn-primary">Add Size In Product</button>
         <button data-toggle="modal" data-target="#addsize" class="btn btn-primary">Add Size</button>
      </div>
      <!-- Button trigger modal -->


<!-- Modal add size -->
<div class="modal fade" id="addsize" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Size Name :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ url('/sizeNameseller') }}" method="POST">
          @csrf
      <div class="modal-body">
  <div class="form-group">
    <label for="exampleInputEmail1">Add Size</label>
    <input type="text" name="sizeName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Size">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
{{-- end --}}
<!-- Modal add size -->
<div class="modal fade" id="addproductattr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product Attribute :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ url('sellerProductAttrSave') }}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
      <div class="modal-body">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Product Attribute :</label>
    <select name="sizeName" class="form-control" id="exampleFormControlSelect1">

      <option selected="--Product Attribute--" disabled="disabled">--Product Attribute--</option>
      @foreach($allSize as $v_allSize)   
      <option value="{{ $v_allSize->sizeName }}">{{ $v_allSize->sizeName }}</option>
     @endforeach
    </select>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

    </div>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped">
      <thead class="thead-dark ">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Size</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
        <tbody>
        @foreach($productAttr as $key=> $v_productAttr)
        <form action="{{ url('/sellerProductAttrDelete')}}/{{ $v_productAttr->id }}" method="get">
        	@csrf
        <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $v_productAttr->sizeName }}</td>
          <td>
             <button data-id="{{ $v_productAttr->id }}" class="itemDelete btn btn-danger">
             <i class="fas fa-trash-alt"></i>
              </button>
          </td>
        </tr>
        </form>
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

@endpush

  