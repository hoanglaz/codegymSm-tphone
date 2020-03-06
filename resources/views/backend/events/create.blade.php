@extends('layouts.admin.design')
@section('title','Create event')
@section('content')
<form id="main" method="post" action="{{ route('events.store') }}" novalidate enctype="multipart/form-data"> @csrf
    <div class="row">                    
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Create new event')}}</h5>
                    <span>{{__('System adminstrator website 4.0')}}</span>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('Title')}}</label>
                        <div class="col-sm-10">
                            <input value="{{ old('title') }}" type="text" class="form-control" name="title" id="title" placeholder="{{__('Title event')}}" >
                            <span class="messages text-danger">
                                @if($errors->first('title') != "") {{ $errors->first('title') }} @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('Link')}}</label>
                        <div class="col-sm-10">
                            <input value="{{ old('url') }}" type="text" class="form-control" name="url" id="url">
                            <span class="messages text-danger">
                                @if($errors->first('url') != "") {{ $errors->first('url') }} @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('Desciption')}}</label>
                        <div class="col-sm-12">
                            <textarea name="des" id="des" class="form-control" >{{ old('des','mieu ta banner') }}</textarea>
                            <span class="messages text-danger">
                                @if($errors->first('des') != "") {{ $errors->first('des') }} @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('Content')}}</label>
                        <div class="col-sm-12">
                            <textarea name="content"  class="form-control">{{ old('content','noi dung banner') }}</textarea>
                            <span class="messages text-danger">
                                @if($errors->first('content') != "") {{ $errors->first('content') }} @endif
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            {{-- THÔNG TIN TỔ CHỨC SỰ KIỆN --}}
            <div class="card d-none">
                <div class="card-header">
                    <h5>{{__('Information Organizer')}}</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('company')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company"  placeholder="" value="{{ old('company','hoang') }}">
                            <span class="messages text-danger">
                                @if($errors->first('company') != "") {{ $errors->first('company') }} @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('phone')}}</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="phone" value="{{ old('phone','0123') }}">
                            <span class="messages text-danger">
                                @if($errors->first('phone') != "") {{ $errors->first('phone') }} @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('email')}}</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="{{ old('email','hoang@gmail.com') }}">
                            <span class="messages text-danger">
                                @if($errors->first('email') != "") {{ $errors->first('email') }} @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('website')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="website" value="{{ old('website','0123') }}">
                            <span class="messages text-danger">
                                @if($errors->first('website') != "") {{ $errors->first('website') }} @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('Google map')}}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="map">{{ old('map','map') }}</textarea>
                            <span class="messages text-danger">
                                @if($errors->first('map') != "") {{ $errors->first('map') }} @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card d-none">
                <div class="card-header">
                    <h5>{{__('Detail')}}</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('Status')}}</label>
                        <div class="col-sm-12">
                            <select name="status" class="form-control">
                                <option value="2">{{__('Published')}}</option>
                                <option value="1">{{__('Draft')}}</option>
                                <option value="0">{{__('Pending')}}</option>
                            </select>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('Author')}}</label>
                        <div class="col-sm-12">
                            <input type="text" readonly class="form-control" name="author" value="{{ Auth::user()->name }}">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Bắt đầu</label>
                        <div class="col-sm-12">
                            <input type="time" class="form-control" name="start" value="">
                            <span class="messages text-danger">
                                @if($errors->first('start') != "") {{ $errors->first('start') }} @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Kết thúc</label>
                        <div class="col-sm-12">
                            <input type="time" class="form-control" name="end" value="">
                            <span class="messages text-danger">
                                @if($errors->first('end') != "") {{ $errors->first('end') }} @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Ngày tổ chức</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" name="person" value="">
                            <span class="messages"></span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>{{__('Image')}}</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input id="select-input-image" type="text" name="image" class="form-control" value="{{ old('image') }}">
                            <span class="messages text-danger">
                                @if($errors->first('image') != "") {{ $errors->first('image') }} @endif
                            </span>
                            <a onclick="selectImage()" class="btn btn-primary">Select image</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12"></label>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary m-b-0" data-type="success" data-from="top" data-align="right">{{__('Submit')}}</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</form>
<!-- notification -->
@endsection

