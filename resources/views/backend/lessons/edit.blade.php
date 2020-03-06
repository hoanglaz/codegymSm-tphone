@extends('layouts.admin.design')
@section('title','Edit Lesson')
@section('content')
    <form id="main" method="post" action="{{ route('lessons.update', $lesson->id) }}" novalidate enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('Edit Lesson')}}</h5>
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
                                <input value="{{ $lesson->title }}" type="text" class="form-control" name="title" id="title" onkeyup="ChangeToSlug();">
                                <span class="messages text-danger">@if($errors->first('title') != "") {{ $errors->first('title') }} @endif</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('Link')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="url" id="url" value="{{ $lesson->url }}" >
                                <span class="messages text-danger">
                                @if($errors->first('url') != "") {{ $errors->first('url') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('Video')}}</label>
                            <div class="col-sm-10">
                                <input value="{{ $lesson->video }}" type="text" class="form-control" name="video" id="video">
                                <span class="messages text-danger">@if($errors->first('video') != "") {{ $errors->first('video') }} @endif</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">{{__('Desciption')}}</label>
                            <div class="col-sm-12">
                                <textarea name="des" id="des" class="form-control" onkeyup="getDescription('des','meta_des');">{{ $lesson->des }}</textarea>
                                <span class="messages text-danger">
                                @if($errors->first('des') != "") {{ $errors->first('des') }} @endif
                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">{{__('Content')}}</label>
                            <div class="col-sm-12">
                                <textarea name="content" id="content" class="form-control">{{ $lesson->content }}</textarea>
                                <span class="messages"></span>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Seo content--}}
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('SEO config')}}</h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-rounded-down"></i>
                            <i class="icofont icofont-close-circled"></i>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('Meta Title')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="meta_title" id="meta-title"  value="{{ $lesson->meta_title }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('Meta Description')}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="meta_des" id="meta_des">{{ $lesson->meta_des }}</textarea>
                                <span class="messages"></span>
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
                                <input type="text" readonly class="form-control" name="author" value="{{ Auth::user()->name }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">{{__('Courses')}}</label>
                            <div class="col-sm-12">
                                <select name="course_id" class="form-control">
                                    @foreach($courses as $key => $val)
                                        <option @if($val->id == $lesson->course_id) selected @endif value="{{ $val->id }}">{{ $val->title }}</option>
                                    @endforeach
                                </select>
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
                                <input id="select-input-image" type="text" name="image" class="form-control" value="{{ $lesson->image }}">
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

