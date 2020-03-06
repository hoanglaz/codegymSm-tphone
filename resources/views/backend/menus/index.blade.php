@extends('layouts.admin.design')
@section('title','List menu')
@section('content')
<?php
$status = [0=>'Pending',1=>'Draft',2=>'Published']
 ?>
<div class="row">                    
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>List menu</h5>
                <span>Descreption</span>
                <div class="card-header-right">
                    <a href="javascript:void(0)" class="btn btn-primary pl-1" data-toggle="modal" data-target="#addmenu-Modal"><i class="ti-plus ml-0 mr-1"></i>{{__('Add menu')}}</a>
                    <i class="icofont icofont-rounded-down"></i>
                    <div class="modal fade" id="addmenu-Modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add menu</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('menus.store')}}" method="post">
                                   @csrf
                                    <div class="modal-body">
                                        <input type="text" name="name" class="form-control" placeholder="name menu" required>
                                        <label class="col-form-label">Choose position of menu:</label>
                                        <select name="data" class="form-control">
                                            <option value="main">Main menu</option>
                                            <option value="footer">Footer menu</option>
                                            <option value="top">Top menu</option>
                                            <option value="bot">Bot menu</option>
                                        </select>
                                        <input type="text" name="user_id" class="form-control d-none" value="{{ Auth::user()->id }}" required>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:void(0)" class="btn btn-default waves-effect " data-dismiss="modal">Close</a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                
                                <th>{{__('Position')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{--<tr>
                            <td>super 1</td>
                            <td>Menu Dashboard</td>
                            <td>2020</td>
                            <td>Default</td>
                        </tr>--}}
                        <!-- <tr>
                            <td>super 2</td>
                            <td>Main Menu</td>
                            <td>2020</td>
                            <td>Default</td>
                        </tr> -->
                        @foreach($menus as $key => $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                                <td>{{ $val->name }}</td>
                                
                                <td>{{ $val->data}}</td>
                                <td>
                                    <button class="btn-primary float-left"><a href="{{ route('menus.edit',$val->id) }}" ><i class="ti-pencil-alt"></i></i></a></button>
                                    <form action="{{route('menus.destroy',[$val->id])}}" method="POST" class="float-left">
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
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                
                                <th>{{__('Position')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection