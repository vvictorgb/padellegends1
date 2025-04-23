<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservas de pistas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Reservas por día</h2>

        {{-- BOTÓN SOLO PARA ADMIN --}}
        @if(auth()->check() && auth()->user()->rol === 'admin')
            <a href="{{ route('admin.partidas') }}" class="btn btn-warning mb-3">
                ⚙️ Gestionar resultados de partidas
            </a>
        @endif

        {{-- Selector de fecha --}}
        <input type="date" id="datepicker" class="form-control mb-4" value="{{ date('Y-m-d') }}">

        {{-- Contenedor de reservas que se llena dinámicamente --}}
        <div id="contenedor-reservas"></div>
    </div>

    <script>
        $(document).ready(function () {
            cargarReservas($('#datepicker').val());

            $('#datepicker').on('change', function () {
                const fecha = $(this).val();
                cargarReservas(fecha);
            });

            function cargarReservas(fecha) {
                $.ajax({
                    url: '/reservas/dia',
                    method: 'GET',
                    data: { fecha: fecha },
                    success: function (response) {
                        renderizarReservas(response.pistas);
                    },
                    error: function () {
                        $('#contenedor-reservas').html('<p class="text-danger">Error al cargar las reservas.</p>');
                    }
                });
            }

            function renderizarReservas(pistas) {
                let html = '';

                pistas.forEach(pista => {
                    html += `<h4 class="mt-4">${pista.nombre}</h4><div class="row">`;

                    pista.partidas.forEach(partida => {
                        let estado = 'Libre';
                        let color = 'success';
                        const numJugadores = partida.users.length;

                        if (partida.reservada_entera || partida.completa || numJugadores === 4) {
                            estado = 'Completa';
                            color = 'danger';
                        } else if (numJugadores > 0 && numJugadores < 4) {
                            estado = 'En proceso';
                            color = 'warning';
                        }

                        const yaUnido = partida.users.find(u => u.id === {{ auth()->id() ?? 'null' }}) !== undefined;

                        html += `
                            <div class="col-md-3 mb-3">
                                <div class="card text-white bg-${color}">
                                    <div class="card-header">
                                        ${partida.franja.hora_inicio} - ${partida.franja.hora_fin}
                                    </div>
                                    <div class="card-body">
                                        <p>${estado}</p>
                                        ${partida.users.map(user => `<span class="badge bg-light text-dark">${user.name}</span>`).join('')}

                                        ${(estado !== 'Completa' && !yaUnido) ? `
                                            <button class="btn btn-light btn-sm mt-2 unirse-btn" data-id="${partida.id}">
                                                Unirse
                                            </button>
                                        ` : ''}

                                        ${(estado === 'Libre') ? `
                                            <button class="btn btn-dark btn-sm mt-1 reservar-btn" data-id="${partida.id}">
                                                Reservar entera
                                            </button>
                                        ` : ''}
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    html += '</div>';
                });

                $('#contenedor-reservas').html(html);
            }

            // Acción del botón "Unirse"
            $(document).on('click', '.unirse-btn', function () {
                const partidaId = $(this).data('id');

                $.ajax({
                    url: '{{ route("reservas.unirse") }}',
                    method: 'POST',
                    data: {
                        partida_id: partidaId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (res) {
                        alert(res.success);
                        cargarReservas($('#datepicker').val());
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'Error al unirse.');
                    }
                });
            });

            // Acción del botón "Reservar entera"
            $(document).on('click', '.reservar-btn', function () {
                const partidaId = $(this).data('id');

                $.ajax({
                    url: '{{ route("reservas.reservar") }}',
                    method: 'POST',
                    data: {
                        partida_id: partidaId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (res) {
                        alert(res.success);
                        cargarReservas($('#datepicker').val());
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'Error al reservar.');
                    }
                });
            });
        });
    </script>
</body>
</html>
