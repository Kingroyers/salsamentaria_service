<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    @vite('resources/css/dashboard.css')
</head>
<body>

    @include('admin.components.sidebar')

    <div class="main">

        @include('admin.components.topbar')

        <main class="content">
            @yield('content')
        </main>

    </div>

    @vite('resources/js/dashboard.js')

</body>
</html>