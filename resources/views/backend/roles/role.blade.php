@if(isset($edit_roles))
    <form method="post" action="{{route('roles.update',$edit_roles->id)}}"> @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" value="{{ $edit_roles->name }}">
                @if($errors->has('name'))
                    <span class="messages alert-danger">{{ $errors->first('name')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select name="slug" class="form-control">
                    <option value="{{$edit_roles->slug}}" selected>{{$edit_roles->slug}}</option>
                </select>
                @if($errors->has('slug'))
                    <span class="messages alert-danger">{{ $errors->first('slug')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">`
            <label class="col-sm-2 col-form-label">Permissions</label>
            <div class="col-sm-9">
{{--        start--}}
                <div class="card">
                    <div class="card-block accordion-block color-accordion-block">
                        <div class="color-accordion " id="color-accordion">
                            @foreach($roles as $key_role => $role)
                                <div class="accordion-msg">
                                    <label class="text-primary font-weight-bold col-sm-4 col-form-label">Permission {{$key_role}}</label>
                                    <a href="javascript:void(0)" onclick="return selectCheckboxRole('mrh-{{$key_role}}');" class="btn btn-primary">Allow All</a>
                                    <a class="btn btn-danger" onclick="disableCheckboxRole('mrh-{{$key_role}}')" >Denies All</a>
                                </div>
                                <div class="accordion-desc">
                                    @foreach($role as $key => $val)
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input name="permission[{{$val}}]" type="checkbox" value="true" class="mrh-{{$key_role}}" @if(isset($permissions[$val])) checked @endif>
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                                <span>{{$key}}</span>
                                            </label>
                                        </div><br>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
{{--        stop--}}
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="{{ route('roles.index') }}">List Roles</a>
        </div>
    </form>
@else
    <form method="post" action="{{route('roles.store')}}"> @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            @if($errors->has('name'))
                <span class="messages alert-danger">{{ $errors->first('name')}}</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
            <select name="slug" class="form-control">
                <option value="superadmin">Super Admin</option>
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
                <option value="viewer">Viewer</option>
                <option value="developer">Developer</option>
            </select>
            @if($errors->has('slug'))
                <span class="messages alert-danger">{{ $errors->first('slug')}}</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Permissions</label>
        <div class="col-sm-10">
            <div class="card">
                <div class="card-block accordion-block color-accordion-block">
                    <div class="color-accordion " id="color-accordion">
                    @foreach($roles as $key_role => $role)
                        <div class="form-group row accordion-msg">
                            <label class="text-primary font-weight-bold col-sm-4 col-form-label">Permission {{$key_role}}</label>
                            <a href="javascript:void(0)" onclick="return selectCheckboxRole('mrh-{{$key_role}}');" class="btn btn-primary">Allow All</a>
                            <a class="btn btn-danger" onclick="disableCheckboxRole('mrh-{{$key_role}}')" >Denies All</a>
                        </div>
                        <div class="accordion-desc">
                        @foreach($role as $key => $val)
                            <div class="checkbox-fade fade-in-primary">
                                <label>
                                    <input name="permission[{{$val}}]" type="checkbox" value="true" class="mrh-{{$key_role}}" checked>
                                    <span class="cr">
                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                </span>
                                    <span>{{$key}}</span>
                                </label>
                            </div><br>
                        @endforeach
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="form-group row justify-content-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary" href="{{ route('roles.index') }}">List Roles</a>
    </div>
</form>
@endif