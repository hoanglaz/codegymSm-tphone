@extends('layouts.admin.design')
@section('title','List product')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Role</h5>
{{--                    <span><a class="btn btn-primary">Submit</a></span>--}}
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                </div>
                <div class="card-block">
                    @include('backend.roles.role')
                </div>
            </div>
        </div>
    </div>


@endsection