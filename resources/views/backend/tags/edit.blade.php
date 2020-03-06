@extends('layouts.admin.design')
@section('title','Edit Tags')
@section('content')
<div class="row">                    
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Tags</h5>
                <div class="card-header-right">
                    <i class="icofont icofont-rounded-down"></i>
                    <i class="icofont icofont-refresh"></i>
                    <i class="icofont icofont-close-circled"></i>
                </div>
            </div>
            <div class="card-block">
                <form id="main" method="post" action="{{ route('tags.update',$tag->id) }}" novalidate> @csrf @method('PUT')
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $tag->name }}">
                                    @if($errors->has('name'))
                                        <span class="messages alert-danger">{{ $errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $tag->title }}" onkeyup="ChangeToSlug();">
                                    @if($errors->has('title'))
                                        <span class="messages alert-danger">{{ $errors->first('title')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="url" name="url" value="{{ $tag->url }}">
                                    @if($errors->has('url'))
                                        <span class="messages alert-danger">{{ $errors->first('url')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{__('Description')}}</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="des" id="des" >{{ $tag->des }}</textarea>
                                    @if($errors->has('des'))
                                        <span class="messages alert-danger">{{ $errors->first('des')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group row">
                                
                                <div class="col-sm-12">
                                    <select name="status" class="form-control" id="status">
                                        <option value="2" @if($tag->status == 2) selected @endif>Published</option>
                                        <option value="1" @if($tag->status == 1) selected @endif>Draft</option>
                                        <option value="0" @if($tag->status == 0) selected @endif>Pending</option>
                                    </select>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">{{__('Author')}}</label>
                                <div class="col-sm-12">
                                    <label class="form-control">{{ Auth::user()->name }}</label>
                                    <input type="text" class="form-control d-none" id="author" name="user_id" value="{{ Auth::user()->id }}" readonly>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">{{__('Type')}}</label>
                                <div class="col-sm-12">
                                    <select name="type" class="form-control">
                                        <option value="post" @if('post' == $tag->type) selected @endif>Post</option>
                                        <option value="product" @if('product' == $tag->type) selected @endif>Product</option>
                                        <option value="project" @if('project' == $tag->type) selected @endif>Project</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary m-b-0">{{__('Submit')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection