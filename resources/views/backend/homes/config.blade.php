<form method="post" action="{{ route('configs.store') }}"> @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('Hotline')}}</label>
        <div class="col-sm-8">
            <input value="{{ old('config[info][phone]') }}" type="text" class="form-control" name="config[info][phone]" placeholder="{{__('input data')}}">
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('Address')}}</label>
        <div class="col-sm-8">
            <input value="{{ old('config[info][address]') }}" type="text" class="form-control" name="config[info][address]" placeholder="{{__('input data')}}">
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('Email')}}</label>
        <div class="col-sm-8">
            <input value="{{ old('config[info][email]') }}" type="text" class="form-control" name="config[info][email]" placeholder="{{__('input data')}}">
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('Name')}}</label>
        <div class="col-sm-8">
            <input value="{{ old('config[info][name]') }}" type="text" class="form-control" name="config[info][name]" placeholder="{{__('input data')}}">
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('Position')}}</label>
        <div class="col-sm-8">
            <input value="{{ old('config[info][position]') }}" type="text" class="form-control" name="config[info][position]" placeholder="{{__('input data')}}">
            <span class="messages"></span>
        </div>
    </div>


    <div class="form-group row text-center">
        <div class="text-center col-12">
            <button type="submit" class="btn btn-primary">Lưu Nội dung</button>
        </div>
    </div>

</form>