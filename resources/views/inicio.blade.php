<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Padel Legends</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>






</head>

<body id="section_1">
    <header class="site-header">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-3 col-md-5 col-7">
                    <p class="text-white mb-0">
                        <i class="bi-clock site-header-icon me-2"></i>
                        Lun/Dom de 10:00 a 22:00
                    </p>
                </div>

                <div class="col-lg-2 col-md-3 col-5">
                    <p class="text-white mb-0">

                            <i class="bi-telephone site-header-icon me-2"></i>
                            681124820


                    </p>
                </div>

                <div class="col-lg-3 col-md-3 col-12 ms-auto">
                    <ul class="social-icon">
                        <li><a href="https://facebook.com/tooplate" class="social-icon-link bi-facebook"></a></li>

                        <li><a href="https://pinterest.com/tooplate" class="social-icon-link bi-pinterest"></a></li>

                        <li><a href="https://twitter.com/minthu" class="social-icon-link bi-twitter"></a></li>

                        <li><a href="https://www.youtube.com/tooplate" class="social-icon-link bi-youtube"></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg bg-white shadow-lg">
        <div class="container">
            <a href="#">
                <div style="width: 100px; height: 80px; background-image: url('{{ asset('images/logo.png') }}'); background-size: cover; background-position: center;"></div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_1">
                            <small class="small-title"><strong class="text-warning">01</strong></small> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2">
                            <small class="small-title"><strong class="text-warning">02</strong></small> Sobre Nosotros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_3">
                            <small class="small-title"><strong class="text-warning">03</strong></small> Instalaciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">
                            <small class="small-title"><strong class="text-warning">04</strong></small> Mi Club
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_5">
                            <small class="small-title"><strong class="text-warning">05</strong></small> Contacto
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <main>

        <section class="hero" style="height: 100vh; overflow: hidden;">
            <div class="container-fluid h-100 p-0">
                <div class="row h-100 m-0">
                    <div id="carouselExampleCaptions" class="carousel carousel-fade hero-carousel slide w-100 h-100"
                        data-bs-ride="carousel">
                        <div class="carousel-inner h-100">
                            <!-- Primer Item -->
                            <div class="carousel-item active h-100">
                                <div class="container position-relative h-100">
                                    <div class="carousel-caption d-flex flex-column justify-content-center ">
                                        <small class="small-title">CLUB PADEL LEGENDS <strong class="text-warning">01/05</strong></small>
                                        <h1>Elevate your game with <span class="text-warning">Next-Level Padel</span></h1>
                                        <div class="d-flex align-items-center mt-4">
                                            <a class="custom-btn btn custom-link" href="#section_2"
                                                style="background-color:#34ecec">Más Información</a>
                                            <a class="popup-youtube custom-icon d-flex ms-4"
                                                href="https://www.youtube.com/watch?v=rRzr-5GP7J8">
                                                <i class="bi-play play-icon d-flex m-auto text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-image-wrap position-absolute top-0 start-0 w-100 h-100">
                                    <img src="{{ asset('images/slice1.jpg') }}" class="d-block w-100 h-100" alt="Imagen 1"
                                        style="object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <section class="about section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <div class="about-image-wrap h-100 d-flex align-items-center justify-content-center"
                            style="overflow: hidden; max-height: 700px; border-radius: 12px;">
                            <img src="{{ asset('images/club.jpg') }}" class="img-fluid about-image"
                                alt="Foto del club"
                                style="width: 100%; height: auto; object-fit: cover; max-height: 100%;">

                            <div class="about-image-info position-absolute p-3"
                                style="background: rgba(0,0,0,0.5); bottom: 0; width: 100%;">
                                <h4 class="text-white">Sobre Nosotros</h4>
                                <p class="text-white mb-0">Un espacio para compartir, crecer y disfrutar en comunidad.
                                    Bienvenidos a nuestro club.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 d-flex flex-column">
                        <div class="about-thumb bg-white shadow-lg">

                            <div class="about-info">
                                <small class="small-title">Sobre Nosotros <strong class="text-warning"> 02/05</strong></small>

                                <h2 class="mb-3">Conectando Pasiones</h2>

                                <h5 class="mb-3">Más que un club, una familia</h5>

                                <p>Somos una comunidad unida por intereses comunes, donde cada miembro encuentra un
                                    lugar para desarrollarse y disfrutar de experiencias únicas. Nuestro objetivo es
                                    crear un ambiente inclusivo, dinámico y enriquecedor.</p>

                                <p>Únete a nosotros y forma parte de una historia que seguimos escribiendo juntos.</p>
                            </div>
                        </div>

                        <div class="row h-100">
                            <div class="col-lg-6 col-6">
                                <div class="about-thumb d-flex flex-column justify-content-center mb-lg-0 h-100">
                                    <div class="about-info">
                                        <h5 class="text-white mb-4">¿Ya eres parte?</h5>
                                        <a class="custom-btn btn custom-bg-primary bg-warning"
                                            href="{{ route('login') }}">Iniciar sesión</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-6">
                                <div
                                    class="about-thumb d-flex flex-column justify-content-center bg-warning mb-lg-0 h-100">
                                    <div class="about-info">
                                        <h5 class="text-white mb-4">¿Nuevo por aquí?</h5>
                                        <p class="text-white mb-0">Descubre todo lo que tenemos para ofrecerte.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="services section-padding" id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 text-center mx-auto mb-5">
                        <small class="small-title">Instalaciones <strong class="text-warning">03/05</strong></small>
                        <h2>¿Qué ofrecemos en nuestro club?</h2>
                    </div>

                    <div class="col-lg-6 col-12">
                        <nav>
                            <div class="nav nav-tabs flex-column align-items-baseline" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-pistas-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-pistas" type="button" role="tab"
                                    aria-controls="nav-pistas" aria-selected="true">
                                    <h3>Pistas de Pádel</h3>
                                    <span>Contamos con modernas pistas para todos los niveles, disponibles todo el año.</span>
                                </button>

                                <button class="nav-link" id="nav-bar-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-bar" type="button" role="tab"
                                    aria-controls="nav-bar" aria-selected="false">
                                    <h3>Bar Restaurante</h3>
                                    <span>Relájate antes o después de jugar con nuestra variada oferta gastronómica.</span>
                                </button>

                                <button class="nav-link" id="nav-clases-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-clases" type="button" role="tab"
                                    aria-controls="nav-clases" aria-selected="false">
                                    <h3>Clases Particulares</h3>
                                    <span>Mejora tu técnica con entrenadores profesionales y planes personalizados.</span>
                                </button>
                            </div>
                        </nav>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-pistas" role="tabpanel"
                                aria-labelledby="nav-pistas-tab">
                                <div style="width: 100%; height: 400px; overflow: hidden; border-radius: 8px;">
                                    <img src="{{ asset('images/fondo.png') }}"
                                         alt="Pistas de pádel"
                                         style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <h5 class="mt-4 mb-2">Nuestras Pistas</h5>
                                <p>Disponemos de 6 pistas de pádel de última generación, tanto cubiertas como al aire libre, con iluminación LED para partidos nocturnos.</p>
                                <ul>
                                    <li>Reserva online o presencial</li>
                                    <li>Pistas con césped artificial profesional</li>
                                    <li>Opciones para partidos individuales y dobles</li>
                                </ul>
                            </div>

                            <div class="tab-pane fade" id="nav-bar" role="tabpanel"
                                aria-labelledby="nav-bar-tab">
                                <div style="width: 100%; height: 400px; overflow: hidden; border-radius: 8px;">
                                    <img src="{{ asset('images/restaurante.jpg') }}"
                                         alt="Bar restaurante"
                                         style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <h5 class="mt-4 mb-2">Zona Bar y Restaurante</h5>
                                <div class="row">

                                        <p>Disfruta de desayunos, comidas y snacks en un ambiente deportivo y familiar.</p>


                                </div>
                                <ul>
                                    <li>Menús diarios y carta variada</li>
                                    <li>Terraza exterior con vistas a las pistas</li>
                                    <li>Opciones vegetarianas y sin gluten</li>
                                </ul>
                            </div>

                            <div class="tab-pane fade" id="nav-clases" role="tabpanel"
                                aria-labelledby="nav-clases-tab">
                                <div style="width: 100%; height: 400px; overflow: hidden; border-radius: 8px;">
                                    <img src="{{ asset('images/clases.jpg') }}"
                                         alt="Clases particulares"
                                         style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <h5 class="mt-4 mb-2">Clases Particulares</h5>
                                <p>Nuestros monitores titulados te ayudarán a perfeccionar tu juego. Clases para todas las edades y niveles.</p>
                                <ul>
                                    <li>Sesiones individuales o en grupo reducido</li>
                                    <li>Entrenamientos técnicos y tácticos</li>
                                    <li>Horarios flexibles adaptados a ti</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>





        <section class="projects section-padding pb-0" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 text-center mx-auto mb-5">
                        <small class="small-title">Mi Club <strong class="text-warning">04/05</strong></small>
                        <h2>Mi Espacio Pádel</h2>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="projects-thumb projects-thumb-small">
                            <a href="project-detail.html">
                                <img src="{{ asset('images/perfil.jpg') }}" class="img-fluid projects-image" alt="">
                                <div class="projects-info">
                                    <div class="projects-title-wrap">
                                        <small class="projects-small-title"><i class="bi-person-circle"></i></small>
                                        <h2 class="projects-title">Perfil Jugador</h2>
                                    </div>
                                    <div class="projects-btn-wrap mt-4">
                                        <span class="custom-btn btn"><i class="bi-arrow-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="projects-thumb projects-thumb-small">
                            <a href="project-detail.html">
                                <img src="{{ asset('images/ranking.jpg') }}" class="img-fluid projects-image" alt="">
                                <div class="projects-info">
                                    <div class="projects-title-wrap">
                                        <small class="projects-small-title"><i class="bi-trophy"></i></small>
                                        <h2 class="projects-title">Ranking</h2>
                                    </div>
                                    <div class="projects-btn-wrap mt-4">
                                        <span class="custom-btn btn"><i class="bi-arrow-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="projects-thumb projects-thumb-small">
                            <a href="https://maps.google.com?q=Padel+Club+Valencia" target="_blank">
                                <img src="{{ asset('images/llegar.jpg') }}" class="img-fluid projects-image projects-image-short" alt="">
                                <div class="projects-info">
                                    <div class="projects-title-wrap">
                                        <small class="projects-small-title"><i class="bi-geo-alt-fill"></i></small>
                                        <h2 class="projects-title">Cómo Llegar</h2>
                                    </div>
                                    <div class="projects-btn-wrap mt-4">
                                        <span class="custom-btn btn"><i class="bi-arrow-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-8 col-12">
                        <div class="projects-thumb projects-thumb-large">
                            <a href="project-detail.html">
                                <img src="{{ asset('images/reservar.jpg') }}" class="img-fluid projects-image projects-image-short" alt="">
                                <div class="projects-info">
                                    <div class="projects-title-wrap">
                                        <small class="projects-small-title"><i class="bi-calendar-check"></i></small>
                                        <h2 class="projects-title">Reserva tu Pista</h2>
                                    </div>
                                    <div class="projects-btn-wrap mt-4">
                                        <span class="custom-btn btn"><i class="bi-arrow-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="projects-thumb projects-thumb-small">
                            <a href="project-detail.html">
                                <img src="{{ asset('images/abiertas.jpg') }}" class="img-fluid projects-image" alt="">
                                <div class="projects-info">
                                    <div class="projects-title-wrap">
                                        <small class="projects-small-title"><i class="bi-people-fill"></i></small>
                                        <h2 class="projects-title" style="font-size: 35px">Partidas Abiertas</h2>
                                    </div>
                                    <div class="projects-btn-wrap mt-4">
                                        <span class="custom-btn btn"><i class="bi-arrow-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>



        <section class="contact" id="section_5">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#34ecec" fill-opacity="1"
                    d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>

            <div class="contact-container-wrap">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <form action="{{ route('contact.send') }}" method="POST" class="custom-form contact-form" role="form">
                                @csrf
                                <small class="small-title">Contacto <strong class="text-white">05/05</strong></small>

                                <h2 class="mb-5">¡Preguntanos!</h2>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="text" name="name" class="form-control" placeholder="Tu nombre" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="email" name="email" class="form-control" placeholder="Tu correo" required>
                                    </div>

                                    <div class="col-12">
                                        <textarea name="message" rows="5" class="form-control" placeholder="Escribe tu mensaje" required></textarea>

                                        <button type="submit" class="form-control">Enviar mensaje</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="contact-thumb">

                                <div class="contact-info bg-white shadow-lg">
                                    <h4 class="mb-4">Calle Unidad de Ejecución, 7, 46185 La Pobla de Vallbona</h4>

                                    <h4 class="mb-2">

                                            962738877

                                    </h4>

                                    <h5>
                                            padellegends2@gmail.com
                                        </a>
                                    </h5>

                                    <!-- Copy "embed a map" HTML code from any point on Google Maps -> Share Link  -->

                                    <iframe class="google-map mt-4"
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3101.2331643349466!2d-0.561123!3d39.584375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604ea4a8c9f4b1%3A0x46fef00ae48600f9!2sP%C3%A1del%20Club%20Valencia!5e0!3m2!1ses!2ses!4v1713281924213!5m2!1ses!2ses"
    width="100%" height="300" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="site-footer-wrap d-flex align-items-center">
                        <p class="copyright-text mb-0 me-4">© 2025 Padel Legends. Todos los derechos reservados.</p>

                        <ul class="social-icon">
                            <li><a href="https://facebook.com/tooplate" class="social-icon-link bi-facebook"></a></li>

                            <li><a href="https://pinterest.com/tooplate" class="social-icon-link bi-pinterest"></a>
                            </li>

                            <li><a href="https://twitter.com/minthu" class="social-icon-link bi-twitter"></a></li>

                            <li><a href="https://www.youtube.com/tooplate" class="social-icon-link bi-youtube"></a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <p class="copyright-text mb-0 me-4">Tu club de pádel en Valencia. Vive la pasión por el deporte, compite, mejora y haz comunidad.

                </div>

            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->


    <script src="{{ asset('js/inicio.js') }}"></script>


    <!-- Bootstrap Bundle JS (incluye Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
