<nav class="navbar header-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-logo">
                <a class="mobile-menu" id="mobile-collapse" href="#!">
                    <i class="ti-menu"></i>
                </a>
                <a href="{{route('dashboard')}}">
                    <img class="img-fluid" src="{{ asset('adminbymrh/assets/images/logo.png')}}" alt="Theme-Logo" />
                </a>
                <a class="mobile-options">
                    <i class="ti-more"></i>
                </a>
            </div>
            <div class="navbar-container container-fluid">
                <div>
                    <ul class="nav-left">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-menu"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav-right">
                        <li><a href="{{ url('/')}}" target="_blank"></i>View Website</a></li>
                        {{--<li class="header-notification">
                            <a href="#!">
                                <i class="ti-bell"></i>
                                <span class="badge">5</span>
                            </a>
                            <ul class="show-notification">
                                <li>
                                    <h6>Thông báo</h6>
                                    <label class="label label-danger">New</label>
                                </li>
                                <li>
                                    <div class="media">
                                        <img class="d-flex align-self-center" src="{{ asset('adminbymrh/assets/images/user.png')}}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">John Doe</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </li>--}}

                        <li class="user-profile header-notification">
                            <a href="#!">
                                <img src="{{ asset('adminbymrh/assets/images/user.png')}}" alt="User-Profile-Image">
                                <span>{{ Auth::user()->name}}</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                {{--<li>
                                    <a href="#!">
                                        <i class="ti-settings"></i> Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="user-profile.html">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="email-inbox.html">
                                        <i class="ti-email"></i> My Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="auth-lock-screen.html">
                                        <i class="ti-lock"></i> Lock Screen
                                    </a>
                                </li>--}}
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>