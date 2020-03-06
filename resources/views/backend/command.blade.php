@extends('layouts.admin.design')
@section('title','Command line')
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
                                    <h5>10k</h5>
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
                                    <h5>100%</h5>
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
                                    <h5>2000 +</h5>
                                    <span>Courses</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-envelope-open text-warning"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>120</h5>
                                    <span>Events</span>
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
                                    <span>Members</span>
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
                                    <span>Students</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row ">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-network-tower text-primary"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>100%</h5>
                                    <span>Categories</span>
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
                            <h6>Views</h6>
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
                            <h6>Teacher</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- widget-success-card end -->
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    <form action="{{ route('command') }}" method="post"> @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Command line</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="command"></textarea>
                                <span class="messages">sudo chmod -R 777 .</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary m-b-0">{{__('RUN')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection