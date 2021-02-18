@extends('dashbord.master')

@section('title')
    | Product Size
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/editor.css">
@endpush

@section('das_title')
    Add Product Size
@endsection

@section('content')

<div class="container" id="order_list">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <button data-toggle="modal" data-target="#addproductattr" class="btn btn-primary">
                        Add size in product
                    </button>
                    <button data-toggle="modal" data-target="#addsize" class="btn btn-primary">Add size</button>
                </div>
                <!-- Button trigger modal -->

                <!-- Modal add size -->
                <div class="modal fade" id="addsize" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Size Name :</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ url('/sizeName') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Add Size</label>
                                        <input type="text" name="sizeName" class="form-control" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" placeholder="Enter Size">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            {{-- end --}}

            <!-- Modal add size -->
                <div class="modal fade" id="addproductattr" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Product Attribute :</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ url('productAttrSave') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Product Attribute :</label>
                                        <select name="sizeName" class="form-control" id="exampleFormControlSelect1">

                                            <option selected="--Product Attribute--" disabled="disabled">--Product
                                                Attribute--
                                            </option>
                                            @foreach($allSize as $v_allSize)
                                                <option
                                                    value="{{ $v_allSize->sizeName }}">{{ $v_allSize->sizeName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 pt-3">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead class="thead-dark ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product size</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productAttr as $key=> $v_productAttr)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $v_productAttr->sizeName }}</td>
                                <td>
                                    <a href="{{ route('destroy.product.size', $v_productAttr->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
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
        $(document).ready(function () {
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
@endpush

