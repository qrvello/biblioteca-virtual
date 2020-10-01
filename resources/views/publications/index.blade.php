@extends('layouts.app')

@section('title', 'Publicaciones')

@section('content')

<section class="page-section" id="publicaciones">
    <div class="container">
        <h2 class="section-header text-uppercase">Publicaciones</h2>
        {{-- Listado de publicaciones --}}
            @forelse($publications->chunk(3) as $chunk)
                <div class="card-deck">
                    @foreach ($chunk as $publication)
                        <x-card-publication-full :publication="$publication" />
                        <x-modal-publication :publication="$publication" />
                    @endforeach
                </div>
            @empty
                Aún no hay publicaciones.
            @endforelse
            {{-- Paginación --}}
            {{ $publications->links() }}


</section>

@endsection
