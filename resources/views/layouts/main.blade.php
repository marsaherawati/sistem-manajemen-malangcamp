<!DOCTYPE html>

<head>
    @include('layouts.head-content')
</head>

<body class="bg-gray-500">

    <header class="bg-gradient-dark">
        @yield('header')
    </header>

    @include('layouts.navbar')

    <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n7 bg-gray-400">

        <section class="py-5">
            @yield('container')
        </section>

    </div>

    @include('layouts.footer')

    @include('layouts.foot-content')

</body>

</html>
