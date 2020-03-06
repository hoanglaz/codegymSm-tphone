@extends('layouts.admin.design')
@section('title','Dashboard')
@section('content')
<div class="row">
    <div class="col-md-12 col-xl-4">
        <!-- table card start -->
        <div class="card table-card">
            <div class="">
                <div class="row-table">
                    <div class="col-sm-6 card-block-big br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="icofont icofont-eye-alt text-success"></i>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>{{ Auth::user()->posts()->count() }}</h5>
                                <span>Posts</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-block-big">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="icofont icofont-ui-music text-danger"></i>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>{{ Auth::user()->products()->count() }}</h5>
                                <span>Products</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row-table">
                    <div class="col-sm-6 card-block-big br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="icofont icofont-files text-info"></i>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>{{ Auth::user()->categories()->count() }}</h5>
                                <span>Categories</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-block-big">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="icofont icofont-envelope-open text-warning"></i>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>{{ Auth::user()->tags()->count() }}</h5>
                                <span>Tags</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- table card end -->
    </div>
    <div class="col-md-12 col-xl-4">
        <!-- table card start -->
        <div class="card table-card">
            <div class="">
                <div class="row-table">
                    <div class="col-sm-6 card-block-big br">
                        <div class="row">
                            <div class="col-sm-4">
                                <div id="barchart" style="height:40px;width:40px;"></div>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>1000</h5>
                                <span>View</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-block-big">
                        <div class="row ">
                            <div class="col-sm-4">
                                <i class="icofont icofont-network text-primary"></i>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>600</h5>
                                <span>Comments</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row-table">
                    <div class="col-sm-6 card-block-big br">
                        <div class="row ">
                            <div class="col-sm-4">
                                <div id="barchart2" style="height:40px;width:40px;"></div>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>350</h5>
                                <span>Show room</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-block-big">
                        <div class="row ">
                            <div class="col-sm-4">
                                <i class="icofont icofont-network-tower text-primary"></i>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>99</h5>
                                <span>Call action</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- table card end -->
    </div>
    <div class="col-md-12 col-xl-4">
        <!-- widget primary card start -->
        <div class="card table-card widget-primary-card">
            <div class="">
                <div class="row-table">
                    <div class="col-sm-3 card-block-big">
                        <i class="icofont icofont-star"></i>
                    </div>
                    <div class="col-sm-9">
                        <h4>4000 +</h4>
                        <h6>Traffic/month</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- widget primary card end -->
        <!-- widget-success-card start -->
        <div class="card table-card widget-success-card">
            <div class="">
                <div class="row-table">
                    <div class="col-sm-3 card-block-big">
                        <i class="icofont icofont-trophy-alt"></i>
                    </div>
                    <div class="col-sm-9">
                        <h4>17</h4>
                        <h6>Notification</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">
                Chức năng đang nâng cấp: thống kê phân tích khách hàng
            </div>
        </div>
    </div>


</div>
@endsection