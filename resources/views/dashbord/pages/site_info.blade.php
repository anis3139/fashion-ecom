@extends('dashbord.master')

@section('title')
    | Site Information
@endsection

@section('das_title')
    Site Information
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm table-responsive">
                            <thead class="thead-dark ">
                            <tr>
                                <th>Mobile One</th>
                                <th>Mobile Two</th>
                                <th>Address</th>
                                <th>Mail One</th>
                                <th>Mail Two</th>
                                <th>Mail Three</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($site_infos)
                                @foreach($site_infos as $row)
                                    <tr>
                                        <td>{{ $row->mobile_one }}</td>
                                        <td>{{ $row->mobile_two }}</td>
                                        <td>{{ $row->address }}</td>
                                        <td>{{ $row->mail_one }}</td>
                                        <td>{{ $row->mail_two }}</td>
                                        <td>{{ $row->mail_three }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#editSiteInfo-{{ $row->id }}">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </button>
                                            <a type="button" class="btn btn-sm btn-danger"
                                               href="{{ route('site.info.destroy', $row->id) }}">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- edit site info modal -->
                                    @include('dashbord.modal.edit_site_info_modal')
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if(count($site_infos))
            @else
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Site Information</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('site.info.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Mobile One</label>
                                    <input type="text" name="mobile_one" value="{{ old('mobile_one') }}"
                                           class="form-control" placeholder="Entry mobile number">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Two</label>
                                    <input type="text" name="mobile_two" value="{{ old('mobile_two') }}"
                                           class="form-control" placeholder="Entry mobile two">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control"
                                           placeholder="Entry address">
                                </div>
                                <div class="form-group">
                                    <label>Mail One</label>
                                    <input type="text" name="mail_one" value="{{ old('mail_one') }}"
                                           class="form-control"
                                           placeholder="Entry mail one">
                                </div>
                                <div class="form-group">
                                    <label>Mail Two</label>
                                    <input type="text" name="mail_two" value="{{ old('mail_two') }}"
                                           class="form-control"
                                           placeholder="Entry mail two">
                                </div>
                                <div class="form-group">
                                    <label>Mail Three</label>
                                    <input type="text" name="mail_three" value="{{ old('mail_three') }}"
                                           class="form-control" placeholder="Entry mail three">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
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
                $.get("categoryEdit/" + id, function (data) {
                    // console.log(data)
                    $('#category_id').val(data.id);
                    $('#categoryName').val(data.category_name);
                    // $('#productCategory').val(data.category_id);
                    // $('#productPrice').val(data.product_price);
                    // $('#productNumber').val(data.product_number);
                });
            });
        });

        $('#editForm').on('submit', function () {

            var id = $('#category_id').val();
            $.ajax({
                type: "PUT",
                url: "/categoryUpdate/" + id,
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
                                url: "bannerDelete/" + id,
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
