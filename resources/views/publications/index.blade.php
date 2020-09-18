@extends('layouts.app')

@section('title', 'Publicaciones')

@section('content')

<section class="page-section" id="publicaciones">
    <div class="container">

        {{-- Listado de publicaciones --}}
            @forelse($publications->chunk(3) as $chunk)
                <div class="card-deck">
                    @foreach ($chunk as $publication)
                        <div class="card">
                            <img class="card-img-top" src="{{ $publication->image }}" alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title">{{ $publication->title }}</h2>
                                <p class="card-text">{{ $publication->description }}</p>
                            </div>
                            <div class="card-footer">Fecha de publicación: {{ $publication->created_at }}</div>
                        </div>
                    @endforeach
                </div>
            @empty
                Aún no hay publicaciones
            @endforelse
            {{-- Paginación --}}
            {{ $publications->links() }}


</section>

@endsection
