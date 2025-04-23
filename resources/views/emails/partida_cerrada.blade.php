<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Partida Confirmada</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px;">
    <div style="background: white; padding: 20px; border-radius: 8px;">
        <h2 style="color: #388e3c;">✅ ¡Tu partida está confirmada!</h2>

        <p>La partida que estabas esperando ya está completa:</p>

        <ul>
            <li><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($partida->fecha)->format('d/m/Y') }}</li>
            <li><strong>Hora:</strong> {{ $partida->franja->hora_inicio }} - {{ $partida->franja->hora_fin }}</li>
            <li><strong>Pista:</strong> {{ $partida->pista->nombre }}</li>
        </ul>

        <p>¡Nos vemos en la pista! 🎾</p>

        <p style="margin-top: 30px;">– <strong>Padel Legends</strong></p>
    </div>
</body>
</html>
