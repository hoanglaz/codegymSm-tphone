@extends('layouts.admin.design')
@section('title','List menu Item')
@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
<link rel="stylesheet" href="{{ asset('adminbymrh/menuBuilder/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css')}}">
@stop
@section('content')
<div class="container">
            <div class="row">
                <div class="col-md-12"><h2>Thiết kế menu</h2>
                <p>Tùy biến menu theo cơ chế kéo thả</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="float-left">Menu</h5>
                        </div>
                        <div class="card-body">
                            <ul id="myEditor" class="sortableLists list-group">
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <form method="post" action="{{ route('menus.update',$menu->id) }}"> @csrf @method('PUT')
                            <div class="card-body">
                                <div class="f-right">
                                    <button id="btnOutput" type="submit" class="btn btn-success "><i class="fas fa-check-square"></i> Lưu Menu</button>
                                </div>
                                <textarea id="out" class="form-control d-none" cols="50" rows="10" name="data"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-primary">
                        <div class="card-header">
                            <h5 class="">Edit item</h5>
                            <span class="message text-danger"></span>
                        </div>
                        <div class="card-body">
                            <form id="frmEdit" class="form-horizontal" novalidate>
                                <div class="form-group">
                                    <label for="text" class="col-sm-3">Tên menu</label>
                                    <div class="input-group col-sm-12">
                                        <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Tên menu">
                                        <div class="input-group-append">
                                            <button type="button" id="myEditor_icon" class="btn btn-outline-secondary"></button>
                                        </div>

                                    </div>
                                    <input type="hidden" name="icon" class="item-menu ">
                                </div>
                                <div class="form-group">
                                    <label for="href" class="col-sm-3">URL</label>
                                    <div class="input-group col-sm-12">
                                        <input type="text" class="form-control item-menu col-sm-9" id="href" name="href" placeholder="URL">
                                       <button type="button" class="btn btn-primary col-sm-3" data-toggle="modal" data-target="#select-post">Chọn Bài viết</button>
                                        {{--end modol aadd post--}}
                                        <div class="modal fade" id="select-post" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Select Post/page</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-block accordion-block color-accordion-block">
                                                                <div class="color-accordion" id="color-accordion">
                                                                    <a class="accordion-msg bg-primary b-none">Select Post</a>
                                                                    <div class="accordion-desc">
                                                                        <ul>
                                                                            @foreach($posts as $key => $val)
                                                                                <li><a data-dismiss="modal" href="javascript:void(0)" onclick="addUrlMenu('{{route('web.post',$val->url)}}')">{{$val->name}}</a></li>
                                                                            @endforeach
                                                                        </ul>

                                                                    </div>
                                                                    <a class="accordion-msg bg-primary b-none">Select Category</a>
                                                                    <div class="accordion-desc">
                                                                        <ul>
                                                                            @foreach($categories as $key => $val)
                                                                                <li><a data-dismiss="modal" href="javascript:void(0)" onclick="addUrlMenu('{{route('web.category',$val->url)}}')">{{$val->name}}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                        {{ $categories->links() }}
                                                                    </div>
                                                                    <a class="accordion-msg bg-primary b-none">Select product</a>
                                                                    <div class="accordion-desc">
                                                                        <ul>
                                                                            @foreach($products as $key => $val)
                                                                                <li><a data-dismiss="modal" href="javascript:void(0)" onclick="addUrlMenu('{{route('web.category',$val->url)}}')">{{$val->name}}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="target" class="col-sm-3">Target</label>
                                    <div class="input-group col-sm-12">
                                        <select name="target" id="target" class="form-control item-menu col-sm-12">
                                            <option value="_self">Self</option>
                                            <option value="_blank">Blank</option>
                                            <option value="_top">Top</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <label for="title" class="col-sm-3">Tiêu đề</label>
                                    <div class="input-group col-sm-12">
                                        <input type="text" name="title" class="form-control item-menu col-sm-12" id="title" placeholder="chi tiết menu">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
                            <button type="submit" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
                        </div>
                    </div>

                </div>
            </div>
            
            <hr>
           
        </div>
        
        @section('js')
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('adminbymrh/menuBuilder/jquery-menu-editor.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('adminbymrh/menuBuilder/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('adminbymrh/menuBuilder/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js')}}"></script>
        <script>
            function addUrlMenu(url){
                $('#href').val(url);
            }
        jQuery(document).ready(function () {
            /* =============== DEMO =============== */
            // menu items
            var arrayjson = [{"href":"http://home.com","icon":"fas fa-home","text":"Home", "target": "_top", "title": "My Home"},{"icon":"fas fa-chart-bar","text":"Opcion2"},{"icon":"fas fa-bell","text":"Opcion3"},{"icon":"fas fa-crop","text":"Opcion4"},{"icon":"fas fa-flask","text":"Opcion5"},{"icon":"fas fa-map-marker","text":"Opcion6"},{"icon":"fas fa-search","text":"Opcion7","children":[{"icon":"fas fa-plug","text":"Opcion7-1","children":[{"icon":"fas fa-filter","text":"Opcion7-1-1"}]}]}];
            // icon picker options
            var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
            // sortable list options
            var sortableListOptions = {
                placeholderCss: {'background-color': "#cccccc"}
            };
            var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
            editor.setForm($('#frmEdit'));
            editor.setUpdateButton($('#btnUpdate'));
            $.ajax({
                url :"{{ route('menus.show',$menu->id) }}",
                type : "get",
                dataType: "json",
                contentType: "application/json",
                success : function (result){
                    editor.setData(result.data.data);
                },
                error : function () {
                    console.log("error !!!")
                }
            });
            $('#btnReload').on('click', function () {
                editor.setData(arrayjson);
            });

            $('#btnOutput').on('click', function () {
                var str = editor.getString();
                $("#out").text(str);
            });

            $("#btnUpdate").click(function(){
                editor.update();
            });

            $('#btnAdd').click(function(){
                var text = $('#text').val();
                var href = $('#href').val();
                var target = $('#target').val();
                var title = $('#title').val();
            if (text == "" || href == "" || target == "" || title == ""){
                $('.message').html('Vui lòng nhập đầy đủ thông tin!');
                return false;
            }
            var menu = editor.getString();
            JSON.parse(menu).forEach(function (val,key) {
                if (val.text == text) {
                    $('.message').html('Tên menu không được trùng!');
                    return false;
                }
            });
                editor.add();
            });
        });
    </script>
    @stop
@endsection