<!-- Menu aside start -->

    <div class="main-menu">
        <div class="main-menu-header">
            <img class="img-40" src="{{ asset('adminbymrh/assets/images/user.png')}}" alt="User-Profile-Image">
            <div class="user-details">
                <span>{{ Auth::user()->name }}</span>
                <span id="more-details">Adminstrator</span>
            </div>
        </div>
        <div class="main-menu-content">
            <ul class="main-navigation">
                <li class="nav-title" data-i18n="nav.category.admin">
                    <i class="ti-line-dashed"></i>
                    <span>Quản trị</span>
                </li>
                <li class="nav-item single-item @if(route('dashboard') == $url) has-class @endif">
                    <a href="{{ route('dashboard')}}">
                        <i class="ti-home"></i>
                        <span data-i18n="nav.dash.main">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item single-item @if(route('user.list') == $url) has-class @endif">
                    <a href="{{ route('user.list') }}">
                        <i class="ti-layout"></i>
                        <span data-i18n="nav.page_layout.account">Quản trị</span>
                    </a>
                </li>
                <li class="nav-item single-item @if(route('contacts.index') == $url) has-class @endif">
                    <a href="{{ route('contacts.index') }}">
                        <i class="ti-user"></i>
                        <span data-i18n="nav.page_layout.account">Đơn Hàng</span>
                    </a>
                </li>

                <li class="nav-title" data-i18n="nav.category.function">
                    <i class="ti-line-dashed"></i>
                    <span>Chức năng</span>
                </li>

                <li class="nav-item @if(route('posts.index') == url()->current() || route('posts.create') == url()->current()) has-class @endif">
                    <a href="#!">
                        <i class="ti-crown"></i>
                        <span data-i18n="nav.advance-components.post">Bài viết</span>
                    </a>
                    <ul class="tree-1 @if(route('posts.index') == url()->current() || route('posts.create') == url()->current()) has-class @endif">
                        <li class="@if(route('posts.index') == url()->current()) has-class @endif"><a href="{{ route('posts.index') }}" >Danh sách</a></li>
                        <li class="@if(route('posts.create') == url()->current()) has-class @endif"><a href="{{ route('posts.create') }}" >Thêm bài viết</a></li>
                    </ul>
                </li>

                <li class="nav-item @if(route('products.index') == url()->current() || route('products.create') == url()->current()) has-class @endif">
                    <a href="#!">
                        <i class="ti-gift "></i>
                        <span data-i18n="nav.extra-components.product"> Sản phẩm</span>
                    </a>
                    <ul class="tree-1 @if(route('products.index') == url()->current() || route('products.create') == url()->current()) has-class @endif">
                        <li class="@if(route('products.index') == url()->current()) has-class @endif"><a  href="{{ route('products.index') }}" >Danh sách</a></li>
                        <li class="@if(route('products.create') == url()->current()) has-class @endif"><a href="{{ route('products.create') }}">Thêm Sản phẩm</a></li>
                    </ul>
                </li>
                <li class="nav-item single-item @if(route('categories.index') == url()->current()) has-class @endif">
                    <a href="{{ route('categories.index') }}">
                        <i class="ti-reload rotate-refresh"></i>
                        <span data-i18n="nav.animations.main"> Danh mục</span>
                    </a>
                </li>
                <li class="nav-item single-item @if(route('tags.index') == url()->current()) has-class @endif">
                    <a href="{{ route('tags.index') }}">
                        <i class="ti-layers-alt"></i>
                        <span data-i18n="nav.animations.main"> List Email</span>
                    </a>
                </li>
                <li class="nav-item single-item @if(route('events.index') == url()->current()) has-class @endif">
                    <a href="{{ route('events.index') }}">
                        <i class="ti-layers-alt"></i>
                        <span data-i18n="nav.animations.main"> Slider home</span>
                    </a>
                </li>
                <li class="nav-item single-item @if(route('courses.index') == url()->current()) has-class @endif">
                    <a href="{{ route('courses.index') }}">
                        <i class="ti-layers-alt"></i>
                        <span data-i18n="nav.animations.main"> Đối tác</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-layers"></i>
                        <span data-i18n="nav.form-components.main">Giao diện</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ route('menus.index') }}" data-i18n="nav.form-components.form-components">Menu</a></li>
                        <li><a href="{{ route('homes.index') }}" data-i18n="nav.form-components.form-validation">Cấu hình chung</a></li>
                    </ul>
                </li>
                <li class="nav-title" data-i18n="nav.category.tables">
                    <i class="ti-line-dashed"></i>
                    <span>Hỗ trợ SEO</span>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-layout-grid3-alt"></i>
                        <span data-i18n="nav.bootstrap-table.main">Công cụ</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{route('hoang.google')}}" data-i18n="nav.bootstrap-table.basic-table">Google
                                analytics</a></li>
                        <li><a href="{{route('hoang.facebook')}}" data-i18n="nav.bootstrap-table.sizing-table">Facebook
                                Pixel</a></li>
                        <li><a href="{{route('hoang.javascript')}}" data-i18n="nav.bootstrap-table.border-table">Thêm
                                Javascript</a></li>
                    </ul>
                </li>
                <li class="nav-item single-item">
                    <a href="{{ route('manager.file') }}">
                        <i class="ti-view-list-alt"></i>
                        <span data-i18n="nav.foo-table.main"> Quản lý File</span>
                    </a>
                </li>

                <li class="nav-item single-item">
                    <a href="{{ route('comments.index') }}">
                        <i class="ti-write"></i>
                        <span data-i18n="nav.editable-table.main"> Bình luận</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <!-- Menu aside end -->