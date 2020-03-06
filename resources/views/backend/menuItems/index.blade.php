@extends('layouts.admin.design')
@section('title','List menu Item')
@section('content')
<?php
$status = [0=>'Pending',1=>'Draft',2=>'Published'];

 ?>
<div class="row">                    
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>List menu Item</h5>
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
                                    <input type="text" name="name" class="form-control" placeholder="name menu">
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
                <div class="row">
                    <div class="col-7">
                        <form action="#" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{__('Title')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="{{__('Title Page')}}" onkeyup="ChangeToSlug();">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{__('Link')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url" id="url">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{__('Icon')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="icon" >
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{__('Color')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="color">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{__('Order')}}</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="order" id="url">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{__('Target')}}</label>
                                <div class="col-sm-10">
                                    <select name="target" class="form-control">
                                        <option value="_blank">New Tab</option>
                                        <option value="_sefl">Current Tab</option>
                                    </select>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{__('Menu cha')}}</label>
                                <div class="col-sm-10">
                                    <select name="parent_id" class="form-control">
                                        <option value="_blank">product</option>
                                        <option value="_sefl">home</option>
                                    </select>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{__('Status')}}</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="status" id="status-seo-1" value="1" checked> Enable
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="status" id="status-seo-2" value="0"> Disable
                                        </label>
                                    </div>
                                    <span class="messages"></span>
                                </div>
                            </div>
                           <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary m-b-0" data-type="success" data-from="top" data-align="right">{{__('Submit')}}</button>
                            </div>
                        </form>
                    </div>
                    <!-- show menu -->
                    <div class="col-5">
                    <ul id="accordion1" class="nav nav-pills flex-column">
                      <li class="nav-item">
                        <a class="nav-link ui-state-default" data-toggle="collapse" href="#item-1" data-parent="#accordion1"><i class="ti-gift "></i> Item 1</a>
                        <div id="item-1" class="collapse show">
                          <ul class="nav flex-column ml-4">
                            <li class="nav-item">
                              <a class="nav-link ui-state-default" href="#parent-1" data-toggle="collapse" data-parent="#accordion1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Sub 1-1</a>
                                <div id="parent-1" class="collapse">
                                  <ul class="nav flex-column ml-3">
                                    <li class="nav-item">
                                      <a class="nav-link ui-state-default" href="#">Sub 2-1</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link ui-state-default" href="#">Sub 2-2</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link ui-state-default" href="#">Sub 2-3</a>
                                    </li>
                                  </ul>
                                </div>
                            </li>
                            <li class="nav-item ui-state-default">
                              <a class="nav-link" href="#">Sub 1-2</a>
                            </li>
                            <li class="nav-item ui-state-default">
                              <a class="nav-link" href="#">Sub 1-3</a>
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection