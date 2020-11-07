<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,800;1,400&family=PT+Sans:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top mb-4" id="mainNav">
        <div class="container">
            <div class="home-container">
                <ul class=" home-container-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home fa-2x"></i></a>
                    </li>
                    <li class="nav-item">
                        <form class="searchbar" action="{{ url('/contenidos') }}" method="GET" autocomplete="off">
                            <input class="search_input" id="search_input" type="text" name="search"
                                placeholder="Buscar">
                            <button type="submit" id="search_button" class="search_icon nav-link">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </div> <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive">
                <i class="fas fa-bars ml-1"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contenidos') }}">Contenidos</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/categorias') }}">Categorías</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/novedades/categorias') }}">Novedades</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/nosotros') }}">Institución</a>
                    </li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ url('/admin') }}">Panel</a>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>


    @yield('content')


    <!-- Footer-->
    <footer class="footer py-4">
        <div class="">
            <div class="row">
                <div class="col-md-8">
                    <div class="container">
                        <div class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 200px;">
                            <div class="p-2 bd-highlight"><b>Biblioteca</b> "Islas Malvinas"<br><br>
                                Tel.: <a href="tel:4450-5044">4450-5044</a><br>
                                ANEXO: Miguel Cane 2991. Tel.: <a href="tel:4460-5748">4460-5748</a><br>
                                Bermúdez 2936, Villa Luzuriaga, Provincia de Buenos Aires - C.P. 1753<br>
                                Correo electrónico: <a
                                    href="mailto:bibliotecaees5069@gmail.com">bibliotecaees5069@gmail.com</a><br>
                                Cuando se renueven las actividades escolares van a poder acercarse de lunes a viernes,
                                por la mañana de 8:00 a 11:30 hs. y a la tarde de 13:30 a 17:00 hs</div>
                            <div class="p-2 bd-highlight">Copyright © Biblioteca Digital 2020</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13125.957572122856!2d-58.578837!3d-34.667596!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x11314b4ab3608e8c!2sEscuela%20De%20Educaci%C3%B3n%20Secundaria%20N%C2%BA5%20%22Islas%20Malvinas%22!5e0!3m2!1ses-419!2sar!4v1602026100503!5m2!1ses-419!2sar"
                        width="400" height="200" frameborder="0" style="border:0; border-radius: 2rem;"
                        allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->
    <script src=" {{ asset('js/scripts.js') }}"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

</body>

</html>
