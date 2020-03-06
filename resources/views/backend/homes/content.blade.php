<form method="post" action="{{ route('homes.store') }}"> @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('List product 1st')}}</label>
        <div class="col-sm-8">
            <select name="home[product1]" class="form-control">
                @foreach($categories as $key =>$val)
                    <option value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
            </select>
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('List product 2nd')}}</label>
        <div class="col-sm-8">
            <select name="home[product2]" class="form-control">
                @foreach($categories as $key =>$val)
                    <option value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
            </select>
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('List product 3rd')}}</label>
        <div class="col-sm-8">
            <select name="home[product3]" class="form-control">
                @foreach($categories as $key =>$val)
                    <option value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
            </select>
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{__('List product 4')}}</label>
        <div class="col-sm-8">
            <select name="home[product4]" class="form-control">
                @foreach($categories as $key =>$val)
                    <option value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
            </select>
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row text-center">
        <div class="text-center col-12">
            <button type="submit" class="btn btn-primary">Lưu Nội dung</button>
        </div>
    </div>

</form>