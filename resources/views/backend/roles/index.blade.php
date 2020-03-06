@extends('layouts.admin.design')
@section('title','List product')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>List data</h5>
                    <span>Descreption</span>
                    <div class="card-header-right">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary pl-1"><i class="ti-plus ml-0 mr-1"></i>{{__('Add Role')}}</a>
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">{{__('ID')}}</th>
                                <th scope="col">{{__('Title')}}</th>
                                <th scope="col">{{__('SLUG')}}</th>
                                <th scope="col">{{__('Date create')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $key => $val)
                                <tr>
                                    <th scope="row">{{ $val->id }}</th>
                                    <td>{{ $val->name }}</td>
                                    <td>{{ $val->slug }}</td>
                                    <td>{{ $val->created_at}}</td>
                                    <td>
                                        <button class="btn-primary float-left"><a href="{{ route('roles.edit',$val->id) }}" ><i class="ti-pencil-alt"></i></a></button>
                                        <button type="button" class="btn-danger"><a href="{{ route('roles.destroy',$val->id) }}" onclick="return confirm('delete?')"><i class="ti-trash"></i></a></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th scope="col">{{__('ID')}}</th>
                                <th scope="col">{{__('Title')}}</th>
                                <th scope="col">{{__('SLUG')}}</th>
                                <th scope="col">{{__('Date create')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection