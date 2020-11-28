<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panel administrativo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admins/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link">Principal</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
																document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
					with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Listar
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/admin/contenidos') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Contenido</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/categorias') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categorías</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/subcategorias')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Subcategorías</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/admin/publicaciones')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Publicaciones</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Crear
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/admin/contenido/crear')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Contenido</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/admin/categoria/crear')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categoría</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/admin/subcategoria/crear')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Subcategoría</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/admin/publicacion/crear')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Publicación</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Masthead-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @yield('content')

    </div>

    <!-- jQuery -->
    <script src="{{ asset('admins/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admins/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admins/js/adminlte.js')}}"></script>
    <script src="{{ asset('js/admin/app.js')}}"></script>
    @yield('scripts')
</body>