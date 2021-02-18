@extends('fronts.master')

@section('title')
    {{ isset($title) ? $title : config('app.name') }}
@endsection

@section('content')
    <div class="container mt-5" id="register">
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <h6 class="text-center font-weight-bold py-2 text-success" style="background: #FFE7C7;"><i
                            class="fas fa-user"></i> User Information</h6>

                    <div id="user_from">
                        <?php
                        $total = 0;
                        ?>
                        @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach
                        <form action="{{ url('/quickOrderSave') }}" method="POST">
                            @csrf

                            @if(Auth::check())
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name"
                                           value="{{ Auth::user()->name }}">
                                </div>
                            @else
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name *"
                                           required>
                                </div>
                            @endif

                            <div class="form-group">
                                <input type="text" name="number" class="form-control" placeholder="Enter your number *" required>
                            </div>

                            {{--<div class="form-group">
                                <input type="text" name="zila" class="form-control" placeholder="Enter your district *"
                                       required>
                            </div>--}}

                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Enter your address *"
                                       required>
                            </div>

                            <div class="was-validated custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input insideDhaka" id="customControlValidation2" value="50" name="grandTotal" required>
                                <label class="custom-control-label" for="customControlValidation2">Inside Dhaka</label>
                            </div>
                            <div class="was-validated custom-control custom-radio custom-control-inline mb-3">
                                <input type="radio" class="custom-control-input outSideDhaka" id="customControlValidation3" value="100" name="grandTotal" required>
                                <label class="custom-control-label" for="customControlValidation3">Outside Dhaka</label>
                            </div>

                            <input type="hidden" id="shipingSave" name="shipingSave">
                            <input type="hidden" id="grandTotalSave" name="grandTotalSave">

                            <input type="hidden" name="month" value="{{ date('F') }}">
                            <input type="hidden" name="year" value="{{ date('Y') }}">
                            <input type="hidden" name="date" value="{{ date('Y-m-d') }}">

                            <button type="submit" class="btn btn-block btn-small" style="background: #FF8E27;
                         color: #fff;">Confirm order
                            </button>
                        </form>
                    </div>
                </div>


                <div style="display: none">
                    <h2>Cart Information</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="shiping" style="
                            padding: 19px 0px 9px 0px;
                            background: #f2f2f2;
                            margin: 25px 33px 24px 31px;
                     ">
                                {{--<ul>

                                    <div class="sc-item">
                                        <input type="radio" id="outSideDhaka" class="outSideDhaka" value="100"
                                               name="shiping" id="two" required>
                                        <label for="two" id="label_two">Outside Dhaka</label>
                                        <span>100</span>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="insideDhaka" class="insideDhaka" value="50"
                                               name="shiping" id="two">
                                        <label for="two" id="label_two">Inside Dhaka</label>
                                        <span>50</span>
                                    </div>
                                </ul>--}}

                            </div>
                            <div class="cart_info" style="
                                padding: 19px 0px 9px 0px;
                                background: #ef553a;
                                margin: 25px 33px 24px 31px;
                                color: #fff;
                                font-weight: bold;
                                /*border-radius: 61px;*/
                     ">
                                <?php
                                $total = 0;
                                ?>
                                @foreach((array) session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                @endforeach

                                <ul>
                                    <li>Subtotal <i>-</i> <span class="subTotal">৳ {{ $total }} </span></li>
                                    <li>Shipping <i>-</i> <span class="shipingValue">৳ 0 </span></li>
                                    <li>Grand Total <i>-</i> <span class="grandTotal">৳ 0 </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6 register-right" id="customer_id">
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


                @guest
                    <div class="tab-content" id="myTabContent">
                        <h6 class="text-center font-weight-bold  py-2 text-success" style="background: #FFE7C7;">
                            Registration/Login here...</h6>
                        <p class="text-center">
                            <a href="{{url('/login')}}" class="btn btn-success">Login here...</a>
                            <a type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" class="btn btn-info text-white" aria-controls="multiCollapseExample2">Register for order</a>
                        </p>
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <div class="collapse multi-collapse" id="multiCollapseExample2">
                                    <div class="card card-body p-2">
                                        <form action="{{ url('/customerSaveForm') }}" method="POST">
                                            <div class="register-form">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name"
                                                           placeholder="Enter your name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control"
                                                           placeholder="Password *" value=""/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control"
                                                           placeholder="Type your email *" value=""/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="number" class="form-control"
                                                           placeholder="Enter your number *" value=""/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="address" class="form-control"
                                                           placeholder="Type your address *" value=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Gender Select :</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="gender"
                                                               id="exampleRadios1" value="male" checked>Male
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="gender"
                                                               id="exampleRadios2" value="female">Female
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="gender"
                                                               id="exampleRadios2" value="other">Other
                                                    </label>
                                                </div>
                                                <button type="submit" name="shipping_btn" value="shipping_btn"
                                                        class="btn btn-block btn-small" style="background: #FF8E27;
                             color: #fff;">Register
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                @endguest


            </div>
            <div class="col-md-12">

                <div class="card mt-5">
                    <h5 class="text-center pt-1">Product Information</h5>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-striped table-hover table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">Sl No:</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $total = 0;
                                $productCount = 1;
                                ?>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php
                                            $total += $details['price'] * $details['quantity'];
                                        @endphp
                                        <tr>
                                            <td>
                                                {{ $productCount++ }}
                                            </td>
                                            <td>
                                                {{ $details['name'] }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('upload/product') }}/{{  $details['image']}}" alt=" "
                                                     class="img-responsive" width="80px" height="70px">
                                            </td>
                                            <td>
                                                <span>৳ {{ $details['price'] }} </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <h4 class="grandTotal">Total: ৳{{ $total }} </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="clear"></div>

@endsection

@section('js')

    <script>
        $('.outSideDhaka').click(function () {
            var shipingCost = parseFloat(100);
            var subtotal = $('.subTotal').html();
            $('.shipingValue').html("৳" + shipingCost);
            var cutTotal = subtotal.replace('৳', '');
            var sub_total = parseFloat(cutTotal);
            var grandTotal = shipingCost + sub_total;
            $('.grandTotal').html("Total: ৳" + grandTotal);

            $('input[name="shipingSave"]').val(shipingCost)
            $('input[name="grandTotalSave"]').val(grandTotal)
        });

        $('.insideDhaka').click(function () {
            var shipingCost = parseFloat(50);
            var subtotal = $('.subTotal').html();
            $('.shipingValue').html("৳" + shipingCost);
            var cutTotal = subtotal.replace('৳', '');
            var sub_total = parseFloat(cutTotal);
            var grandTotal = shipingCost + sub_total;
            $('.grandTotal').html("Total: ৳" + grandTotal);

            $('input[name="shipingSave"]').val(shipingCost)
            $('input[name="grandTotalSave"]').val(grandTotal)
        });
    </script>

@endsection
