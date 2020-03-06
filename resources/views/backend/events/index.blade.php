@extends('layouts.admin.design')
@section('title','List event')
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
                    <a href="{{ route('events.create') }}" class="btn btn-primary pl-1"><i class="ti-plus ml-0 mr-1"></i>{{__('Add event')}}</a>
                    <i class="icofont icofont-rounded-down"></i>
                    <!-- <i class="icofont icofont-refresh"></i> -->
                    <!-- <i class="icofont icofont-close-circled"></i> -->
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
                        @foreach($envents as $key => $val)
                            <tr>
                                <th scope="row">{{ $val->id }}</th>
                                <td><a href="#!" target="_blank">{{ $val->title }}</a></td>
                                <td><img width="100px" src="{{ asset($val->image) }}" alt="{{ $val->title }}"></td>
                                <td><label class="label @if($val->status == 2) bg-primary @elseif($val->status == 1) label-default @elseif($val->status == 0) label-inverse-primary @endif ">{{ $status[$val->status] }}</label></td>
                                <td>{{ $val->created_at}}</td>
                                <td>
                                    <button class="btn-primary float-left"><a href="{{ route('events.edit',$val->id) }}" ><i class="ti-pencil-alt"></i></i></a></button>
                                    <form action="{{route('events.destroy',[$val->id])}}" method="POST" class="float-left">
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
                                <th scope="col">{{__('Date create')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $envents->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection