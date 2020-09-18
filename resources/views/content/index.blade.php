@extends('layouts.app')

@section('title', 'Contenido')

@section('content')

<section class="page-section" id="contenido">
    <div class="container">

        {{-- Header de la página SI se muestran contenidos de una categoría específica --}}
        @if ($category ?? '')
        <h2 class="section-heading text-uppercase">{{$category->title}}</h2>
        <h3 class="section-subheading">{{$category->description}}</h3>
        @else
        {{-- Header de la página de contenidos --}}
        <h2 class="section-heading text-uppercase">Contenidos</h2>
        <h3 class="section-subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum erat et
            dolor pulvinar, in scelerisque ipsum
            dapibus. Maecenas pellentesque commodo ante. Phasellus bibendum lectus at tortor volutpat sagittis.</h3>
        @endif

        {{-- Cantidad de resultados de la búsqueda --}}
        @if ($search ?? '')
        <div class="alert alert-secondary" role="alert">
            Hay {{ $contents->total() }} resultados para tu búsqueda de '{{ $search }}'.
        </div>
        @endif

        {{-- Listado de contenidos --}}
        @if ($contents)
        @forelse($contents->chunk(3) as $chunk)
        <div class="card-deck">
            @foreach ($chunk as $content)
            <div class="shadow-lg card mb-3">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$content->id}}">
                    <img class="card-img-top" src="{{ $content -> image }}" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h2 class="card-title">{{ $content -> title }}</h2>
                    <h4 class="card-title">Autor/a: {{ $content -> author }}</h4>
                    <h6 class="card-text">Editorial: {{ $content -> editorial }}</h6>
                    <p class="card-text">Descripción: {{ $content -> description }}</p>
                    <p class="card-text">Fecha de publicación: {{ $content->created_at->format('d/m/Y')}}</p>
                    <p class="card-text">Materia: {{ $content -> matter }}</p>
                    <p class="card-text">Categoría: <a
                            href="{{action('GuestController@category_show', $content -> category -> id)}}">{{ $content -> category -> title }}</a>
                    </p>
                </div>

                <div class="portfolio-modal modal fade" id="portfolioModal{{$content->id}}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg"
                                    alt="Close modal" />
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project Details Go Here-->
                                            <h2 class="text-uppercase">{{$content->title}}</h2>
                                            <p class="item-intro text-muted"></p>
                                            <img class="img-fluid d-block mx-auto" src="{{$content->image}}"
                                                alt="" />
                                            <p>{{$content->description}}</p>
                                            <ul class="list-inline">
                                                <li>Fecha: {{$content->created_at->format('d/m/Y')}}</li>
                                                <li>Autor/a: {{ $content -> author }}</li>
                                                <li>Editorial: {{ $content -> editorial }}</li>
                                                <li>Materia: {{ $content -> matter }}</li>
                                                <li class="card-text">Categoría: <a
                                                        href="{{action('GuestController@category_show', $content -> category -> id)}}">{{ $content -> category -> title }}</a>
                                                </li>
                                            </ul>
                                            <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                                <i class="fas fa-download"></i>
                                                Descargar
                                            </button>
                                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                                <i class="fas fa-times mr-1"></i>
                                                Cerrar publicación
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

    </div>
    @empty
    {{-- Errores --}}
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @endforelse

    {{-- Paginación --}}
    {{ $contents->appends(['search' => $search ?? ''])->links() }}
    @endif


</section>

@endsection
