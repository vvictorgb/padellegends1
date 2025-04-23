<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Perfil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="main-body">
            <div class="mb-4">
                <a href="{{ url('/') }}" id="flecha" class="d-inline-flex align-items-center justify-content-center rounded-circle border">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <form action="{{ route('users.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Jugador" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4>{{ $user->name }}</h4>
                                        <p class="text-secondary mb-1">Jugador Profesional de Pádel</p>
                                        <p class="text-muted font-size-sm">Madrid, España</p>

                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="{{ route('users.show') }}" class="btn btn-secondary">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="bi bi-trophy mr-3"></i> Victorias Totales</h6>
                                    <span class="text-secondary">{{ $user->victorias }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="bi bi-x-circle mr-3"></i> Derrotas Totales</h6>
                                    <span class="text-secondary">{{ $user->derrotas }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="bi bi-arrow-up-circle mr-3"></i> Racha de Victorias</h6>
                                    <span class="text-secondary">{{ $user->racha_victorias }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="bi bi-gender-male mr-3"></i> Lado</h6>
                                    <span class="text-secondary">{{ $user->lado == 'derecha' ? 'Derecho' : 'Revés' }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="bi bi-bar-chart mr-3"></i> Nivel</h6>
                                    <span class="text-secondary">{{ $user->nivel }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="bi bi-graph-up-arrow mr-3" style="margin-right: 8px;"></i> Puntos</h6>
                                    <span class="text-secondary">{{ $user->puntos }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nombre</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Contraseña</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" placeholder="Deja en blanco si no quieres cambiarla">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Móvil</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="movil" class="form-control" value="{{ $user->movil }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Dirección</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="direccion" class="form-control" value="{{ $user->direccion }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Sexo</label>
                                    <div class="col-sm-9">
                                        <select name="sexo" class="form-select">
                                            <option value="" disabled {{ $user->sexo == null ? 'selected' : '' }}>Selecciona</option>
                                            <option value="masculino" {{ $user->sexo == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="femenino" {{ $user->sexo == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row gutters-sm">
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i
                                                class="bi bi-bar-chart-line-fill text-info mr-2"
                                                style="margin-right: 5px"></i> Estadísticas de Partidos</h6>
                                        <small>Partidos Jugados</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Partidos Ganados</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Partidos Perdidos</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 25%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Partidos Empatados</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 15%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Partidos en 3 Set</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 60%"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i
                                                class="bi bi-star-fill text-warning mr-2" style="margin-right: 5px"></i>
                                            Rendimiento General</h6>
                                        <small>Ranking Nacional</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 65%"
                                                aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Rendimiento en Dobles</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Rendimiento en Individuales</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Victorias por Temporada</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Partidos Internacionales</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 40%"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
