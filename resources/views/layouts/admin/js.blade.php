<!-- Required Jqurey -->
<script type="text/javascript" src="{{ asset('adminbymrh/bower_components/jquery/dist/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('adminbymrh/bower_components/tether/dist/js/tether.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('adminbymrh/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('adminbymrh/bower_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('adminbymrh/bower_components/modernizr/modernizr.js')}}"></script>
<script type="text/javascript" src="{{ asset('adminbymrh/bower_components/modernizr/feature-detects/css-scrollbars.js')}}"></script>
<script type="text/javascript" src="{{ asset('adminbymrh/bower_components/jquery-ui/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{ asset('adminbymrh/classie/classie.js')}}"></script>
<!-- editor lib -->
<script type="text/javascript" src="{{ asset('editor/ckfinder/ckfinder.js')}}"></script>
 <script type="text/javascript" src="{{ asset('adminbymrh/assets/js/accordion.js') }}"></script>
<script src="{{ asset('adminbymrh/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('editor/ckeditor/ckeditor.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
<!-- i18next.min.js -->
{{--<script type="text/javascript" src="{{ asset('adminbymrh/bower_components/i18next/i18next.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('adminbymrh/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('adminbymrh/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('adminbymrh/bower_components/jquery-i18next/jquery-i18next.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('adminbymrh/dashboard/custom-dashboard.js')}}"></script>--}}
<script type="text/javascript" src="{{ asset('adminbymrh/assets/js/script.js')}}"></script>
<script type="text/javascript">
	function showCategories(url_cate) {
		$('#list-cates button').remove();
		var html ='';
		$.ajax({
			url : url_cate,
			type : "get", // chọn phương thức gửi là get
			dataType: "json",
			contentType: "application/json",
			success : function (result){
				var list = result.data.data;
				// console.log(result.data);
				var category_create = url_cate;
				if (list.length == 0){
					html += '<a href="'+category_create+'" class="btn btn-primary">Add Category</a>';
					html += '<br><span class="messages text-danger">Category not found !</span>'
				}
				list.forEach(function(val,key){
					if (!document.getElementById('cate'+val.id)) {
						html += '<div class="checkbox-fade fade-in-primary">\n' +
								'     <label>';
						html +='<input id="cate'+val.id+'" type="checkbox" name="cate[]" value="'+val.id+'" />';
						html += '<span class="cr">\n' +
								'    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>\n' +
								'    </span>';
						html +='<span for="cate'+val.id+'">'+val.name+'</span><br/>';
						html +='</label>\n' +
								'    </div>';
					}
				})
				if (result.data.next_page_url){
					html += '<button type="button" onclick="showCategories(\''+result.data.next_page_url+'\')">load more</button>';
				}
				$('#list-cates').append(html);

			}
		});
	}
{{--	show list category in page, post, product--}}
	if (document.getElementById('list-cates')) {
	var html ='';
		$.ajax({
            url : "{{route('categories.index')}}", 
            type : "get", // chọn phương thức gửi là get
            dataType: "json",
			contentType: "application/json",
            success : function (result){
            	var list = result.data.data;
				// console.log(result.data);
				var category_create = "{{ route('categories.index') }}";
				if (list.length == 0){
					html += '<a href="'+category_create+'" class="btn btn-primary">Add Category</a>';
					html += '<br><span class="messages text-danger">Category not found !</span>'
				}
            	list.forEach(function(val,key){
            		if (!document.getElementById('cate'+val.id)) {
            			html += '<div class="checkbox-fade fade-in-primary">\n' +
								'     <label>';
	            		html +='<input id="cate'+val.id+'" type="checkbox" name="cate[]" value="'+val.id+'" />';
	            		html += '<span class="cr">\n' +
								'    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>\n' +
								'    </span>';
	                    html +='<span for="cate'+val.id+'">'+val.name+'</span><br/>';
	                    html +='</label>\n' +
								'    </div>';
	                }
            	})
				if (result.data.next_page_url){
					html += '<button type="button" onclick="showCategories(\''+result.data.next_page_url+'\')">load more</button>';
				}
                $('#list-cates').append(html);
            }
        });
	}
	//Show list tags in post
	if (document.getElementById('list-tags')) {
        var html1 ='';
		$.ajax({
            url : "{{route('tags.index')}}",
            type : "get", 
            dataType: "json",
			contentType: "application/json",
            success : function (result){
            	var list = result.data.data;
            	list.forEach(function(val,key){
            		if (!document.getElementById('tag'+val.id)) {
	                    html1 +='<option id="tag'+val.id+'" value="'+val.id+'">'+val.name+'</option>'
	                }
            	})
                $('#list-tags select').append(html1);
            }
        }).then(function(){
        	if (document.getElementsByClassName('admin-js-select2')) {
	    	$('.admin-js-select2').select2();
		}
        });
        
	}
	// config editor
	function selectImage() {
		selectFileWithCKFinder( 'select-input-image' );
	};
	function selectImageHome( id ) {
		selectFileWithCKFinder(id);
	};

	function selectFileWithCKFinder( elementId ) {
		CKFinder.popup( {
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					var output = document.getElementById( elementId );
					output.value = file.getUrl();
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					var output = document.getElementById( elementId );
					output.value = evt.data.resizedUrl;
				} );
			}
		} );
	}
	if (document.getElementById('manager-show-file')) {
		CKFinder.widget( 'manager-show-file', {
			width: '100%',
			height: 700
		});
	}
	// js active select2
	if (document.getElementsByClassName('admin-js-select2')) {
    	$('.admin-js-select2').select2();
	}
	// config editor
	var config = {
        language:'vi',
        filebrowserBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Flash') }}',
    };

