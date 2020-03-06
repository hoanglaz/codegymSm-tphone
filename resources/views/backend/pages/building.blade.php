@extends('layouts.admin.design')
@section('title','Building page')
@section('content')

<form id="main" method="post" action="{{ route('pages.store') }}" novalidate enctype="multipart/form-data"> @csrf
    <div class="row">                    
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Building new page')}}</h5>
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
                            <input type="text" class="form-control" name="title" id="title" placeholder="{{__('Title Page')}}" onkeyup="ChangeToSlug();">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('Link')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="url" id="url">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">{{__('Desciption')}}</label>
                        <div class="col-sm-12">
                            <textarea name="des" id="des" class="form-control">{{__('Desciption')}}</textarea>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea name="content" id="content-building" class="form-control">{{__('Content')}}</textarea>
                            <span class="messages"></span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- building content--}}
            {{--Seo content--}}
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Build config')}}</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block" id="page-building">

                </div>
                <div class="card-footer">
                    <div class="form-group row text-center">
                        <a href="javascript:void(0)" class="form-control align-items-center" data-toggle="modal" data-target="#default-Modal">
                            <i class="icofont icofont-ui-add"></i> Add module
                        </a>
                        {{--start modal--}}
                        <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Choose module</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>List module</h5>
                                        <div>
                                            @foreach($modules as $key => $val)
                                            <a href="javascript:void(0)" onclick="addPageBuilding('{{$val}}','{{$key}}');" class="form-control align-items-center" data-toggle="modal" data-target="#default-Modal">
                                                <i class="icofont icofont-ui-add"></i> Add module {{$val}}
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--end modal--}}
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
                            <textarea class="form-control" name="mete_des" id="mete_des"></textarea>
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
                    <div class="row">
                        <label class="col-sm-12 col-form-label">{{__('Type')}}</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="type" id="type2" value="building" @if(request('type') == 'building') checked @endif> {{__('Building')}}
                                </label>
                            </div>
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
                            <input id="select-input-image" type="text" name="image" class="form-control">
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

