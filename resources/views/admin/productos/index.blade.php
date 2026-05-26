@extends('admin.layouts.app')

@section('title', 'Productos — POS Salsamentaria')

@push('styles')
<style>
    .card-dark {
        background: #131316;
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 16px;
        overflow: hidden;
    }
    .form-control-dark {
        width: 100%;
        background: #1a1a1f;
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 10px;
        padding: 9px 14px 9px 38px;
        color: #e9e9ef;
        font-size: 13px;
        outline: none;
        font-family: inherit;
    }
    .form-control-dark::placeholder { color: #4a4a58; }
    .form-control-dark:focus { border-color: rgba(34,216,122,0.3); }
    .select-dark {
        background: #1a1a1f;
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 10px;
        padding: 9px 12px;
        color: #9898a8;
        font-size: 12px;
        outline: none;
        font-family: inherit;
        cursor: pointer;
    }
    .btn-green {
        background: rgba(34,216,122,0.12);
        border: 1px solid rgba(34,216,122,0.25);
        color: #22d87a;
        border-radius: 10px;
        padding: 7px 14px;
        font-size: 13px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        text-decoration: none;
        white-space: nowrap;
    }
    .btn-green:hover { background: rgba(34,216,122,0.2); color: #22d87a; }
    .btn-ghost {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.07);
        color: #9898a8;
        border-radius: 10px;
        padding: 7px 12px;
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        white-space: nowrap;
    }
    .btn-dots {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.07);
        color: #9898a8;
        border-radius: 8px;
        padding: 4px 10px;
        cursor: pointer;
        font-size: 15px;
        display: inline-flex;
        align-items: center;
    }
    .btn-dots:hover { border-color: rgba(255,255,255,0.18); color: #ccc; }
    .table { color: #b0b0c0; }
    .table > :not(caption) > * > * { background: transparent; }
    .table tbody tr:hover td { background: rgba(255,255,255,0.018); }
    .th-dark {
        padding: 10px 14px;
        font-size: 10px;
        color: #72727e;
        text-transform: uppercase;
        letter-spacing: .08em;
        font-weight: 500;
        border: none !important;
        white-space: nowrap;
    }
    .td-code {
        color: #72727e;
        font-size: 11.5px;
        font-family: 'DM Mono', monospace;
        border-color: rgba(255,255,255,0.04) !important;
    }
    .badge-pill-green {
        background: rgba(34,216,122,0.10);
        border: 1px solid rgba(34,216,122,0.2);
        color: #22d87a;
        border-radius: 20px;
        padding: 3px 10px;
        font-size: 11px;
        font-weight: 500;
    }
    .badge-pill-red {
        background: rgba(255,77,106,0.10);
        border: 1px solid rgba(255,77,106,0.2);
        color: #ff4d6a;
        border-radius: 20px;
        padding: 3px 10px;
        font-size: 11px;
        font-weight: 500;
    }
    .badge-pill-yellow {
        background: rgba(245,194,62,0.10);
        border: 1px solid rgba(245,194,62,0.2);
        color: #f5c23e;
        border-radius: 20px;
        padding: 3px 10px;
        font-size: 11px;
        font-weight: 500;
    }
    .badge-categoria {
        background: rgba(59,158,255,0.10);
        border: 1px solid rgba(59,158,255,0.2);
        color: #3b9eff;
        border-radius: 20px;
        padding: 3px 10px;
        font-size: 11px;
        font-weight: 500;
        display: inline-block;
    }
    .dropdown-dark {
        background: #1a1a1f;
        border: 1px solid rgba(255,255,255,0.09);
        border-radius: 10px;
        padding: 4px;
        min-width: 160px;
    }
    .dropdown-item-dark {
        display: block;
        width: 100%;
        padding: 8px 12px;
        font-size: 13px;
        color: #b0b0c0;
        border-radius: 7px;
        border: none;
        background: none;
        cursor: pointer;
        text-align: left;
        text-decoration: none;
    }
    .dropdown-item-dark:hover { background: rgba(255,255,255,0.05); color: #fff; }
    .dropdown-item-dark.text-danger { color: #ff4d6a !important; }
    .dropdown-item-dark.text-danger:hover { background: rgba(255,77,106,0.08); }
    .dropdown-divider-dark { border-color: rgba(255,255,255,0.07); margin: 4px 0; }
</style>
@endpush

@section('content')

{{-- Datos fake — elimina esto cuando tengas el backend --}}
@php
$productos = [
    ['id'=>1, 'codigo'=>'COD-001', 'nombre'=>'Jamón serrano',     'categoria'=>'Embutidos',    'precio_venta'=>92500,  'precio_costo'=>60000, 'stock'=>14.0, 'stock_minimo'=>5,  'activo'=>true,  'created_at'=>'2025-01-10'],
    ['id'=>2, 'codigo'=>'COD-002', 'nombre'=>'Chorizo español',   'categoria'=>'Embutidos',    'precio_venta'=>68000,  'precio_costo'=>42000, 'stock'=>42,   'stock_minimo'=>10, 'activo'=>true,  'created_at'=>'2025-01-10'],
    ['id'=>3, 'codigo'=>'COD-003', 'nombre'=>'Queso gouda',       'categoria'=>'Quesos',       'precio_venta'=>49000,  'precio_costo'=>30000, 'stock'=>6.2,  'stock_minimo'=>3,  'activo'=>true,  'created_at'=>'2025-01-12'],
    ['id'=>4, 'codigo'=>'COD-004', 'nombre'=>'Salami milano',     'categoria'=>'Embutidos',    'precio_venta'=>84000,  'precio_costo'=>55000, 'stock'=>0.8,  'stock_minimo'=>5,  'activo'=>true,  'created_at'=>'2025-01-15'],
    ['id'=>5, 'codigo'=>'COD-005', 'nombre'=>'Mortadela',         'categoria'=>'Embutidos',    'precio_venta'=>38000,  'precio_costo'=>22000, 'stock'=>3.1,  'stock_minimo'=>2,  'activo'=>true,  'created_at'=>'2025-01-15'],
    ['id'=>6, 'codigo'=>'COD-006', 'nombre'=>'Queso parmesano',   'categoria'=>'Quesos',       'precio_venta'=>120000, 'precio_costo'=>80000, 'stock'=>0,    'stock_minimo'=>3,  'activo'=>true,  'created_at'=>'2025-02-01'],
    ['id'=>7, 'codigo'=>'COD-007', 'nombre'=>'Pepperoni',         'categoria'=>'Embutidos',    'precio_venta'=>68000,  'precio_costo'=>44000, 'stock'=>5.0,  'stock_minimo'=>2,  'activo'=>true,  'created_at'=>'2025-02-03'],
    ['id'=>8, 'codigo'=>'COD-008', 'nombre'=>'Queso costeño',     'categoria'=>'Quesos',       'precio_venta'=>32000,  'precio_costo'=>19000, 'stock'=>1.5,  'stock_minimo'=>3,  'activo'=>true,  'created_at'=>'2025-02-10'],
    ['id'=>9, 'codigo'=>'COD-009', 'nombre'=>'Salchicha ranchera','categoria'=>'Carnes',       'precio_venta'=>28000,  'precio_costo'=>16000, 'stock'=>28,   'stock_minimo'=>5,  'activo'=>true,  'created_at'=>'2025-03-01'],
    ['id'=>10,'codigo'=>'COD-010', 'nombre'=>'Longaniza criolla', 'categoria'=>'Embutidos',    'precio_venta'=>42000,  'precio_costo'=>26000, 'stock'=>7.5,  'stock_minimo'=>2,  'activo'=>false, 'created_at'=>'2025-03-05'],
];
@endphp

<div class="main">

    @include('admin.components.topbar')

    <div class="px-4 py-3">

        <div class="card-dark">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center px-4 py-3"
                style="border-bottom: 1px solid rgba(255,255,255,0.07);">
                <div>
                    <h6 class="mb-1 text-white fw-semibold">Productos</h6>
                    <small style="color:#72727e;">
                        Inventario disponible —
                        <span style="color:#22d87a;">{{ count($productos) }} productos</span>
                    </small>
                </div>
                <a href="#" class="btn-green">
                    <i class="ti ti-plus"></i> Nuevo producto
                </a>
            </div>

            {{-- Filtros (solo visual por ahora) --}}
            <div class="px-3 py-3" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                <div class="d-flex align-items-center gap-2">
                    <div class="position-relative flex-grow-1">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y ms-3"
                            style="color:#72727e; font-size:15px;"></i>
                        <input type="text" placeholder="Buscar por nombre o código..."
                            class="form-control-dark">
                    </div>
                    <select class="select-dark">
                        <option>Todas las categorías</option>
                        <option>Embutidos</option>
                        <option>Quesos</option>
                        <option>Carnes</option>
                    </select>
                    <select class="select-dark">
                        <option>Todos</option>
                        <option>Activo</option>
                        <option>Inactivo</option>
                    </select>
                    <button class="btn-green">
                        <i class="ti ti-filter"></i> Filtrar
                    </button>
                </div>
            </div>

            {{-- Tabla --}}
            <div class="table-responsive">
                <table class="table align-middle mb-0">

                    <thead>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.07);">
                            <th class="th-dark ps-4">ID</th>
                            <th class="th-dark">Código</th>
                            <th class="th-dark">Nombre</th>
                            <th class="th-dark">Categoría</th>
                            <th class="th-dark">Precio venta</th>
                            <th class="th-dark">Precio costo</th>
                            <th class="th-dark">Stock</th>
                            <th class="th-dark">Stock mín.</th>
                            <th class="th-dark">Activo</th>
                            <th class="th-dark">Creado</th>
                            <th class="th-dark text-end pe-4">Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($productos as $p)
                        <tr style="border-color: rgba(255,255,255,0.04);">

                            <td class="ps-4 td-code">{{ $p['id'] }}</td>

                            <td class="td-code">{{ $p['codigo'] }}</td>

                            <td class="text-white fw-medium">{{ $p['nombre'] }}</td>

                            <td>
                                <span class="badge-categoria">{{ $p['categoria'] }}</span>
                            </td>

                            <td style="color:#22d87a; font-weight:600;">
                                ${{ number_format($p['precio_venta'], 0, ',', '.') }}
                            </td>

                            <td style="color:#9898a8; font-weight:500;">
                                ${{ number_format($p['precio_costo'], 0, ',', '.') }}
                            </td>

                            <td>
                                @if($p['stock'] <= 0)
                                    <span style="color:#ff4d6a; font-weight:600;">0 — Agotado</span>
                                @elseif($p['stock'] <= $p['stock_minimo'])
                                    <span style="color:#f5c23e; font-weight:600;">{{ $p['stock'] }} ⚠</span>
                                @else
                                    <span style="color:#e9e9ef; font-weight:500;">{{ $p['stock'] }}</span>
                                @endif
                            </td>

                            <td style="color:#72727e;">{{ $p['stock_minimo'] }}</td>

                            <td>
                                @if($p['activo'])
                                    <span class="badge-pill-green">Sí</span>
                                @else
                                    <span class="badge-pill-red">No</span>
                                @endif
                            </td>

                            <td style="color:#72727e; font-size:11.5px;">{{ $p['created_at'] }}</td>

                            <td class="text-end pe-4">
                                <div class="dropdown">
                                    <button class="btn-dots" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-dark">
                                        <li><a class="dropdown-item-dark" href="#"><i class="ti ti-edit me-2"></i>Editar</a></li>
                                        <li><a class="dropdown-item-dark" href="#"><i class="ti ti-eye me-2"></i>Ver detalle</a></li>
                                        <li><hr class="dropdown-divider-dark"></li>
                                        <li><a class="dropdown-item-dark text-danger" href="#"><i class="ti ti-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            {{-- Footer --}}
            <div class="d-flex justify-content-between align-items-center px-4 py-3"
                style="border-top: 1px solid rgba(255,255,255,0.07); background: rgba(255,255,255,0.01);">
                <small style="color:#72727e;">Mostrando {{ count($productos) }} productos</small>
                <div class="d-flex gap-2">
                    <button class="btn-dots"><i class="ti ti-chevron-left"></i></button>
                    <button class="btn-dots" style="background:rgba(34,216,122,0.12); border-color:rgba(34,216,122,0.25); color:#22d87a;">1</button>
                    <button class="btn-dots"><i class="ti ti-chevron-right"></i></button>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection