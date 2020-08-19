@extends('layouts.app')

@section('title', 'Subir archivos')

@section('header')

<div class="container">
    <div class="masthead-heading text-uppercase">Registrarse</div>
</div>

@endsection

@section('content')

<br>

<body>
    <link href="{{ asset('css/styles_form.css') }}" rel="stylesheet">
    <br><br>
    <div class="container">
        <form class="md-form">
            <div class="file-field">
                <div class="btn btn-primary btn-sm float-left">
                    <span>Choose file</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload your file">
                </div>
            </div>
        </form>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                            <th>CSS grade</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://kit.fontawesome.com/1324fa4c3b.js" crossorigin="anonymous"></script>
</body>

@endsection
