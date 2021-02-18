@extends('fronts.master')

@section('content')

    <div class="inner_page-banner one-img"></div>

    <div class="using-border py-3">
        <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                    <span>/ </span>
                </li>
                <li>Contact</li>
            </ul>
        </div>
    </div>

    <section class="contact ">
        <div class="container" id="header_top">
            <div class="card row p-2">
                <div class="card-body">
                    <h3 class="title text-center pb-2">Contact Us</h3>
                    <div class="contact-list-grid">
                        <form action="{{ route('store.customer.message') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" placeholder="Enter mobile number">
                                    @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" cols="30" rows="3" placeholder="Enter message">{{ old('message') }}</textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary btn-block">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="subscribe pt-4">
        <div class="container" id="contract_map">
            <div class="row">
                <div class="col-lg-6 col-md-6 map-info-right py-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.3280951562674!2d90.36650911398665!3d23.80692939253363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d6f6b8c2ff%3A0x3b138861ee9c8c30!2sMirpur%2010%20Roundabout%2C%20Dhaka%201216!5e0!3m2!1sen!2sbd!4v1581428272596!5m2!1sen!2sbd"
                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="">
                    </iframe>
                </div>
                <div class="col-lg-6 col-md-6 address-w3l-right text-center text-dark">
                    <div class="address-gried ">
                        <span class="far fa-map"></span>
                        <h6>{{ isset($site_info->address)? $site_info->address : ""  }}<h6>
                    </div>
                    <div class="address-gried mt-3">
                        <span class="fas fa-phone-volume"></span>
                        <h6>
                            {{ isset($site_info->mobile_one)? $site_info->mobile_one : "" }}
                            <br>
                            {{ isset($site_info->mail_two) ? $site_info->mail_two : '' }}
                        </h6>
                    </div>
                    <div class=" address-gried mt-3">
                        <span class="far fa-envelope"></span>
                        <h6>
                            <a class="text-decoration-none"
                               href="mailto:{{ isset($site_info->mail_one)? $site_info->mail_one : '' }}">{{  isset($site_info->mail_one)? $site_info->mail_one : '' }}</a>
                            <br>
                            @if(isset($site_info->mail_two))
                                <a class="text-decoration-none"
                                   href="mailto:{{ isset($site_info->mail_two) ? $site_info->mail_two : '' }}">{{ isset($site_info->mail_two) ? $site_info->mail_two : '' }}</a>
                                <br>
                            @endif
                            @if(isset($site_info->mail_three))
                                <a class="text-decoration-none"
                                   href="mailto:{{ isset($site_info->mail_three) ? $site_info->mail_three : '' }}">{{ isset($site_info->mail_three) ? $site_info->mail_three : '' }}</a>
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="clear"></div>
@endsection



