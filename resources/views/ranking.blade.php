<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ranking de Jugadores - Padel Legends</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Estilos personalizados --}}
    <link href="{{ asset('css/ranking.css') }}" rel="stylesheet">
</head>
<body>
    <div class="ranking-topbar d-flex align-items-center justify-content-between px-4 py-3 mb-4">
        {{-- Botón volver --}}
        <a href="{{ url('/') }}" id="flecha" class="d-inline-flex align-items-center justify-content-center rounded-circle border bg-white text-dark">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>

        {{-- Título con logo --}}
        <div class="text-center flex-grow-1">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="ranking-logo me-2">
            <span class="fs-4 fw-bold text-white">Ranking de Jugadores</span>
        </div>

        {{-- Espacio vacío para equilibrar layout --}}
        <div style="width: 42px;"></div>
    </div>
    <div class="container py-5">



        @foreach ($niveles as $grupo)
            @php
                $nivelRaw = number_format($grupo['nivel'], 2);
                $nivelClase = str_replace('.', '_', rtrim(rtrim($nivelRaw, '0'), '.'));
            @endphp

            <div class="ranking-card mb-4 bg-nivel-{{ $nivelClase }}">
                <div class="ranking-header">
                    Nivel {{ number_format($grupo['nivel'], 2) }}
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered ranking-table mb-0 bg-white">
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
                                    <td colspan="5" class="text-center text-muted">
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

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
