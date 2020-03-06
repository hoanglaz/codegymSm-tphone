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
                        <label class="col-sm-12 col-form-label">{{__('Desciption')}}</label>
                        <div class="col-sm-12">
                            <textarea name="des" id="des" class="form-control">{!! $product->des !!}</textarea>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{!! $product->content !!}</label>
                        <div class="col-sm-12">
                            <textarea name="content" id="content" class="form-control">{!! $product->content !!}</textarea>
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
                            <input type="text" class="form-control" name="meta_title" id="meta-title" placeholder="{{__('Seo Title')}}">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('Meta Keyword')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="meta_keyword" id="meta-keyword">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('Meta Description')}}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="mete_description" id="mete-description"></textarea>
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
                        <label class="col-sm-12 col-form-label">{{__('price old')}}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="price_pre" value="{{ $product->price_pre }}">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('price new')}}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-12 col-form-label">{{__('Deal')}}</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="deal" id="type1" value="price1" checked> {{__('Use %')}}
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="deal" id="type2" value="price2"> {{__('Use price')}}
                                </label>
                            </div>
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
                        <div class="col-sm-12" id="list-cates">
                            @foreach($cates as $key => $val)
                            <input id="cate{{ $val->id }}" type="checkbox" name="cate[]" value="{{ $val->id }}" checked/>
                            <label for="cate{{ $val->id }}">{{ $val->name }}</label><br/>     
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
             <div class="card">
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
                        <div class="col-sm-12 text-center">
                            <img width="150px" src="{{ asset($product->image)}}" alt="image-edit"> 
                            <input id="select-input-image" type="text" name="image" class="form-control" value="{{ $product->image }}">
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

