<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Resultados - Padel Legends</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Marcar Resultado de Partidas Completas</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($partidas as $partida)
        <div class="card mb-4">
            <div class="card-header">
                <strong>Pista:</strong> {{ $partida->pista->nombre ?? 'Pista' }} |
                <strong>Franja:</strong> {{ $partida->franja->hora_inicio }} - {{ $partida->franja->hora_fin }} |
                <strong>Fecha:</strong> {{ $partida->fecha }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.marcarResultado') }}" method="POST">
                    @csrf
                    <input type="hidden" name="partida_id" value="{{ $partida->id }}">

                    <div class="row">
                        @foreach($partida->users as $user)
                            <div class="col-md-3">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <p><strong>{{ $user->name }}</strong></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="ganadores[]" value="{{ $user->id }}">
                                            <label class="form-check-label">Ganador</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="perdedores[]" value="{{ $user->id }}">
                                            <label class="form-check-label">Perdedor</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Guardar resultado</button>
                </form>
            </div>
        </div>
    @empty
        <p>No hay partidas completas aún para calificar.</p>
    @endforelse
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
