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
                        <div class="card">
                            <img class="card-img-top" src="{{ $publication->image }}" alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title">{{ $publication->title }}</h2>
                                <p class="card-text">{{ $publication->description }}</p>
                                <div class="card-text">{{ $publication->created_at->format('d/m/Y') }}</div>
                            </div>
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
