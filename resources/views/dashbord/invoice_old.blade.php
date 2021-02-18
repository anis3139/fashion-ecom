<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="backBtn" style="float: right;">
                                <button class="btn btn-primary" onclick="myFunction()">Print</button>
                            </div>
                            <script>
                                function myFunction() {
                                    window.print();
                                }
                            </script>
                            <div class="printBtn">
                                <a href="{{url('/customer-dashboard')}}">
                                    <button class="btn btn-primary">Back</button>
                                </a>

                            </div>
                        </div>
                    </div>

                    <?php
                    $invoiveNumber = $order->invoice;
                    $shipping_information = App\shipping::where('invoice', $invoiveNumber)->first();
                    $customer_info = App\customer_info::where('user_id', $shipping_information->user_id)->first();
                    $order_id = $order->id;
                    $customerName = App\customer_info::where('order_id', $order_id)->first();
                    $user_info = App\User::where('id', $shipping_information->user_id)->first();
                    ?>

                    <div class="card">
                        <div class="card-header">
                            Invoice :
                            <strong> {{ $order->invoice }}</strong>
                            <span class="float-right"> <strong>Status:</strong> <span class="badge badge-danger">Pending</span></span>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h6 class="mb-3">From:</h6>
                                    <div>
                                        <strong>Name : @if(isset($user_info->name)){{ $user_info->name }}@else {{ $customerName->name }} @endif </strong>
                                    </div>
                                    <div>Email: @if(isset($user_info->email)){{  $user_info->email }}@else No Email
                                        :) @endif</div>
                                    <div>Address: {{ $customer_info->address }} </div>
                                    <div>Phone: {{  $customer_info->number }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="mb-3">To:</h6>
                                    <div>
                                        <strong>Name: {{ $shipping_information->quick_name ? $shipping_information->quick_name : 'No Name Found' }}</strong>
                                    </div>
                                    <div>Address: {{ $shipping_information->address }}</div>
                                    <div>Phone: {{ $shipping_information->phone }}</div>
                                    <div>District: {{ $shipping_information->region }}</div>
                                    {{--<div>Post Code: {{ $shipping_information->zipCode }}</div>--}}
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($billing_detail as $key=> $v_billing_detail)
                                        <tr>
                                            <td class="center">{{ $key+1 }}</td>
                                            @if(isset($v_billing_detail->products->product_name))
                                                <td class="left strong">{{ $v_billing_detail->products->product_name }}</td>
                                            @else
                                                <td class="left strong">Product Not Found</td>
                                            @endif
                                            <td>
                                                <img src="{{ asset('upload/product/'. $v_billing_detail->products->image) }}" width="64px">
                                            </td>
                                            <td class="right">{{ $v_billing_detail->product_quantity }}</td>
                                            <td class="left">{{ $v_billing_detail->product_unite_price }}</td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong>Subtotal</strong>
                                            </td>
                                            <td class="right">৳ {{ $order->grandTotal-$order->shiping }}</td>
                                        </tr>
                                        {{--   <tr>
                                             <td class="left">
                                                <strong>Discount (20%)</strong>
                                             </td>
                                             <td class="right">$1,699,40</td>
                                          </tr> --}}
                                        <tr>
                                            <td class="left">
                                                <strong>Shipping Cost</strong>
                                            </td>
                                            <td class="right">৳ {{ $order->shiping }}</td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="right">
                                                <strong>৳ {{ $order->grandTotal }}</strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
