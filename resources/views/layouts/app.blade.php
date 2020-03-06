<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ config('app.name', 'Admin website - Hệ thống quản trị web 4.0') }}</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">
    <!-- Favicon icon -->
    
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    @include('layouts.admin.css')
</head>

<body class="menu-static">
    @yield('content')
    @include('layouts.admin.js')
</body>

</html>