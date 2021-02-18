@extends('dashbord.master')

{{--@push('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endpush--}}

@section('content')

    <style>
        .no-shadow {
            box-shadow: none !important;
        }
        .well-sm {
            padding: 9px;
            border-radius: 3px;
        }
        .well {
            min-height: 20px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
        }
        .text-muted {
            color: #777;
        }
    </style>


    @php
        $invoiveNumber = $order->invoice;
        $shipping_information = App\shipping::where('invoice', $invoiveNumber)->first();
        $customer_info = App\customer_info::where('user_id', $shipping_information->user_id)->first();
        $order_id = $order->id;
        $customerName = App\customer_info::where('order_id', $order_id)->first();
        $user_info = App\User::where('id', $shipping_information->user_id)->first();
    @endphp

    <!-- Content Header (Page header) -->

    <div class="pad margin no-print">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
        </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-md-12 d-block">
                <h2 class="page-header">
                    <div class="pull-left">
                        <i class="fa fa-globe"></i> {{ config('app.name') }}.
                    </div>
                    <div class="pull-right">
                        <small class="pull-right"> Date: {{ date('d-m-Y', strtotime($order->created_at)) }}</small>
                    </div>
                   
                 
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>{{ isset($user_info->name) ? $user_info->name : $customerName->name }}</strong><br>
                    Email: {{ isset($user_info->email) ? $user_info->email : 'No email' }} <br>
                    Phone: {{ isset($customer_info->number) ? $customer_info->number : 'No number' }} <br>
                    Address: {{ isset($customer_info->address) ? $customer_info->address : 'No address' }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>{{ $shipping_information->quick_name ? $shipping_information->quick_name : 'No Name Found' }}</strong><br>
                    Address: {{ $shipping_information->address }}<br>
                    Phone: {{ $shipping_information->phone }}<br>
                    District: {{ $shipping_information->region }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #{{ $order->invoice }}</b><br>
                <br>
                {{--<b>Order ID:</b> 4F3S8J<br>
                <b>Payment Due:</b> 2/22/2014<br>
                <b>Account:</b> 968-34567--}}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Product Code</th>
                        <th>Image</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($billing_detail as $key=> $v_billing_detail)
                    <tr>
                        <td>{{ ++$key }}</td>
                        @if(isset($v_billing_detail->products->product_name))
                            <td class="left strong">{{ $v_billing_detail->products->product_name }}</td>
                        @else
                            <td class="left strong">Product Not Found</td>
                        @endif
                        <td class="left strong">{{ $v_billing_detail->products->product_code }}</td>
                        <td>
                            <img src="{{ asset('upload/product/'. $v_billing_detail->products->image) }}" width="50px">
                        </td>
                        <td>{{ $v_billing_detail->product_quantity }}</td>
                        <td>৳{{ $v_billing_detail->product_unite_price }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
                <p class="lead">Payment Methods:</p>
                <img src="{{ asset('front/images/credit/bkash.png') }}" alt="bKash">
                <img src="{{ asset('front/images/credit/visa.png') }}" alt="Visa">
                <img src="{{ asset('front/images/credit/mastercard.png') }}" alt="Mastercard">
                <img src="{{ asset('front/images/credit/american-express.png') }}" alt="American Express">
                <img src="{{ asset('front/images/credit/paypal2.png') }}" alt="Paypal">

                <p class="text-muted well well-sm no-shadow text-justify" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p>
            </div>
            <!-- /.col -->
            <div class="col-6">
                <p class="lead">Amount Statement</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>৳{{ $order->grandTotal-$order->shiping }}</td>
                        </tr>
                        <tr>
                            <th>Shipping Cost:</th>
                            <td>৳{{ $order->shiping }}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>৳{{ $order->grandTotal }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="{{ route('invoice.print', $order->invoice) }}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
                {{--<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                </button>--}}
                {{--<a href="{{ route('invoice.print', $order->invoice) }}" target="" type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" download>
                    <i class="fa fa-download"></i> Generate PDF
                </a>--}}
            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>

@endsection
