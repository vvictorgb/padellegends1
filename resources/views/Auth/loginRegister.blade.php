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
  <div class="container-form login {{ (isset($showRegister) && $showRegister) ? 'hide' : '' }}">
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
              <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
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
  <div class="container-form register {{ (isset($showRegister) && $showRegister) ? '' : 'hide' }}">
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
              <input type="text" name="name" placeholder="Nombre Usuario" value="{{ old('name') }}" required>
            </label>
          </div>
          <div>
            <label>
              <i class='bx bx-envelope'></i>
              <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
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

  <script>
    const btnSignIn = document.getElementById("sign-in"),
          btnSignUp = document.getElementById("sign-up"),
          containerFormRegister = document.querySelector(".register"),
          containerFormLogin = document.querySelector(".login");

    btnSignIn.addEventListener("click", () => {
      containerFormRegister.classList.add("hide");
      containerFormLogin.classList.remove("hide");
    });

    btnSignUp.addEventListener("click", () => {
      containerFormLogin.classList.add("hide");
      containerFormRegister.classList.remove("hide");
    });
  </script>
</body>
</html>
