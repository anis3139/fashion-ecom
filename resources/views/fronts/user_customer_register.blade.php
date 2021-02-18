@extends('fronts.master')
@section('content')

    <link rel="stylesheet" href="{{ asset('front/css/register_form.css') }}">
    <!------ Include the above in your HEAD tag ---------->

    <div class="container register mb-5">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Welcome to {{ config('app.name') }}</h3>
                <p>You are 30 seconds away from buy your favourite products!</p>
                {{--<input type="submit" name="" value="Login"/>--}}
                <br/>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Register as a Customer</h3>
                        <form action="{{ url('/customerSaveForm') }}" method="post">
                            @csrf
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name *" autocomplete="name" value="{{ old('name') }}" />

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="11" maxlength="11" name="number" class="form-control @error('number') is-invalid @enderror" placeholder="Your Phone *" value="{{ old('number') }}" />

                                        @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Enter Your Address *" value="{{ old('address') }}" />

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="gender" required>
                                            <option class="hidden" selected disabled>GENDER</option>
                                            <option value="male">MALE</option>
                                            <option value="female">FEMALE</option>
                                            <option value="other">OTHER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email *" autocomplete="email" value="{{ old('email') }}" />

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password *" autocomplete="new-password" value="" />

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password *" value="" />
                                    </div>
                                    <input type="submit" class="btnRegister"  value="Register"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
