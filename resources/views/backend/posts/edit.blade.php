@extends('layouts.admin.design')
@section('title','Edit post')
@section('content')
<form id="main" method="post" action="{{ route('posts.update',$post->id) }}" novalidate enctype="multipart/form-data"> @csrf @method('PUT')
    <div class="row">                    
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Edit post')}}</h5>
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
                            <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}" onkeyup="ChangeToSlug();">
                            @if($errors->has('title'))
                                <span class="messages alert-danger">{{ $errors->first('title')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('Link')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="url" id="url" value="{{ $post->url }}">
                            @if($errors->has('url'))
                                <span class="messages alert-danger">{{ $errors->first('url')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('Desciption')}}</label>
                        <div class="col-sm-12">
                            <textarea name="des" id="des" class="form-control" onkeyup="getDescription('des','meta_des');">{{ $post->des }}</textarea>
                            @if($errors->has('des'))
                                <span class="messages alert-danger">{{ $errors->first('des')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('Content')}}</label>
                        <div class="col-sm-12">
                            <textarea name="content" id="content" class="form-control">{!! $post->content !!}</textarea>
                            @if($errors->has('content'))
                                <span class="messages alert-danger">{{ $errors->first('content')}}</span>
                            @endif
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
                            <input type="text" class="form-control" name="meta_title" id="meta-title" value="{{ $post->meta_title }}">
                            <span class="messages"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('Meta Description')}}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="meta_des" id="meta_des">{{ $post->meta_des }}</textarea>
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
                                <option value="2" @if($post->status == 2) selected @endif>{{__('Published')}}</option>
                                <option value="1" @if($post->status == 1) selected @endif>{{__('Draft')}}</option>
                                <option value="0" @if($post->status == 0) selected @endif>{{__('Pending')}}</option>
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
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('Categories')}}</label>
                        <div class="col-sm-12" id="list-cates">
                            @foreach($cates as $key => $val)
                                <div class="checkbox-fade fade-in-primary">
                                    <label>
                                        <input id="cate{{ $val->id }}" type="checkbox" name="cate[]" value="{{ $val->id }}" checked/>
                                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span for="cate{{ $val->id }}">{{ $val->name }}</span><br/>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('Tags')}}</label>
                        <div class="col-sm-12" id="list-tags">
                            <select class="admin-js-select2 form-control" name="tag[]" multiple="multiple">
                            @foreach($tags as $key => $val)
                            <option id="tag{{$val->id}}" selected value="{{$val->id}}">{{ $val->name }}</option>
                            @endforeach
                        </select>
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
                            <img width="150px" src="{{ asset($post->image)}}" alt="image-edit"> 
                            <input readonly id="select-input-image" type="text" name="image" class="form-control" value="{{ $post->image }}">
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

