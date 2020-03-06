@extends('layouts.admin.design')
@section('title','Thông tin đơn hàng')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Chi tiết đơn hàng của')}} {{$contact->name}}</h5>
                    <span>{{__('System adminstrator website 4.0')}}</span>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Phone: {{ $contact->phone }}</label>
                                <label class="col-sm-4 col-form-label">Address: {{ $contact->address }}</label>
                                <label class="col-sm-4 col-form-label">Email: {{ $contact->email }}</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <form method="post" action="{{ route('contacts.update',$contact->id) }}" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Chọn trạng thái sử lý đơn hàng:</label>
                                    <div class="col-sm-6">
                                        <select name="status" class="form-control" required>
                                            <option value="0" @if($contact->status ==0)selected @endif>Chưa xử lý</option>
                                            <option value="1" @if($contact->status ==1)selected @endif>Đang xử lý</option>
                                            <option value="2" @if($contact->status ==2)selected @endif>Xử lý xong</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary m-b-0">{{__('Cập nhật')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @foreach($contact->orders as $key => $val)
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-8">
                                        <p> {{$val->name}}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Số lượng</label>
                                    <div class="col-sm-8">
                                        <p> {{$val->quantity}}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Giá trên 1 sản phầm</label>
                                    <div class="col-sm-8">
                                        <p> {{$val->price}}</p>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

