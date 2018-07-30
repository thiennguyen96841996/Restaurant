<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('title')
    <link rel="apple-touch-icon" href="{{ asset('assets/demo-bower/assets/images/logo/apple-touch-icon.html') }}">
    <link rel="shortcut icon" href="{{ asset('assets/demo-bower/assets/images/logo/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/demo-bower/assets/vendor/PACE/themes/blue/pace-theme-minimal.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" />
    <link href="{{ asset('assets/demo-bower/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/demo-bower/assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/demo-bower/assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/demo-bower/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
</head>

<body>

    <div class="app header-default side-nav-dark">
        <div class="layout">
            @include('backend.layouts.header')
            @guest
            @else
                @if (Auth::user()->role == 1)
                    @include('backend.layouts.navbar')
                @else
                    @include('employees.layouts.navbar')
                @endif
            @endguest
            @include('backend.layouts.config')
            @yield('content')
         </div>
    </div>

    <script src="{{ asset('assets/demo-bower/assets/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/demo-bower/assets/js/app.min.js') }}"></script>

</body>

</html>
