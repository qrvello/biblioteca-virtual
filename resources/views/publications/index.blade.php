@extends('layouts.app')

@section('title', 'Publicaciones')

@section('content')

    <section class="page-section" id="novedades">
        <div class="container">
            <h2 class="section-header text-uppercase">Novedades</h2>
            <div class="row">
                <div class="col-md-12 mt-5">
                    @forelse($publications->chunk(3) as $chunk)
                        <div class="card-deck">
                            @foreach ($chunk as $publication)
                                <x-card-publication-full :publication="$publication" />
                            @endforeach
                        </div>
                    @empty
                        <div class="alert alert-warning" role="alert">
                            Aún no hay publicaciones.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        {{-- Paginación --}}
        {{ $publications->links() }}
        </div>


    </section>

@endsection
