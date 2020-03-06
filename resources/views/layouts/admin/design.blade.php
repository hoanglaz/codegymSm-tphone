<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - Web design by Mr.H</title>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="mrh">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('adminbymrh/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    @include('layouts.admin.css')
    @yield('css')

</head>

<body class="menu-static">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div class="row">
        <div class="col-sm-12">
    <!-- Menu header start -->
            @include('layouts.admin.menuHeader')
            <!-- Menu header end -->
            @include('layouts.admin.mainMenu')

            <!-- Main-body start-->
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="page-header-title">
                            <h4>@yield('title')</h4>
                        </div>
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">
                                        <i class="icofont icofont-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Admin</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">@yield('title')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-body">
                        @yield('content')
                        
                    </div>
                </div>
            </div>
    <!-- Main-body end-->
        </div>
        <footer class="col-sm-12">
            <div class="card borderless-card mb-0">
                <div class="card-block inverse-breadcrumb text-center">
                    <div class="breadcrumb-header text-center">
                        <h5>Copyright@2019 | Design & Develop by Mr.H</h5>
                        <span>Hotline: 0353692393 | Email:nghoangbk93@gmail.com</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
    @include('layouts.admin.notification')
    @include('layouts.admin.js')
    @yield('js')
</body>

</html>
