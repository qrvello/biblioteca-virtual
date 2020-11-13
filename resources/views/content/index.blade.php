@extends('layouts.app')

@section('title', 'Contenido')

@section('content')

<section class="page-section" id="contenido">
    <div class="container">

        {{-- Header de la página SI se muestran contenidos de una subcategoría específica
            --}}
        @if (isset($subcategory))
        <h2 class="section-heading text-uppercase">{{ $subcategory->title }}</h2>
        <h3 class="section-subheading">{{ $subcategory->description }}</h3>
        @endif

        {{-- Header de la página SI se muestran contenidos de una categoría específica
            --}}
        @if (isset($category))
        <h2 class="section-heading text-uppercase">{{ $category->title }}</h2>
        <h3 class="section-subheading">{{ $category->description }}</h3>
        @endif

        @if(isset($contents))
        {{-- Header de la página de contenidos --}}
        <h2 class="section-heading text-uppercase">Contenidos</h2>
        <h3 class="section-subheading">Libros existentes en la biblioteca con los datos catalográficos
            correspondientes: Autor, título, editorial, lugar y fecha de edición, páginas, tema o materia.</h3>
        @endif

        {{-- Cantidad de resultados de la búsqueda --}}
        @if (isset($search))
        <div class="alert alert-secondary" role="alert">
            Hay {{ $contents->total() }} resultados para tu búsqueda de '{{ $search }}'.
        </div>
        @endif

        {{-- Listado de contenidos --}}
        @if (isset($contents))

        @forelse($contents->chunk(2) as $chunk)

        <div class="card-deck">

            @foreach ($chunk as $content)

            <x-card-content :content="$content" />

            @endforeach

        </div>
        @empty
        @endforelse
        {{-- Paginación --}}
        {{ $contents->withQueryString()->links() }}
        <x-modal-content/>
        @endif

        {{-- Errores --}}
        @if (isset($error))

        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>

        @endif

</section>
@endsection

@section('scripts')
<script src="{{asset('js/modal_content.js')}}"></script>
@endsection