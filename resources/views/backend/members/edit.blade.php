@extends('layouts.admin.design')
@section('title',' Chỉnh sửa đại lý')
@section('content')
<form id="main" method="post" action="{{ route('members.update',$member->id) }}" novalidate enctype="multipart/form-data"> @method('PUT') @csrf
    <div class="row">                    
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Chỉnh sửa thông tin đại lý')}}</h5>
                    <span>{{__('System adminstrator website 4.0')}}</span>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{ $member->name }}">
                                    @if($errors->has('name'))
                                        <span class="messages alert-danger">{{ $errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fullname" value="{{ $member->fullname }}">
                                    @if($errors->has('name'))
                                        <span class="messages alert-danger">{{ $errors->first('fullname')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address" value="{{ $member->address }}">
                                    @if($errors->has('name'))
                                        <span class="messages alert-danger">{{ $errors->first('fullname')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" value="{{ $member->email }}">
                                    @if($errors->has('email'))
                                        <span class="messages alert-danger">{{ $errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>
                            {{--<div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                    @if($errors->has('password'))
                                        <span class="messages alert-danger">{{ $errors->first('password')}}</span>
                                    @endif
                                </div>
                            </div>--}}
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Status</label>
                                <div class="col-sm-12">
                                    <select name="status" class="form-control" >
                                        <option value="1" selected>Active</option>
                                        <option value="0">Disable</option>
                                    </select>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <input value="{{$member->image}}" type="text" class="form-control" name="image" id="avatar" placeholder="select image" readonly>
                                    <span class="messages alert-warning">required: 270x320px</span>
                                </div>
                                <div class="col-sm-2">
                                    <a href="javascript:void(0)" class="btn btn-secondary form-control" onclick="selectImageHome('avatar');">...</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary m-b-0">{{__('Add new')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

