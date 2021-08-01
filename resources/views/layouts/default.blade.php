<!DOCTYPE html>
<html lang="{{ app('translator')->getLocale() }}">

<head>
    @yield('head')
    @yield('head.styles')
    @yield('head.script')
    @yield('head.css')
</head>

<body class="flex flex-col leading-relaxed tracking-wide gradient">
    @yield('content')
    @yield('body.script')
</body>

</html>
