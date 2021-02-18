@extends('dashbord.master')

@section('title')
    | All Category
@endsection

@section('das_title')
    Seller Info
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">

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
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<?php
$totalAmount = $totalSellsProductPrice * $totalSellsProduct_quantity;
$totalForCompany = $totalAmount * 10 / 100;
$totalForSeller = $totalAmount - $totalForCompany;
?>


<div class="container" id="order_list">
    <div class="row">
        <div class="col-12">
            <div class="cart">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Product</span>
                                    <span class="info-box-number">{{ $productcount }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Payment</span>
                                    <span class="info-box-number">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 add
</button>
                </span>
                                </div>
                                <!-- /.info-box-content -->


                            {{-- modal --}}
                            <!-- Modal -->
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
                                            <form action="{{ url('paymentSave') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="userName" value="{{ $userName }}">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Year</label>
                                                        <select name="year" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Month</label>
                                                        <select name="month" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                            <option value="March">March</option>
                                                            <option value="April">April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July">July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October">October</option>
                                                            <option value="November">November</option>
                                                            <option value="December">December</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Payment Type</label>
                                                        <select name="payment_type" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                            <option value="Cash Payment">Cash Payment</option>
                                                            <option value="Bkash Payment">Bkash Payment</option>
                                                            <option value="Bank Payment">Bank Payment</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Date </label>
                                                        <input type="text" name="date" class="form-control"
                                                               id="exampleFormControlInput1" placeholder="2019-12-22">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Total Amount </label>
                                                        <input type="text" name="amount" class="form-control"
                                                               id="exampleFormControlInput1" placeholder="Total Amount">
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
                                {{-- modal --}}
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">UpApprove Product</span>
                                    <span class="info-box-number">{{ $upApproveProduct }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Sells</span>
                                    <span class="info-box-number">{{ $totalSellsProduct }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Seller Pabe</span>
                                    <span class="info-box-number">{{ $totalForSeller-$paymentSellerPabe }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger" style="color: #fff"><i class="fa fa-flag"
                                                                                             aria-hidden="true"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Amount <br/>This Month</span>
                                    <span class="info-box-number">{{ $totalAmount }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger" style="color: #fff"><i class="fa fa-flag"
                                                                                             aria-hidden="true"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Amount <br/>For Comapnt</span>
                                    <span class="info-box-number">{{ $totalForCompany }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>


                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-center">Payment Information</h4>
                                </div>
                                <div class="card-body">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Month</th>
                                            <th scope="col">Payment</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($paymentSeller as $key=> $v_paymentSeller)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $v_paymentSeller->date }}</td>
                                                <td>{{ $v_paymentSeller->month }}</td>
                                                <td>{{ $v_paymentSeller->payment_type }}</td>
                                                <td>{{ $v_paymentSeller->amount }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>


                @endsection
                @push('js')

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
                        $('.datepicker').datepicker({
                            format: 'yyyy-mm-dd',
                            startDate: '-3d'
                        });
                    </script>


@endpush

