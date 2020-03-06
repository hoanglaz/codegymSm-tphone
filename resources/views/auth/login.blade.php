@extends('layouts.app')

@section('content')
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body">
                        <form class="md-float-material" method="POST" action="{{ route('login') }}"> @csrf
                            <div class="text-center">
                                <img src="{{ asset('adminbymrh/assets/images/auth/logo.png')}}" alt="logo.png">
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Sign In</h3>
                                    </div>
                                    @error('email')
                                        <span class="col-md-12 invalid-feedback alert alert-warning" role="alert">
                                            <strong class="text-dark">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @error('password')
                                        <span class="col-md-12 invalid-feedback alert alert-warning" role="alert">
                                            <strong class="text-dark">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email Address" value="{{ old('email') }}" name="email" required autocomplete="email" autofocus>
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password" required autocomplete="current-password">
                                    
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">{{ __('Remember Me') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-right f-w-600 text-inverse"> {{ __('Forgot Your Password?') }}</a>
                                    @endif
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                            {{ __('Sign in') }}
                                        </button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                                        <p class="text-inverse text-left m-b-0">
                                            <a href="{{route('web.index')}}">Về trang chủ</a>
                                        </p>
                                       {{-- <p class="text-inverse text-left"><b>Your haven't accout? <a href="{{ route('register') }}">Register</a></b></p>--}}
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{ asset('adminbymrh/assets/images/auth/Logo-small-bottom.png')}}" alt="small-logo.png">
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
@endsection
