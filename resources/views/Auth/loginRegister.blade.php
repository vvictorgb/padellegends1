<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="/css/app.css">
  <title>FORMULARIO DE REGISTRO E INICIO SESIÓN</title>
</head>
<body style="background-image: url('{{ asset('images/fondo.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <!-- Login -->
  <div class="container-form login {{ (isset($showRegister) && $showRegister) ? 'hide' : '' }}" style="height: 500px">
    <div class="information">
      <div class="info-childs">
        <h2>¡Bienvenido nuevamente!</h2>
        <p>Para unirte a nuestra comunidad, por favor inicia sesión con tus datos</p>
        <input type="button" value="Registrarse" id="sign-up">
        <div class="icons">
            <i class='bx bxl-instagram'></i>
            <i class='bx bxl-tiktok'></i>
            <i class='bx bxl-twitter'></i>
        </div>
      </div>
    </div>
    <div class="form-information">
      <div class="form-information-childs">
        <h2>Iniciar Sesión</h2>
        <div class="logo-container" style="height: 90px; width: 180px; margin: auto; background-image: url('{{ asset('images/logo.png') }}'); background-size: contain; background-repeat: no-repeat; background-position: center;"></div>
        <form method="POST" action="{{ route('login') }}" class="form form-login">
          @csrf
          <div>
            <label>
              <i class='bx bx-envelope'></i>
              <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required
              style="background-color: white !important; box-shadow: 0 0 0 1000px white inset !important;">
            </label>
          </div>
          <div>
            <label>
              <i class='bx bx-lock-alt'></i>
              <input type="password" name="password" placeholder="Contraseña" required>
            </label>
          </div>
          <input type="submit" value="Iniciar Sesión">
        </form>
      </div>
    </div>
  </div>

  <!-- Registro -->
  <div class="container-form register {{ (isset($showRegister) && $showRegister) ? '' : 'hide' }}" style="height: 700px">
    <div class="information">
      <div class="info-childs">
        <h2>¡Bienvenido a Padel Legends!</h2>
        <p>Para unirte a nuestra comunidad, por favor regístrate con tus datos</p>
        <input type="button" value="Iniciar Sesión" id="sign-in">
        <div class="icons">
            <i class='bx bxl-instagram'></i>
            <i class='bx bxl-tiktok'></i>
            <i class='bx bxl-twitter'></i>
        </div>
      </div>
    </div>
    <div class="form-information">
      <div class="form-information-childs">
        <h2>Crear una Cuenta</h2>
        <div class="logo-container" style="height: 90px; width: 180px; margin: auto; background-image: url('{{ asset('images/logo.png') }}'); background-size: contain; background-repeat: no-repeat; background-position: center;"></div>
        <form method="POST" action="{{ route('register') }}" class="form form-register">
            @csrf

            <div>
              <label>
                <i class='bx bx-user'></i>
                <input type="text" name="name" placeholder="Nombre Usuario" value="{{ old('name') }}" required style="background-color: white !important; box-shadow: 0 0 0 1000px white inset !important;">
              </label>
            </div>

            <div>
              <label>
                <i class='bx bx-envelope'></i>
                <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required style="background-color: white !important; box-shadow: 0 0 0 1000px white inset !important;">
              </label>
            </div>

            <div>
              <label>
                <i class='bx bx-phone'></i>
                <input type="text" name="movil" placeholder="Móvil" value="{{ old('movil') }}" required style="background-color: white !important; box-shadow: 0 0 0 1000px white inset !important;">
              </label>
            </div>

            <div>
              <label>
                <i class='bx bx-map'></i>
                <input type="text" name="direccion" placeholder="Dirección" value="{{ old('direccion') }}" required style="background-color: white !important; box-shadow: 0 0 0 1000px white inset !important;">
              </label>
            </div>

            <div>
              <label>
                <i class='bx bx-male-female'></i>
                <select name="sexo" required style="width: 100%; padding: 10px; border: none; box-shadow: 0 0 0 1000px white inset !important;">
                  <option value="" disabled selected>Sexo</option>
                  <option value="masculino">Masculino</option>
                  <option value="femenino">Femenino</option>
                  <option value="otro">Otro</option>
                </select>
              </label>
            </div>

            <div>
              <label>
                <i class='bx bx-transfer-alt'></i>
                <select name="lado" required style="width: 100%; padding: 10px; border: none; box-shadow: 0 0 0 1000px white inset !important;">
                  <option value="" disabled selected>Elige tu lado</option>
                  <option value="derecha">Derecha</option>
                  <option value="revés">Revés</option>
                  <option value="ambos">Ambos</option>
                </select>
              </label>
            </div>

            <div>
              <label>
                <i class='bx bx-lock-alt'></i>
                <input type="password" name="password" placeholder="Contraseña" required>
              </label>
            </div>

            <div>
              <label>
                <i class='bx bx-lock-alt'></i>
                <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
              </label>
            </div>

            <input type="submit" value="Registrarse">
          </form>

      </div>
    </div>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
