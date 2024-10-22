<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title', 'Dashboard')</title>
    <link rel="icon" href="{{ asset('images/lotus.webp') }}" type="image/x-icon">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ asset('css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/demo.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="wrapper">
        @include('layouts.header')
        <div class="main-panel">
            @include('layouts.sidebar')
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>

    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugin/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
    <script src="{{ asset('js/plugin/chart-circle/circles.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/ready.min.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>

</body>
</html>