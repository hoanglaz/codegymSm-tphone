<form method="post" action="{{ route('homes.update',$homes[0]->id) }}"> @csrf @method('PUT')
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('Title')}}</label>
        <div class="col-sm-8">
            <input value="{{ $homes[0]->data }}" type="text" class="form-control" name="home[config][name]" id="name" placeholder="{{__('Title Page')}}">
            <input value="{{ $homes[0]->id }}" type="text" class="form-control d-none" name="home_config_id" >
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('Description')}}</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="home[config][description]" id="description">{{ $homes[1]->data }}</textarea>
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('Favicon')}}</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="home[config][favicon]" id="favicon" value="{{ $homes[2]->data }}">
            <span class="messages"></span>
        </div>
        <a href="javascript:void(0)" class="btn btn-secondary col-sm-2" onclick="selectImageHome('favicon');">Chọn ảnh</a>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('Logo')}}</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="home[config][logo]" id="logo" value="{{ $homes[3]->data }}">
            <span class="messages"></span>
        </div>
        <a href="javascript:void(0)" class="btn btn-secondary col-sm-2" onclick="selectImageHome('logo');">Chọn ảnh</a>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('Image')}}</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="home[config][image]" id="image" value="{{ $homes[4]->data }}">
            <span class="messages"></span>
        </div>
        <a href="javascript:void(0)" class="btn btn-secondary col-sm-2" onclick="selectImageHome('image');">Chọn ảnh</a>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Slide show 1</label>
        <div class="col-sm-8">
            <input value="{{ $homes[5]->data }}" type="text" class="form-control" name="home[slider1][slider1_image]" id="image-slide1" placeholder="link ảnh">
            <input value="{{ $homes[6]->data }}" type="text" class="form-control" name="home[slider1][slider1_title1]" placeholder="tiêu đề ảnh trên">
            <input value="{{ $homes[7]->data }}" type="text" class="form-control" name="home[slider1][slider1_title2]" placeholder="tiêu đề ảnh dưới">
            <span class="messages"></span>
        </div>
        <div class="col-sm-2">
            <a href="javascript:void(0)" class="btn btn-secondary" onclick="selectImageHome('image-slide1');">Chọn ảnh</a>

        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Slide show 2</label>
        <div class="col-sm-8">
            <input value="{{ $homes[8]->data }}" type="text" class="form-control" name="home[slider2][slider2_image]" id="image-slide2" placeholder="link ảnh">
            <input value="{{ $homes[9]->data }}" type="text" class="form-control" name="home[slider2][slider2_title1]"  placeholder="tiêu đề ảnh trên">
            <input value="{{ $homes[10]->data }}" type="text" class="form-control" name="home[slider2][slider2_title2]"  placeholder="tiêu đề ảnh dưới">
            <span class="messages"></span>
        </div>
        <div class="col-sm-2">
            <a href="javascript:void(0)" class="btn btn-secondary" onclick="selectImageHome('image-slide2');">Chọn ảnh</a>

        </div>
    </div>
    <div class="form-group row text-center">
        <div class="text-center col-12">
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </div>
    </div>
</form>