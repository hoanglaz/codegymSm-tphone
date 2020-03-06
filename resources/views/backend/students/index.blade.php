@extends('layouts.admin.design')
@section('title','List teacher')
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
                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#large-Modal">Add Teacher</button>
                {{--<div class="modal fade show" id="large-Modal" tabindex="-1" role="dialog" style="display: block;">--}}
                <div class="modal fade show" id="large-Modal" tabindex="-1" role="dialog" >
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Teacher</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @include('backend.students.create')
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
                                <th scope="col">{{__('Title')}}</th>
                                <th scope="col" width="100px">{{__('Image')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th scope="col">{{__('Date create')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $key => $val)
                            <tr>
                                <th scope="row">{{ $val->id }}</th>
                                <td><a href="{{ route('web.teacher',[$val->url,$val->id]) }}" target="_blank">{{ $val->title }}</a></td>
                                <td><img width="100px" src="{{ asset($val->image) }}" alt="{{ $val->title }}"></td>
                                <td><label class="label @if($val->status == 2) bg-primary @elseif($val->status == 1) label-default @elseif($val->status == 0) label-inverse-primary @endif ">{{ $status[$val->status] }}</label></td>
                                <td>{{ $val->created_at}}</td>
                                <td>
                                    <button class="btn-primary float-left"><a href="{{ route('teachers.edit',$val->id) }}" ><i class="ti-pencil-alt"></i></i></a></button>
                                    <form action="{{route('teachers.destroy',[$val->id])}}" method="POST" class="float-left">
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
                                <th scope="col">{{__('Title')}}</th>
                                <th scope="col">{{__('Image')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th scope="col">{{__('Date create')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection