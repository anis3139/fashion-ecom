@extends('fronts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-7">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email"
                                                   class="form-control form-control-user @error('email') is-invalid @enderror"
                                                   id="exampleInputEmail" value="{{ old('email') }}"
                                                   placeholder="Enter email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                   class="form-control form-control-user @error('password') is-invalid @enderror"
                                                   name="password" placeholder="Enter password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input"
                                                       {{ old('remember') ? 'checked' : '' }}   name="remember"
                                                       id="remember">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                            <div id="formFooter">
                                                <a class="underlineHover small text-decoration-none" href="{{ route('password.request') }}">Forgot Password?</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        {{--<a class="text-decoration-none" href="{{ url('/seller-register') }}">Create as a seller account?</a>
                                        <br>--}}
                                        <a class="text-decoration-none" href="{{ route('user.customer.register') }}">Create as a customer account?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

