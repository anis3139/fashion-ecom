@extends('fronts.master')

@section('content')

    <div class="container" id="shiping_address">
        <form action="{{ url('/orderSave') }}" method="post">
            @csrf

            <div class="row" id="shiping">
                <div class="col-md-5  ">
                    <fieldset>
                        <!-- Address form -->
                        <h2> Billing To</h2>
                        <!-- full-name input-->
                        @if(Auth::check())
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                            </div>
                        @else
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Enter your name *" required>
                            </div>
                        @endif

                        @php
                            $personal_info = App\customer_info::where('user_id', Auth::id())->first();
                        @endphp

                        <div class="form-group">
                            <input id="address-line2" name="number" class="form-control" type="text" placeholder="Mobile number" value="{{ isset($personal_info->number) ? $personal_info->number : '' }}" required>
                        </div>

                        <div class="form-group">
                            <input id="address-line1" name="address" class="form-control" type="text" placeholder="Customer address" value="{{ isset($personal_info->address) ? $personal_info->address : '' }}" required>
                        </div>

                        <input type="hidden" id="shipingSave" name="shipingSave">
                        <input type="hidden" id="grandTotalSave" name="grandTotalSave">
                        <input type="hidden" name="month" value="{{ date('F') }}">
                        <input type="hidden" name="year" value="{{ date('Y') }}">
                        <input type="hidden" name="date" value="{{ date('Y-m-d') }}">

                    </fieldset>
                    <div id="button_style">
                        <button type="submit" style=" background: #ef553a;border: none;display: inline-block;width: 100%;color: #fff;border-radius: 5px;padding: 7px 14px;" id="button_style">Proceed to Order</button>
                    </div>
                </div>
                <div class="col-md-5">
                    <h2>Cart Information</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="shiping" style="
                            padding: 19px 0px 9px 0px;
                            background: #f2f2f2;
                            margin: 25px 33px 24px 31px;
                     ">
                                <ul>

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
                                </ul>
                            </div>
                            <div class="cart_info" style="
                                padding: 19px 0px 9px 0px;
                                background: #ef553a;
                                margin: 25px 33px 24px 31px;
                                color: #fff;
                                font-weight: bold;
                                /*border-radius: 61px;*/
                     ">
                                @php
                                    $total = 0;
                                @endphp

                                @foreach((array) session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                @endforeach

                                <ul>
                                    <li>Subtotal <i>-</i> <span class="subTotal">৳{{ isset($grandTotal) ? $grandTotal : $total }} </span></li>
                                    <li>Shipping <i>-</i> <span class="shipingValue">৳ 0 </span></li>
                                    <li>Grand Total <i>-</i> <span class="grandTotal">৳ 0 </span></li>
                                </ul>
                            </div>
                            <div class="cart_info" style="
                            padding: 19px 0px 9px 0px;
                            background: #f2f2f2;
                            margin: 25px 33px 24px 31px;
                     ">
                                <ul>
                                    <div class="sc-item">
                                        <input type="radio" class="outSideDhaka" value="{{ \App\shipping::CASH_ON_DELIVERY }}" name="payment" id="two" checked="">
                                        <label for="two" id="label_two">Cash on Delivery</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" value="{{ \App\shipping::BKASH }}" class="outSideDhaka" name="payment" id="two">
                                        <label for="two" id="label_two">Payment with Bkash</label>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="clear"></div>

@endsection

@section('js')

    <script>
        $('#outSideDhaka').click(function () {
            var shipingCost = parseFloat(100);
            var subtotal = $('.subTotal').html();
            $('.shipingValue').html("৳" + shipingCost);
            var cutTotal = subtotal.replace('৳', '');
            var sub_total = parseFloat(cutTotal);
            var grandTotal = shipingCost + sub_total;
            $('.grandTotal').html("৳" + grandTotal);

            // $('.shipingSave').val(shipingCost);
            // $('.grandTotalSave').val(grandTotal);

            $('input[name="shipingSave"]').val(shipingCost)
            $('input[name="grandTotalSave"]').val(grandTotal)

            // alert(grandTotal);

        });
        $('#insideDhaka').click(function () {
            var shipingCost = parseFloat(50);
            var subtotal = $('.subTotal').html();
            $('.shipingValue').html("৳" + shipingCost);
            var cutTotal = subtotal.replace('৳', '');
            var sub_total = parseFloat(cutTotal);
            var grandTotal = shipingCost + sub_total;
            $('.grandTotal').html("৳" + grandTotal);
            // alert(grandTotal);
            $('input[name="shipingSave"]').val(shipingCost)
            $('input[name="grandTotalSave"]').val(grandTotal)
        });
    </script>
    <script>
        $(document).on('change', '#country_id', function () {
            var country_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/cityView',
                data: {country_id: country_id},
                success: function (data) {
                    console.log(data);
                    $('#city_id').html(data);
                }
            });

        });

    </script>
@endsection

