<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservas de pistas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Íconos Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    {{-- Fuente Google --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    {{-- CSS personalizado --}}
    <link href="{{ asset('css/reservas.css') }}" rel="stylesheet">

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="font-family: 'Inter', sans-serif;">
    {{-- HEADER --}}
    <header class="main-header shadow-sm bg-white py-2 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            {{-- Flecha volver --}}
            <a href="{{ url('/') }}" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-arrow-left"></i>
            </a>

            {{-- Logo --}}
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="70">

            {{-- Espacio reservado --}}
            <div style="width: 40px;"></div>
        </div>
    </header>

    <div class="container">

        <section class="text-white" style="background-color: #e1f0fd; border-radius: 12px; overflow: hidden; margin-bottom: 60px; font-family: 'Poppins', sans-serif;">
            <div class="row g-0 align-items-stretch">
                <!-- Columna izquierda (Texto) -->
                <div class="col-md-6 d-flex flex-column justify-content-center p-5">
                    <h1 class="fw-bold mb-3" style="font-size: 2.2rem; color: #1565c0;">¿Cómo funciona?</h1>
                    <p class="mb-4 text-dark" style="font-size: 1.1rem;">Reserva una pista entera o únete a partidas abiertas. Todo adaptado a tu nivel. ¡Fácil y rápido!</p>
                    <ul class="list-unstyled" style="font-size: 1.05rem; color: #333;">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="bi bi-people-fill text-primary me-2 fs-5"></i>
                            <span><strong>Partida abierta:</strong> 1 a 3 jugadores se pueden unir.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="bi bi-person-lock text-primary me-2 fs-5"></i>
                            <span><strong>Reserva completa:</strong> Tú y tus invitados ocupáis toda la pista.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="bi bi-palette-fill text-primary me-2 fs-5"></i>
                            <span><strong>Colores:</strong> Verde (libre), Amarillo (en proceso), Rojo (completa).</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="bi bi-shield-lock-fill text-primary me-2 fs-5"></i>
                            <span><strong>Solo mismo nivel:</strong> Todos los jugadores deben tener el mismo nivel.</span>
                        </li>
                    </ul>
                </div>

                <!-- Columna derecha (Imagen) -->
                <div class="col-md-6">
                    <img src="{{ asset('images/clases.jpg') }}" alt="Pista de pádel"
                         class="img-fluid w-100 h-100" style="object-fit: cover; display: block;">
                </div>
            </div>
        </section>






        {{-- BOTÓN ADMIN --}}
        @if(auth()->check() && auth()->user()->rol === 'admin')
            <div class="text-center mb-3" >
                <a href="{{ route('admin.partidas') }}" class="btn btn-warning" style="width:300px;background-color:red">
                    ⚙️ Gestionar resultados
                </a>
            </div>
        @endif

        {{-- SELECTOR DE FECHA --}}
        <input type="date" id="datepicker" class="form-control mb-4 mx-auto" style="max-width: 300px;" value="{{ date('Y-m-d') }}">

        {{-- CONTENEDOR --}}
        <div id="contenedor-reservas"></div>
    </div>

    {{-- SCRIPT --}}
    <script>
        const USER_ID = {{ auth()->check() ? auth()->id() : 'null' }};

        $(document).ready(function () {
            cargarReservas($('#datepicker').val());

            $('#datepicker').on('change', function () {
                cargarReservas($(this).val());
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
                    html += `
                        <div class="pista-titulo mt-5 mb-3">
                            <h5><i class="bi bi-grid-3x3-gap-fill me-2 text-primary"></i>${pista.nombre}</h5>
                            <hr>
                        </div>
                        <div class="row">
                    `;

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

                        const yaUnido = partida.users.find(u => u.id === USER_ID) !== undefined;

                        html += `
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card text-white bg-${color}">
                                    <div class="card-header d-flex justify-content-between">
                                        <span>${partida.franja.hora_inicio} - ${partida.franja.hora_fin}</span>
                                        <span class="badge bg-light text-dark">${estado}</span>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-2 fw-semibold">Jugadores:</p>
                                        ${partida.users.map(user => `<div class="badge bg-light text-dark me-1 mb-1">${user.name} (${user.nivel})</div>`).join('')}

                                        ${(estado !== 'Completa' && !yaUnido) ? `
                                            <button class="btn btn-light btn-sm mt-3 unirse-btn" data-id="${partida.id}">
                                                Unirse
                                            </button>
                                        ` : ''}

                                        ${(numJugadores === 0) ? `
                                            <button class="btn btn-dark btn-sm mt-2 reservar-btn" data-id="${partida.id}">
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

            $(document).on('click', '.unirse-btn', function () {
                if (!USER_ID) {
                    window.location.href = "/login";
                    return;
                }

                $.post('{{ route("reservas.unirse") }}', {
                    partida_id: $(this).data('id'),
                    _token: '{{ csrf_token() }}'
                }, function (res) {
                    alert(res.success);
                    cargarReservas($('#datepicker').val());
                }).fail(function (xhr) {
                    alert(xhr.responseJSON.error || 'Error al unirse.');
                });
            });

            $(document).on('click', '.reservar-btn', function () {
                if (!USER_ID) {
                    window.location.href = "/login";
                    return;
                }

                $.post('{{ route("reservas.reservar") }}', {
                    partida_id: $(this).data('id'),
                    _token: '{{ csrf_token() }}'
                }, function (res) {
                    alert(res.success);
                    cargarReservas($('#datepicker').val());
                }).fail(function (xhr) {
                    alert(xhr.responseJSON.error || 'Error al reservar.');
                });
            });
        });
    </script>
</body>
</html>
