@extends('layouts.admin.design')
@section('title','Information Email')
@section('content')
<?php
$status = [0=>'Pending',1=>'Draft',2=>'Published']
 ?>

<div class="row">                    
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>List email</h5>
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
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $key => $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->created_at }}</td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

