@extends('dashbord.master')

@section('title')
    | All Sub categories
@endsection

@section('content')
    <!-- Left side column. contains the logo and sidebar -->
@section('das_title')
    All Sub categories
@endsection

<!-- Main content -->
<div class="container" id="order_list">
    <div class="row">
        <div class="col-md-12">
            <div class="addCatBtn">
            {{--<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add</button>--}}
            <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ url('/subCategorySave') }}" method="post">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $category->id }} ">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name :</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" value="{{ $category->category_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sub Category Name :</label>
                                        <input type="text"
                                               class="form-control @error('subCategory_name') is-invalid @enderror"
                                               id="exampleInputEmail1"
                                               name="subCategory_name" aria-describedby="emailHelp"
                                               placeholder="Enter Category Name">
                                        @error('subCategory_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Page Title:</label>
                                        <input type="text"
                                               class="form-control @error('page_title') is-invalid @enderror"
                                               name="page_title" placeholder="Enter page title">
                                        @error('page_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description Title:</label>
                                        <input type="text" class="form-control" name="description_title"
                                               placeholder="Enter description title"
                                               value="{{ old('description_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" cols="30" rows="3"
                                                  placeholder="Enter description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- end modal --}}
            </div>

            @if (session('status'))
                <div class="alert alert-primary">
                    {{ session('status') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $category->category_name }} <i class="fa fa-long-arrow-right"></i>
                                <button class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                        data-target="#exampleModal">
                                    <i class="fa fa-plus"></i> Add New
                                </button>
                            </h5>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th width="1%">#</th>
                                    <th width="19%">Sub Cat. Name</th>
                                    <th width="18%">Page Title</th>
                                    <th width="18%">Des. Title</th>
                                    <th width="20%">Description</th>
                                    <th width="24%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($allsubCategory as $key => $v_allsubCategory)
                                    <tr>
                                        <th scope="row">{{ $key+1}}</th>
                                        <td>{{ str_limit($v_allsubCategory->subCategory_name, 20) }}</td>
                                        <td>{{ str_limit($v_allsubCategory->page_title, 20) }}</td>
                                        <td>{{ str_limit($v_allsubCategory->description_title, 20) }}</td>
                                        <td>{{ str_limit($v_allsubCategory->description, 20) }}</td>
                                        <td>
                                            <a href="{{ url('/thirdCategory')}}/{{ $v_allsubCategory->id }}"
                                               type="button" class="btn btn-sm btn-success text-white">Add Third
                                                Category </a>

                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                                                    data-target="#subCategoryDetails-{{ $v_allsubCategory->id }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>

                                            <button href="" type="submit" data-id="{{ $v_allsubCategory->id }}"
                                                    id="editCategory" data-toggle="modal" data-target="#editModal"
                                                    class="btn btn-sm btn-info text-white">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>

                                            @if(Auth::user()->roll_id == 1)
                                                <button type="button" data-id="{{ $v_allsubCategory->id }}"
                                                        class="itemDelete btn btn-sm btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            @else
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- Sub Category Details Modal -->
                                    @include('dashbord.modal.sub_category_modal')

                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Sub
                                                        Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="editForm" method="PUT">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Edit Sub Category Name
                                                                :</label>
                                                            <input type="hidden" id="subCategory_id">
                                                            <input type="hidden" name="category_id" id="Category_id">
                                                            <input type="text"
                                                                   class="form-control @error('subCategoryName') is-invalid @enderror"
                                                                   id="subcategoryName"
                                                                   name="subCategoryName" aria-describedby="emailHelp"
                                                                   placeholder="Enter Category Name">
                                                            @error('subCategoryName')
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Page Title:</label>
                                                            <input type="text"
                                                                   class="form-control @error('page_title') is-invalid @enderror"
                                                                   id="pageTitle" name="page_title"
                                                                   placeholder="Enter page title">
                                                            @error('page_title')
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description Title:</label>
                                                            <input type="text" class="form-control "
                                                                   id="descriptionTitle" name="description_title"
                                                                   placeholder="Enter Description Title ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea class="form-control" id="description" cols="30"
                                                                      rows="3" name="description"
                                                                      placeholder="Enter Description "> </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit" id="updateCategory"
                                                                class="btn btn-primary">Update
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                $.get("/subCategoryEdit/" + id, function (data) {
                    console.log(data)
                    $('#subCategory_id').val(data.id);
                    $('#Category_id').val(data.category_id);
                    $('#subcategoryName').val(data.subCategory_name);
                    $('#pageTitle').val(data.page_title);
                    $('#descriptionTitle').val(data.description_title);
                    $('#description').val(data.description);
                    // $('#productPrice').val(data.product_price);
                    // $('#productNumber').val(data.product_number);
                });
            });
        });

        $('#editForm').on('submit', function () {

            var id = $('#subCategory_id').val();
            // alert(id);
            $.ajax({
                type: "PUT",
                url: "/subCategoryUpdate/" + id,
                data: $('#editForm').serialize(),
                success: function (response) {
                    // alert(response);
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
        $(document).ready(function () {

            $(document).on('click', '.itemDelete', function () {
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
                                url: "/subCategoryDelete/" + id,
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


