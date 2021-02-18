@extends('dashbord.master')

@section('title')
    | Multiple Image
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/editor.css">
@endpush

@section('das_title')
    Edit Multiple Image
@endsection

@section('content')

    <div class="container" id="order_list">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body text-center">
                        <h4>{{ $product_image->product->product_name }}</h4>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <form action="{{ route('update.multiple.image', $product_image->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <!-- get hidden product id -->
                                <input type="hidden" class="form-control" name="product_id"
                                       value="{{ $product_image->product_id }}">

                                <label for="exampleFormControlFile1">Edit product image gallery:[<span
                                        class="badge badge-primary">Multiple Image</span>]</label>
                                <input type="file" class="form-control" name="gallery[]" multiple="">
                            </div>
                            <button type="submit" class="formsd btn btn-sm btn-primary btn-block">Update</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        @foreach($images as $key => $image)
                            @if($image)
                                <img src="{{ asset('upload/ami') }}/{{ $image }}" alt="{{ $image }}"
                                     class="img-thumbnail" width="200px">
                            @else
                                <h5 class="text-center">No image available</h5>
                            @endif
                        @endforeach
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

