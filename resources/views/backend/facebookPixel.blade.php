@extends('layouts.admin.design')
@section('title','Cấu hình facebook pixel')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Cấu hình facebook</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    @if(!isset($parador['facebook']))
                        <form method="post" action="{{ route('configs.store') }}" enctype="multipart/form-data"> @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">facebook pixel</label>
                                <div class="col-sm-10">

                                    <textarea class="form-control" name="config[info][facebook]">@if(isset($parador['facebook'])){{$parador['facebook']->value}}@endif</textarea>
                                    <span class="messages">Chỉ cần id facebook qc .</span>
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
                        <form method="post" action="{{ route('configs.update',$parador['facebook']->id) }}" enctype="multipart/form-data"> @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Google analytics</label>
                                <div class="col-sm-10">

                                    <textarea class="form-control" name="config[info][facebook]">@if(isset($parador['facebook'])){{$parador['facebook']->value}}@endif</textarea>
                                    <span class="messages">Chỉ cần id facebook .</span>
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

