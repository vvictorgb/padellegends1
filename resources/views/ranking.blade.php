<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ranking de Jugadores - Padel Legends</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Iconos --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    {{-- CSS personalizado --}}
    <link href="{{ asset('css/ranking.css') }}" rel="stylesheet">
</head>
<body>

    {{-- BARRA SUPERIOR --}}
    <div class="ranking-topbar d-flex align-items-center justify-content-between px-4 py-3 mb-4 shadow-sm">
        {{-- Botón volver --}}
        <a href="{{ url('/') }}" id="flecha" class="d-inline-flex align-items-center justify-content-center rounded-circle border bg-white text-dark">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>

        {{-- Logo + Título --}}
        <div class="text-center flex-grow-1">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="ranking-logo me-2">
            <span class="fs-4 fw-bold text-white">Ranking de Jugadores</span>
        </div>

        {{-- Espacio reservado --}}
        <div style="width: 42px;"></div>
    </div>

    {{-- CONTENIDO --}}
    <div class="container py-4">
        @foreach ($niveles as $grupo)
            @php
                $nivelRaw = number_format($grupo['nivel'], 2);
                $nivelClase = str_replace('.', '_', rtrim(rtrim($nivelRaw, '0'), '.'));
            @endphp

            <div class="ranking-card bg-nivel-{{ $nivelClase }}">
                <div class="ranking-header">
                    Nivel {{ number_format($grupo['nivel'], 2) }}
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered ranking-table mb-0 bg-transparent">
                        <thead>
                            <tr>
                                <th>Jugador</th>
                                <th>Puntos</th>
                                <th>Victorias</th>
                                <th>Derrotas</th>
                                <th>Racha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($grupo['usuarios'] as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->puntos }}</td>
                                    <td>{{ $user->victorias }}</td>
                                    <td>{{ $user->derrotas }}</td>
                                    <td>{{ $user->racha_victorias }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted bg-light">
                                        No hay jugadores aún en este nivel
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
