@extends('dashbord.master')

@section('title')
    All Category
@endsection

@section('das_title')
    Sells Information
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
@endpush

@section('content')

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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary ml-3 mb-2" data-toggle="modal" data-target="#exampleModal">
            Add Editor
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('saveEditor') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                       placeholder="Password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12">
            <?php
            $editor = App\User::where('roll_id', 6)->get();
            ?>
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title text-center"> Sells Information</h4>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($editor as $key=> $v_editor)
                            <tr>
                                <td>{{  $key+1 }}</td>
                                <td>{{  $v_editor->name }}</td>
                                <td>{{  $v_editor->email }}</td>
                                <td>
                                    <form action="{{ url('editorDelete') }}/{{ $v_editor->id }}">
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
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


    <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>
    <script>


    </script>
@endpush

