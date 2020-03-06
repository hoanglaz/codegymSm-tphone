<form id="main" method="post" action="{{ route('slider.create') }}" novalidate> @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Ảnh')}}</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input readonly id="select-input-image" type="text" name="image" class="form-control" value="{{ old('image') }}">
                            <a onclick="selectImage()" class="btn btn-primary">Chọn Ảnh</a><br>
                            <span class="messages text-danger">
                            @if($errors->first('image') != "") {{ $errors->first('image') }} @endif
                            </span>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </div>
       
    </div>
    <div class="form-group row">
        <label class="col-sm-2"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary m-b-0">Thêm Mới</button>
        </div>
    </div>
</form>