<form id="main" method="post" action="{{ route('user.update',$edit_user->id) }}" novalidate> @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" value="{{$edit_user->name}}">
                    @if($errors->has('name'))
                        <span class="messages alert-danger">{{ $errors->first('name')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="{{$edit_user->email}}">
                    @if($errors->has('email'))
                        <span class="messages alert-danger">{{ $errors->first('email')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password">
                    @if($errors->has('password'))
                        <span class="messages alert-danger">{{ $errors->first('password')}}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select name="status" class="form-control" id="status">
                        <option value="1" @if($edit_user->status == 1) selected @endif>Active</option>
                        <option value="0" @if($edit_user->status == 0) selected @endif>Disable</option>
                    </select>
                    <span class="messages"></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select name="role_id" class="form-control" id="role_id">
                        @foreach($roles as $key => $val)
                            <option value="{{$val->id}}" @if($val->id == $edit_user->roles[0]->id) selected @endif>{{$val->name}}</option>
                        @endforeach
                    </select>
                    <span class="messages"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">{{__('Avatar')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="avatar" id="avatar" value="{{$val->avatar}}">
                    <span class="messages">{{$val->avatar}}</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-5"></div>
                <a href="javascript:void(0)" class="btn btn-secondary col-sm-4" onclick="selectImageHome('avatar');">Chọn ảnh</a>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary m-b-0">{{__('EDIT USER')}}</button>
        </div>
    </div>
</form>