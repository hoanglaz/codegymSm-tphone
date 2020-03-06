@extends('layouts.admin.design')
@section('title','List Comments')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>List comments</h5>
                    <span>Comments: post, product, contact.</span>
                    <span id="msg" class="alert-warning"></span>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <select class="form-control" name="selectaction" id="slaction">
                                <option value="0">Action</option>
                                <option value="delete">Delete</option>
                                <option value="active">Active</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="btn btn-primary waves-effect">Submit</button>
                        </div>
                    </div>

                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <div class="dt-responsive table-responsive">
                            <table id="res-config" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>
                                    <div class="checkbox-fade fade-in-primary">
                                        <label>
                                            <input type="checkbox" id="main-id" onclick="selectAll();">
                                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span for="main-id">{{__('ID')}}</span><br/>
                                        </label>
                                    </div>
                                </th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Type')}}</th>
                                <th>{{__('Date create')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $key => $val)
                                <tr>
                                    <td>
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input class="check-all" type="checkbox" name="check[{{$val->id}}]"
                                                       id="id-{{$val->id}}" >
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span for="id-{{$val->id}}d">{{$val->id}}</span><br/>
                                            </label>
                                        </div>
                                    </td>
                                    <td> <span>--</span> {{ $val->name }}
                                        <form action="{{route('comments.destroy',[$val->id])}}" method="POST"
                                              class="float-left">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn-danger" onclick="return confirm('delete?')"><i class="ti-trash"></i></button>
                                        </form>
                                    </td>
                                    <td>{{ $val->email}}</td>
                                    <td>{{ $val->type_object}}</td>
                                    <td>{{ $val->created_at}}</td>
                                    <td onclick="changeStatus('{{route('comments.edit',$val->id)}}')">
                                        <input type="checkbox" name="status" @if($val->status != 'on') checked
                                               @endif data-toggle="toggle" data-on="Enable" data-off="Disable"
                                               data-onstyle="success" data-offstyle="danger"  >

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Type')}}</th>
                                <th>{{__('Date create')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                        {{ $comments->links() }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
@section('js')
    <script>
        function changeStatus(url) {

            $.ajax({
                url: url,
                type: "get", // chọn phương thức gửi là get
                dataType: "json",
                contentType: "application/json",
                success: function (result) {
                    console.log(result);
                },
                error: function (result) {
                    console.log(result);
                }
            });
        }
        function selectAll() {
            if ($(".check-all").attr("checked") == "checked"){
                $('.check-all').removeAttr('checked');
        } else {
                $('.check-all').attr('checked','checked');
            }

        }


    </script>
@endsection