<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,800;1,400&family=PT+Sans:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>

    @yield('content')

</body>
<!-- Footer-->

{{-- Scripts --}}
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

<!-- Core theme JS-->
<script src=" {{ asset('js/scripts.js')}}"></script>
<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

</body>

</html>
