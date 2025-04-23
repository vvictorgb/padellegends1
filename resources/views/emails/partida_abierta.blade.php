<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Partida Abierta</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f2f2f2; padding: 20px;">
    <div style="background: white; padding: 20px; border-radius: 8px;">
        <h2 style="color: #1565c0;">🎾 ¡Se ha abierto una partida en tu nivel!</h2>

        <p>Se ha abierto una nueva partida para jugadores de nivel <strong>{{ $partida->users->first()->nivel }}</strong>.</p>

        <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($partida->fecha)->format('d/m/Y') }}</p>
        <p><strong>Hora:</strong> {{ $partida->franja->hora_inicio }} - {{ $partida->franja->hora_fin }}</p>
        <p><strong>Pista:</strong> {{ $partida->pista->nombre }}</p>

        <p>¡Apúntate antes de que se complete!</p>

        <p style="margin-top: 30px;">⚡ <strong>Padel Legends</strong></p>
    </div>
</body>
</html>
