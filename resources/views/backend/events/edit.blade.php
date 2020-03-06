@extends('layouts.admin.design')
@section('title','Edit event')
@section('content')
    <form id="main" method="post" action="{{ route('events.update',$event->id) }}" novalidate enctype="multipart/form-data"> @csrf @method('PUT')
        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('Edit new event')}}</h5>
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
                                <input value="{{ $event->title }}" type="text" class="form-control" name="title" id="title" onkeyup="ChangeToSlug();">
                                <span class="messages text-danger">
                                @if($errors->first('title') != "") {{ $errors->first('title') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('Link')}}</label>
                            <div class="col-sm-10">
                                <input value="{{ $event->url }}" type="text" class="form-control" name="url" id="url">
                                <span class="messages text-danger">
                                @if($errors->first('url') != "") {{ $errors->first('url') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">{{__('Desciption')}}</label>
                            <div class="col-sm-12">
                                <textarea name="des" id="des" class="form-control" onkeyup="getDescription('des','meta_des');">{{ $event->des }}</textarea>
                                <span class="messages text-danger">
                                @if($errors->first('des') != "") {{ $errors->first('des') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">{{__('Content')}}</label>
                            <div class="col-sm-12">
                                <textarea name="content"  class="form-control">{{ $event->content }}</textarea>
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
                                <input type="text" class="form-control d-none" name="company"  placeholder="" value="{{$event->company }}">
                                <span class="messages text-danger">
                                @if($errors->first('company') != "") {{ $errors->first('company') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('phone')}}</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="phone" value="{{ $event->phone }}">
                                <span class="messages text-danger">
                                @if($errors->first('phone') != "") {{ $errors->first('phone') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('email')}}</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="{{ $event->email }}" >
                                <span class="messages text-danger">
                                @if($errors->first('email') != "") {{ $errors->first('email') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('website')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="website" value="{{ $event->website }}">
                                <span class="messages text-danger">
                                @if($errors->first('website') != "") {{ $errors->first('website') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('Google map')}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="map">{{ $event->map }}</textarea>
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
                                <input type="time" class="form-control" name="start" value="{{ $event->start }}">
                                <span class="messages text-danger">
                                @if($errors->first('start') != "") {{ $errors->first('start') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Kết thúc</label>
                            <div class="col-sm-12">
                                <input type="time" class="form-control" name="end" value="{{ $event->end }}">
                                <span class="messages text-danger">
                                @if($errors->first('end') != "") {{ $errors->first('end') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Ngày tổ chức</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="person" value="{{ $event->person }}">
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
                                <input id="select-input-image" type="text" name="image" class="form-control" value="{{ $event->image }}">
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

