@extends('layouts.admin.design')
@section('title','List menu')
@section('css')
    <!-- nestable css -->
    <link rel="stylesheet" type="text/css" href="{{asset('adminbymrh/nestable/nestable.css')}}">

@section('content')
    <?php
    $status = [0=>'Pending',1=>'Draft',2=>'Published']
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>List menu</h5>
                    <span>Descreption</span>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div id="nestable-menu" class="m-b-10">
                        <button type="button" class="btn btn-primary waves-effect waves-light m-r-20" data-action="expand-all">Save Menu</button>
                        {{--<button type="button" class="btn btn-success waves-effect waves-light" data-action="collapse-all">Collapse All</button>--}}
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="cf nestable-lists">
                                <div class="dd" id="nestable2">
                                    <?php $i = 1;?>
                                    <ol class="dd-list">
                                        @foreach($items as $key => $val)
                                            @if($val->parent_id == 0)
                                        <li class="dd-item dd3-item" data-id="{{$i++}}">
                                            {{--<div class="dd-handle dd3-handle">Drag</div>--}}
                                            <div class="dd3-content">{{ $val->title }}
{{--                                                <span class="float-right"><a href="" onclick="return confirm('Your have update item?')"><i class="ti-pencil-alt"></i></a></span>--}}
                                                <button class="btn-primary float-right" data-toggle="modal" data-target="#large-Modal{{$val->id}}"><i class="ti-pencil-alt"></i></button>
                                                <div class="modal fade show" id="large-Modal{{$val->id}}" tabindex="-1" role="dialog" >
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Sửa menu</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('backend.menus.item')
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-danger waves-effect waves-light "><a href="">Cancel</a></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               <button class="float-right btn-danger"><a href="{{ route('menu-items.show',$val->id) }}" onclick="return confirm('Your have deleted item?')"><i class="ti-trash"></i></a></button>
                                            </div>
                                            <ol class="dd-list">
                                                @foreach($items as $key_1 => $val_1)
                                                    @if($val_1->parent_id == $val->id)
                                                        <li class="dd-item dd3-item" data-id="{{$i++}}">
                                                            {{--<div class="dd-handle dd3-handle">Drag</div>--}}
                                                            <div class="dd3-content">{{ $val_1->title }}
{{-- <span class="float-right"><a href="" onclick="return confirm('Your have update item?')"><i class="ti-pencil-alt"></i></a></span>--}}
                                                                <button class="btn-primary float-right" data-toggle="modal" data-target="#large-Modal{{$val_1->id}}"><i class="ti-pencil-alt"></i></button>
                                                                <div class="modal fade show" id="large-Modal{{$val_1->id}}" tabindex="-1" role="dialog" >
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Sửa menu</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                @include('backend.menus.itemp')
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-danger waves-effect waves-light "><a href="">Cancel</a></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="btn-danger float-right"><a href="{{ route('menu-items.show',$val_1->id) }}" onclick="return confirm('Your have deleted item?')"><i class="ti-trash"></i></a></button>
                                                            </div>
                                                            <ol class="dd-list">
                                                                @foreach($items as $key_2 => $val_2)
                                                                    @if($val_2->parent_id == $val_1->id)
                                                                        <li class="dd-item dd3-item" data-id="{{$i++}}">
                                                                            {{--<div class="dd-handle dd3-handle">Drag</div>--}}
                                                                            <div class="dd3-content">{{ $val_2->title }}
                                                                                <button class="btn-primary float-right" data-toggle="modal" data-target="#large-Modal"><i class="ti-pencil-alt"></i></button>
                                                                                <div class="modal fade show" id="large-Modal" tabindex="-1" role="dialog" >
                                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h4 class="modal-title">Sửa menu</h4>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                @include('backend.menus.item',['val' => $val_2])
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                                                <button type="button" class="btn btn-danger waves-effect waves-light "><a href="">Cancel</a></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                               {{-- <span class="float-right"><a href="" onclick="return confirm('Your have update item?')"><i class="ti-pencil-alt"></i></a></span>--}}
                                                                                <button class="btn-danger float-right"><a href="{{ route('menu-items.show',$val_2->id) }}" onclick="return confirm('Your have deleted item?')"><i class="ti-trash"></i></a></button>
                                                                            </div>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ol>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ol>
                                        </li>
                                            @endif
                                        @endforeach

                                    </ol>
                                    {{--<ol class="dd-list">
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle">Item 1</div>
                                        </li>
                                        <li class="dd-item" data-id="2">
                                            <div class="dd-handle">Item 2</div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="3">
                                                    <div class="dd-handle">Item 3</div>
                                                </li>
                                                <li class="dd-item" data-id="4">
                                                    <div class="dd-handle">Item 4</div>
                                                </li>
                                                <li class="dd-item" data-id="5">
                                                    <div class="dd-handle">Item 5</div>
                                                    <ol class="dd-list">
                                                        <li class="dd-item" data-id="6">
                                                            <div class="dd-handle">Item 6</div>
                                                        </li>
                                                        <li class="dd-item" data-id="7">
                                                            <div class="dd-handle">Item 7</div>
                                                        </li>
                                                        <li class="dd-item" data-id="8">
                                                            <div class="dd-handle">Item 8</div>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="dd-item" data-id="9">
                                                    <div class="dd-handle">Item 9</div>
                                                </li>
                                                <li class="dd-item" data-id="10">
                                                    <div class="dd-handle">Item 10</div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li class="dd-item" data-id="11">
                                            <div class="dd-handle">Item 11</div>
                                        </li>
                                        <li class="dd-item" data-id="12">
                                            <div class="dd-handle">Item 12</div>
                                        </li>
                                    </ol>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Add menu item</h5>
                                </div>
                                <div class="card-block accordion-block">
                                    <div class="accordion-box" id="single-open">
                                        <a class="accordion-msg">Post</a>
                                        <div class="accordion-desc">
                                            {{--<div class="form-group row">
                                                <label class="col-sm-12 col-form-label">{{__('Parent menu')}}</label>
                                                <div class="col-sm-12">
                                                    <select name="post" class="form-control">
                                                        <option value="2">{{__('Published')}}</option>
                                                        <option value="1">{{__('Draft')}}</option>
                                                        <option value="0">{{__('Pending')}}</option>
                                                    </select>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">{{__('Select post')}}</label>
                                                <div class="col-sm-12">
                                                    <select name="post" class="form-control">
                                                        <option value="2">{{__('Published')}}</option>
                                                        <option value="1">{{__('Draft')}}</option>
                                                        <option value="0">{{__('Pending')}}</option>
                                                    </select>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">{{__('Title')}}</label>
                                                <div class="col-sm-12">

                                                    <input type="text" class="form-control" name="title"  value="">
                                                    <input type="text" class="form-control d-none" name="menu_id"  value="">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">{{__('Url ')}}</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="url"  value="">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>--}}
                                        </div>
                                        <a class="accordion-msg">Page</a>
                                        <div class="accordion-desc">
                                            <form method="post" action="{{ route('menu-items.store') }}"> @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">{{__('Parent menu')}}</label>
                                                    <div class="col-sm-12">
                                                        <select name="parent_id" class="form-control">
                                                            <option value="0">{{__('---')}}</option>
                                                            @foreach($items as $key => $val)
                                                                @if( $val->parent_id == 0)
                                                                    <option value="{{ $val->id }}">{{ $val->title }}</option>
                                                                    @foreach($items as $key => $val1)
                                                                        @if( $val1->parent_id  == $val->id)
                                                                            <option value="{{ $val1->id }}">|--{{ $val1->title }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">{{__('Title')}}</label>
                                                    <div class="col-sm-12">

                                                        <input type="text" class="form-control" name="title"  value="{{ old('title') }}">
                                                        <input type="text" class="form-control d-none" name="menu_id"  value="{{ $menu->id }}">
                                                        <input type="text" class="form-control d-none" name="order"  value="0">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">{{__('Select page')}}</label>
                                                    <div class="col-sm-12">
                                                        <select name="url" class="form-control">
                                                            <option value="{{ route('web.index') }}">{{__('Home page')}}</option>
                                                            <option value="{{ route('web.about.us') }}">{{__('About us')}}</option>
                                                            <option value="{{ route('web.contact') }}">{{__('Contact')}}</option>
                                                            <option value="{{ route('web.blog') }}">{{__('Blog')}}</option>
                                                            <option value="{{ route('web.products') }}">{{__('products')}}</option>
                                                            <option value="{{ route('web.agents') }}">{{__('Agents')}}</option>
                                                        </select>
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row text-center">
                                                    <div class="text-center col-12">
                                                        <button type="submit" class="btn btn-primary">Add Menu Item</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <a class="accordion-msg"> Category</a>
                                        <div class="accordion-desc">
                                            <form method="post" action="{{ route('menu-items.store') }}"> @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">{{__('Parent menu')}}</label>
                                                    <div class="col-sm-12">
                                                        <select name="parent_id" class="form-control">
                                                            <option value="0">{{__('---')}}</option>
                                                            @foreach($items as $key => $val)
                                                                @if( $val->parent_id == 0)
                                                                    <option value="{{ $val->id }}">{{ $val->title }}</option>
                                                                    @foreach($items as $key => $val1)
                                                                        @if( $val1->parent_id  == $val->id)
                                                                            <option value="{{ $val1->id }}">|--{{ $val1->title }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">{{__('Title')}}</label>
                                                    <div class="col-sm-12">

                                                        <input type="text" class="form-control" name="title"  value="{{ old('title') }}">
                                                        <input type="text" class="form-control d-none" name="menu_id"  value="{{ $menu->id }}">
                                                        <input type="text" class="form-control d-none" name="order"  value="0">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">{{__('Select page')}}</label>
                                                    <div class="col-sm-12">
                                                        <select name="url" class="form-control">
                                                            @foreach($categories as $key => $val)
                                                            <option value="@if($val->type == 'product'){{ route('web.product.category',$val->url)}}@else{{route('web.categories',$val->url)}}@endif">{{$val->type}}-| {{$val->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row text-center">
                                                    <div class="text-center col-12">
                                                        <button type="submit" class="btn btn-primary">Add Menu Item</button>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                        <a class="accordion-msg">Custom link</a>
                                        <div class="accordion-desc">
                                            <form method="post" action="{{ route('menu-items.store') }}"> @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">{{__('Parent menu')}}</label>
                                                    <div class="col-sm-12">
                                                        <select name="parent_id" class="form-control">
                                                            <option value="0">{{__('---')}}</option>
                                                            @foreach($items as $key => $val)
                                                                @if( $val->parent_id == 0)
                                                                <option value="{{ $val->id }}">{{ $val->title }}</option>
                                                                    @foreach($items as $key => $val1)
                                                                        @if( $val1->parent_id  == $val->id)
                                                                            <option value="{{ $val1->id }}">|--{{ $val1->title }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                 @endif

                                                            @endforeach
                                                        </select>
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">{{__('Title')}}</label>
                                                    <div class="col-sm-12">

                                                        <input type="text" class="form-control" name="title"  value="{{ old('title') }}">
                                                        <input type="text" class="form-control d-none" name="menu_id"  value="{{ $menu->id }}">
                                                        <input type="text" class="form-control d-none" name="order"  value="0">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">{{__('Url ')}}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="url"  value="{{ old('url') }}">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row text-center">
                                                    <div class="text-center col-12">
                                                        <button type="submit" class="btn btn-primary">Add Menu Item</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('js')
    <!-- nestable js -->
    <script src="{{ asset('adminbymrh/nestable/jquery.nestable.js') }}"></script>
    <script src="{{ asset('adminbymrh/nestable/custom-nestable.js') }}"></script>
@stop
@endsection