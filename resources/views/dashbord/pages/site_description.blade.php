@extends('dashbord.master')

@section('title')
    | Site Description
@endsection

@section('das_title')
    Site Description
@endsection

@section('content')
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Site Description
                            @if(!count($description))
                                <button type="button" class="float-right btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#addDescriptionModal">
                                    <i class="fa fa-plus"></i> Add New
                                </button>
                            @endif
                        </h5>

                        <!-- Add description modal -->
                        @include('dashbord.modal.add_description_modal')
                    </div>
                    <div class="card-body">
                        @foreach($description as $row)
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#editDescriptionModal-{{ $row->id }}">
                                <i class="fa fa-edit"></i> Edit description
                            </button>

                            <!-- edit description modal -->
                            @include('dashbord.modal.edit_description_modal')

                            <p class="card-text text-justify">
                                {!! $row->description !!}
                                {{--Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.--}}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>
    <script>
        $('.summernote').summernote({
            placeholder: 'Write your site description',
            tabsize: 2,
            height: 100
        });
    </script>
@endsection
