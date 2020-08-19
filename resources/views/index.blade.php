@extends('layouts.app')

@section('title', 'Biblioteca E.E.S.Nº5')

@section('content')

<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">¡Bienvenido a nuestra biblioteca digital!</div>
        <div class="masthead-subheading">Escuela de Educación Secundaria N°5 ISLAS MALVINAS</div>
    </div>
</header>

{{-- Novedades --}}
<section class="page-section bg-white" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Novedades</h2>
            <h3 class="section-subheading text-muted">Aquí se encuentran las entradas más recientes de la página.</h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{asset('assets/img/portfolio/muni_psicologia.jpg')}}" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Asistencia Psicológica</div>
                        <div class="portfolio-caption-subheading text-muted">Llamá al 11-2268-3174</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('assets/img/portfolio/vuelta_a_clases.jpg') }}" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Vuelta a clases</div>
                        <div class="portfolio-caption-subheading text-muted">Descripción</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('assets/img/portfolio/Educación-sexual.jpg') }}" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Charla de educación sexual</div>
                        <div class="portfolio-caption-subheading text-muted">Descripción</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('assets/img/portfolio/LAVADO DE MANOS.jpg') }}" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Covid-19</div>
                        <div class="portfolio-caption-subheading text-muted">Descripción</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('assets/img/portfolio/05-thumbnail.jpg') }}" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Título</div>
                        <div class="portfolio-caption-subheading text-muted">Descripción</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('assets/img/portfolio/06-thumbnail.jpg') }}" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Título</div>
                        <div class="portfolio-caption-subheading text-muted">Descripción</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contenido</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Audiolibros y libros electrónicos</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-university fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Material de estudio</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-play-circle fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Videos</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Modals-->
<!-- Modal 1-->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <img src=" {{ asset('assets/img/close-icon.svg')}} " alt="Close modal">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Asistencia Psicológica</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto"
                                src=" {{ asset('assets/img/portfolio/muni_psicologia_full.jpg')}} " alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Fecha: Agosto 2020</li>
                                <li>Categoría: Illustration</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 2-->
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src=" {{ asset('assets/img/close-icon.svg') }}"
                    alt="Close modal"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Vuelta a clases</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto"
                                src=" {{ asset('assets/img/portfolio/vuelta_a_clases_full.jpg')}}" alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Fecha: Agosto 2020</li>
                                <li>Categoría: Graphic Design</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 3-->
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="{{ asset('assets/img/close-icon.svg') }}"
                    alt="Close modal"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Charla de educación sexual</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto"
                                src="{{ asset('assets/img/portfolio/Educación-sexual_full.jpg')}}" alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Fecha: Agosto 2020</li>
                                <li>Categoría: Identity</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 4-->
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="{{ asset('assets/img/close-icon.svg') }}"
                    alt="Close modal"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Covid-19</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto"
                                src="{{ asset('assets/img/portfolio/LAVADO DE MANOS_full.jpg')}}" alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Fecha: Agosto 2020</li>
                                <li>Categoría: Branding</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 5-->
<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="{{ asset('assets/img/close-icon.svg') }}"
                    alt="Close modal"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Título</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="{{ asset('assets/img/portfolio/05-full.jpg')}}"
                                alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Fecha: Agosto 2020</li>
                                <li>Categoría: Website Design</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 6-->
<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="{{ asset('assets/img/close-icon.svg') }}"
                    alt="Close modal"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Título</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="{{ asset('assets/img/portfolio/06-full.jpg')}}"
                                alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Fecha: Agosto 2020</li>
                                <li>Categoría: Photography</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
