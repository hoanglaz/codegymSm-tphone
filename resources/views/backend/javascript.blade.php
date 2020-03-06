@extends('layouts.admin.design')
@section('title','Manager File')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Manager File</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <form action="#" >
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Command line</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="command" size="5"></textarea>
                                <span class="messages">đang tiến hành nâng cấp</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary m-b-0">{{__('RUN')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

