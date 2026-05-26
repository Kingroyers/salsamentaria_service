<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — POS Salsamentaria</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Sora:wght@300;400;500;600&display=swap" rel="stylesheet">
      @vite('resources/css/dashboard.css')
</head>
<body>

@include('admin.components.sidebar')

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
   @include('admin.components.topbar')

    <!-- CONTENT -->
    <main class="content">

        <div class="page-header">
            <div class="page-title">Resumen del día</div>
            <div class="page-subtitle">Vista general de ventas, inventario y actividad del sistema</div>
        </div>

        <!-- KPIs -->
        @include('admin.components.kpis')

        <!-- ROW 1 -->
        <div class="two-col">

            <!-- Últimas ventas -->
            @include('admin.components.ventas-table')



            <!-- Sidebar panels -->
            <div style="display:flex;flex-direction:column;gap:14px;">

               @include('admin.components.sidebar_panels_right')

            </div>
        </div>

        <!-- ROW 2 -->
        <div class="two-col">

            <!-- Ventas semana -->
            @include('admin.components.ventas_semana')
            <!-- Right col -->
            <div style="display:flex;flex-direction:column;gap:14px;">

              @include('admin.components.right_col_dash')

            </div>
        </div>

    </main>
</div>
</body>
</html>