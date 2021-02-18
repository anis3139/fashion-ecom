@extends('fronts.master')

@section('content')

    <div class=" container mt-5" id="orderconplate">
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading"><strong style="font-size: 18px;color: #3c763d"><i class="fa fa-bus" style="color: #3c763d"> </i>
                        অর্ডার কনফার্মেশন
                    </strong></div>
                <div class="panel-body" style="padding-left: 30px;padding-right: 30px">
                    <strong>প্রিয় ক্রেতা,</strong>
                    <p class="text-justify">
                        কেনাকাটার মাধ্যম হিসেবে


                        {{ config('app.name') }}

                        – কে বেছে নেবার জন্য আপনাকে আন্তরিক ধন্যবাদ।আপনার অর্ডারটি সফলভাবে গ্রহন করা হয়েছে। এখন থেকে
                        পরবর্তী ২৪ ঘন্টার মধ্যে আমাদের প্রতিনিধি আপনার সাথে যোগাযোগ করবেন ।
                        যে কোনো প্রয়োজনে কল করুন 01891717189
                        <?php
                        $orderPrice = App\order::where('invoice', $invoice)->first();
                        ?>

                        <strong>Order ID -{{$invoice}},Total Order - {{$orderPrice->grandTotal}} Taka</strong>
                        <br>ধন্যবাদ
                    </p>
                    <br>
                </div>
                <br>


                <div class="form-group" style="padding-bottom: 15px;"><br>
                    <!--<input type="submit" class="btn btn-success btn-block" value="Confirm Order">-->
                </div>

            </div>
        </div>

    </div>


    <div class="clear"></div>

@endsection

