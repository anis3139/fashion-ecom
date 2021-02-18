@extends('dashbord.master')

@section('title')
    | Dashboard
@endsection
@section('das_title')
    Dashboard
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">This Month sale</span>
                        <span class="info-box-number">{{ $monthTotal }} TK</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Life Time Sell</span>
                        <span class="info-box-number">{{ $lifeRimeTotal }} TK</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Daily Sales</span>
                        <span class="info-box-number">{{ $todayTotal }} TK</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Today Order</span>
                        <span class="info-box-number">{{ $orderCountToday }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="ion ion-ios-people-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Yesterday Order</span>
                                <span class="info-box-number">{{ $orderCountYestaday }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Seller Product sale</span>
                                <span class="info-box-number">2,000</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Promoted Category For Home Page</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead style="background:#FC4A9E; color:aliceblue;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allcategory as $key=> $v_allcategory)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $v_allcategory->subCategory_name }}</td>
                                    <td>

                                        @if($v_allcategory->status == 1)
                                            <h5><span class="badge badge-secondary">Promote</span></h5>
                                        @else
                                            <h5><span class="badge badge-danger">Not Promoted</span></h5>
                                        @endif
                                    </td>
                                    <td>
                                        @if($v_allcategory->status == 1)
                                            <form action="{{ url('/catDown') }}" id="catDown" method="POST"
                                                  style="display:block;float:left">
                                                @csrf
                                                <input type="hidden" name="status" value="0">
                                                <input type="hidden" name="category_id"
                                                       value="{{ $v_allcategory->id }}">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        @elseif($v_allcategory->status == 0)
                                            <form action="{{ url('/catUp') }}" id="catUp" method="POST"
                                                  style="display:block;float:left">
                                                @csrf
                                                <input type="hidden" name="status" value="1">
                                                <input type="hidden" name="category_id"
                                                       value="{{ $v_allcategory->id }}">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <a class="btn btn-primary promoImgId" data-id="{{$v_allcategory->id  }}"
                                           data-toggle="modal" data-target="#exampleModal">Add</a>

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
                                                    <form action="{{ url('promoteImage') }}" method="POST"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlFile1">Product Image
                                                                    Gallery:[<span class="badge badge-primary">Only Three Image</span>]</label>
                                                                <input type="file" class="form-control" name="photo[]"
                                                                       multiple="">
                                                            </div>

                                                            <input type="hidden" name="id" id="sub_id">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Save changes
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $allcategory->links() }}
                    </div>
                </div>
            </div>

            {{-- complaine section --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Customer Compline</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead style="background:#FC4A9E; color:aliceblue;">
                            <tr>
                                <th scope="col">P-Code</th>
                                <th scope="col"> Name</th>
                                <th scope="col"> Phone-number</th>
                                <th scope="col"> Compline</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($complains as $key=> $complain)
                                <tr>
                                    <td>{{ $complain->code }}</td>
                                    <td>{{ $complain->name }}</td>
                                    <td>{{ $complain->phone_nu }}</td>
                                    <td>{{ $complain->complaint }}</td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $allcategory->links() }}
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    </div>

@endsection

@push('js')
    <script>

        $(".promoImgId").click(function () {
            var id = $(this).data("id");
            $("#sub_id").val(id);
            // alert(id);
        })
    </script>
    <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>

@endpush
