<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.layouts.head-content')
</head>

<body class="g-sidenav-show bg-gray-200">

    @include('dashboard.layouts.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        @include('dashboard.layouts.header')

        @yield('main-content')

    </main>

    @include('dashboard.layouts.footer')

    @include('dashboard.layouts.foot-content')

    @stack('custom-scripts')

</body>

</html>
