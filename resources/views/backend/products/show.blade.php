@extends('layouts.admin.design')
@section('title','Product list image')
@section('content')
    <?php
    $status = [0=>'Pending',1=>'Draft',2=>'Published']
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add/Edit Tags</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <form id="main" method="post" action="{{ route('products.images') }}" novalidate> @csrf
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name"  value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                            <span class="messages alert-danger">{{ $errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Thẻ Alt</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="alt"  value="{{ old('alt') }}">
                                        @if($errors->has('alt'))
                                            <span class="messages alert-danger">{{ $errors->first('alt')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Info</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="info" value="{{ old('info') }}">
                                        @if($errors->has('info'))
                                            <span class="messages alert-danger">{{ $errors->first('info')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">{{__('Image')}}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="image" id="p-image" readonly>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-secondary col-sm-2" onclick="selectImageHome('p-image');">Chọn ảnh</a>
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <span class="messages alert-warning">Yêu cầu kích thước 760x390px hoặc tỷ lệ 760:390</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="form-control">{{ $product->title }}</label>
                                        <input type="text" class="form-control d-none" name="product_id" value="{{ $product->id }}" readonly>
                                        <span class="messages"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary m-b-0">{{__('Submit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>List Tags</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>image</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images as $key => $val)
                                <tr>
                                    <td>{{ $val->id }}</td>
                                    <td>{{ $val->name }}</td>
                                    <td><img width="100px" src="{{ asset($val->image) }}" alt="{{ $val->title }}"></td>
                                    <td>{{ $val->created_at }}</td>
                                    <td>
                                        <button class="btn-primary float-left" data-toggle="modal" data-target="#large-Modal{{$val->id}}"><i class="ti-pencil-alt"></i></button>
                                        <div class="modal fade show" id="large-Modal{{$val->id}}" tabindex="-1" role="dialog" >
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Sửa hình ảnh</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('backend.products.image')
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light "><a href="">Cancel</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn-danger float-left">
                                            <a href="{{ route('products.image.delete',$val->id) }}" onclick="return confirm('You are sure delete image?')">
                                                <i class="ti-trash"></i>
                                            </a>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>image</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

