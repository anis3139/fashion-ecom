{{-- @extends('layouts.app') --}}

@extends('dashbord.master')

@section('title')
   | Add Banner
@endsection
@section('das_title')
    Add Logo
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-7 offset-2">
    <form method="POST" action="{{ route('logo.store') }}"  enctype="multipart/form-data">
      @csrf
        <div class="form-group">
          <label for="exampleInputCates">Logo</label>
          <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection


  