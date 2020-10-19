@extends('layouts.app')

@section('title', 'Publicaciones')

@section('content')

    <section class="page-section" id="novedades">
        <div class="container">
            <h2 class="section-header text-uppercase">Novedades</h2>
            <div class="row">
                <div class="col-md-3 text-center">
                    <h3 class="section-header">Efemérides</h3>
                    @forelse($publications->chunk(1) as $chunk)
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
                <div class="col-md-3 text-center">
                    <h3 class="section-header">Notas Periodisticas</h3>
                    @forelse($publications->chunk(1) as $chunk)
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
                <div class="col-md-3 text-center">
                    <h3 class="section-header">Ultimos libros</h3>
                    @forelse($publications->chunk(1) as $chunk)
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
                <div class="col-md-3 text-center">
                    <h3 class="section-header">Noticias</h3>
                    @forelse($publications->chunk(1) as $chunk)
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
        </div> --}}


    </section>

@endsection