if (document.getElementById('content')) {
    CKEDITOR.replace('content',config);
}

// get slug
function ChangeToSlug()
            {
                var title, slug;
 
                //Lấy text từ thẻ input title 
                title = document.getElementById("title").value;
				if (document.getElementById('meta-title')) {
					document.getElementById('meta-title').value = title;
				}
                //Đổi chữ hoa thành chữ thường
                slug = title.toLowerCase();
 
                //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
                document.getElementById('url').value = slug;
            }
	function getSlug(mr_title,mr_slug)
	{
		var title, slug;

		//Lấy text từ thẻ input title
		title = document.getElementById(mr_title).value;
		if (document.getElementById('meta-title')) {
			document.getElementById('meta-title').value = title;
		}
		//Đổi chữ hoa thành chữ thường
		slug = title.toLowerCase();

		//Đổi ký tự có dấu thành không dấu
		slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
		slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
		slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
		slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
		slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
		slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
		slug = slug.replace(/đ/gi, 'd');
		//Xóa các ký tự đặt biệt
		slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
		//Đổi khoảng trắng thành ký tự gạch ngang
		slug = slug.replace(/ /gi, "-");
		//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
		//Phòng trường hợp người nhập vào quá nhiều ký tự trắng
		slug = slug.replace(/\-\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-/gi, '-');
		slug = slug.replace(/\-\-/gi, '-');
		//Xóa các ký tự gạch ngang ở đầu và cuối
		slug = '@' + slug + '@';
		slug = slug.replace(/\@\-|\-\@|\@/gi, '');
		//In slug ra textbox có id “slug”
		document.getElementById(mr_slug).value = slug;
	}
function getDescription(id_target,id_change) {
	var des = document.getElementById(id_target).value;
	document.getElementById(id_change).value = des;
}
if (document.getElementById('page-building')){
	function addPageBuilding(module,id){
		var html = '';
		html += '<div class="form-group row module-page">\n' +
				'   <a id="" class="col-sm-11 form-control btn btn-primary" onclick="customModulePage(\''+module+'\')\;"><i class="icofont icofont-pencil"></i> '+module+'</a>\n' +
				'   <a class="col-sm-1 form-control btn btn-danger '+module+id+'" onclick="deleteModulePage(\''+module+'\',\''+id+'\')\;"><i class="icofont icofont-delete"></i></a>\n' +
				'</div>\n';
		$('#page-building').append(html);
	}
	function deleteModulePage(module,id) {
		var k = confirm("Bạn chắc chắn muốn loại bỏ "+module);
		if (k){
			var data = $('#page-building').find('.'+module+id+'').parent().remove();
		} else {
			return false;
		}
	}
	function customModulePage(module) {
		$.ajax({
			url : "{{route('components.slider')}}",
			type : "get",
			dataType: "html",
			contentType: "application/json",
			success : function (result){
				console.log(result);
				$('#content-building').html(result);
			}
		});
	}
}
	function selectCheckboxRole(mr_class) {
		$('.'+mr_class+'').each(function () {
			this.setAttribute("checked", "checked");
		});
	}
	function disableCheckboxRole(mr_class) {
		$('.'+mr_class+'').each(function () {
			this.removeAttribute("checked");
		});
	}
</script>