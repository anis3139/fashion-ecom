@extends('dashbord.master')

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
@endpush

@section('content')

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

    <!--<div class="container" id="order_list">-->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">All USer Information</h4>
            </div>

            <div class="card-body">
                @if(isset($userData))
                    <form action="{{ url('userDataUpdate') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$userData->name}}">
                            <input type="hidden" name="id" class="form-control" value="{{$userData->id}}">
                        </div>
                        <div class="form-group">
                            <label for="">Number:</label>
                            <input type="text" name="number" class="form-control" value="{{$userData->number}}">
                        </div>
                        <div class="form-group">
                            <label for="">Address:</label>
                            <input type="text" name="address" class="form-control" value="{{$userData->address}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                @else
                    <div class="alert alert-primary">
                        <p>Sorry There Are No Data IN DataBase At The Moment :)</p>
                    </div>

                @endif
            </div>
            <!-- /.card-body -->
            <!-- /.card-body -->
        </div>
    </div>
    </div>
    <!--</div>-->

@endsection @push('js')


@endpush
