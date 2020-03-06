@extends('layouts.admin.design')
@section('title','Create product')
@section('content')
<form id="main" method="post" action="{{ route('products.update',$product->id) }}" novalidate enctype="multipart/form-data"> @method('PUT') @csrf
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Create new product')}}</h5>
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
                            <input type="text" class="form-control" name="title" id="title" placeholder="{{__('Title product')}}" value="{{ $product->title }}" onkeyup="ChangeToSlug();">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('Link')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="url" id="url" value="{{ $product->url }}">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label" >{{__('Desciption')}}</label>
                        <div class="col-sm-12">
                            <textarea name="des" id="des" class="form-control" onkeyup="getDescription('des','meta_des');">{{$product->des }}</textarea>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Content</label>
                        <div class="col-sm-12">
                            <textarea name="content" id="content" class="form-control">{{$product->content }}</textarea>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Video</label>
                        <div class="col-sm-12">
                            <textarea name="video" id="content" class="form-control">{{$product->video }}</textarea>
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
                            <input type="text" class="form-control" name="meta_title" id="meta-title" value="{{ $product->meta_title }}">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('Meta Description')}}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="meta_des" id="meta-des">{{ $product->meta_des }}</textarea>
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
                                <option value="2" @if($product->status == 2) selected @endif>{{__('Published')}}</option>
                                <option value="1" @if($product->status == 1) selected @endif>{{__('Draft')}}</option>
                                <option value="0" @if($product->status == 0) selected @endif>{{__('Pending')}}</option>
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
                        <label class="col-sm-12 col-form-label">{{__('price')}}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="price_pre" value="{{ $product->price_pre }}">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('price deal')}}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('Best sale')}}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control d-none" name="deal" value="0">
                            <input type="checkbox" name="deal" @if($product->deal == 'on') checked @endif data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" data-offstyle="danger">

                            <span class="messages"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Categories')}}</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select name="cate" class="form-control">
                                @foreach($cates as $key => $val)
                                    <option value="{{ $val->id }}" @if($val->id == $product->categories[0]->id) selected @endif >{{ $val->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
             {{--<div class="card">
                <div class="card-header">
                    <h5>{{__('Tags')}}</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <div class="col-sm-12" id="list-tags">
                            <select class="admin-js-select2 form-control" name="tag[]" multiple="multiple">
                            <!-- list tags -->
                            @foreach($tags as $key => $val)
                            <option id="tag{{$val->id}}" selected value="{{$val->id}}">{{ $val->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>--}}
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Image')}}</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <img width="150px" src="{{ asset($product->image)}}" alt="image-edit">
                            <input readonly id="select-input-image" type="text" name="image" class="form-control" value="{{ $product->image }}">
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
@endsection

