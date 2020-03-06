@extends('layouts.admin.design')
@section('title','Cấu hình analytic')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Cấu hình analytic</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    {{--<form  @if(!isset($parador['google'])) action="{{ route('configs.store') }}" method="post" @else
                    action="{{ route('configs.update',$parador['google']->id) }}"
                    method="post"
                            @endif > @if(isset($parador['google'])) @csrf @method('PUT') @endif--}}
                    @if(!isset($parador['google']))
                    <form method="post" action="{{ route('configs.store') }}" enctype="multipart/form-data"> @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Google analytics</label>
                            <div class="col-sm-10">

                                <textarea class="form-control" name="config[info][google]">@if(isset($parador['google'])){{$parador['google']->value}}@endif</textarea>
                                <span class="messages">Chỉ cần id google analytic .</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary m-b-0">{{__('Submit')}}</button>
                            </div>
                        </div>
                    </form>
                        @else
                        <form method="post" action="{{ route('configs.update',$parador['google']->id) }}" enctype="multipart/form-data"> @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Google analytics</label>
                                <div class="col-sm-10">

                                    <textarea class="form-control" name="config[info][google]">@if(isset($parador['google'])){{$parador['google']->value}}@endif</textarea>
                                    <span class="messages">Chỉ cần id google analytic .</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary m-b-0">{{__('Submit')}}</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

