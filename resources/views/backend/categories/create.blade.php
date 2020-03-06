<form id="main" method="post" action="{{ route('categories.store') }}" novalidate> @csrf
    <div class="row">
        <div class="col-sm-8">
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
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" onkeyup="ChangeToSlug();" value="{{ old('title') }}">
                    @if($errors->has('title'))
                        <span class="messages alert-danger">{{ $errors->first('title')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Link</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
                    @if($errors->has('url'))
                        <span class="messages alert-danger">{{ $errors->first('url')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">{{__('Description')}}</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="des" id="des">{{ old('des') }}</textarea>
                    @if($errors->has('des'))
                        <span class="messages alert-danger">{{ $errors->first('des')}}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group row">
                
                <div class="col-sm-12">
                    <select name="status" class="form-control" id="status">
                        <option value="2">Published</option>
                        <option value="1">Draft</option>
                        <option value="0">Pending</option>
                    </select>
                    <span class="messages"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-form-label">{{__('Author')}}</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control d-none" id="author" name="user_id" value="{{ Auth::user()->id }}" readonly>
                    <label class="form-control">{{ Auth::user()->name }}</label>
                    <span class="messages"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-form-label">{{__('Type')}}</label>
                <div class="col-sm-12">
                    <select name="type" class="form-control">
                        <option value="post">Post</option>
                        <option value="product">Product</option>
                        <option value="project">Project</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary m-b-0">{{__('Add New')}}</button>
        </div>
    </div>
</form>