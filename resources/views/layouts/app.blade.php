<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,800;1,400&family=PT+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <div class="home-container">
                <ul class=" home-container-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{action('IndexController@index')}}"><i class="fas fa-home fa-2x"></i></a>
                    </li>
                    <li class="nav-item">
                        <form class="searchbar" action="{{action('SearchController@index')}}" method="GET" autocomplete="off">
                            <input class="search_input" id="input_search" type="text" name="input_search" value="" placeholder="Buscar">
                            <button type="submit" id="search" name="button" class=" search_icon nav-link">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </div> <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menú
                <i class="fas fa-bars ml-1"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{action('ContentController@index')}}">Contenido</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{action('IndexController@nosotros')}}">Nosotros</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Masthead-->

    @yield('content')

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="col align-items-center">
                <div class="">Copyright © Biblioteca Digital 2020</div>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->
    <script src=" {{ asset('js/scripts.js')}}"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

</body>

</html>
