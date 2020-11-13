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
        <div class="container">
            <div class="d-flex text-center flex-column mb-3">
                <div class="p-2">
                    <p>
                        <b>Biblioteca</b> Islas Malvinas
                    </p>
                    <p>
                        Bermúdez 2936, Villa Luzuriaga, Provincia de Buenos Aires - C.P. 1753.
                    </p>
                    <b>Correo electrónico: </b><a
                        href="mailto:bibliotecaees5069@gmail.com">bibliotecaees5069@gmail.com</a>
                    <p>
                    </p>
                    <p>
                        Cuando se renueven las actividades escolares van a poder acercarse los alumnos de lunes a
                        viernes, por
                        la mañana de 8:00 a 11:30 hs. y a la tarde de 13:30 a 17:00 hs.
                    </p>
                </div>
                <div class="p-2">Copyright © Biblioteca Digital 2020</div>
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
    
    @yield('scripts')
    
</body>
</html>