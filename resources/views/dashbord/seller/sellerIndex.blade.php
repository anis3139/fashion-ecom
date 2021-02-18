@extends('dashbord.master')

@section('title')
    | All Category
@endsection

@section('das_title')
    Seller
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
    {{-- <link rel="stylesheet" href="{{asset('/')}}dashbord/adminlte.min.css"> --}}
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
<div class="container" id="order_list">
    <div class="row">
        <div class="col-12">
            <div class="cart">
                <div class="card-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-center">All Seller Information</h4>
                                </div>
                                <div class="card-body">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($seller_info as $key=> $v_seller_info)
                                            <?php
                                            $user_info = App\User::where('id', $v_seller_info->user_id)->first();
                                            ?>

                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $user_info->name }}</td>
                                                <td>{{ $v_seller_info->userName }}</td>
                                                <td>{{ $user_info->email }}</td>
                                                <td>{{ $v_seller_info->address }}</td>
                                                <td><a href="{{ url('seller-info') }}/{{ $v_seller_info->userName }}">view</a>
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


@endpush

