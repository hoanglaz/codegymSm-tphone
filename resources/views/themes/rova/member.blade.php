@extends('themes.rova.layouts.design')
@section('title',"Trang đăng nhập và đăng ký dành cho các đại lý")
@section('description',"Đăng ký trở thành đại lý phân phối độc quyền cho sàn gỗ cao cấp Parador tại Việt Nam")

@section('content')

    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title">Login</h2>
                        <ul class="breadcrumbs-list">
                            <li><a href="index.html">Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS AREA END -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">

        <!-- LOGIN SECTION START -->
        <div class="login-section pt-115 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="registered-customers mb-50">
                            <h5 class="mb-50">LOGIN</h5>
                            <form action="#">
                                <div class="login-account p-30 box-shadow">
                                    <p>If you have an account with us, Please log in.</p>
                                    <input type="text" name="name" placeholder="Email Address">
                                    <input type="password" name="password" placeholder="Password">
                                    <p><small><a href="#">Forgot our password?</a></small></p>
                                    <button class="submit-btn-1" type="submit">login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- new-customers -->
                    <div class="col-md-6 col-xs-12">
                        <div class="new-customers mb-50">
                            <form action="#">
                                <h5 class="mb-50">REGISTER</h5>
                                <div class="login-account p-30 box-shadow">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text"  placeholder="First Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text"  placeholder="last Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="custom-select-2">
                                                <option value="defalt">country</option>
                                                <option value="c-1">Australia</option>
                                                <option value="c-2">Bangladesh</option>
                                                <option value="c-3">Unitd States</option>
                                                <option value="c-4">Unitd Kingdom</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="custom-select-2">
                                                <option value="defalt">State</option>
                                                <option value="c-1">Melbourne</option>
                                                <option value="c-2">Dhaka</option>
                                                <option value="c-3">New York</option>
                                                <option value="c-4">London</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="custom-select-2">
                                                <option value="defalt">Town/City</option>
                                                <option value="c-1">Victoria</option>
                                                <option value="c-2">Chittagong</option>
                                                <option value="c-3">Boston</option>
                                                <option value="c-4">Cambridge</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text"  placeholder="Phone here...">
                                        </div>
                                    </div>
                                    <input type="text"  placeholder="Company neme here...">
                                    <input type="text"  placeholder="Email address here...">
                                    <input type="password"  placeholder="Password">
                                    <input type="password"  placeholder="Confirm Password">
                                    <div class="checkbox">
                                        <label class="mr-10">
                                            <small>
                                                <input type="checkbox" name="signup">Sign up for our newsletter!
                                            </small>
                                        </label>
                                        <label>
                                            <small>
                                                <input type="checkbox" name="signup">Receive special offers from our partners!
                                            </small>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <button class="submit-btn-1 mt-20" type="submit" value="register">Register</button>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <button class="submit-btn-1 mt-20 f-right" type="reset">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGIN SECTION END -->

        @include('themes.rova.layouts.subscribe')
    </section>
    <!-- End page content -->

@endsection
