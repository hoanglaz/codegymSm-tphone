@extends('layouts.admin.design')
@section('title','Home page config')
@section('content')
    <?php
    $status = [0=>'Pending',1=>'Draft',2=>'Published'];

    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Home page config</h5>
                    <span>Descreption</span>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                </div>
                {{--form cấu hình--}}

                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="sub-title">Cấu hình giao diện website</div>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs " role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active color-inverse" data-toggle="tab" href="#home7" role="tab"><i class="icofont icofont-home"></i>Home</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link color-inverse" data-toggle="tab" href="#profile7" role="tab"><i class="icofont icofont-ui-browser"></i>Content</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link color-inverse" data-toggle="tab" href="#messages7" role="tab"><i class="icofont icofont-ui-message"></i>Config</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link color-inverse" data-toggle="tab" href="#settings7" role="tab"><i class="icofont icofont-ui-settings"></i>Settings</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs card-block">

                                        <div class="tab-pane active" id="home7" role="tabpanel">
                                            @if($homes->count() == 0)
                                                @include('backend.homes.create')
                                            @else
                                                @include('backend.homes.edit')
                                            @endif
                                        </div>

                                        <div class="tab-pane" id="profile7" role="tabpanel">
                                            @if(isset($homes[11]))
                                                @include('backend.homes.editcontent')
                                            @else
                                                @include('backend.homes.content')
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="messages7" role="tabpanel">
                                            @if(!isset($configs))
                                                @include('backend.homes.config')
                                            @else
                                                @include('backend.homes.editconfig')
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="settings7" role="tabpanel">
                                            Đang trong quá trình phát triển
                                            {{--@include('backend.homes.setting')--}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <!-- show menu -->
                    </div>
                </div>
                </div>
                <div class="card-footer text-center">
                    <h5>Thông báo config trang chủ !</h5>
                </div>

            </div>
        </div>
    </div>
@stop