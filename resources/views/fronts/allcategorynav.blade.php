@extends('fronts.master')

@section('content')
    <div class="container" id="allcats">
        <div class="row pt-3 ">
            <span class="pr-3"><img src="https://static.ajkerdeal.com/images/all-cat-icon.svg"></span> সকল ক্যাটাগরি
        </div>

        <div class="all-cat-text">
            <div id="wrapper1">
                {{-- toggoler nav --}}
                <nav class="navbar navbar-expand-sm navbar-light ">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2"
                            aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    {{-- toggoler nav --}}
                    @foreach($allcategory as $v_allcategory)
                        <div class="category-icon-wrap">
                        {{-- modal  --}}
                        <!-- Button trigger modal -->

                            <a href="#" data-toggle="modal"
                               data-target="#exampleModalCenter-{{ $v_allcategory->id}}"><span>{{ $v_allcategory->category_name  }}<i
                                        class="fas fa-angle-down pl-3"></i></span></a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter-{{ $v_allcategory->id}}" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="color: #d82c1a; font-size: 20px;margin-top: 10px;margin-left: 15px;font-weight: 500;">{{ $v_allcategory->category_name }}</h5>
                                            <button type="button" class="close " data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true" style="width:5px">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach($v_allcategory->subCategory as $value)
                                                <ul class="nav navbar navbar-left  ">

                                                    <div class="all_nav_style">
                                                        <li class="nav-item  ">
                                                            <strong><a class="nav-link p-1" href="#"><i
                                                                        class="fa fa-user-o "
                                                                        aria-hidden="true"></i>{{ $value->subCategory_name  }}
                                                                </a></strong> <br>


                                                            @foreach($value->thirdCategory->take(3) as $row)
                                                                <ul class="nav navbar navbar-left  ">
                                                                    <li class="nav-item    ">
                                                                        <a class="nav-link p-0" href="#"><i
                                                                                class="fa fa-user-o "
                                                                                aria-hidden="true"></i>{{ $row->thirdCategoryName }}
                                                                        </a>
                                                                    </li>
                                                                    </li>
                                                                </ul>

                                                        @endforeach
                                                    </div>

                                                </ul>
                                            @endforeach
                                        </div>
                                        {{--    --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
