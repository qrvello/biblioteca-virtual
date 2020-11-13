@extends('layouts.app')

@section('title', 'Publicaciones')

@section('content')

<section class="page-section" id="novedades">
    <div class="container">
        <h1 class="section-header text-uppercase">Novedades</h1>
        <h2 class="section-header text-center">{{ $category->name }}</h2>

        @if(isset($publications))


            <x-carousel-publications :publications="$publications"/>

            {{$publications->links()}}

            <x-modal-content/>
        @else

            <div class="alert alert-warning" role="alert">
                Aún no hay publicaciones.
            </div>

        @endif
    </div>
</section>
@endsection

@section('scripts')
<script src="{{asset('js/modal_content.js')}}"></script>
@endsection