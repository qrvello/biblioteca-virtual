@extends('layouts.app')

@section('title', 'Publicaciones')

@section('content')

    <section class="page-section" id="novedades">
        <div class="container">
            <h2 class="section-header text-uppercase">Novedades</h2>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="section-header">Efemérides</h1>
                    @forelse($publications->chunk(2) as $chunk)
                        <div class="card-deck">
                            @foreach ($chunk as $publication)
                                <x-card-publication-full :publication="$publication" />
                                <x-modal-publication :publication="$publication" />
                            @endforeach
                        </div>
                    @empty
                        Aún no hay publicaciones.
                    @endforelse
                </div>
            </div>
        </div>
        {{-- Paginación --}}
        {{ $publications->links() }}
        </div>


    </section>

@endsection
