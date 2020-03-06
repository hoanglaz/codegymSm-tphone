<form method="post" action="{{ route('menu-items.update',$val->id) }}"> @csrf @method('PUT')
    <div class="form-group row">
        <label class="col-sm-12 col-form-label">{{__('Parent menu')}}</label>
        <div class="col-sm-12">
            <select name="parent_id" class="form-control">
                <option value="0" @if($val->parent_id == 0) selected @endif>{{__('---')}}</option>
                @foreach($items as $key => $va)
                    @if( $va->parent_id == 0)
                        <option value="{{ $va->id }}" @if($val->parent_id == $va->id) selected @endif>{{ $va->title }}</option>
                        @foreach($items as $key => $va1)
                            @if( $va1->parent_id  == $va->id)
                                <option value="{{ $va1->id }}" @if($val->parent_id == $va1->id) selected @endif>|--{{ $va1->title }}</option>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </select>
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-form-label">{{__('Title')}}</label>
        <div class="col-sm-12">

            <input type="text" class="form-control" name="title"  value="{{ $val->title }}">
            <input type="text" class="form-control d-none" name="menu_id"  value="{{ $menu->id }}">
            <input type="text" class="form-control d-none" name="order"  value="0">
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-form-label">{{__('Url ')}}</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" name="url"  value="{{ $val->url }}">
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row text-center">
        <div class="text-center col-12">
            <button type="submit" class="btn btn-primary">Add Menu Item</button>
        </div>
    </div>
</form>