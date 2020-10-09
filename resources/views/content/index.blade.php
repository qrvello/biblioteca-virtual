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
            <h3 class="section-subheading">Libros existentes en la biblioteca con los datos catalográficos correspondientes: Autor, título, editorial, lugar y fecha de edición, páginas, tema o materia.</h3>
        @endif

        {{-- Cantidad de resultados de la búsqueda --}}
        @if ($search ?? '')
            <div class="alert alert-secondary" role="alert">
                Hay {{ $contents->total() }} resultados para tu búsqueda de '{{ $search }}'.
            </div>
        @endif

        {{-- Listado de contenidos --}}
        @if ($contents ?? '')

            @forelse($contents->chunk(3) as $chunk)

                <div class="card-deck">

                    @foreach ($chunk as $content)

                        <x-card-content :content="$content" />
                        <x-modal-content :content="$content" />

                    @endforeach

                </div>

            @empty

                {{-- Errores --}}
                @if($error ?? '')

                    <div class="alert alert-danger" role="alert">
                        {{ $error ?? '' }}
                    </div>

                @endif

            @endforelse

            {{-- Paginación --}}
            {{ $contents->appends(['search' => $search ?? ''])->links() }}
        @endif

</section>

@endsection
