<!doctype html>
<html lang="en">
<!--begin::Head-->
    <head>

        <title>AdminLTE v4 | Dashboard</title>
        @include('dashboard/layout.shared.meta')
        @include('dashboard/layout.shared.css')
    </head>

    <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
        <div class="app-wrapper">
            @include('dashboard/layout.shared.header')
            @include('dashboard/layout.shared.sidebar')
            @yield('content')
            @include('dashboard/layout.shared.footer')
        </div>

        @include('dashboard/layout.shared.js')

    </body>

</html>
