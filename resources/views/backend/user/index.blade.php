@extends('layouts.admin.design')
@section('title','Information Users')
@section('content')
    <?php
    $status = [0=>'Pending',1=>'Draft',2=>'Published']
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add/Edit Users</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    @if(isset($edit_user))
                        @include('backend.user.edit')
                    @else
                        @include('backend.user.create')
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>List Users</h5>
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
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $val)
                                <tr>
                                    <td>{{ $val->id }}</td>
                                    <td><a href="" target="_blank">{{ $val->name }}</a></td>
                                    <td>@if($val->status == 0) <label class="label bg-dark">Disable</label>@else <label class="label bg-success">Enable</label> @endif</td>
                                    <td>{{ $val->created_at }}</td>
                                    <td>
                                        <button class="btn-primary float-left"><a href="{{route('user.edit',$val->id)}}"><i class="ti-pencil-alt"></i></a></button>
                                        <a href="{{route('user.delete',$val->id)}}" onclick="return confirm('Delete user: {{$val->name}}?');"><button class="btn-danger" type="button"><i class="ti-trash"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

