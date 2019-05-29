<!DOCTYPE html>
<html lang="en">
    @include('wave::layout.partials.head')
    <body class="@yield('layout.body.class', 'app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden')">
        @yield('layout.body')
        @yield('layout.footer')
        @include('wave::layout.partials.scripts')
    </body>
</html>