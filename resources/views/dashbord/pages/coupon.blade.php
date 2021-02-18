@extends('dashbord.master')

@section('title')
    | All Category
@endsection

@section('das_title')
    Coupon
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/editor.css">
@endpush

@section('content')

<div class="container" id="order_list">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Discount</th>
                            <th>Discount Type</th>
                            <th>Valid Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allCoupon as $key => $v_coupon)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $v_coupon->coupon_name }}</td>
                                <td>
                                    @if($v_coupon->discount_type == \App\coupon::PERCENTAGE)
                                        {{ $v_coupon->coupon_discount }}%
                                    @elseif($v_coupon->discount_type == \App\coupon::AMOUNT)
                                        ৳{{ $v_coupon->coupon_discount }}
                                    @endif
                                </td>
                                <td>
                                    @if($v_coupon->discount_type == \App\coupon::PERCENTAGE)
                                        <span class="badge badge-primary">PERCENTAGE</span>
                                    @elseif($v_coupon->discount_type == \App\coupon::AMOUNT)
                                        <span class="badge badge-success">AMOUNT</span>
                                    @else
                                        <span class="badge badge-danger">NOT SELECTED</span>
                                    @endif
                                </td>
                                <td>{{ $v_coupon->valid_date }}</td>
                                <td>
                                    <a href="{{url('couponDelete')}}/{{$v_coupon->id}}" class="btn btn-danger btn-sm">
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('/couponSave') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Name</label>
                            <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" value="{{ old('coupon_name') }}"
                                   aria-describedby="emailHelp" placeholder="Coupon Name" name="product_name"
                                   required="">
                            @error('coupon_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Discount</label>
                            <input type="number" name="coupon_discount" class="form-control @error('coupon_discount') is-invalid @enderror" value="{{ old('coupon_discount') }}" aria-describedby="emailHelp" placeholder="Coupon Discount" required>
                            @error('coupon_discount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select Discount Type:</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('discount_type') is-invalid @enderror" type="radio" name="discount_type" value="{{ \App\coupon::PERCENTAGE }}">
                                <label class="form-check-label">Percentage</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('discount_type') is-invalid @enderror" type="radio" name="discount_type" value="{{ \App\coupon::AMOUNT }}">
                                <label class="form-check-label">Amount</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Valid Date</label>
                            <div class="input-group date datepicker" data-provide="datepicker">
                                <input type="text" name="valid_date" class="form-control @error('valid_date') is-invalid @enderror" value="{{ old('valid_date') }}" placeholder="Select Date" required>
                                @error('valid_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-addon"></div>
                            </div>
                        </div>
                        <button type="submit" class="formsd btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('js')
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
            startDate: '-3d'
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
                                url: "/thirdCategoryDelete/" + id,
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

