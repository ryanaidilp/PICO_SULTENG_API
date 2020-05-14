<!DOCTYPE html>
<html lang="{{ app('translator')->getLocale() }}">

    <head>
        @yield('head')
        @yield('head.styles')
        @yield('head.script')
        @yield('head.css')
    </head>

    <body class="gradient leading-relaxed tracking-wide flex flex-col">
        @yield('content')
        @yield('body.script')
    </body>

</html>
