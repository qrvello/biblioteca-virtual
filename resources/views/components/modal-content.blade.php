<div class="portfolio-modal modal fade" id="contenido{{ $content->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <img loading="lazy" src="/assets/img/close-icon.svg" alt="Close modal">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">{{ $content->title }}</h2>
                            <p class="item-intro text-muted"></p>
                            <img class="img-fluid d-block mx-auto" loading="lazy" src="{{ '/storage/imagenes/contenido/' . $content->image }}"
                                alt="" />
                            <p>{{ $content->description }}</p>
                            <ul class="list-inline">
                                <li>Autor/a: {{ $content->author }}</li>
                                <li>Editorial: {{ $content->editorial }}</li>
                                <li>Materia: {{ $content->matter }}</li>
                                <li>
                                    @if ($content->subcategory)
                                        Subcategoría: <a
                                            href="{{ action('GuestController@subcategory_show', $content->subcategory_id) }}">
                                            {{ $content->subcategory->title }} </a>
                                    @else
                                        Categoria: <a
                                            href="{{ action('GuestController@category_show', $content->category_id) }}">
                                            {{ $content->category->title }} </a>
                                    @endif
                                </li>
                            </ul>
                            @if($content->file)
                                <a href="{{ url('descargar/' . $content->id) }}" class="btn btn-secondary">
                                    <i class="fas fa-download"></i>
                                    Descargar
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
