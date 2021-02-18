 @extends('dashbord.master') @section('title') | All Category @endsection @push('css')
<link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css"> {{--
<link rel="stylesheet" href="{{asset('/')}}dashbord/adminlte.min.css"> --}} @endpush @section('content')
<!-- Left side column. contains the logo and sidebar -->
@section('das_title') @endsection @if (session('status'))
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
<div class="container" id="order_list">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-6 offset-3">
                        <form action="">
                            @csrf
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Date Say Daily Sells :</label>
                                        <div class="input-group date datepicker" data-provide="datepicker">
                                            <input type="text" name="date" class="form-control" id="singleDaySell" placeholder="Example 2019/10/25" required>
                                            <div class="input-group-addon">

                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-3">
                                    <div class="btnss" style="margin-top: 35px;">
                                        <button type="button" class="btn btn-primary" id="dailySell">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title text-center">Today Total Sells Information</h4>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice Name</th>
                                <th scope="col">Grand Total</th>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($singleDaySell as $key=> $v_singleDaySell)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $v_singleDaySell->invoice }}</td>
                                <td>{{ $v_singleDaySell->grandTotal }}</td>
                                <td>
                                    @if($v_singleDaySell->payment == 1)
                                    <h5><span class="badge badge-primary">Cash On Delivery</span></h5> @elseif($v_singleDaySell->payment == 2)
                                    <span class="badge badge-primary">Pay with Bkash</span> @endif
                                </td>
                                <td> @if($v_singleDaySell->status == 1)
                                    <h5><span class="badge badge-primary">Payment Complate</span></h5> @elseif($v_singleDaySell->status == 0)
                                    <h5><span class="badge badge-danger">Pandding</span></h5> @endif

                                </td>
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

@endsection @push('js')

<script src="{{asset('/')}}dashbord/jquery.dataTables.js"></script>
<script src="{{asset('/')}}dashbord/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}dashbord/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/')}}dashbord/demo.js"></script>
<!-- page script -->
<script>
    $(function() {
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

<script src="{{asset('/')}}dashbord/sweetalert2.js"></script>
<script>
    $(document).on('click', '#dailySell', function() {
        var datepicksss = $('#singleDaySell').val();
        // window.location.href = 'http://www.google.com';
        window.location.href = "{{url('/dailySellIndex')}}" + "/" + datepicksss;
    });
</script>
@endpush