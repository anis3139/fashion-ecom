{{-- @extends('layouts.app') --}}

@extends('dashbord.master')

@section('title')
   | Add Category
@endsection
@section('das_title')
    Add Categories
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-7 offset-2">
    <form method="POST" action="{{ route('store') }}">
      @csrf
        <div class="form-group">
          <label for="exampleInputCates">Categories</label>
          <input type="text" name="cates" class="form-control" id="exampleInputCates" aria-describedby="emailHelp" placeholder="Enter Categories name">
        </div>
        <div class="form-group">
          <label for="exampleInputSubCates">Sub Categories</label>
          <input type="text" name="sub_1" class="form-control" id="exampleInputSubCates" placeholder="Entry sub Categories">
        </div>
        <div class="form-group">
          <label for="exampleInputSubCates">Menu </label>
          <input type="text" name="manu" class="form-control" id="exampleInputSubCates" placeholder="Entry Manu name">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label"  for="exampleCheck1">Check me out</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection


  