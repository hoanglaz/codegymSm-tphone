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
                                <th scope="col">{{__('name')}}</th>
                                <th scope="col" width="100px">{{__('Image')}}</th>
                                <th scope="col">{{__('Phone')}}</th>
                                <th scope="col">{{__('Address')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $key => $val)
                            <tr>
                                <th scope="row">{{ $val->id }}</th>
                                <td><a href="#!" target="_blank">{{ $val->name }}</a></td>
                                <td><img width="100px" src="{{ asset($val->image) }}" alt="{{ $val->title }}"></td>
                                <td>{{ $val->fullname }}</td>
                                <td>{{ $val->address}}</td>
                                <td>
                                    <button class="btn-primary float-left"><a href="{{ route('members.edit',$val->id) }}" ><i class="ti-pencil-alt"></i></i></a></button>
                                    <form action="{{route('members.destroy',[$val->id])}}" method="POST" class="float-left">
                                         @method('DELETE')
                                         @csrf
                                         <button type="submit" class="btn-danger" onclick="confirm('delete?')"><i class="ti-trash"></i></button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">{{__('ID')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Image')}}</th>
                                <th scope="col">{{__('Phone')}}</th>
                                <th scope="col">{{__('Address ')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $members->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection