@extends('layouts.admin.design')
@section('title','Information Categories')
@section('content')
<?php
$status = [0=>'Pending',1=>'Draft',2=>'Published']
 ?>
<div class="row">                    
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Add/Edit Category</h5>
                <div class="card-header-right">
                    <i class="icofont icofont-rounded-down"></i>
                    <i class="icofont icofont-refresh"></i>
                    <i class="icofont icofont-close-circled"></i>
                </div>
            </div>
            <div class="card-block">
                @include('backend.categories.create')
            </div>
        </div>
    </div>
</div>
<div class="row">                    
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>List Categories</h5>
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
                                <th>Type</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->type }}</td>
                                <td><label class="label @if($val->status == 2) bg-primary @elseif($val->status == 1) label-default @elseif($val->status == 0) label-inverse-primary @endif ">{{ $status[$val->status] }}</label></td>
                                <td>{{ $val->created_at }}</td>
                                <td>
                                    <a href="{{ route('categories.edit',$val->id)}}"><button class="btn-primary float-left"><i class="ti-pencil-alt"></i></button></a>
                                    <form action="{{route('categories.destroy',[$val->id])}}" method="POST" class="float-left">
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

