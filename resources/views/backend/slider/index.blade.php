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
                <h5>Sliders</h5>
                <div class="card-header-right">
                    <i class="icofont icofont-rounded-down"></i>
                    <i class="icofont icofont-refresh"></i>
                    <i class="icofont icofont-close-circled"></i>
                </div>
            </div>
            <div class="card-block">
                @include('backend.slider.create')
            </div>
        </div>
    </div>
</div>
<div class="row">                    
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách sliders</h5>
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
                                <th>Image</th>
                                <th> Ngày Tạo</th>
                                <th> Ngày sửa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       @foreach($data as $key=>$val)
                       <tr>
                          <tr>
                                <td>{{ $val->id }}</td>
                                <td><img style="width: 100px;" src="{{ $val->slider }}"></td>
                                <td>{{ $val->created_at }}</td>
                                <td>{{ $val->updated_at }}</td>
                                <td>
                                    <form action="{{route('slider.destroy',[$val->id])}}" method="GET" class="float-left">
                                         @method('DELETE')
                                         @csrf
                                         <button type="submit" class="btn-danger" onclick="return confirm('delete?')"><i class="ti-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                       </tr>
                       @endforeach
                        </tbody>
                        
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

