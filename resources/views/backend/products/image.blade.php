<form id="main" method="post" action="{{ route('products.update.image',$val->id) }}" novalidate> @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name"  value="{{ $val->name }}">
                    @if($errors->has('name'))
                        <span class="messages alert-danger">{{ $errors->first('name')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Thẻ Alt</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="alt"  value="{{ $val->alt }}">
                    @if($errors->has('alt'))
                        <span class="messages alert-danger">{{ $errors->first('alt')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Info</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  name="info" value="{{ $val->info }}">
                    @if($errors->has('info'))
                        <span class="messages alert-danger">{{ $errors->first('info')}}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">{{__('Image')}}</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="image" id="p-image{{$val->id}}" readonly value="{{$val->image}}">
                </div>
                <a href="javascript:void(0)" class="btn btn-secondary col-sm-3" onclick="selectImageHome('p-image{{$val->id}}');">Chọn ảnh</a>
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <span class="messages alert-warning">Yêu cầu kích thước 760x390px hoặc tỷ lệ 760:390</span>
                </div>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label class="form-control">{{ $product->title }}</label>
                    <input type="text" class="form-control d-none" name="product_id" value="{{ $product->id }}" readonly>
                    <span class="messages"></span>
                </div>
            </div>

        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary m-b-0">{{__('Submit')}}</button>
        </div>
    </div>
</form>