@extends('layouts.admin.design')
@section('title','List product')
@section('content')
<?php
$status = [0=>'Pending',1=>'Draft',2=>'Published']
 ?>
<div class="row">                    
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách sản phẩm</h5>
                <span>Hệ thống công nghệ web 4.0</span>
                <div class="card-header-right">
                    <a href="{{ route('products.create') }}" class="btn btn-primary pl-1"><i class="ti-plus ml-0
                    mr-1"></i>{{__('Thêm sản phẩm')}}</a>
                    <i class="icofont icofont-rounded-down"></i>
                </div>
                <div class="form-group row">
                    <form action="{{route('products.index')}}" method="get"> @csrf
                        <div class="row">
                    <div class="col-sm-6">
                        <select class="form-control" name="selectaction" id="slaction">
                            <option value="0">Chọn Tất Cả</option>
                            @foreach($categories as $key => $val)
                            <option value="{{$val->id}}">{{ $val->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-primary waves-effect">Tìm kiếm</button>
                    </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">{{__('ID')}}</th>
                                <th scope="col">{{__('Title')}}</th>
                                <th scope="col" width="100px">{{__('Image')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th scope="col">{{__('Best sale')}}</th>
                                <th scope="col">{{__('Date create')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($products->count() == 0)<tr> <th>Không có sản phẩm nào được tìm thấy ! </th></tr>@endif
                        @foreach($products as $key => $val)
                            <tr>
                                <th scope="row">{{ $val->id }}</th>
                                <td>{{ $val->title }}</td>
                                <td><img width="100px" src="{{ asset($val->image) }}" alt="{{ $val->title }}"></td>
                                <td><label class="label @if($val->status == 2) bg-primary @elseif($val->status == 1) label-default @elseif($val->status == 0) label-inverse-primary @endif ">{{ $status[$val->status] }}</label></td>

                                <td onclick="changeStatus('{{route('products.edit.deal',$val->id)}}')">
                                    <input type="checkbox" name="status" @if($val->deal == 'on') checked
                                           @endif data-toggle="toggle" data-on="Enable" data-off="Disable"
                                           data-onstyle="success" data-offstyle="danger"  >

                                </td>
                                <td>{{$val->created_at}}</td>
                                <td>
                                    <button class="btn-default float-left"><a href="{{ route('products.show',$val->id) }}" ><i class="ti-image"></i></a></button>
                                    <button class="btn-primary float-left"><a href="{{ route('products.edit',$val->id) }}" ><i class="ti-pencil-alt"></i></a></button>
                                    <form action="{{route('products.destroy',[$val->id])}}" method="POST" class="float-left">
                                         @method('DELETE')
                                         @csrf
                                         <button type="submit" class="btn-danger" onclick="return confirm('delete?')"><i class="ti-trash"></i></button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">{{__('ID')}}</th>
                                <th scope="col">{{__('Title')}}</th>
                                <th scope="col">{{__('Image')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th scope="col">{{__('Best sale')}}</th>
                                <th scope="col">{{__('Date create')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
    <script>
        function changeStatus(url) {

            $.ajax({
                url: url,
                type: "get", // chọn phương thức gửi là get
                dataType: "json",
                contentType: "application/json",
                success: function (result) {
                    console.log(result);
                },
                error: function (result) {
                    console.log(result);
                }
            });
        }



    </script>
@endsection