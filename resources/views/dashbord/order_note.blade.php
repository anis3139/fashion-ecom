@extends('dashbord.master')

@section('title')
    | Note
@endsection

@section('das_title')
    Note
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
@endpush

@section('content')

    <div class="container" id="order_list">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        @if(count($order_notes))
                            @foreach($order_notes as $row)
                                <div class="card mr-1 mt-1" style="width: 18rem;">
                                    <div class="card-body">
                                        <p class="card-text">{{ $row->note }}</p>
                                        <a href="{{ route('destroy.order.note', $row->id) }}" class="card-link btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="card col-12 text-white bg-danger">
                                <div class="card-body">
                                    <h5 class="text-center">No data available</h5>
                                </div>
                            </div>
                        @endif
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
@endpush

