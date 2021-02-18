@extends('dashbord.master')

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
@endpush

@section('das_title')
    Order Management
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--<div class="container" id="order_list">-->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    All Order Information
                </h4>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead class="thead-dark">
                    <tr class="something">
                        <th>#</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Invoice</th>
                        <th>Mobile</th>
                        <th>Amount</th>
                        <th>Pay. Type</th>
                        <th>Order Status</th>
                        <th>Area</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allorder as $key=> $v_allorder)
                        @php
                            $oderID = $v_allorder->id;
                            $customer_exists = App\customer_info::where('order_id', $oderID)->exists();
                            $customer_info = App\customer_info::where('order_id', $oderID)->first();
                            $userIDD = $v_allorder->user_id;
                            $getUserexists = App\User::where('id', $userIDD)->exists();
                            $getUser = App\User::where('id', $userIDD)->first();
                        @endphp

                        @php
                            $invoiceID = $v_allorder->invoice;
                            $shippingExistsd = App\shipping::where('invoice', $invoiceID)->exists();
                            $shipping = App\shipping::where('invoice', $invoiceID)->first();
                            $user_iD = $shipping->user_id;
                            $shippingExists = App\User::where('id', $user_iD)->first();
                        @endphp

                        <tr>
                            <td>{{ $key+1 }}</td>

                            <td>{{ date('Y-m-d', strtotime($v_allorder->created_at)) }}</td>

                            @if(isset($shippingExists))
                                <td>{{ $shippingExists->name }}</td>
                            @elseif(isset($v_allorder->customerInfo->name))
                                <td>{{ isset($v_allorder->customerInfo->name) ? $v_allorder->customerInfo->name : '' }}</td>
                            @else
                                @if(isset($shipping))
                                    <td>{{ $shipping->quick_name }}</td>
                                @else
                                    <td>No Customer</td>
                                @endif
                            @endif

                            <td>{{ $v_allorder->invoice }}</td>

                            @if(isset($shippingExistsd))
                                <td>{{$shipping->phone}}</td>
                            @else
                                <td>No Number</td>
                            @endif

                            <td>৳{{ $v_allorder->grandTotal }}</td>

                            <td>
                                @if($v_allorder->payment == 1)
                                    <h5><span class="badge badge-primary" title="Cash On Delivery">C.O.D</span></h5>
                                @elseif($v_allorder->payment == 2)
                                    <h5>
                                        <span class="badge badge-success" title="Pay with bKash">bKash</span>
                                        @if($v_allorder->trxID)
                                            | <span class="badge badge-secondary">{{ $v_allorder->trxID }}</span>
                                        @endif
                                    </h5>
                                @endif
                            </td>

                            <td>
                                @if($v_allorder->status == \App\order::PENDING)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="conformOrder badge badge-primary" data-toggle="modal"
                                              data-target="#OrderexampleModal">PENDING</span>
                                    </h5>
                                @elseif($v_allorder->status == \App\order::PROCESSING)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="conformOrder badge badge-secondary" data-toggle="modal"
                                              data-target="#OrderexampleModal">PROCESSING</span>
                                    </h5>
                                @elseif($v_allorder->status == \App\order::PAYMENT_NEEDED)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="conformOrder badge badge-success" data-toggle="modal"
                                              data-target="#OrderexampleModal">PAYMENT NEEDED</span>
                                    </h5>
                                @elseif($v_allorder->status == \App\order::CONFIRM)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="conformOrder badge badge-success" data-toggle="modal"
                                              data-target="#OrderexampleModal">CONFIRM</span>
                                    </h5>
                                @elseif($v_allorder->status == \App\order::READY_FOR_SHIPPING)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="conformOrder badge badge-info text-white" data-toggle="modal"
                                              data-target="#OrderexampleModal">READY FOR SHIPPING</span>
                                    </h5>
                                @elseif($v_allorder->status == \App\order::CANCEL)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="conformOrder badge badge-danger" data-toggle="modal"
                                              data-target="#OrderexampleModal">CANCEL</span>
                                    </h5>
                                @elseif($v_allorder->status == \App\order::RETURN)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="conformOrder badge badge-primary" data-toggle="modal"
                                              data-target="#OrderexampleModal">RETURN</span>
                                    </h5>
                                @elseif($v_allorder->status == \App\order::REFUND)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="conformOrder badge badge-success" data-toggle="modal"
                                              data-target="#OrderexampleModal">REFUND</span>
                                    </h5>
                                @elseif($v_allorder->status == \App\order::DELIVERY_COMPLETE)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="conformOrder badge badge-dark" data-toggle="modal"
                                              data-target="#OrderexampleModal">DELIVERY COMPLETE</span>
                                    </h5>
                                @endif
                            </td>

                            <td>
                                @if($v_allorder->shiping == \App\order::INSIDE)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="change_area badge badge-success" data-toggle="modal"
                                              data-target="#areaModal">INSIDE</span>
                                    </h5>
                                @elseif($v_allorder->shiping == \App\order::OUTSIDE)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="change_area badge badge-danger" data-toggle="modal"
                                              data-target="#areaModal">OUTSIDE</span>
                                    </h5>
                                @elseif($v_allorder->shiping == NULL)
                                    <h5>
                                        <span style="cursor: pointer;" data-id="{{$v_allorder->id}}"
                                              class="change_area badge badge-secondary" data-toggle="modal"
                                              data-target="#areaModal">NULL</span>
                                    </h5>
                                @endif
                            </td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle btn-sm" type="button"
                                            id="dropdownMenu2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Menu
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        {{--<a class="dropdown-item" href="{{ url('/userData') }}/{{ $v_allorder->id }}">
                                            User Data
                                        </a>--}}

                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#userData-{{ $v_allorder->id }}">
                                            User Data
                                        </button>

                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                                data-target="#exampleModal">
                                            View
                                        </button>

                                        <a href="{{ url('invoice', $v_allorder->invoice) }}" class="dropdown-item"
                                           target="_blank">Invoice</a>

                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                                data-target="#addNote-{{ $v_allorder->id }}">
                                            Add Note
                                        </button>

                                        @if($v_allorder->orderNotes)
                                            <a class="dropdown-item" target="_blank"
                                               href="{{ route('order.note', $v_allorder->id) }}">View Note</a>
                                        @endif

                                        @if(Auth::user()->roll_id == 1)
                                            <a href="{{ route('order.destroy', $v_allorder->id) }}"
                                               onclick="return confirm('Are you sure?')"
                                               class="dropdown-item">Delete</a>
                                        @else
                                        @endif
                                    </div>
                                </div>

                                <!-- add note modal -->
                                @include('dashbord.modal.add_note_modal')

                                <!-- user data modal -->
                                @include('dashbord.modal.user_data_modal')

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ url('trackingPoduct') }}/{{ $v_allorder->id }}"
                                                  method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Example select</label>
                                                        <select name="trackingProduct" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                            <option value="Going for Delivery">Going for Delivery
                                                            </option>
                                                            <option value="Ready For Shipping">Ready For Shipping
                                                            </option>
                                                            <option value="Wating for Payment">Wating for Payment
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ url('trackingPoduct') }}/{{ $v_allorder->id }}"
                                                  method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Example select</label>
                                                        <select name="trackingProduct" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                            <option value="Going for Delivery">Going for Delivery
                                                            </option>
                                                            <option value="Ready For Shipping">Ready For Shipping
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>


                        <!-- Order status modal -->
                        <div class="modal fade" id="OrderexampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Order Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('orderPoductStatus') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="orderIDDD" class="orderGet" value/>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Order Status</label>
                                                <select name="orderProduct" class="form-control"
                                                        id="exampleFormControlSelect1">
                                                    <option value="{{ \App\order::PENDING }}">PENDING</option>
                                                    <option value="{{ \App\order::PROCESSING }}">PROCESSING</option>
                                                    <option value="{{ \App\order::PAYMENT_NEEDED }}">PAYMENT NEEDED
                                                    </option>
                                                    <option value="{{ \App\order::CONFIRM }}">CONFIRM</option>
                                                    <option value="{{ \App\order::READY_FOR_SHIPPING }}">READY FOR
                                                        SHIPPING
                                                    </option>
                                                    <option value="{{ \App\order::CANCEL }}">CANCEL</option>
                                                    <option value="{{ \App\order::RETURN }}">RETURN</option>
                                                    <option value="{{ \App\order::REFUND }}">REFUND</option>
                                                    <option value="{{ \App\order::DELIVERY_COMPLETE }}">DELIVERY
                                                        COMPLETE
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- change area (inside/outside dhaka) modal -->
                        <div class="modal fade" id="areaModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Change Area</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('change.area') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="orderIDDD" class="areaGet" value/>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Change Area</label>
                                                <select name="change_area" class="form-control"
                                                        id="exampleFormControlSelect1">
                                                    <option value="{{ \App\order::INSIDE }}">INSIDE</option>
                                                    <option value="{{ \App\order::OUTSIDE }}">OUTSIDE</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
            <!-- /.card-body -->
        </div>
    </div>
    <!--</div>-->

@endsection @push('js')

    <script src="{{asset('/')}}dashbord/jquery.dataTables.js"></script>
    <script src="{{asset('/')}}dashbord/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/')}}dashbord/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/')}}dashbord/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>

    <script>

        $(document).on('click', '.conformOrder', function () {

            // $(".itemDelete").click(function(){
            var id = $(this).data("id");
            var class_id = $('#class_id').val();
            var attend_date = $('#datepicker-autoclose').val();
            $('.orderGet').val(id);
            // alert(attend_date);

            // window.location.href = "{{url('admin/attendanceIndex')}}";
            // window.location.href = "{{url('admin/singleReport')}}"+"/"+attend_date;
            // document.getElementById('teacher_id').value = id;

        });
    </script>

    <!-- change area (inside/outside dhaka) -->
    <script>
        $(document).on('click', '.change_area', function () {
            var id = $(this).data("id");
            var class_id = $('#class_id').val();
            var attend_date = $('#datepicker-autoclose').val();
            $('.areaGet').val(id);
        });
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
                    text: "You want to be Deleted this product!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "/productDelete/" + id,
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

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
