@extends('layouts.admin.design')
@section('title','Danh sách đại lý')
@section('content')
    <?php
    $status = [0=>'Pending',1=>'Draft',2=>'Published']
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>List data</h5>
                    <span>Descreption</span>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                    <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#large-Modal">Thêm đại lý</button>
                    {{--<div class="modal fade show" id="large-Modal" tabindex="-1" role="dialog" style="display: block;">--}}
                    <div class="modal fade show" id="large-Modal" tabindex="-1" role="dialog" >
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Thêm đại lý</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @include('backend.members.create')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light "><a href="">Cancel</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">{{__('ID')}}</th>
                                <th scope="col">{{__('Tên')}}</th>
                                <th scope="col">{{__('Số đơn')}}</th>
                                <th scope="col">{{__('SĐT')}}</th>
                                <th scope="col">{{__('Địa chỉ ')}}</th>
                                <th scope="col">{{__('Trạng thái')}}</th>
                                <th scope="col">{{__('Hành động')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $st = [0=>'Chưa xử lý',1=>'Đang xử lý',2=>'Xử lý xong'] ?>
                            @foreach($contacts as $key => $val)
                                <tr>
                                    <th scope="row">{{ $val->id }}</th>
                                    <td><a href="#!" target="_blank">{{ $val->name }}</a></td>
                                    <td>{{ count($val->orders) }}</td>
                                    <td>{{ $val->phone }}</td>
                                    <td>{{ $val->address}}</td>
                                    <td>
                                        <span class="label @if($val->status==2)label-success @elseif($val->status==1) label-warning @else label-danger @endif">@if($val->status==2 || $val->status==1){{ $st[$val->status]}}@else không xác định @endif</span>
                                    </td>
                                    <td>
                                        <button title="xem chi tiết" class="btn-primary float-left"><a href="{{ route('contacts.edit',$val->id) }}" ><i class="ti-eye"></i></a></button>
                                        <form action="{{route('contacts.destroy',[$val->id])}}" method="POST" class="float-left">
                                            @method('DELETE')
                                            @csrf
                                            <button title="xóa đơn hàng" type="submit" class="btn-danger" onclick="confirm('delete?')"><i class="ti-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th scope="col">{{__('ID')}}</th>
                                <th scope="col">{{__('Tên')}}</th>
                                <th scope="col">{{__('Số đơn')}}</th>
                                <th scope="col">{{__('SĐT')}}</th>
                                <th scope="col">{{__('Địa chỉ ')}}</th>
                                <th scope="col">{{__('Trạng thái')}}</th>
                                <th scope="col">{{__('Hành động')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection