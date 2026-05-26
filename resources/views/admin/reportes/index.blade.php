<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — POS Salsamentaria</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Sora:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    @vite('resources/css/dashboard.css')
    @vite('resources/css/ventas.css')
</head>

<body>

    @include('admin.components.sidebar')

    <!-- MAIN -->
    <div class="main">
        <!-- TOPBAR -->
        @include('admin.components.topbar')

        <!-- CONTENT -->
        <div class="row g-3">

            <!-- IZQUIERDA -->
            <div class="col-12 col-lg-8">


            </div>

            <!-- DERECHA -->
            <div class="col-12 col-lg-4" style="padding: 1em; gap: 10px;">


            </div>

        </div>

    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>