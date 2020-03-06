@extends('layouts.admin.design')
@section('title','Edit course')
@section('content')
    <form id="main" method="post" action="{{ route('courses.update',$course->id) }}" novalidate enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('Edit course')}}</h5>
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
                                <input value="{{ $course->title }}" type="text" class="form-control" name="title" id="title" placeholder="{{__('Title post')}}">
                                <span class="messages text-danger">@if($errors->first('title') != "") {{ $errors->first('title') }} @endif</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('Link')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="url" id="url" value="{{ $course->url }}" >
                                <span class="messages text-danger">
                                @if($errors->first('url') != "") {{ $errors->first('url') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">{{__('Desciption')}}</label>
                            <div class="col-sm-12">
                                <textarea name="des" id="des" class="form-control" onkeyup="getDescription('des','meta_des');">{{ $course->des }}</textarea>
                                <span class="messages text-danger">
                                @if($errors->first('des') != "") {{ $errors->first('des') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">{{__('Content')}}</label>
                            <div class="col-sm-12">
                                <textarea name="content" class="form-control">{{ $course->content }}</textarea>
                                <span class="messages text-danger">
                                @if($errors->first('content') != "") {{ $errors->first('content') }} @endif
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
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
                                <input class="d-none" readonly required name="user_id" value="{{Auth::user()->id}}">
                                <input type="text" readonly class="form-control" name="author" value="{{ Auth::user()->name }}">
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
                                <input id="select-input-image" type="text" name="image" class="form-control" value="{{ $course->image }}">
                                <a onclick="selectImage()" class="btn btn-primary">Select image</a><br>
                                <span class="messages text-danger">
                                    @if($errors->first('image') != "") {{ $errors->first('image') }} @endif
                                </span>
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

